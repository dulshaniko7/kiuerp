<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPermissionGroup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "admin_perm_module_id", "group_name", "group_status", "remarks", "created_by", "updated_by", "deleted_by"
    ];
}
