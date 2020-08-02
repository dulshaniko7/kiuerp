<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Observers\AdminActivityObserver;

class AdminPermissionHistory extends Model
{
    protected $fillable = ["admin_id", "admin_perm_system_id", "remarks", "invoked_permissions", "revoked_permissions", "created_by"];

    protected $with = [];

    const UPDATED_AT = null;

    protected $casts = [
        'invoked_permissions' => 'revoked_permissions',
    ];

    public static function boot()
    {
        parent::boot();

        //Use this code block to track activities regarding this model
        //Use this code block in every model you need to record
        //This will record created_by, updated_by, deleted_by admins to, if you have set those fields in your model
        self::observe(AdminActivityObserver::class);
    }
}
