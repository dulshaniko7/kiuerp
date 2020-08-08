@extends('slo::layouts.master')
@section('content')
<div class="card-body">

    <div class="form-group">
        <label for="course_id">Select Course</label>
        <select class="form-control " name="course_id" id="course_id">
            <option>Select Course</option>
            @foreach($courses as $course)
            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
            @endforeach
        </select>

    </div>



<div class="card">
    <div class="card-body">
        <a href="{{ route('courseReq.create', $course->course_id) }}">Add</a>

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


