<?php

namespace Modules\Academic\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Slo\Entities\IdRange;

class Course extends Model
{
    protected $fillable = [];

    protected $primaryKey = 'course_id';

    public function idRange()
    {
        return $this->hasMany(IdRange::class);
    }
}
