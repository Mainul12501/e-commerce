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
                    <table class="table">
                        <tr>
                            <td>Category Id</td>
                            <td>{{ $product->category_id }}</td>
                        </tr>
                        <tr>
                            <td>Category Name</td>
                            <td>{{ $product->category->category_name }}</td>
                        </tr>
                        <tr>
                            <td>Brand Id</td>
                            <td>{{ $product->brand_id }}</td>
                        </tr>
                        <tr>
                            <td>Brand Name</td>
                            <td>{{ $product->brand->brand_name }}</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <td>Product Code</td>
                            <td>{{ $product->product_code }}</td>
                        </tr>
                        <tr>
                            <td>Product Discount Price</td>
                            <td>{{ $product->product_discount_price }}</td>
                        </tr>
                        <tr>
                            <td>Product Original Price</td>
                            <td>{{ $product->product_orginal_price }}</td>
                        </tr>
                        <tr>
                            <td>Product Short Description</td>
                            <td>{{ $product->product_short_description }}</td>
                        </tr>
                        <tr>
                            <td>Product Long Description</td>
                            <td>{{ $product->product_long_description }}</td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                            <td>
                                <img src="{{ asset($product->product_image) }}" alt="product-image" height="100" width="100"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Sub-image</td>
                            <td>
                                <?php
                                    $productSubImage = \App\ProductSubImage::where('product_id', $product->id )->get();

                                ?>
                                @foreach($productSubImage as $item)
                                    <img src="{{ asset($item->sub_image) }}" alt="sub-image" height="100" width="100">
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Publication Status</td>
                            <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
