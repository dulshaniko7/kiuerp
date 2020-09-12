@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action="{{route('batchType.store')}}" id="create_form">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0d1a26;">
                    <div class="row">
                        <div class="col-sm-6">

                            <h4 class="header-title">Add New Batch Type</h4>

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
                                <label for="batch_type">Batch Type Code</label>
                                <input type="text" class="form-control" name="batch_type" id="batch_type"
                                       placeholder="00" pattern="[0-9]{2}" title="two number code">
                                <input type="hidden" value="{{ $new_type ?? '' }}" name="new_id" id="new_id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" required onkeyup="this.value = this.value.toUpperCase();"></textarea>
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


<script>
    new_id = document.querySelector('#new_id');
    batch_type = document.querySelector('#batch_type');
    //alert('type id ' + batch_type.value);
    int_Val = parseInt(new_id.value);
    //alert(int_Val);
    if (int_Val < 10) {
        batch_type.value = '0' + int_Val;
    }
</script>
@endsection
