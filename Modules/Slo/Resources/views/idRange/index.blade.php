@extends('slo::layouts.master')
@section('content')

<div class="card-body">

    <div class="form-group">
        <label for="course_id">Select Course</label>
        <select class="form-control " name="course_id" id="course_id" required data-dependent="start">
            <option>Select Course</option>
            @foreach($courses as $course)
            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
            @endforeach
        </select>

    </div>



    <table id="data-table" class="table table-bordered table-striped" >
        <thead class="thead-dark">
        <tr>
            <th>Course</th>
            <th>Start Number</th>
            <th>End Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($idRanges as $idRange)
        <tr>
            <td>{{$idRange->course->course_name}}</td>
            <td>{{$idRange->start}}</td>
            <td>{{$idRange->end}}</td>
            <td>

                <div class="btn btn-xs"><span class="fa fa-trash"></span><a href="{{ route('idRange.delete',$idRange->id)}}"> Delete</a></div>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>


<script>


    $(document).ready(function () {
        $('#data-table').DataTable({
            dom: 'lBfrtip',

            buttons: [
                { extend: 'copy','text':'Copy', 'className': 'button' },
                { extend: 'csv', className: 'button ' },
                { extend: 'excel', className: 'button ' },
                { extend: 'pdf', className: 'button' },
                { extend: 'print', className: 'button' }

            ],
            "oLanguage": {
                "sLengthMenu": "Show _MENU_", // **dont remove _MENU_ keyword**
            },

            "responsive": true,
            "paging": true,
            "searching": true,
            "ordering": true,

            "columnDefs": [{
                "targets": 2,

                "orderTable": false
            }],



        });


    });
</script>
<script src="{{ asset('js/com/idRange1.js')}}"></script>
@endsection

