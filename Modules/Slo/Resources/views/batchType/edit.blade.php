@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action="{{route('batchType.update',$batchType->id)}}"
      id="create_form">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">

                            <h4 class="header-title">Edit Batch Type</h4>

                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch_type">Batch Type Name</label>
                                <input type="text" class="form-control" name="batch_type" id="batch_type"
                                       placeholder="Batch Type Name" value="{{$batchType->batch_type}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" >{{$batchType->description}}</textarea>

                                <!-- <input type="text" class="form-control" name="max_student" id="max_student"  placeholder="Max Student" value=""> -->
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
    </div>
</form>

@endsection

