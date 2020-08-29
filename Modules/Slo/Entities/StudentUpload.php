<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentUpload extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $primaryKey = 'std_upload_id';
}
