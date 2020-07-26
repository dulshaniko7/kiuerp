<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPermissionModule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "admin_perm_system_id", "module_name", "module_status", "remarks", "created_by", "updated_by", "deleted_by"
    ];
}
