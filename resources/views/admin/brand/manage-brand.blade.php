@extends('admin.master')

@section('title')

@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Brand
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sl N0.</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i =1)
                        @foreach($brands as $brand)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->brand_description }}</td>
                                <td>
                                    <img src="{{ asset($brand->brand_image) }}" alt="category-image" height="100" width="100"/>
                                </td>
                                <td>{{ $brand->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{ route('edit-brand', ['id' => $brand->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('/brand/delete-brand/'.$brand->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are You sure to delete this brand !!')"><i class="fa fa-trash"></i></a>
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
