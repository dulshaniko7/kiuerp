@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Batch Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($batchTypes as $batchType)
        <tr>
            <td>1</td>
            <td>{{$batchType->description}}</td>
            <td><a href="{{ route('batchType.edit',$batchType->id)}}">
                    <div class="btn btn-sm"><span class="fa fa-edit"></span> Edit</div>
                </a></td>
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

