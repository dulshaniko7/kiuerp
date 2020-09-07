<?php


namespace Modules\Slo\Http\View\Composers;


use App\Country;
use Illuminate\View\View;



class CountryComposer
{
 public  function compose(View $view){
     $view->with('countries',Country::orderBy('country_name')->get());
 }
}
