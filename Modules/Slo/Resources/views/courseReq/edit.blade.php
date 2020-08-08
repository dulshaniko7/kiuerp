@extends('slo::layouts.master')
@section('content')

    <h1> {{$courseR->course->course_name}} Requirements</h1>
<hr>
    <h4>Educational Requirements</h4>
    @foreach($requirements as $r)

    @if(empty($r->edu_req))

    @else

    <ul>
        @foreach($r->edu_req as $er)
        <li>{{$er}}</li>
        @endforeach
    </ul>
    @endif
    @endforeach

<h4>professional Requirements</h4>

@foreach($requirements as $r)

@if(empty($r->pro_req))

@else
@foreach($r->pro_req as $pr)
<ul>
    <li>{{$pr}}</li>

</ul>
@endforeach
@endif
@endforeach

<h4>Working Experience  Requirements</h4>

@foreach($requirements as $r)

@if(empty($r->work_req))


@else

<ul>
    @foreach($r->work_req as $wr)
    <li>{{$wr}}</li>
    @endforeach
</ul>
@endif
@endforeach

<h4>References  Requirements</h4>

@foreach($requirements as $r)

@if(empty($r->ref_req))

@else

<ul>
    @foreach($r->ref_req as $rr)
    <li>{{$rr}}</li>
    @endforeach
</ul>
@endif
@endforeach


<form class="form-label-left input_mask" method="post" action={{route('courseReq.update',$courseR->id)}}>
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" value="{{ $courseR->course->course_id }}" name="course_id">


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


                                @foreach($requirements as $r)
                                @if(empty($r->edu_req))
                                @else
                                    @foreach($r->edu_req as $er)
                                   <tr>
                                   <td><input type="text" name="e_req[]" class="form-control" value="{{$er}}"></td>
                                   <td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">Delete</span></div></td>

                                   </tr>
                                       @endforeach
                                       @endif
                                @endforeach
                                   </>
                               </table>

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
            html += '<td><input type="text" name="p_res[]" class="form-control"></td>';
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
            html += '<td><input type="text" name="w_res[]" class="form-control"></td>';
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
            html += '<td><input type="text" name="r_res[]" class="form-control"></td>';
            html += '<td><div class="btn btn-xs"><span class="fa fa-trash" id="remove1">delete</span></div></td>';
            html += '</tr></tbody>';
            $('#four').append(html);
        });

        $(document).on('click','#remove1', function () {
            $(this).closest('tr').remove();

        })
    });


</script>





@endsection

