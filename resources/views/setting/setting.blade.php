@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Settings</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Settings</a></li>
                    <li class="active">Shop Information</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Store Info</h3></div>
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
                    <form action="{{url('/update-website/'.$setting->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Store Name</label>
                            <input type="text" class="form-control"  name="company_name"  value="{{$setting->company_name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Store Email</label>
                            <input type="email" class="form-control"  name="company_email" value="{{$setting->company_email}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Store Phone</label>
                            <input type="text" class="form-control"   name="company_phone" value="{{$setting->company_phone}}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Store Mobile</label>
                            <input type="text" class="form-control"  name="company_mobile" value="{{$setting->company_mobile}}" required>
                        </div>
                        <div class="form-group">
                            <label for="experience">Store Address</label>
                            <input type="text" class="form-control" name="company_address" value="{{$setting->company_address}}" required>
                        </div>
                        <div class="form-group">
                            <label for="nid">Store City</label>
                            <input type="text" class="form-control"  name="company_city" value="{{$setting->company_city}}" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Store Country</label>
                            <input type="text" class="form-control"  name="company_country" value="{{$setting->company_country}}" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Zip Code</label>
                            <input type="text" class="form-control"  name="company_zipcode" value="{{$setting->company_zipcode}}" required>
                        </div>
                        <div class="control-group">
                            <label for="old-img">Old Logo</label>
                            <img src="{{URL::to($setting->company_logo)}}" style="height:80px; width:80px";  alt="">
                            <input type="hidden" name="old_photo" value="{{$setting->company_logo}}">
                        </div>


                        <div class="form-group">
                            <img id="image" src="#" alt="">
                            <label for="photo">New Logo</label>
                            <input type="file" class="form-control" name="compnay_logo" accept="image/*" onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>

@endsection
