<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenHospital extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    protected $primaryKey = 'gen_hospital_id';

    public function nursings(){
        return $this->hasMany(StdNursing::class,'hospital_id','hospital_id');
    }
}
