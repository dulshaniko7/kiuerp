<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Academic\Entities\Course;

class CourseRequirement extends Model
{
    protected $guarded =[];

    use SoftDeletes;
    protected $primaryKey = "id";

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
