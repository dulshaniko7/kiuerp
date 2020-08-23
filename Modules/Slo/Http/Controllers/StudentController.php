<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Department;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\CourseRequirement;
use Modules\Slo\Entities\StdEmg;
use Modules\Slo\Entities\StdExtraDetail;
use Modules\Slo\Entities\StdNursing;
use Modules\Slo\Entities\StdQualification;
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
        //$course = $student->courses;
        //$reqs = CourseRequirement::where('course_id', $course->course_id)->orderBy('id')->get()->toArray();

        // $req = CourseRequirement::where('course_id',$course->course_id)->get();
        //dd($req);
        return view('slo::student.edit', compact('student'));
    }

    public function edit1($id)
    {
        $student = Student::find($id);
        //$course = $student->courses;
        //$reqs = CourseRequirement::where('course_id', $course->course_id)->orderBy('id')->get()->toArray();

        // $req = CourseRequirement::where('course_id',$course->course_id)->get();
        //dd($req);
        return view('slo::student.edit1', compact('student'));
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
        $student->date_of_birth = $request->date_of_birth;
        $student->nationality = $request->nationality;
        $student->per_address = $request->per_address;
        $student->per_city = $request->per_city;
        $student->per_country = $request->per_country;
        $student->per_postal_code = $request->per_postal_code;

        $student->tel_residence = $request->tel_residence;
        $student->tel_work = $request->tel_work;
        $student->tel_mobile2 = $request->tel_mobile2;

        $student->email1 = $request->email1;
        $student->email2 = $request->email2;
        $student->kiu_mail = $request->kiu_mail;


        $student->update($request->only('date_of_birth', 'nationality', 'per_address', 'per_city', 'per_country', 'per_postal_code', 'tel_residence', 'tel_work', 'tel_mobile2', 'email1', 'email2', 'kiu_mail'));

        // get the course
        //  $course_id = $request->course_id;
        //$course = Course::find($course_id);
        //$reqs = CourseRequirement::where('course_id', $course_id)->get()->pluck('edu_req');
        // dd(count($reqs[0]));
        //$eduCount = count($reqs[0]);
        // dd($eduCount);
        $emg = new StdEmg();
        $emg->emg_name = $request->emg_name;
        $emg->address = $request->address;
        $emg->emg_tel_residence = $request->emg_tel_residence;
        $emg->emg_tel_work = $request->emg_tel_work;
        $emg->emg_tel_mobile1 = $request->emg_tel_mobile1;
        $emg->emg_tel_mobile2 = $request->emg_tel_mobile2;
        $emg->relationship = $request->relationship;
        $emg->student_id = $student->student_id;
        $emg->save();

        $extra = new StdExtraDetail();
        $extra->special_req = $request->special_req;
        $extra->preferred_hand = $request->preferred_hand;
        $extra->hostel = $request->hostel;
        $extra->locker_key = $request->locker_key;
        $extra->slipper_size = $request->slipper_size;
        $extra->student_id = $student->student_id;
        $extra->save();

        $nurse = new StdNursing();
        $nurse->ward = $request->ward;
        $nurse->nts = $request->nts;
        $nurse->student_id = $student->student_id;
        $nurse->hospital_id = $request->hospital_id;
        $nurse->save();
        return redirect()->route('index');
        /*
                $qualification = new StdQualification();
                $qualification->year = $request->year;
                $qualification->school = $request->school;
                $qualification->qualification = $request->qualification;
                $qualification->results = $request->results;
                $qualification->student_id = $student->student_id;
                $qualification->save();

                return redirect()->route('index');
        */

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
