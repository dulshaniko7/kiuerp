@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
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
            <td>{{$idRange->course->course_id}}</td>
            <td>{{$idRange->start}}</td>
            <td>{{$idRange->end}}</td>
            <td>
                <div class="btn btn-xs"><span class="fa fa-edit"></span><a href="{{ route('idRange.edit',$idRange->id)}}"> Edit</a></div>
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

