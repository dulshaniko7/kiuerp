<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;

use Modules\Slo\Entities\Country1;

class CountryComposer
{
 public  function compose(View $view){
     $view->with('countries', Country1::orderBy('name'));
 }
}
