<?php
namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Modules\Admin\Entities\AdminPermissionModule;
use Modules\Admin\Entities\AdminPermissionSystem;
use Modules\Admin\Entities\AdminSystemPermission;

class AdminPermissionSystemRepository extends BaseRepository
{
    /**
     * Return column UI for the datatable of the model
     * @return Factory|View
     */
    public function display_modules_as()
    {
        $moduleUrl = URL::to("/admin/admin_permission_module/");
        return view("admin::admin_perm_system.datatable.modules_ui", compact('moduleUrl'));
    }

    /**
     * Get admin permission system id using system slug
     * @param string $system
     * @return bool|int
     */
    public function getSystemId($system)
    {
        $model = new AdminPermissionSystem();
        $permissionSystem = $model::query()->where("system_slug", '=', $system)->first();

        if($permissionSystem)
        {
            $primaryKey = $model->getKeyName();
            return $permissionSystem->$primaryKey;
        }

        return false;
    }

    /**
     * @param $system
     * @return array
     */
    public function getSystemPermissionHashes($system)
    {
        $permissionSystem = AdminPermissionSystem::with(["permissionModules"])->where("system_slug", '=', $system)->first();

        $permissions = [];
        if($permissionSystem)
        {
            //get module ids list
            $moduleIds = [];
            $permissionModules = $permissionSystem["permissionModules"];

            $moduleModel = new AdminPermissionModule();
            $modulePriKey = $moduleModel->getKeyName();

            if(is_array($permissionModules) && count($permissionModules)>0)
            {
                foreach ($permissionModules as $module)
                {
                    $moduleIds[]=$module[$modulePriKey];
                }
            }

            //get groups ids list of above module ids list
            $groupModel = new AdminPermissionModule();
            $groupPriKey = $groupModel->getKeyName();

            $groupIds = [];
            $permissionGroups = $groupModel::select($groupPriKey)->whereIn("admin_perm_module_id", $moduleIds)->get();

            if(is_array($permissionGroups) && count($permissionGroups)>0)
            {
                foreach ($permissionGroups as $group)
                {
                    $groupIds[]=$group[$groupPriKey];
                }
            }

            //get permissions of above group ids list
            $permModel = new AdminSystemPermission();

            $systemPerms = $permModel::select("permission_key")->whereIn("admin_perm_group_id", $groupIds)->get();
            if(is_array($systemPerms) && count($systemPerms)>0)
            {
                foreach ($systemPerms as $systemPerm)
                {
                    $permissions[]=$systemPerm["permission_key"];
                }
            }
        }

        return $permissions;
    }

    /**
     * @param $system
     */
    public function importPermissions($system)
    {

    }
}
