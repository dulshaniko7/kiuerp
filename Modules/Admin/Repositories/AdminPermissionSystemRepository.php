<?php
namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Modules\Admin\Entities\AdminPermissionSystem;

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
    public static function getSystemId($system)
    {
        $model = new AdminPermissionSystem();
        $permissionSystem = $model::query()->where("system_slug", '=', $system);

        if($permissionSystem)
        {
            $primaryKey = $model->getKeyName();
            return $permissionSystem->$primaryKey;
        }

        return false;
    }
}
