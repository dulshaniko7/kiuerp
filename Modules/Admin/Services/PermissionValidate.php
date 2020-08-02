<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Nwidart\Modules\Facades\Module;

class PermissionValidate
{
    private $adminPermissions = null;
    private $defaultPermissions = null;
    private $modulePermissions = [];

    /**
    * This function is for load the permission for the default controller path
    * @return array
    */
    public function loadDefaultPermissions()
    {
        $permissions = array();

        if($this->defaultPermissions === null)
        {
            if(Config::get('permissions.groups'))
            {
                $permissionGroups = Config::get('permissions.groups');

                $permissions = $this->extractPermissions($permissionGroups);
            }

            $this->defaultPermissions = $permissions;
            unset($permissions);
        }

        return $this->defaultPermissions;
    }

    /**
     * This function is for load the permission for a single module
     * @param string $module
     * @return mixed
     */
    public function loadSingleModulePermissions($module)
    {
        if(!isset($this->modulePermissions[$module]))
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

            $permissionGroups = $this->extractPermissions($permissionGroups);

            $this->modulePermissions[$module] = $permissionGroups;
            unset($permissionGroups);
        }

        return $this->modulePermissions[$module];;
    }

    /**
     * Extract permissions for the required format
     * @param array $permissionGroups
     * @return array
     */
    public function extractPermissions($permissionGroups)
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
     * @return array
     */
    public function getAdminPermissions()
    {
        if($this->adminPermissions === null)
        {
            //get admin's permission list from session
            $adminPermissions = request()->session()->get("permissions");

            if(!is_array($adminPermissions))
            {
                $adminPermissions = array();
            }

            $this->adminPermissions = $adminPermissions;
        }

        return $this->adminPermissions;
    }

    /**
     * Check permissions if this user has access to a selected area
     * @param boolean $module module name
     * @param string $urlPath URL path
     * @return boolean
     */
    public function checkHavePermission($module, $urlPath)
    {
        //get required permission list
        if(!empty($module))
        {
            //load this module's permissions
            $requiredPermissions = $this->loadSingleModulePermissions($module);
        }
        else
        {
            //load default permissions
            $requiredPermissions = $this->loadDefaultPermissions();
        }

        //get admin's permission list
        $adminPermissions = request()->session()->get("permissions");

        //trim leading and trailing slashes;
        $del = "/";
        $urlPath = trim($urlPath, $del);

        //check if this url path has been set in required permissions list
        if(in_array($urlPath, $requiredPermissions))
        {
            //check if this permission has been set in user's permission
            if(in_array($urlPath, $adminPermissions))
            {
                $have_permission=true;
            }
            else
            {
                //this user has no permission to perform this operation
                $have_permission=false;
            }
        }
        else
        {
            //it doesn't need permission to perform this operation
            $have_permission=true;
        }

        return $have_permission;
    }

    /**
     * Check permissions if this user to the passed url
     * @param string $uri - Path this user need to access
     * @return boolean
     */
    public function haveUrlPermission($uri="")
    {
        $defaultAdmin = request()->session()->get("default_admin");

        if($defaultAdmin)
        {
            return true;
        }
        else
        {
            $module = $this->getModuleFromUri($uri);

            return $this->checkHavePermission($module, $uri);
        }
    }

    /**
     * Check permissions if this user have permission to current route
     * @return bool
     */
    public function haveCurrentUrlPermission()
    {
        $defaultAdmin = request()->session()->get("default_admin");

        if($defaultAdmin)
        {
            return true;
        }
        else
        {
            $uri = request()->getPathInfo();
            $uri = $this->getRouteUri($uri);

            $module = $this->getModuleFromUri($uri);

            return $this->checkHavePermission($module, $uri);
        }
    }

    /**
     * Get correct route URI which matched with the system routes
     * @param string $uri
     * @return string
     */
    public function getRouteUri($uri)
    {
        //extract URL
        $route = collect(\Route::getRoutes())->first(function($route) use($uri){

            $method = request()->method();
            return $route->matches(request()->create($uri, $method));
        });

        $uri = $route->uri;

        //check for url params
        $paramStart = strpos($uri, "{");
        if($paramStart)
        {
            //get rest of the URL without URL params
            $uri = substr($uri, 0, $paramStart);
        }

        return URL::to($uri);
    }

    /**
     * Get controller of the specific URI
     * @param string $uri
     * @return string|null
     */
    public function getControllerFromRoute($uri)
    {
        $route = collect(\Route::getRoutes())->first(function($route) use($uri){

            return $route->matches(request()->create($uri));
        });

        if($route)
        {
            $del = "@";
            $controller = $route->action["controller"];
            $controller = @explode($del, $controller);
            $controller = $controller[0];

            return $controller;
        }
        else
        {
            return null;
        }
    }

    /**
     * Get module name if current controller belongs to a module
     * @param string $url
     * @return string
     */
    public function getModuleFromUri($url)
    {
        $controller = $this->getControllerFromUri($url);

        $del = '\\';
        $controllerExp = @explode($del, $controller);

        $module = "";
        if($controllerExp[0] == "Modules")
        {
            $module = strtolower($controllerExp[1]);
        }

        return $module;
    }

    /**
     * Check if have permissions for set of URLs/URIs and then return formatted urls according to the permissions
     * @param array $urls
     * @return array
     */
    public function getPermissionValidated($urls)
    {
        if (is_array($urls) && count($urls)>0)
        {
            foreach ($urls as $key => $url)
            {
                if($this->haveUrlPermission($url))
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
