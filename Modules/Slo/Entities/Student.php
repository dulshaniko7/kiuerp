<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Academic\Entities\Course;

class Student extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $primaryKey = 'student_id';

    public function StdRegisters()
    {
        return $this->hasMany(StdRegister::class, 'student_id', 'student_id');
    }

    public function stdExperiences()
    {
        return $this->hasMany(StdExperience::class, 'student_id', 'student_id');
    }

    public function stdExtraDetails()
    {
        return $this->hasMany(StdExtraDetail::class, 'student_id', 'student_id');
    }

    public function nursings()
    {
        return $this->hasMany(StdNursing::class, 'student_id', 'student_id');
    }

    public function stdQualifications()
    {
        return $this->hasMany(StdQualification::class, 'student_id', 'student_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class,'course_student','student_id','course_id',);
    }

}
