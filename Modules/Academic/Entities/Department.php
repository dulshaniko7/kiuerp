<?php

namespace Modules\Academic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ["faculty_id", "dept_code", "dept_name", "color_code", "dept_status", "created_by", "updated_by", "deleted_by"];

    protected $primaryKey = "dept_id";

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $appends = ["id", "name"];

    protected $with = [];

    public function getIdAttribute()
    {
        return $this->{$this->primaryKey};
    }

    public function getNameAttribute()
    {
        return $this->dept_name;
    }

    public function getFacultyAttribute()
    {
        return Faculty::find($this->faculty_id);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, "faculty_id", "faculty_id");
    }

    /*public static function boot()
    {
        parent::boot();

        // Set field values of created_by and updated_by with current admin id
        static::creating(function ($model) {
            $model->created_by = auth("admin")->user()->admin_id;
            $model->updated_by = auth("admin")->user()->admin_id;
        });

        // Update field updated_by with current admin id
        static::saving(function ($model) {
            $model->updated_by = auth("admin")->user()->admin_id;
        });

        static::deleting(function ($model) {
            if (!$model->isForceDeleting()) {
                $model->deleted_by = auth("admin")->user()->admin_id;
            }
        });
    }*/
}
