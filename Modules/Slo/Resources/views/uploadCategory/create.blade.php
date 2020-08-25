@extends('slo::layouts.master')
@section('content')

<form class="form-label-left input_mask" method="post" action={{route('uploadCategory.store')}}>
    @csrf


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="header-title">Add Upload Category</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control myDropdown" name="category_name"
                                       placeholder="Category Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_code">Category Code</label>
                                <input type="text" class="form-control myDropdown" name="cat_code"
                                       placeholder="Category Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control myDropdown" name="description" rows="3"
                                          placeholder="Description" ></textarea>
                            </div>
                        </div>

                    </div>

                    <hr class="mt-1 mb-2">

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-row">Save</button>
                            <button class="btn btn-dark" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
