@extends('slo::layouts.master')
@section('content')

        <div class="card">
            <div class="card-header  text-white" style="background-color: #0d1a26;">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">KIU Batches</h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right">
                        <a href="{{ route('batch.create')}}">
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
                        <div class="btn btn-xs"><span class="fa fa-edit"></span><a
                                href="{{ route('batch.edit',$batch->batch_id)}}"> Edit</a></div>
                        <div class="btn btn-xs"><span class="fa fa-trash"></span><a
                                href="{{ route('batch.delete',$batch->batch_id)}}"> Delete</a></div>
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
                {extend: 'copy', 'text': 'Copy', 'className': 'button'},
                {extend: 'csv', className: 'button '},
                {extend: 'excel', className: 'button '},
                {extend: 'pdf', className: 'button'},
                {extend: 'print', className: 'button'}

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
