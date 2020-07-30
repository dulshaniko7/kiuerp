<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\BatchType;


class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    public function index()
    {
        return view('slo::batch.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // $types = BatchType::all();
        return view('slo::batch.create');
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
                'batch_name' => 'required',
                'max_student' => 'required|int',
                'batch_start_date' => 'required',
                'batch_end_date' => 'required',
                'course_id' => 'required',
                'batch_type' => 'required'
            ]);
        if ($validate->fails()) {
            return view('slo::error');
        }

        $batch = new Batch();
        $batch->batch_name = $request->batch_name;
        $batch->max_student = $request->max_student;
        $batch->batch_start_date = $request->batch_start_date;
        $batch->batch_end_date = $request->batch_end_date;
        $batch->batch_type = $request->batch_type;
        $batch->course_id = $request->course_id;

        //$batch->batch_code = $this->repository->generateBatchCode();
        $batch->batch_code = $batch->generateBatchCode();
        if ($batch->save()) {
            return redirect()->route('batch.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $batch = Batch::findOrFail();

        return view('slo::batch.show');

        // return view('slo::batch.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //$batch = Batch::findOrFail($id);


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
