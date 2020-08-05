<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $primaryKey = 'student_id';

    public function StdRegisters()
    {
        return $this->hasMany(StdRegister::class,'student_id','student_id');
    }

    public function stdExperiences(){
        return $this->hasMany(StdExperience::class);
    }

    public function stdExtraDetails(){
        return $this->hasMany(StdExtraDetail::class,'student_id','student_id');
    }

}
