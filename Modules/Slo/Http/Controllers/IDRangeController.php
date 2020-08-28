<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Academic\Entities\Course;
use Modules\Slo\Entities\IdRange;


class IDRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('slo::idRange.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::idRange.create');
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
                'description' => 'required',
                'start' => 'required|int',
                'end' => 'required|int',
                'course_id' => 'required',
            ]);
        if ($validate->fails()) {
            return view('slo::error');
        }

        $IdRange = new IdRange();
        $IdRange->description = $request->description;
        $IdRange->course_id = $request->course_id;
        $IdRange->start = $request->start;
        $IdRange->end = $request->end;
        //$batch->batch_code = $this->repository->generateBatchCode();

        if ($IdRange->save()) {
            return redirect()->route('idRange.create');
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
        return view('slo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $idRange = IdRange::findOrFail($id);
        $idRange->delete();
        return redirect()->route('idRange.index');
    }

    public function start($id)
    {
/*
        $course = Course::findOrFail($id);

        $end = IdRange::orderBy('id')
            ->where('course_id', $course->course_id)
            ->get()
            ->map(function ($idRange) {
                return [
                    'end' => $idRange->end
                ];
            });
        return response()->json(['end' => $end]);
  */

      $end = IdRange::orderBy('id','desc')
          ->get()
          ->map(function ($idRange){
              return[
                  'end' => $idRange->end
              ];
          });
        return response()->json(['end' => $end]);


    }

    public function search($id)
    {
        $course = Course::findOrFail($id);

        $course_name = $course->course_name;


        return response()->json(['course_name' => $course_name]);


    }


}
