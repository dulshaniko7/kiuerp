<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StdQualification extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    protected $table = 'std_qualifications';
    protected $primaryKey = 'std_qualification_id';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }


}
