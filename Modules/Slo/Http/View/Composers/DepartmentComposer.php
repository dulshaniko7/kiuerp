<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Academic\Entities\Department;

class DepartmentComposer
{
    public function compose(View $view)
    {
        $view->with('departments', Department::orderBy('dept_id')->get());
    }
}
