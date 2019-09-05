@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="com-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Edit Category</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('update-category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" required/>
                                <input type="hidden" class="form-control" value="{{ $category->id }}" name="category_id" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea name="category_description" id="" class="form-control" cols="30" rows="5">{{ $category->category_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Category Image</label>
                            <div class="col-md-9">
                                <img src="{{ asset($category->category_image) }}" alt="category-image" height="100" width="100"/>
                                <input type="file" class="form-control-file" name="category_image"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <input type="radio" name="publication_status" value="1" {{ $category->publication_status == 1 ? 'checked' : ''}}/>Published
                                <input type="radio" name="publication_status" value="0" {{ $category->publication_status == 0 ? 'checked' : ''}}/>Unpublished
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Category"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
