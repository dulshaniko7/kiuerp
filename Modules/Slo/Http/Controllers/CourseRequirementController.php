<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Academic\Entities\Course;
use Modules\Slo\Entities\CourseRequirement;

class CourseRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('slo::courseReq.index1');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::courseReq.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $requirement = new CourseRequirement();
        $requirement->edu_req = $request->e_req;
        $requirement->pro_req = $request->p_req;
        $requirement->work_req = $request->w_req;
        $requirement->ref_req = $request->r_req;
        $requirement->course_id = $request->course_id;

        if($requirement->save()){
            return redirect()->route('courseReq.index');
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
        $courseReq = CourseRequirement::findOrFail($id);
        //dd($courseReq);
        return view('slo::courseReq.edit1')->with('courseReq',$courseReq);
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
    public function search($id)
    {
        $course = Course::findOrFail($id);

        $course_name = $course->course_name;


        return response()->json(['course_name' => $course_name]);


    }
}
