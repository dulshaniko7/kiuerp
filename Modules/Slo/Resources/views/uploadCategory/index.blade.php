@extends('slo::layouts.master')
@section('content')

<div class="card-body">
    <table id="data-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Code</th>
            <th>Upload Category Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
        <tr>

            <td>{{$cat->cat_code}}</td>
            <td>{{$cat->category_name}}</td>

            <td>
                <div class="btn btn-xs"><span class="fa fa-edit"></span><a
                        href="{{route('uploadCategory.edit',$cat->upload_cat_id)}}"> Edit</a></div>

            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>

<a class="btn btn-primary mt-5" href="{{ route('uploadCategory.create')}}" role="button">Add New Upload Category</a>
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


