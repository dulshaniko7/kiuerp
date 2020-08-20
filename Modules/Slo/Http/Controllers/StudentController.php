<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Department;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\StdRegister;
use Modules\Slo\Entities\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $students = Student::with('courses')->get();

        return view('slo::student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::student.create');
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

                'std_title' => 'required',
                'name_initials' => 'required',
                'gender' => 'required',
                'tel_mobile1' => 'required',
                'nic_passport' => 'required',
                'full_name' => 'required',
                'course_id' => 'required',
                'batch_id' => 'required',
                'reg_date' => 'required'
            ]);
        if ($validate->fails()) {
            return view('slo::error');
        }
        $student = new Student();
        $stdReg = new StdRegister();
        //$student->gen_id = $request->gen_id;

        $student->std_title = $request->std_title;
        $student->name_initials = $request->name_initials;
        $student->gender = $request->gender;
        $student->tel_mobile1 = $request->tel_mobile1;
        $student->nic_passport = $request->nic_passport;
        $student->full_name = $request->full_name;

        $student->reg_date = $request->reg_date;
        $student->gen_id = $request->gen_id;
        $course_id = $request->course_id;
        $batch_id = $request->batch_id;

        $student->cgsid = $request->cgsid;
        $student->save();

        $stdReg->batch_id = $request->batch_id;
        $stdReg->student_id = $student->student_id;
        $stdReg->save();


        $course = Course::find($course_id);
        $student->courses()->attach($course);

        $batch = Batch::find($batch_id);
        $student->batches()->attach($batch);
        $request->flash();


        return redirect()->route('register.create')->withInput();


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
        $student = Student::find($id);
        return view('slo::student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

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

    public function getDeps($id)
    {
        $departments = Department::where('faculty_id', $id)->pluck('dept_name', 'dept_code', 'dept_id', 'faculty_id');
        return json_encode($departments);
    }

}
