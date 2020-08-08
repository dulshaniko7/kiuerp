<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\CourseRequirement;

class CourseReqComposer
{
    public function compose(View $view){
        $view->with('requirements',CourseRequirement::orderBy('id')->get());

    }

}
