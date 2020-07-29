<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Slo</title>

    {{-- Laravel Mix - CSS File --}}
    {{--
    <link rel="stylesheet" href="{{ mix('css/slo.css') }}">
    --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/slo.js') }}"></script>
@yield('content')
<h1>Hi</h1>
{{-- Laravel Mix - JS File --}}
{{--
<script src="{{ mix('js/slo.js') }}"></script>
--}}

<script>
    console.log('hi');
</script>
</body>
</html> -->


@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action={{route('batch.store')}}>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="header-title">Add New Batch</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course_id">Select Course</label>
                                <select class="form-control " name="course_id" id="course_id" required>
                                    <option value="">Select Course</option>
                                    <option value="1">Course 1</option>
                                    <option value="2">Course 2</option>
                                    <option value="3">Course 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_type">Batch Type</label>
                                <select class="form-control " name="batch_type" id="batch_type" required>
                                    <option>Select Batch Type</option>
                                    <option value="1">Reguler</option>
                                    <option value="2">Loan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_name">Batch Name</label>
                                <input type="text" class="form-control" name="batch_name" id="batch_name"
                                       placeholder="Batch Name" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_student">Max Student</label>
                                <input type="text" class="form-control" name="max_student" id="max_student"
                                       placeholder="Max Student" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_start_date">Batch Start Date</label>
                                <input type="date" class="form-control" name="batch_start_date" id="batch_start_date"
                                       value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_end_date">Batch End Date</label>
                                <input type="date" class="form-control" name="batch_end_date" id="batch_end_date"
                                       value="">
                            </div>
                        </div>


                    </div>
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

</form>

@endsection
