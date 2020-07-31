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
        <tr>
            <td>Nursing</td>
            <td>1000</td>
            <td>1500</td>
            <td><a href="/slo/idRange/edit"><div class="btn btn-sm"><span class="fa fa-edit"></span> Edit</div></a></td>
        </tr>

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

