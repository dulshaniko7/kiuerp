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

    protected $casts = [
        'edu_req' => 'array',
        'pro_req' => 'array',
        'work_req' => 'array',
        'ref_req' => 'array'
    ];


    public function course(){
        return $this->belongsTo(Course::class,'course_id','course_id');
    }
}
