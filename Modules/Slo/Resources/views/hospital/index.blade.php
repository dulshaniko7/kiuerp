@extends('slo::layouts.master')
@section('content')

<div class="card">
    <div class="card-header  text-white" style="background-color: #0d1a26;">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="header-title">Hospital List</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a href="{{ route('hospital.create')}}">
                        <div class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Add New</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Hospital Id</th>
                <th>Hospital Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hospitals as $h)
            <tr>
                <td>{{$h->gen_hospital_id}}</td>
                <td>{{$h->hospital_name}}</td>
                <td>
                <div class="btn btn-sm"><span class="fa fa-edit"></span><a
                        href=""> Edit</a></div>
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
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

