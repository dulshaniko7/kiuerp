<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Modules\Admin\Repositories\AdminPermissionSystemRepository;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Repositories\AdminRoleRepository;
use Modules\Admin\Repositories\AdminSystemPermissionRepository;
use Nwidart\Modules\Facades\Module;

class Permission
{
    /**
     * Get all the permission handling system labels
     * @return array
     */
    public static function getPermSystemSlugs()
    {
        $systems = self::getPermSystems();

        return array_keys($systems);
    }

    /**
     * Get all the permission handling systems
     * @return array
     */
    public static function getPermSystems()
    {
        $systems = config('admin.permission_systems');

        if(!is_array($systems))
        {
            $systems = array();
        }

        return $systems;
    }

    /**
     * Get all the permission handling system labels
     * @param string $slug
     * @return array
     */
    public static function getSystemBySlug($slug)
    {
        $systems = self::getPermSystems();

        $name = "";
        if(is_array($systems) && count($systems)>0)
        {
            foreach ($systems as $system => $systemName)
            {
                if($slug == $system)
                {
                    $name = $systemName;
                    break;
                }
            }
        }

        return $name;
    }

    /**
     * Load the permissions of all systems
     * @param bool $withHash
     * @param bool $exclude
     * @param array $excludeHashes
     * @return array
     */
    public static function getAllSystemPermissions($withHash=false, $exclude=false, $excludeHashes=[])
    {
        $systems = self::getPermSystems();
        $systemPermissions = array();

        if(is_array($systems) && count($systems)>0)
        {
            foreach ($systems as $system => $label)
            {
                $systemPermission = array();
                $systemPermission["name"] = $system;
                $systemPermission["label"] = $label;
                $systemPermission["modules"] = self::getSingleSystemPermissions($system, $withHash, $exclude, $excludeHashes);

                $systemPermissions[]=$systemPermission;
            }
        }

        return $systemPermissions;
    }

    /**
     * Load the permission of a single system
     * @param string $system
     * @param bool $withHash
     * @param bool $exclude
     * @param array $excludeHashes
     * @return array
     */
    public static function getSingleSystemPermissions($system, $withHash=false, $exclude=false, $excludeHashes=[])
    {
        if($system == "default")
        {
            $permModules = self::getDefaultSystemPermissions();
        }
        else
        {
            $permModules = array();

            $filePath = Module::getModulePath("admin")."Config/permissions/".$system.".php";
            if(file_exists($filePath))
            {
                $configArray=include($filePath);
                if(isset($configArray["modules"]))
                {
                    $permModules = $configArray["modules"];
                }
            }
        }

        $permModules = self::prepareModules($permModules, $withHash, $exclude, $excludeHashes);

        $permissions = array();
        if(count($permModules)>0)
        {
            $permissions = $permModules;
        }

        return $permissions;
    }

    /**
     * Load the permission for a single module
     * @return array
     */
    public static function getDefaultSystemPermissions()
    {
        //get module permissions first
        $modules = Module::allEnabled();

        $permModules = [];
        if(is_array($modules) && count($modules)>0)
        {
            foreach ($modules as $module)
            {
                $filePath = Module::getModulePath($module)."Config/permissions.php";

                if(file_exists($filePath))
                {
                    $permModule=include($filePath);

                    if($permModule)
                    {
                        $permModules[] = $permModule;
                    }
                }
            }
        }

        //load default config path permissions
        $permissionModule=config('permissions.module');
        $permissionModuleName=config('permissions.name');
        $permissionModuleGroups=config('permissions.groups');

        if($permissionModule != "" && $permissionModuleName !="")
        {
            $module = [
                "module" => $permissionModule,
                "name" => $permissionModuleName,
                "groups" => $permissionModuleGroups["groups"]
            ];

            $permModules[] = $module;
        }

        return $permModules;
    }

    /**
     * @param array $modules
     * @param bool $withHash
     * @param bool $exclude
     * @param array $excludeHashes
     * @return array
     */
    public static function prepareModules($modules=array(), $withHash=false, $exclude=false, $excludeHashes=[])
    {
        $prepared = [];

        if(is_array($modules) && count($modules)>0)
        {
            foreach ($modules as $module)
            {
                if(isset($module["module"]) && isset($module["name"]) && isset($module["groups"]))
                {
                    $groups = self::prepareGroups($module["groups"], $withHash, $exclude, $excludeHashes);
                    if(count($groups)>0)
                    {
                        $module["groups"] = $groups;
                        $prepared[]=$module;
                    }
                }
            }
        }

        return $prepared;
    }

