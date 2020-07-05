@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Employee</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Employee</a></li>
                <li class="active">Update</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Employee Info</h3></div>
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
                    <form action="{{url('/update-employee/'.$edit->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name"  value="{{$edit->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  name="email" value="{{$edit->email}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control"   name="phone" value="{{$edit->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control"  name="address" value="{{$edit->address}}" required>
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" class="form-control" name="experience" value="{{$edit->experience}}" required>
                        </div>
                        <div class="form-group">
                            <label for="nid">NID No</label>
                            <input type="text" class="form-control"  name="nid_no" value="{{$edit->nid_no}}" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control"  name="salary" value="{{$edit->salary}}" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Vacation</label>
                            <input type="text" class="form-control"  name="vacation" value="{{$edit->vacation}}" required>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" name="city" value="{{$edit->city}}" required>
                        </div>
                        <div class="control-group">
                            <label for="old-img">  Old Photo</label>
                            <img src="{{URL::to($edit->photo)}}" style="height:80px; width:80px";  alt="">
                            <input type="hidden" name="old_photo" value="{{$edit->photo}}">
                        </div>


                        <div class="form-group">
                            <img id="image" src="#" alt="">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>

@endsection
