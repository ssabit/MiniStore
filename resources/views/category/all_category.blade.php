@extends('layouts.app')
@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Category</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Category</a></li>
                <li class="active">List</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="panel-title">All Category<a href="{{route('add.category')}}" class="btn btn-sm btn-info pull-right">Add New</a></h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $row)

                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->cat_name}}</td>
                                <td>
                                    <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('delete/category/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

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
