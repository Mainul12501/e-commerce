@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="com-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Edit Brand</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('update-brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}" required/>
                                <input type="hidden" class="form-control" name="brand_id" value="{{ $brand->id }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Description</label>
                            <div class="col-md-9">
                                <textarea name="brand_description" id="" class="form-control" cols="30" rows="5">{{ $brand->brand_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Image</label>
                            <div class="col-md-9">
                                <img src="{{ asset($brand->brand_image) }}" alt="brand-image" height="100" width="100"/>
                                <input type="file" class="form-control-file" name="brand_image"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <input type="radio" name="publication_status" value="1" {{ $brand->publication_status == 1 ? 'checked' : '' }}/>Published
                                <input type="radio" name="publication_status" value="0" {{ $brand->publication_status == 0 ? 'checked' : '' }}/>Unpublished
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Brand"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
