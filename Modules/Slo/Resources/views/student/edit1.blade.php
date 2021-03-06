@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" action="{{route('register.update',$student->student_id)}}" id="add_form"
      method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
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
                    <input type="hidden" id="isNurse" value="">


                    <div id="nurse">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="batch_name">Hospital:</label>
                                    @include('slo::partials.Hospital.dropdown')
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" class="form-control myDropdown" name="ward"  placeholder="Ward">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" class="form-control myDropdown" name="nts"  placeholder="NTS">
                                </div>
                            </div>
                        </div>
                    </div>

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




                    <div id="newHtml"></div>

                    <h2 class="mb-4 mt-4 text-secondary">Contact Section<span
                            class="fas fa-plus ml-4"
                            id="con"></span></h2>

                    <div id="newHtmlContact"></div>

                    <h2 class="mb-4 mt-4 text-secondary">Emergency Contact Section<span
                            class="fas fa-plus ml-4"
                            id="emg"></span></h2>

                    <div id="newHtmlEmg"></div>

                    <h2 class="mb-4 mt-4 text-secondary">Special Requirements Section<span
                            class="fas fa-plus ml-4"
                            id="spe"></span></h2>

                    <div id="newHtmlSpe"></div>

                    <hr class="mt-1 mb-2">

                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-row">Save</button>
                            <button class="btn btn-dark" type="reset">Reset</button>
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
<script src="{{ asset('js/com/student_req5.js')}}"></script>
@endsection

