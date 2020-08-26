<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\BatchType;

class BatchTypeComposer
{
 public function compose(View $view){
     $view->with('batchTypes',BatchType::orderBy('batch_type')->get());
 }
}
