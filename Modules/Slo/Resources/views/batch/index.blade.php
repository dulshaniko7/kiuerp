@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Batch Code</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($batches as $batch)
        <tr>
            <td>{{$batch->batch_code}}</td>
            <td>{{$batch->course->course_name}}</td>
            <td>{{$batch->batch_name}}</td>
            <td>
                <div class="btn btn-xs"><span class="fa fa-edit"></span> Edit</div>
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
            "responsive": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "columnDefs": [{
                "targets": 2,
                "orderTable": false
            }]
        });
    });
</script>
@endsection
