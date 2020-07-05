@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Category</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Category</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">All Category<a href="{{route('all.category')}}" class="btn btn-xs btn-info pull-right">All Category</a></h3></div>

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
                    <form action="{{route('store.category')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="cat_name">Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="cat_name"
                                   required>
                        </div>


                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit
                        </button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>
@endsection
