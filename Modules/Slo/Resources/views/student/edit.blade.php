@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" action="{{route('register.update',$student->student_id)}}" id="add_form"
      method="post">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="my_container">
                <div class="con-left">
                    <input type="file" name="image" id="image">

                    <div class="img" id="img">
                        <img src="" alt="" class="img-preview img-rounded" id="preview">

                    </div>
                </div>

                <div class="con-middle">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="batch_name">Student Name:</label>
                                <input type="text" class="form-control myDropdown" name="name_initials"
                                       id="name_initials"
                                       placeholder="Batch Name" value="{{$student->name_initials}}">
                                <input type="hidden" id="student_id" name="student_id" value="{{$student->student_id}}">
                            </div>
                        </div>
                    </div>
                    @foreach($student->courses as $course)
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="batch_name">Course:</label>
                                <input type="text" class="form-control myDropdown" name="name_initials"
                                       id="name_initials"
                                       placeholder="Course Name" value="{{$course->course_name}}">
                                <input type="hidden" id="course_id" name="course_id" value="{{$course->course_id}}">

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="nurseHtml"></div>

                    <div id="other">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth:</label>
                                    <input type="date" class="form-control myDropdown" name="date_of_birth"
                                           id="date_of_birth">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <select class="form-control myDropdown" name="nationality" id="nationality">
                                        <option value="SriLankan" selected>Srilankan</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="edu" value="">
                    <input type="hidden" id="pro" value="">
                    <input type="hidden" id="work" value="">
                    <input type="hidden" id="ref" value="">

                    <h2 class="mb-4 mt-4 text-secondary">Qualifications Section<span
                            class="fas fa-plus ml-4"
                            id="req"></span></h2>
                    <div id="req-section">
                        <div id="e1">

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Educational
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="e2">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Educational
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="e3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Educational
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="p1">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Professional
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="p2">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Professional
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="p3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Professional
                                            Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="w1">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Working Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w2">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Working Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">Working Qualifications:</label>
                                        <input type="text" name="year[]" class="form-control mb-2" placeholder="Year">
                                        <input type="text" name="school[]" class="form-control mb-2"
                                               placeholder="School">
                                        <input type="text" name="qualification[]" class="form-control mb-2"
                                               placeholder="Qualification Obtained">
                                        <input type="text" name="results[]" class="form-control mb-2"
                                               placeholder="Results">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="r1">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">References:</label>
                                        <textarea name="qualification[]" class="form-control mb-2" rows="5"
                                                  placeholder="Reference"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="r2">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">References:</label>
                                        <textarea name="qualification[]" class="form-control mb-2" rows="5"
                                                  placeholder="Reference"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="r3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"><label for="qualifications">References:</label>
                                        <textarea name="qualification[]" class="form-control mb-2" rows="5"
                                                  placeholder="Reference"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr class="mt-1 mb-2">

                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-row">Save</button>

                            <div class="btn btn-xs"><span class="fa fa-plus"></span><a
                                    href="{{ route('register.edit1',$student->student_id)}}"> Next Section </a></div>
                        </div>
                    </div>
                </div>


                <div class="con-right bg-warning">
                    <div class="sub-title text-center">
                        Student Update
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<script src="{{ asset('js/com/student_req2.js')}}"></script>
<script src="{{ asset('js/com/student_req3.js')}}"></script>
<script src="{{ asset('js/com/student_req4.js')}}"></script>
@endsection

