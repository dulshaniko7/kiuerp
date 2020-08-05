<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StdNursing extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    protected $primaryKey = 'std_nursing_id';

    public function hospital()
    {
        return $this->belongsTo(GenHospital::class, 'hospital_id', 'hospital_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
