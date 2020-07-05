@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Order</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Order</a></li>
                <li class="active">Success</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="panel-title">All Success Order </h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Payment</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($success as $row)

                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->order_date}}</td>
                                <td>{{$row->total_products}}</td>
                                <td>{{$row->total}}</td>
                                <td>{{$row->payment_status}}</td>
                                <td><span class="badge -id-badge">{{$row->order_status}}</span></td>
                                <td>
                                    <a href="{{URL::to('view-order-status/'.$row->id)}}"  class="btn btn-sm btn-primary">View</a>

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
