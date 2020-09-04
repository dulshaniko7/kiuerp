<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\Batch;

class BatchComposer
{
    public function compose(View $view){
        $view->with('batches',Batch::orderBy('batch_name')->get());
    }
}



