@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Expense</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Expense</a></li>
                <li class="active">Monthly</li>
            </ol>
        </div>
    </div>

    @php
        $month=date("F", time() + 86400);
        $total=DB::table('expenses')->where('month',$month)->sum('amount');
    @endphp

    <div>
        <a href="{{route('january.expense')}}" class="btn btn-sm btn-info">January</a>
        <a href="{{route('february.expense')}}" class="btn btn-sm btn-info">February</a>
        <a href="{{route('march.expense')}}" class="btn btn-sm btn-info">March</a>
        <a href="{{route('april.expense')}}" class="btn btn-sm btn-info">April</a>
        <a href="{{route('may.expense')}}" class="btn btn-sm btn-info">May</a>
        <a href="{{route('june.expense')}}" class="btn btn-sm btn-info">June</a>
        <a href="{{route('july.expense')}}" class="btn btn-sm btn-info">July</a>
        <a href="{{route('august.expense')}}" class="btn btn-sm btn-info">August</a>
        <a href="{{route('september.expense')}}" class="btn btn-sm btn-info">September</a>
        <a href="{{route('october.expense')}}" class="btn btn-sm btn-info">October</a>
        <a href="{{route('novembar.expense')}}" class="btn btn-sm btn-info">Novembar</a>
        <a href="{{route('december.expense')}}" class="btn btn-sm btn-info">December</a>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <h4 style="color: black; font-size: 40px; text-align: center;">Total: {{  $total}}</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="panel-title">Monthly Expense<a href="{{route('add.expense')}}" class="btn btn-xs btn-info pull-right">Add New</a></h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table  id="example1"  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($monthExpense as $row)

                                    <tr>
                                        <td>{{$row->details}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->amount}}</td>
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
