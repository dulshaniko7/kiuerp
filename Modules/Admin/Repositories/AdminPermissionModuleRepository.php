<?php
namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;

class AdminPermissionModuleRepository extends BaseRepository
{
    public function display_permission_system_as()
    {
        return view("admin::admin_perm_module.datatable.permission_system_ui");
    }
}
