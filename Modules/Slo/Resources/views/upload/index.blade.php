@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>

            <th>Student Code</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Uploads</th>
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

                <div class="btn btn-sm"><span class="fa fa-edit"></span><a
                        href="{{route('upload.create',$s->student_id)}}"> Upload</a></div>

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
            responsive: true,
            "columnDefs": [{
                "targets": 2,
                "orderable": false
            }]
        });
    });
</script>


@endsection
