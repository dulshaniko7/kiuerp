<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPermissionSystem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "system_name", "system_slug", "system_status", "remarks", "created_by", "updated_by", "deleted_by"
    ];
}
