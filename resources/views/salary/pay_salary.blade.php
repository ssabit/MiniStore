@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Salary</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Salary</a></li>
                <li class="active">Pay</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pay Salary<span class="pull-right text-danger">{{date("F Y")}}</span></h3>


                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Salary</th>
                                    <th>Month</th>
                                    {{--  <th>Advanced</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($employee as $row)

                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td><img src="{{URL::to($row->photo)}}" style="height: 80px;width:80px;"></td>
                                        <td>{{$row->salary}}</td>
                                        <td><span class="badge badge-success">{{date("F",strtotime('-1 month'))}}</span></td>
                                        {{-- <td>{{$row->advanced_salary}}</td>--}}
                                        <td>
                                            <a href="{{URL::to('view-customer/'.$row->id)}}"  class="btn btn-sm btn-primary">Pay Now</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
