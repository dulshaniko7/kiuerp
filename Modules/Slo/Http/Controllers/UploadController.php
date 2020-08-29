<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Slo\Entities\Student;
use Modules\Slo\Entities\StudentUpload;
use Modules\Slo\Entities\UploadCategory;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('slo::upload.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        return view('slo::upload.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $student = Student::find($id);
        $std_id = $student->student_id;
        $std_name = $student->name_initials;
        $doc_name = $request->file;
        $cat = $request->upload_cat_id;
        $fff = $request->file_size;

        $cat_object = UploadCategory::find($cat);
        $cat_name = $cat_object->category_name;
        //dd($std_name);
        //$folder_name = $std_id+'.'+$std_name;
        //dd($folder_name);
        // $folder_name =
        $n = strval($std_name);

        $c = strval($cat_name);

        if ($request->hasFile('file')) {
            // $request->file('file');
            $filename = $request->file->getClientOriginalName();
            $alis = $fff . ' ' . $filename;

            // Storage::putFile('public/' . $n . '/' . $c, $request->file('file'));
            // Storage::putFile('public/' . $n . '/' . $c, $filename);
            $request->file->storeAs('public/' . $n . '/' . $c, $alis);

            $file = new StudentUpload();
            $file->file = $filename;
            $file->student = $std_id;
            $file->category = $request->upload_cat_id;
            $file->save();
            return redirect()->route('upload.index');

        } else {
            return 'no selected';
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
}
