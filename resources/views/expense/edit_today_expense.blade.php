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

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add Expense<a href="{{route('today.expense')}}" class="btn btn-xs btn-info pull-right">Today Expense</a> <a href="" class="btn btn-xs btn-info pull-right"> This Month</a></h3>

                </div>
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
                    <form action="{{url('/update-expense/'.$tdy->id)}} " method="post">
                        @csrf
                        <div class="form-group">
                            <label for="details">Expense Details</label>
                            <textarea class="form-control"   name="details" id="" cols="30" rows="10">{{$tdy->details}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Amount</label>
                            <input type="text" class="form-control" value="{{$tdy->amount}}" name="amount" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="month" value="{{date("F")}}">
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="date" value="{{date("d/m/Y", time() + 86400)}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="year" value="{{date("Y")}}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>

@endsection