    /**
     * @param array $groups
     * @param bool $withHash
     * @param bool $exclude
     * @param array $excludeHashes
     * @return array
     */
    public static function prepareGroups($groups=array(), $withHash=false, $exclude=false, $excludeHashes=[])
    {
        $prepared = [];

        if(is_array($groups) && count($groups)>0)
        {
            foreach ($groups as $group)
            {
                if(isset($group["name"]) && isset($group["group"]) && isset($group["permissions"]))
                {
                    $permissions = self::preparePermissions($group["permissions"], $withHash, $exclude, $excludeHashes);

                    if(is_array($permissions) && count($permissions)>0)
                    {
                        $group["permissions"]=$permissions;

                        $prepared[]=$group;
                    }
                }
            }
        }

        return $prepared;
    }

    /**
     * @param array $permissions
     * @param bool $withHash
     * @param bool $exclude
     * @param array $excludeHashes
     * @return array
     */
    public static function preparePermissions($permissions=array(), $withHash=false, $exclude=false, $excludeHashes=[])
    {
        $prepared = [];
        if(is_array($permissions) && count($permissions)>0)
        {
            foreach ($permissions as $perm)
            {
                if(isset($perm["action"]) && isset($perm["label"]))
                {
                    //remove trailing slashes
                    $del = "/";
                    $perm["action"] = rtrim($perm["action"], $del);

                    if($withHash)
                    {
                        $perm["hash"] = self::getPermissionHash($perm["action"]);

                        if($exclude)
                        {
                            if(!in_array($perm["hash"], $excludeHashes))
                            {
                                $prepared[]=$perm;
                            }
                        }
                        else
                        {
                            $prepared[]=$perm;
                        }
                    }
                    else
                    {
                        $prepared[]=$perm;
                    }
                }
            }
        }

        return $prepared;
    }

    /**
     * Get submitted form data of permissions for all system permissions
     * @return array
     */
    public static function getPermissionFormData()
    {
        $formData = array();

        $request = request();
        $permissions = $request->post("permissions");

        if(is_array($permissions) && count($permissions)>0)
        {
            foreach($permissions as $permission)
            {
                $formData[$permission["system"]]=$permission["permissions"];
            }
        }

        return $formData;
    }

    /**
     * This function is for load the permission for the default controller path
     * @return array
     */
    public static function loadDefaultPermissions()
    {
        $permissions = array();

        $permissionModuleGroups=config('permissions.groups');

        if(is_array($permissionModuleGroups))
        {
            if(count($permissionModuleGroups["groups"])>0)
            {
                $permissions = self::extractPermissions($permissionModuleGroups);
            }
        }

        return $permissions;
    }

    /**
     * This function is for load the permission for a single module
     * @param string $module
     * @return mixed
     */
    public static function loadSingleModulePermissions($module)
    {
        $filePath = Module::getModulePath($module)."Config/permissions.php";

        $permissionGroups = array();
        if(file_exists($filePath))
        {
            $configArray=include($filePath);

            if(isset($configArray["groups"]))
            {
                if(is_array($configArray["groups"]) && count($configArray["groups"])>0)
                {
                    $permissionGroups = $configArray["groups"];
                }
            }
        }

        return self::extractPermissions($permissionGroups);
    }

    /**
     * Extract permissions for the required format
     * @param array $permissionGroups
     * @return array
     */
    public static function extractPermissions($permissionGroups)
    {
        $permissions = array();

        if(is_array($permissionGroups) && count($permissionGroups)>0)
        {
            foreach($permissionGroups as $group => $pG)
            {
                if(isset($pG["permissions"]) && is_array($pG["permissions"]) && count($pG["permissions"])>0)
                {
                    $permissionActions = [];

                    foreach($pG["permissions"] as $permission)
                    {
                        //trim trailing slashes;
                        $del = "/";
                        $action = rtrim($permission["action"], $del);

                        $permissionActions[]=$action;
                    }

                    $permissions = array_merge($permissionActions, $permissions);
                }
            }
        }

        return $permissions;
    }

    /**
     * Get currently logged in user's permissions list
     * @param int $adminId
     * @param int $adminRoleId
     * @return array
     */
    public static function getPermissions($adminId, $adminRoleId)
    {
        $permissions = array();

        $system = config('admin.system');
        if($system != "")
        {
            $adminPermRepo = new AdminPermissionSystemRepository();
            $systemId = $adminPermRepo->getSystemId($system);

            $adminPermissions = self::getAdminPermissions($adminId, $systemId);
            $adminRolePermissions = AdminRoleRepository::getPermissionData($adminRoleId, $systemId);

            $validPermissions = array_merge($adminPermissions["invoked"], array_diff($adminRolePermissions, $adminPermissions["invoked"]));

            $permissions = array_diff($validPermissions, $adminPermissions["revoked"]);
        }

        return $permissions;
    }

