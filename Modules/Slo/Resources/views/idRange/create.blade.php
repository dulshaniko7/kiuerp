@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action="{{ route('idRange.store')}}" id="create_form">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0d1a26;">
                    <div class="row">
                        <div class="col-sm-6">

                            <h4 class="header-title">Add New ID Range</h4>

                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="course_id">Select Course</label>
                        <select class="form-control " name="course_id" id="course_id" required data-dependent="start">
                            <option>Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="description">Description</label>

                                <textarea name="description" value="" class="form-control" id="description" placeholder="Description" required="required" rows="2">
                                </textarea>

                            <!-- <div class="col-sm-4"><input type="number" name="" value="" class="form-control" id="" placeholder="Total" ></div>               -->
                        </div>

                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="number" name="start" value="" class="form-control" id="start" placeholder="Start Number" required="required"></div>
                            <div class="col-sm-4"><input type="number" name="end" value="" class="form-control" id="end" placeholder="End Number" required="required"></div>
                            <!-- <div class="col-sm-4"><input type="number" name="" value="" class="form-control" id="" placeholder="Total" ></div>               -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <hr class="mt-1 mb-2">

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-row">Save</button>
                            <button class="btn btn-dark" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
</form>

<script src="{{ asset('js/com/idRange.js')}}"></script>

@endsection



