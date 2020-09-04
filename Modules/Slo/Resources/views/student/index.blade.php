@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped myTable">
        <thead class="thead-dark">
        <tr>
            <th>Student Admission Number</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $s)
        <tr>
            <td>{{$s->gen_id}}</td>

            <td>{{$s->name_initials}}</td>

            @foreach($s->courses as $course)
            <td>{{$course->course_name}}</td>
            @endforeach


            @foreach($s->batches as $batch)
            <td>{{$batch->batch_name}}</td>
            @endforeach

            <td>
                <div class="btn btn-outline-dark"><span class="fa fa-address-card"><a
                            href="{{ route('register.edit',$s->student_id)}}"> Edit</a></span></div>
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
@endsection