    /**
     * Get currently logged in user's permissions list
     * @param int $systemId
     * @param int $adminId
     * @return array
     */
    public static function getAdminPermissions($systemId, $adminId)
    {
        $adminPermissions = AdminRepository::getPermissionData($adminId, $systemId);

        $data = array();
        $data["invoked"] = [];
        $data["revoked"] = [];
        if(is_array($adminPermissions) && count($adminPermissions)>0)
        {
            foreach ($adminPermissions as $permission)
            {
                if($permission["inv_rev_status"] == "1")
                {
                    $data["invoked"][] = $permission["system_perm_id"];
                }
                else
                {
                    $data["revoked"][] = $permission["system_perm_id"];
                }
            }
        }

        return $data;
    }

    /**
     * Check if have permissions for set of URLs/URIs and then return prepared urls array according to the permissions
     * @param array $urls
     * @return array
     */
    public static function validateUrls($urls=array())
    {
        $defaultAdmin = request()->session()->get("default_admin");

        if($defaultAdmin)
        {
            return $urls;
        }
        else
        {
            if(is_array($urls) && count($urls)>0)
            {
                $permValidate = new PermissionValidate();
                $permRepo = new AdminSystemPermissionRepository();

                $baseUrl = URL::to('/');

                $hashes = [];
                $preparedUrls = [];
                foreach ($urls as $key => $url)
                {
                    $routeUrl = str_replace($baseUrl, "", $url);

                    $route = $permValidate->getRouteUri($routeUrl);
                    $module = $permValidate->getModuleFromUri($route);
                    $hash = $permRepo->generatePermissionHash($route);

                    $hashes[]=$hash;

                    $slot = [];
                    $slot["url"]=$url;
                    $slot["route"]=$route;
                    $slot["module"]=$module;
                    $slot["hash"]=$hash;

                    $preparedUrls[$key]=$slot;
                }

                //get permission ids for route hashes
                $permIds = $permRepo->getPermissionFromHashes($hashes);

                $urls = array();
                foreach ($preparedUrls as $key => $preparedUrl)
                {
                    $url = $preparedUrl["url"];
                    $route = $preparedUrl["route"];
                    $module = $preparedUrl["module"];
                    $hash = $preparedUrl["hash"];

                    $permId = false;
                    if(isset($permIds[$hash]))
                    {
                        $permId = $permIds[$hash];
                    }

                    if($permValidate->checkHavePermission($module, $route, $permId))
                    {
                        //set requested url since have permission
                        $urls[$key]=$url;
                    }
                    else
                    {
                        //set url as false since have no permission
                        $urls[$key]=false;
                    }
                }
            }

            return $urls;
        }
    }

    /**
     * Check permissions if this user have permission to requested route
     * @param string $url
     * @return bool
     */
    public static function haveUrlPermission($url)
    {
        $defaultAdmin = request()->session()->get("default_admin");

        if($defaultAdmin)
        {
            return true;
        }
        else
        {
            $baseUrl = URL::to('/');

            $routeUrl = str_replace($baseUrl, "", $url);

            $permValidate = new PermissionValidate();
            $permRepo = new AdminSystemPermissionRepository();

            $route = $permValidate->getRouteUri($routeUrl);
            $module = $permValidate->getModuleFromUri($route);
            $permission = $permRepo->getPermissionFromAction($route);

            $permId = false;
            if(isset($permission["system_perm_id"]))
            {
                $permId = $permission["system_perm_id"];
            }

            return $permValidate->checkHavePermission($module, $route, $permId);
        }
    }

    /**
     * Check permissions if this user have permission to requested action
     * @param string $module
     * @param string $action
     * @return bool
     */
    public static function haveActionPermission($module, $action)
    {
        $defaultAdmin = request()->session()->get("default_admin");

        if($defaultAdmin)
        {
            return true;
        }
        else
        {
            $permValidate = new PermissionValidate();
            $permRepo = new AdminSystemPermissionRepository();
            $permission = $permRepo->getPermissionFromAction($action);

            $permId = false;
            if(isset($permission["system_perm_id"]))
            {
                $permId = $permission["system_perm_id"];
            }

            return $permValidate->checkHavePermission($module, $action, $permId);
        }
    }

    /**
     * Check permissions if this user have permission to current route
     * @return bool
     */
    public static function haveCurrentUrlPermission()
    {
        $permValidate = new PermissionValidate();
        return $permValidate->haveCurrentUrlPermission();
    }

    /**
     * Get permission data from database for a specific route or url path
     * @param string $route
     * @return bool
     */
    public static function getRoutePermission($route)
    {
        $permRepo = new AdminSystemPermissionRepository();
        return $permRepo->getPermissionFromAction($route);
    }

    /**
     * Get permission data from database for a specific route or url path
     * @param string $route
     * @return bool
     */
    public static function getPermissionHash($route)
    {
        $permRepo = new AdminSystemPermissionRepository();
        return $permRepo->generatePermissionHash($route);
    }
}
