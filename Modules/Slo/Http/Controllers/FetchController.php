<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Department;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\CourseRequirement;
use Modules\Slo\Entities\CourseStudent;
use Modules\Slo\Entities\IdRange;
use Modules\Slo\Entities\StdQualification;
use Modules\Slo\Entities\Student;
use function MongoDB\BSON\toJSON;

class FetchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    public function getCourse($id)
    {
        $courses = Course::where('dept_id', $id)->pluck('course_name', 'course_id');

        return json_encode($courses);
    }

    public function getBatch($id)
    {
        $batches = Batch::where('course_id', $id)->pluck('batch_name', 'batch_code', 'batch_id', 'course_id');

        return json_encode($batches);
    }

    public function getBatchType($id)
    {
        $batch_type = Batch::findOrFail($id);


        return json_encode($batch_type);
    }

    public function getDep($id)
    {
        $department = Department::findOrFail($id);


        return json_encode($department);
    }

    public function getStdId()
    {

        $student = Student::orderBy('student_id', 'desc')->first();
        $new_id = $student->student_id;
        $new_id++;
        return json_encode($new_id);


    }

    public function getIdRange($id)
    {
        // $course = Course::findOrFail($id);


        // dd($idRangeObject->get()->pluck('start'));

        // $course = Course::findOrFail($id);
        //  $course_id = $course->course_id;
        $course = Course::where('course_id', $id)->orderBy('course_id', 'desc')->first();
        $idRangeObject = IdRange::where('course_id', $id)->orderBy('id')->latest();
        //  dd($course->students()->get()->toArray()->pluck('student_id'));
        // dd($idRangeObject->course_id);
        $need_course_start = $idRangeObject->get()->pluck('start');
        $need_course_end = $idRangeObject->get()->pluck('end');
        dd($need_course_end);
        //  $last = $need_course->students()->get()->pluck('student_id');
        //  $last_id = $course->students()->get()->pluck('student_id');

        return $need_course_start;
        //return $last_id;
    }

    public function getCgsid($id)
    {
        $course = Course::findOrFail($id);
        $course_id = $course->course_id;
        //dd($course_id);

        // $r = $course->idRange()->get();

        //start id
        // $idRangeStart = IdRange::where('course_id', $id)->orderBy('id')->latest()->get()->pluck('start');
        //return $idRangeStart;

        $idRangeCourse = IdRange::where('course_id', $id)->orderBy('id')->latest()->get()->toArray();
        //dd($idRangeCourse[0]['id']);
        return ($idRangeCourse[0]['id']);
    }


    public function courseStudentCount($id)
    {
        $course = Course::find($id);
        $students = $course->students()->orderBy('student_id')->get();
        $student_count = $students->count();
        return $student_count;

    }

    public function courseGroup($id)
    {
        $course = Course::find($id);
        $idRange = IdRange::where('course_id', $course->course_id)->orderBy('id')->latest()->get()->pluck('start');
        return $idRange;

        //return $student_count;

    }

    public function incrementId($id)
    {
        $genId = $id;
        $genId++;

    }

    public function repeatId()
    {
        $lastId = Student::where('student_id', '>', 1)->orderBy('student_id', 'desc')->first();

        //  dd($lastId->gen_id);


        // dd($last);
        return $lastId->gen_id;
    }

    public function repeatGenId()
    {
        $lastId = Student::where('student_id', '>', 1)->orderBy('student_id', 'desc')->first();

        //  dd($lastId->gen_id);


        // dd($last);
        return $lastId->cgsid;
    }

    public function getCourseRequirements($id)
    {
        $course = Course::find($id);
        $reqs = CourseRequirement::where('course_id', $course->course_id)->orderBy('id')->get()->toArray();

        return $reqs;
    }

    public function isNursing($id)
    {
        $course = Course::find($id);

        $name = $course->course_name;


        // dd($course->course_id);
        // Course::where('course_name', 'like', '%' . 'nursing' . '%')->get();
        //dd($name);
        return $name;
    }

    public function addQualification(Request $request)
    {


        $qualification = new StdQualification();
        $qualification->year = $request->year;
        $qualification->school = $request->school;
        $qualification->qualification = $request->qualification;
        $qualification->results = $request->results;
        $qualification->student_id = $request->input('student_id');

        $qualification->save();

    }
}



