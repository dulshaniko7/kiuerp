<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SloHalls extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    protected $primaryKey = 'slo_halls_id';
}
