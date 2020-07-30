<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Academic\Entities\Course;

class CourseComposer
{
 public function compose(View $view){
     $view->with('courses',Course::all());
 }
}
