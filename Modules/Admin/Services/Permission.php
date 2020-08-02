<?php

namespace Modules\Admin\Entities;

use Nwidart\Modules\Facades\Module;

class Permission
{
    /**
     * Get all the permission handling system labels
     * @return array
     */
    public function getPermSystemLabels()
    {
        $systems = $this->getPermSystems();

        return array_keys($systems);
    }

    /**
     * Get all the permission handling systems
     * @return array
     */
    public function getPermSystems()
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
    public function loadSingleSystemPermissions($system)
    {
        $filePath = Module::getModulePath("admin")."Config/permissions/".$system.".php";

        $permissions = array();
        if(file_exists($filePath))
        {
            $permissionsArray=include($filePath);

            if(isset($permissionsArray["groups"]))
            {
                $permissions = $permissionsArray["groups"];
            }
        }

        return $permissions;
    }

    /**
     * Load the permissions of all systems
     * @return array
     */
    public function getAllSystemPermissions()
    {
        $systems = $this->getPermSystems();
        $systemPermissions = array();

        if(is_array($systems) && count($systems)>0)
        {
            foreach ($systems as $system => $label)
            {
                $systemPermission = array();
                $systemPermission["name"] = $system;
                $systemPermission["label"] = $label;
                $systemPermission["groups"] = $this->loadSingleSystemPermissions($system);

                $systemPermissions[]=$systemPermission;
            }
        }

        return $systemPermissions;
    }

    /**
     * Get submitted form data of permissions for all system permissions
     * @return array
     */
    public function getPermissionFormData()
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
}
