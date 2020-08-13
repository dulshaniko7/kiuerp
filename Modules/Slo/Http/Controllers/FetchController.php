<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Department;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\Student;

class FetchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    public function getCourse($id)
    {
        $courses = Course::where('dept_id', $id)->pluck('course_name','course_id');

        return json_encode($courses);
    }

    public function getBatch($id)
    {
        $batches = Batch::where('course_id', $id)->pluck('batch_name', 'batch_code', 'batch_id','course_id');

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

    public function getStdId(){

        $student = Student::orderBy('student_id','desc')->first()->pluck('student_id');
        return json_encode($student);
    }

}
