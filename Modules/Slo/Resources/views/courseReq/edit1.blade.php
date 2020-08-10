@extends('slo::layouts.master')
@section('content')
<div class="card">
    <div class="card-body">


        <div class="card">
            <div class="card-body">
                <h3>Current Requirements for {{ $courseReq->course->course_name}}</h3>
            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <form class="form-label-left input_mask" method="post" action={{route('courseReq.update',$courseReq->
                    course_id)}}>
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <input type="hidden" value="{{$courseReq->course_id}}" name="course_id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Education">Education Qualification</label>
                                                <button type="button" id="add_edu">+</button>
                                                <table class="table table-bordered">
                                                    @if(empty($courseReq->edu_req))
                                                    @else
                                                    @foreach($courseReq->edu_req as $r)
                                                    <tr>
                                                        <td><input type="text" name="e_req[]" value="{{$r}}"
                                                                   class="form-control"></td>
                                                        <td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
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
                                                    @if(empty($courseReq->pro_req))
                                                    @else
                                                    @foreach($courseReq->pro_req as $r)
                                                    <tr>
                                                        <td><input type="text" name="p_req[]" value="{{$r}}"
                                                                   class="form-control"></td>
                                                        <td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

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
                                                    @if(empty($courseReq->pro_req))
                                                    @else
                                                    @foreach($courseReq->work_req as $r)
                                                    <tr>
                                                        <td><input type="text" name="w_req[]" value="{{$r}}"
                                                                   class="form-control"></td>
                                                        <td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

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
                                                    @if(empty($courseReq->ref_req))
                                                    @else
                                                    @foreach($courseReq->wref_req as $r)
                                                    <tr>
                                                        <td><input type="text" name="w_req[]" value="{{$r}}"
                                                                   class="form-control"></td>
                                                        <td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

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
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add_edu').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="e_req[]" class="form-control"></td>';
            //html += '<td><input type="text" name="e_res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>';
            html += '</tr></tbody>';
            $('#one').append(html);
        });

        $('#add_pro').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="p_req[]" class="form-control"></td>';
            //html += '<td><input type="text" name="p_res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>';
            html += '</tr></tbody>';
            $('#two').append(html);
        });

        $('#add_work').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name=w_req[]" class="form-control"></td>';
            //html += '<td><input type="text" name="w_res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>';
            html += '</tr></tbody>';
            $('#three').append(html);
        });

        $('#add_ref').on('click', function () {

            var html = '';
            html += ' <tr><th>Qualification</th>';

            html += '<th>Results</th>';
            html += ' <th>Action</th></tr>';

            html += '</thead><tbody><tr>';
            html += ' <td><input type="text" name="r_req[]" class="form-control"></td>';
            //html += '<td><input type="text" name="r_res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>';
            html += '</tr></tbody>';
            $('#four').append(html);
        });

        $(document).on('click', '#remove1', function () {
            $(this).closest('tr').remove();

        })
    });


</script>


<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            responsive: true,
            "columnDefs": [{
                "targets": 2,
                "orderable": false
            }]
        });
    });
</script>
<script src="{{ asset('js/com/requirement.js')}}"></script>
@endsection



