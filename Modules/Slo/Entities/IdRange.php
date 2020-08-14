<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Academic\Entities\Course;

class IdRange extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $primaryKey = "id";
    public function course(){
        return $this->belongsTo(Course::class,'course_id','course_id');
    }
}
