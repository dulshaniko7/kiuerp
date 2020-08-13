<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\Country;

class CountryComposer
{
 public  function compose(View $view){
     $view->with('countries', Country::orderBy('name')->get());
 }
}
