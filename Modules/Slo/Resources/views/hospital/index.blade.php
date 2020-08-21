@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Hospital Id</th>
            <th>Hospital Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hospitals as $h)
        <tr>
            <td>{{$h->gen_hospital_id}}</td>
            <td>{{$h->hospital_name}}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>

    <a class="btn btn-primary mt-5" href="{{ route('hospital.create',)}}" role="button">Add New Hospital</a>
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

