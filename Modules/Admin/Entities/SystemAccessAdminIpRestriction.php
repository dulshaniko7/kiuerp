<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Observers\AdminActivityObserver;

class SystemAccessAdminIpRestriction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "admin_id", "ip_location", "ip_address", "ip_address_key", "remarks", "created_by", "updated_by", "deleted_by"
    ];

    protected $with = [];

    public static function boot()
    {
        parent::boot();

        //Use this code block to track activities regarding this model
        //Use this code block in every model you need to record
        //This will record created_by, updated_by, deleted_by admins to, if you have set those fields in your model
        self::observe(AdminActivityObserver::class);
    }
}
