@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Attendance</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Attendance</a></li>
                <li class="active">All</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Attendance<a href="{{route('take.attendance')}}" class="btn btn-xs btn-info pull-right">Add New</a></h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sl=1;
                        ?>
                        @foreach($all_at as $row)

                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$row->edit_date}}</td>
                                <td>
                                    <a href="{{URL::to('edit/attendance/'.$row->edit_date)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('view-attendance/'.$row->edit_date)}}" class="btn btn-sm btn-success">View</a>
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
