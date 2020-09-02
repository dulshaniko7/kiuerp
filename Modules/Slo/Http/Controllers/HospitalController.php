<?php

namespace Modules\Slo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Slo\Entities\GenHospital;
use RealRashid\SweetAlert\Facades\Alert;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('slo::hospital.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slo::hospital.create');
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
                'hospital_name' => 'required'
            ]);
        if ($validate->fails()) {
            alert::warning('Error', 'Required Fields not filled');
            return view('slo::error');
        }
        $hospital = new GenHospital();
        $hospital->hospital_name = $request->hospital_name;
        if($hospital->save()){
            Alert::success('Success', 'Hospital Saved');
            return redirect()->route('hospital.index');
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
