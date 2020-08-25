<?php

namespace Modules\Slo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadCategory extends Model
{
    protected $guarded =[];
    use SoftDeletes;
    protected $primaryKey = 'upload_cat_id';
}
