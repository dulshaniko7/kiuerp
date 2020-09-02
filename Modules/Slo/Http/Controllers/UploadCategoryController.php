<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Slo\Entities\UploadCategory;
use RealRashid\SweetAlert\Facades\Alert;

class UploadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('slo::uploadCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::uploadCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $cat = new UploadCategory();
        $cat->category_name = $request->category_name;
        $cat->cat_code = $request->cat_code;
        $cat->description = $request->description;

        //$batch->batch_code = $this->repository->generateBatchCode();

        if ($cat->save()) {
            Alert::success('Success', 'Upload Category Saved');
            return redirect()->route('uploadCategory.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('slo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cat = UploadCategory::find($id);
        return view('slo::uploadCategory.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $cat = UploadCategory::find($id);
        $cat->category_name = $request->category_name;
        $cat->description = $request->description;
        $cat->update($request->all());
        Alert::success('Success', 'Upload Category Edited');
        return redirect()->route('uploadCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
