<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\Slo\Entities\BatchType;
use RealRashid\SweetAlert\Facades\Alert;

class BatchTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // return view('slo::batchType.index');
        $batchType = BatchType::withoutTrashed()->get();
        //return $batchType;
        return view("slo::batchType.index");
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::batchType.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
            [
                'batch_type' => 'required|unique:batch_types',
                'description' => 'required|unique:batch_types'
            ]);
        if ($validate->fails()) {
            Alert::warning('Error', 'Duplicate batch type code or description');
            return view('slo::batchType.create');
        }

        $batchType = new BatchType();

        $batchType->batch_type = $request->batch_type;
        $batchType->description = $request->description;
        if ($batchType->save()) {
            Alert::success('Success', 'Batch Type Saved ');

            return redirect()->route('batchType.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('slo::batchType.show');
        $batchType = BatchType::findOrFail($id);
        return $batchType;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $batchType = BatchType::findOrFail($id);
        return view('slo::batchType.edit')->with('batchType', $batchType);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $batchType = BatchType::findOrFail($id);
        $batchType->description = $request->description;
        $batchType->update($request->all());
//return redirect('/batchType');
        Alert::success('Success', 'Batch Type Edited');
        return redirect()->route('batchType.index');
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

    public function softDelete($id)
    {

        // $batches = Batch::withoutTrashed();
        $batchType = BatchType::findOrFail($id);
        $batchType->delete();
        Alert::warning('Deleted', 'Batch Type Deleted');
        return redirect()->route('batchType.index');
    }


}
