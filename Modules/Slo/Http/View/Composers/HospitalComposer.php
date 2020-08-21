<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\GenHospital;

class HospitalComposer
{
    public function compose(View $view)
    {
        $view->with('hospitals', GenHospital::orderBy('gen_hospital_id')->get());
    }
}
