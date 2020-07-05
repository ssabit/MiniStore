@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Expense</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Expense</a></li>
                <li class="active">Today</li>
            </ol>
        </div>
    </div>

    @php
        $date=date("d/m/Y", time() + 86400);
    $expense=DB::table('expenses')->where('date',$date)->sum('amount');

    @endphp

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <h4 style="color: black; font-size: 40px; text-align: center;">Total: {{$expense}}</h4>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Today Expense<a href="{{route('add.expense')}}" class="btn btn-xs btn-info pull-right">Add New</a></h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($today as $row)

                                    <tr>
                                        <td>{{$row->details}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>
                                            <a href="{{URL::to('edit-today-expense/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
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
        </div>
    </div>

@endsection
