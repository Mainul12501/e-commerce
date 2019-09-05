@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Product
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sl N0.</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Product Discount Price</th>
                            <th>Product Orginal Price</th>
                            {{--<th>Product Image</th>--}}
                            {{--<th>Product Sub-image</th>--}}
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                {{--<td>{{ $product->brand->brand_name }}</td>--}}
                                <td>{{ $product->brand->brand_name }}</td>  {{--Relation with Brand not working now--}}
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_discount_price }}</td>
                                <td>{{ $product->product_orginal_price }}</td>
                                <td>{{ $product->publication_status ==1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{ route('view-product', ['id' => $product->id ]) }}" class="btn btn-success btn-xs"><i class="fa fa-street-view" data-toggle="tooltip" title="view Product Details"></i></a>
                                    <a href="{{ route('edit-product', ['id' => $product->id ]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit" data-toggle="tooltip" title="Edit Product"></i></a>
                                    <a href="{{ route('delete-product', ['id' => $product->id ]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash" data-toggle="tooltip" title="Delete Product" onclick="return confirm('Are you sure to delete this product !!')"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
