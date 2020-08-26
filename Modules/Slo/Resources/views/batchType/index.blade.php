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
            <td>{{$batchType->id}}</td>
            <td>{{$batchType->description}}</td>
            <td>

                <div class="btn btn-sm"><span class="fa fa-edit"></span><a
                        href="{{ route('batchType.edit',$batchType->id)}}"> Edit</a></div>
                <div class="btn btn-xs"><span class="fa fa-trash"></span><a
                        href="{{ route('batchType.delete',$batchType->id)}}"> Delete</a></div>
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
                { extend: 'copy', 'className': 'button' },
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

