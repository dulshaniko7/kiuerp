<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StdExperience extends Model
{
    protected $guarded =[];

    use SoftDeletes;

    protected $primaryKey = 'std_experience_id';

    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }
}
