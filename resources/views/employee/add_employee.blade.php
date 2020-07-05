@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Employee</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Employee</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>


    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
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
                    <form action="{{route('store.employee')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  placeholder="Enter Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  placeholder="Enter Email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control"  placeholder="Enter Phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" class="form-control"  placeholder="Enter Experience" name="experience" required>
                        </div>
                        <div class="form-group">
                            <label for="nid">NID No</label>
                            <input type="text" class="form-control"  placeholder="Enter NID no." name="nid_no" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control"  placeholder="Enter Salary" name="salary" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Vacation</label>
                            <input type="text" class="form-control"  placeholder="Enter Vacation" name="vacation" required>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" placeholder="Enter City" name="city" required>
                        </div>
                        <div class="form-group">
                            <img id="image" src="#" alt="">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" required onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>

@endsection
