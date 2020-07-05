@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Expense</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Expense</a></li>
                <li class="active">Yearly</li>
            </ol>
        </div>
    </div>

    @php
        $year=date("Y");
        $total=DB::table('expenses')->where('year',$year)->sum('amount');
    @endphp

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <h4 style="color: black; font-size: 40px; text-align: center;">Total: {{  $total}}</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="panel-title text-danger">{{date("Y")}} All  Expense</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table  id="example1"  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($yearExpense as $row)
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
