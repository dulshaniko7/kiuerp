@extends('slo::layouts.master')
@section('content')
<h1>Student Registration</h1>


<div class="container-fluid">

    <form class="form-label-left input_mask" method="post" action="{{ route('register.store')}}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Course / Batch / Identity Selection</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-md-2 col-sm-2 ">Faculty</label>
                            <div class="col-md-10 col-sm-10 ">
                                @include('slo::partials.Faculty.dropdown')
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2 col-sm-2 ">Department </label>
                            <div class="col-md-10 col-sm-10 ">
                                @include('slo::partials.Department.dropdown')
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2 col-sm-2 ">Course</label>
                            <div class="col-md-10 col-sm-10 ">
                                @include('slo::partials.Course.dropdown')
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2 col-sm-2 ">Batch <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 ">
                                @include('slo::partials.Batch.dropdown')
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-4 ">Identity <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="country" value="nic" checked="checked" id="nic"> NIC
                                            </label>
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="country" value="passport" id="passport"> PASSPORT
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row" id="country">
                                    <label class="col-form-label col-md-3 col-sm-3">Country<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        @include('slo::partials.Country.dropdown')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-8 col-12">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fas fa-fw fa-user-graduate "></i></span>
                    <div class="info-box-content">
            <span class="info-box-number">
              <h4><span id="dep_code">00</span><span id="slqf_code">00</span> <span id="batch_type_code">00</span><span id="batch_code">000</span><span id="std_id"> 00001</span></h4>
            </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
              Available Registration Number
            </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Main Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span></div>
                                    <select class="form-control col-lg-12" required="required" name="std_title" id="std_title"
                                            style="width:144px">
                                        <option>Select Title</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Ms">Ms.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Rev">Rev.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" align="right">
                                <div id="genderContainer">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="male"> Male
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="female"> Female
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="other"> Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <textarea class="form-control" name="full_name" placeholder="Full Name"
                                              required="required" rows="1" cols="50"></textarea>
                                </div>
                                <div class=" input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                    </div>
                                    <input type="text" class="form-control nic-pass" id="nicpass" name="nic_passport"
                                           placeholder="NIC/Passport" pattern="[0-9]{9}[x|X|v|V]|[0-9]{12}"
                                           required="required">
                                </div>
                                <div class=" input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-dollar-sign"></i>&nbsp;&nbsp;</span>
                                    </div>
                                    <input type="text" class="form-control"  id="select-payment-plan" disabled
                                           >
                                </div>
                                <div class=" input-group md-3">
                                    <div class="input-group-prepend">
                                        \ <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Initial Starting Date"
                                           name="reg_date">
                                </div>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name_initials"
                                           placeholder="Name with Initials" required="required">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control mobile" name="tel_mobile1"
                                           placeholder="Mobile No eg:0711234567" pattern="[0]{1}[0-9]{9}"
                                           required="required">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="select-discounts" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i>&nbsp;</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control" required="required" name="grace_period[]" id="select" disabled>
                                        <option>Select Grace Period</option>
                                        <option value="0">Not Applicable</option>
                                        <option value="1">1 Months</option>
                                        <option value="2">3 Months</option>
                                        <option value="5">5 Months</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                </div>
                                <br>
                            </div>

                        </div>

                        <input type="hidden"  name="gen_id" id="gen_id">
                        <input type="text"  name="student_id" >

                        <div class="row">
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <button type="submit" class="btn btn-success btn-add-row">Save</button>
                                <button class="btn btn-dark" type="reset">Reset</button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-2 col-sm-2">
                                <button type="button" class="btn btn-dark">Reset All</button>
                                <!-- <button type="submit" name="submit" id="btnSubmit" class="btn btn-info">Submit</button> -->
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/com/student_req.js')}}"></script>
<script>





    $(function () {

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    });
</script>

@stop

