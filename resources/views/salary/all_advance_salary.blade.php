@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Salary</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Salary</a></li>
                <li class="active">List</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Advance Salary <a href="{{route('add.advancesalary')}}" class="btn btn-xs btn-info pull-right">Add New</a></h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Salary</th>
                            <th>Month</th>
                            <th>Advanced</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salary as $row)

                            <tr>
                                <td>{{$row->name}}</td>
                                <td><img src="{{URL::to($row->photo)}}" style="height: 80px;width:80px;"></td>
                                <td>{{$row->salary}}</td>
                                <td>{{$row->month}}</td>
                                <td>{{$row->advanced_salary}}</td>
                                <td>
                                    <a href="#"  class="btn btn-sm btn-primary">View</a>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" id="delete" class="btn btn-sm btn-danger">Delete</a>

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
