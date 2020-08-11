<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\Student;

class StudentComposer
{
    public function compose(View $view)
    {
        $view->with('students', Student::orderBy('student_id')->get());
    }
}
