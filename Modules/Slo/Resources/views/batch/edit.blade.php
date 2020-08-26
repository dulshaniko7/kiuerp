@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" action="{{route('batch.update',$batch->batch_id)}}" id="create_form" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="course_id">Select Course</label>
                    <select class="form-control " name="course_id" id="course_id" required disabled>
                      @foreach ($courses as $course)
                        <option value="{{$course->course_id}}" {{ $course->course_id == $course->course_id ? 'selected':''}}>{{ $course->course_name }}</option>
                       @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="batch_type">Batch Type</label>
                    <select class="form-control " name="batch_type" id="batch_type" required>
                      @foreach($batchTypes as $batchType)
                        <option value="{{$batchType->id}}" {{ $batchType->id == $batchType->id ? 'selected':''}}>{{ $batchType->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="batch_name">Batch Name</label>
                    <input type="text" class="form-control" name="batch_name" id="batch_name" placeholder="Batch Name" value="{{$batch->batch_name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="max_student">Max Student</label>
                    <input type="text" class="form-control" name="max_student" id="max_student"  placeholder="Max Student" value="{{$batch->max_student}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="batch_start_date">Batch Start Date</label>
                    <input type="date" class="form-control" name="batch_start_date" id="batch_start_date" value="{{$batch->batch_start_date}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="batch_end_date">Batch End Date</label>
                    <input type="date" class="form-control" name="batch_end_date" id="batch_end_date" value="{{$batch->batch_end_date}}">
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
</form>

@endsection

