<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Config;
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
    public static function getPermSystemLabels()
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
     * Load the permission for a single module
     * @param string $system
     * @return array
     */
    public static function loadSingleSystemPermissions($system)
    {
        $permissions = array();

        if($system == "default")
        {
            $permissions = self::loadDefaultSystemPermissions();
        }
        else
        {
            $filePath = Module::getModulePath("admin")."Config/permissions/".$system.".php";
            if(file_exists($filePath))
            {
                $permissionsArray=include($filePath);

                if(isset($permissionsArray["groups"]))
                {
                    $permissions = $permissionsArray["groups"];
                }
            }
        }

        return $permissions;
    }

    /**
     * Load the permission for a single module
     * @return array
     */
    public static function loadDefaultSystemPermissions()
    {
        $permissions = array();

        //get module permissions first
        $modules = Module::allEnabled();

        if(is_array($modules) && count($modules)>0)
        {
            foreach ($modules as $module)
            {
                $filePath = Module::getModulePath($module)."Config/permissions.php";

                if(file_exists($filePath))
                {
                    $permissionsArray=include($filePath);

                    if(isset($permissionsArray["groups"]))
                    {
                        $permissions = array_merge($permissions, $permissionsArray);
                    }
                }
            }
        }

        //load default config path permissions
        $permissionsArray=config('permissions.groups');

        if(isset($permissionsArray["groups"]))
        {
            $permissions = array_merge($permissions, $permissionsArray);
        }

        return $permissions;
    }

    /**
     * Load the permissions of all systems
     * @return array
     */
    public static function getAllSystemPermissions()
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
                $systemPermission["groups"] = self::loadSingleSystemPermissions($system);

                $systemPermissions[]=$systemPermission;
            }
        }

        return $systemPermissions;
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

        if(Config::get('permissions.groups'))
        {
            $permissionGroups = Config::get('permissions.groups');
            $permissions = self::extractPermissions($permissionGroups);
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
            $permissionsArray=include($filePath);
            $permissionGroups = $permissionsArray["groups"];

            if(isset($permissionsArray["groups"]) && is_array($permissionsArray["groups"]))
            {
                $permissionGroups = $permissionsArray["groups"];
            }
        }

        $permissionGroups = self::extractPermissions($permissionGroups);

        return $permissionGroups;;
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
            $systemId = AdminPermissionSystemRepository::getSystemId($system);

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

                $hashes = [];
                $preparedUrls = [];
                foreach ($urls as $key => $url)
                {
                    $route = $permValidate->getRouteUri($url);
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
     * Check permissions if this user have permission to current route
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
            $permValidate = new PermissionValidate();
            $permRepo = new AdminSystemPermissionRepository();

            $route = $permValidate->getRouteUri($url);
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
     * Check permissions if this user have permission to current route
     * @return bool
     */
    public static function getPermissionIds($routes=[])
    {
        $permValidate = new PermissionValidate();
        return $permValidate->haveCurrentUrlPermission();
    }
}
