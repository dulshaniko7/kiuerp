<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminSystemPermission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "admin_perm_group_id", "permission_title", "permission_action", "permission_key", "permission_status", "disabled_reason", "created_by", "updated_by", "deleted_by"
    ];
}
