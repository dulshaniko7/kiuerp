@extends('slo::layouts.master')
@section('content')


<form action="{{ route('upload.store',$student->student_id)}}" class="form-label-left input_mask" enctype="multipart/form-data" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="header-title">{{$student->name_initials}}'s Document Uploads</h4>
                            <input type="hidden" name="student_id" value="{{$student->student_id}}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="category">Upload Category</label>
                                <select class="form-control " name="upload_cat_id">
                                    @foreach ($categories as $c)
                                    <option value="{{$c->upload_cat_id}}">{{$c->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="document">Upload Document Name</label>
                                <input class="form-control " type="text" name="file_size">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="document">Upload Document</label>
                                <input class="form-control" type="file" name="file">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-row">Upload</button>
                            <button class="btn btn-dark" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
</div>


@endsection
