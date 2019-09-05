@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="com-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Add Brand</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('new-brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="brand_name" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Description</label>
                            <div class="col-md-9">
                                <textarea name="brand_description" id="" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file" name="brand_image"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <input type="radio" name="publication_status" value="1"/>Published
                                <input type="radio" name="publication_status" value="0"/>Unpublished
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Add Brand"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
