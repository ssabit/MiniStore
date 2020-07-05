@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Product</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Product</a></li>
                <li class="active">List</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="panel-title">All Products <a href="{{route('add.product')}}" class="btn btn-sm btn-info pull-right">Add New</a></h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Product Code</th>
                            <th>Selling Price</th>
                            <th>Image</th>
                            <th>Exp Date</th>
                            <th>Godaun</th>
                            <th>Route</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $row)

                            <tr>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->product_code}}</td>
                                <td>{{$row->selling_price}}</td>
                                <td><img src="{{URL::to($row->product_image)}}" style="height: 80px;width:80px;"></td>
                                <td>{{$row->exp_date}}</td>
                                <td>{{$row->product_garage}}</td>
                                <td>{{$row->product_route}}</td>
                                <td>
                                    <a href="{{URL::to('view-product/'.$row->id)}}"  class="btn btn-sm btn-primary">View</a>
                                    <a href="{{URL::to('edit-product/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('delete-product/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
