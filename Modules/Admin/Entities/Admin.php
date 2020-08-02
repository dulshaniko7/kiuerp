<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Observers\AdminActivityObserver;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    //protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'lecturer_id', 'name', 'email', 'password', 'admin_role_id', 'status', 'default_admin', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Setting up this field as an empty array, otherwise it will retrieve ORM relations every time
     *
     * @var array
     */
    protected $with = [];

    protected $appends = ["id"];

    //protected $appends = ["id", "admin_image_url", "admin_role"];

    protected $primaryKey = "admin_id";

    private $admin_image_dir = "images/admin_images/";

    public function getIdAttribute()
    {
        return $this->{$this->primaryKey};
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function adminRole()
    {
        return $this->belongsTo(AdminRole::class, "admin_role_id", "admin_role_id");
    }

    /*public function getAdminImageUrlAttribute()
    {
        if($this->image != "")
        {
            return BaseModel::getFileUrl($this->image, $this->admin_image_dir);
        }
        else
        {
            return "";
        }
    }*/

    public static function boot()
    {
        parent::boot();

        //Use this code block to track activities regarding this model
        //Use this code block in every model you need to record
        //This will record created_by, updated_by, deleted_by admins to, if you have set those fields in your model
        self::observe(AdminActivityObserver::class);
    }
}
