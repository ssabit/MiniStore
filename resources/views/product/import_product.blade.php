@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Product</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Product</a></li>
                <li class="active">Import</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Products Import<a href="{{route('export')}}" class="btn btn-xs btn-info pull-right">Download XLSX</a></h3></div>

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
                    <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="cat_name">Xlsx File Import</label>
                            <input type="file" class="form-control"  name="import_file"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-purple waves-effect waves-light">Upload
                        </button>
                    </form>
                </div><!-- panel-body -->
                <div class="container">
                    <strong class="text-danger">Please download the xlsx file and clear it | Now you add your all products information and import it </strong>
                </div>
            </div> <!-- panel -->

        </div> <!-- col-->
    </div>

@endsection
