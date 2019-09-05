@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="com-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Add Product</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" id="categoryId" class="form-control">
                                    <option value=""> -- Select Category Name -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" id="brandId" class="form-control">
                                    <option value=""> -- Select Brand Name -- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" name="product_name" class="form-control" id="productName" onblur="setProductCode()"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Code</label>
                            <div class="col-md-9">
                                <input type="text" name="product_code" class="form-control" id="productCode" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Discount Price</label>
                            <div class="col-md-9">
                                <input type="text" name="product_discount_price" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Orginal Price</label>
                            <div class="col-md-9">
                                <input type="text" name="product_orginal_price" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Short Description</label>
                            <div class="col-md-9">
                                <textarea name="product_short_description" id="" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Long Description</label>
                            <div class="col-md-9">
                                <textarea name="product_long_description" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file" name="product_image"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3">Product Sub-image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file" name="file[]" multiple/>
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
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Product"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
