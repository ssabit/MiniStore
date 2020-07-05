@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Attendance</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Attendance</a></li>
                <li class="active">Take</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="panel-title">Take Attendance<a href="{{route('all.attendance')}}" class="btn btn-sm btn-info pull-right">All Attendance</a></h3>
                </div>
                <div class="box-body">
                    <h3 class="text-success" align="center">{{date("d/m/Y")}}</h3>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table {{--id="datatable"--}} class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Attendance</th>

                                </tr>
                                </thead>

                                <tbody>
                                <form action="{{route('insert.attendance')}}" method="post">
                                    @csrf
                                    @foreach($employee as $row)

                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td><img src="{{URL::to($row->photo)}}" style="height: 80px;width:80px;"></td>
                                            <input type="hidden" name="user_id[]" value="{{$row->id}}">
                                            <td>
                                                <input type="radio" name="attendance[{{$row->id}}]" value="Present" required> Present
                                                <input type="radio" name="attendance[{{$row->id}}]" value="Absent"> Absent
                                            </td>
                                            <input type="hidden" name="att_date" value="{{date("d/m/Y")}}">
                                            <input type="hidden" name="att_year" value="{{date("Y")}}">
                                            <input type="hidden" name="month" value="{{date("F")}}">
                                        </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-success">Take Attendance</button>
                                </form>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
