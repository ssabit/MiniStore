@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Customer</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Customer</a></li>
                <li class="active">List</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="panel-title">All Customer <a href="{{route('add.customer')}}" class="btn btn-xs btn-info pull-right">Add New</a></h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $row)

                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->address}}</td>
                                <td><img src="{{URL::to($row->photo)}}" style="height: 80px;width:80px;"></td>
                                <td>{{$row->city}}</td>
                                <td>
                                    <a href="{{URL::to('view-customer/'.$row->id)}}"  class="btn btn-sm btn-primary">View</a>
                                    <a href="{{URL::to('edit-customer/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('delete-customer/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

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
