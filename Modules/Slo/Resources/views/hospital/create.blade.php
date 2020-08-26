@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action={{route('hospital.store')}}>
    @csrf


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form_container">
                        <div class="form-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="batch_name">Hospital Name</label>
                                        <input type="text" class="form-control" name="hospital_name" id="hospital_name"
                                               placeholder="Hospital Name">
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-1 mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-add-row">Save</button>
                                        <button class="btn btn-dark" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form-right bg-warning">
                                <div class="sub-title-mini text-center">
                                    Hospital Add
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</form>

@endsection

