<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Academic\Entities\Faculty;

class FacultyComposer
{
    public function compose(View $view)
    {
        $view->with('faculties', Faculty::orderBy('faculty_name')->get());
    }
}
