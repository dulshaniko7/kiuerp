<?php
namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\URL;

class AdminRepository extends BaseRepository
{
    public function generatePermissionHash($permissionAction)
    {
        return md5($permissionAction);
    }

    public function display_admin_role_as()
    {
        $url = URL::to("/admin/admin_role/");
        return view("admin::admin.datatable.admin_role_ui", compact('url'));
    }
}
