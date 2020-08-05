<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StdExtraDetail extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $primaryKey = 'std_extra_detail_id';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

}
