<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\IdRange;

class IdRangeComposer
{
public function compose(View $view){
 $view->with('idRanges',IdRange::all());
}
}
