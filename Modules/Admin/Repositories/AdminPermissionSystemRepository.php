<?php
namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\URL;

class AdminPermissionSystemRepository extends BaseRepository
{
    public function display_modules_as()
    {
        $moduleUrl = URL::to("/admin/admin_permission_module/");
        return view("admin::admin_perm_system.datatable.modules_ui", compact('moduleUrl'));
    }
}
