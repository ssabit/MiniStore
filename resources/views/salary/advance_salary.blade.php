@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Salary</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Salary</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Advanced Salary<a href="{{route('all.advancesalary')}}" class="btn btn-xs btn-info pull-right">All Advance Salary</a></h3></div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    <form action="{{route('store.advancesalary')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="type">Employee Name</label>
                            @php
                                $emp=DB::table('employees')->get();
                            @endphp
                            <select name="emp_id" id="" class="form-control">

                                <option disabled="" selected=""></option>
                                @foreach($emp as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="month">Month</label>
                            <select name="month"  class="form-control" >
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" placeholder="Enter Year" name="year"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="advanced">Advanced Salary</label>
                            <input type="text" class="form-control" placeholder="Enter Salary" name="advanced_salary"
                                   required>
                        </div>


                        <button type="submit" class="btn btn-success">Submit
                        </button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>
@endsection
