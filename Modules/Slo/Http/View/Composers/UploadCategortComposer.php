<?php


namespace Modules\Slo\Http\View\Composers;


use Illuminate\View\View;
use Modules\Slo\Entities\UploadCategory;

class UploadCategortComposer
{
    public function compose(View $view)
    {
        $view->with('categories', UploadCategory::orderBy('upload_cat_id')->get());
    }
}
