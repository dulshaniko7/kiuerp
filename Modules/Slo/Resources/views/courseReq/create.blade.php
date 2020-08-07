@extends('slo::layouts.master')
@section('content')


<form class="form-label-left input_mask" method="post" action={{route('batch.store')}}>
    @csrf


    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course_id">Select Course</label>
                                @include('slo::partials.Course.dropdown')
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Education">Education Qualification</label>
                                <button type="button" id="add_edu">+</button>
                                <table class="table table-bordered">
                                    <thead id="one">


                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="professional">professional Qualification</label>
                                <button type="button" id="add_pro">+</button>
                                <table class="table table-bordered">
                                    <thead id="two">

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="working">Working Qualification</label>
                                <button type="button" id="add_work">+</button>
                                <table class="table table-bordered">
                                    <thead id="three">

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="batch_name">References Qualification</label>
                                <button type="button" id="add_ref">+</button>
                                <table class="table table-bordered">
                                    <thead id="four">

                                </table>

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
<script type="text/javascript">
    $(document).ready(function () {
        $('#add_edu').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="q[]" class="form-control"></td>';
            html += '<td><input type="text" name="res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1"></span>delete</div></td>';
            html += '</tr></tbody>';
            $('#one').append(html);
        });

        $('#add_pro').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="q[]" class="form-control"></td>';
            html += '<td><input type="text" name="res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1"></span>delete</div></td>';
            html += '</tr></tbody>';
            $('#two').append(html);
        });

        $('#add_work').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="q[]" class="form-control"></td>';
            html += '<td><input type="text" name="res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1"></span>delete</div></td>';
            html += '</tr></tbody>';
            $('#three').append(html);
        });

        $('#add_ref').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="q[]" class="form-control"></td>';
            html += '<td><input type="text" name="res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1"></span>delete</div></td>';
            html += '</tr></tbody>';
            $('#four').append(html);
        });

        $('#remove1').on('click', function () {
            $(this).closest('tr').remove()
        })
    });


</script>

@endsection
