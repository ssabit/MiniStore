@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Customer</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Customer</a></li>
                <li class="active">Update</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Customer</h3></div>
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
                    <form action="{{url('/update-customer/'.$edit->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" value="{{$edit->name}}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  value="{{$edit->email}}" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control"  value="{{$edit->phone}}" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" value="{{$edit->address}}" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="experience">Shopname</label>
                            <input type="text" class="form-control"  value="{{$edit->shopname}}" name="shopname" required>
                        </div>
                        <div class="form-group">
                            <label for="nid">Account Holder</label>
                            <input type="text" class="form-control"  value="{{$edit->account_holder}}" name="account_holder" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Account Number</label>
                            <input type="text" class="form-control"  value="{{$edit->account_number}}" name="account_number" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Bank Name</label>
                            <input type="text" class="form-control"  value="{{$edit->bank_name}}" name="bank_name" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Branch Name</label>
                            <input type="text" class="form-control"  value="{{$edit->bank_branch}} "name="back_branch" required>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" value="{{$edit->city}}" name="city" required>
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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>
    </div> <!-- container -->

    </div> <!-- content -->
    </div>



@endsection
