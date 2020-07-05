@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Supplier</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Supplier</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
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
                    <form action="{{route('store.supplier')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Supplier Name</label>
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
                            <label for="experience">Shopname</label>
                            <input type="text" class="form-control"  placeholder="Enter Shopname" name="shopname" required>
                        </div>
                        <div class="form-group">
                            <label for="nid">Account Holder</label>
                            <input type="text" class="form-control"  placeholder="Enter Account Holder Name" name="account_holder" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Account Number</label>
                            <input type="text" class="form-control"  placeholder="Enter Account Number" name="account_number" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Bank Name</label>
                            <input type="text" class="form-control"  placeholder="Enter Bank Name" name="bank_name" required>
                        </div>
                        <div class="form-group">
                            <label for="vacation">Branch Name</label>
                            <input type="text" class="form-control"  placeholder="Enter Branch Name" name="branch_name" required>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" placeholder="Enter City" name="city" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Supplier Type</label>
                            <select name="type" id="" class="form-control" >
                                <option value="Distributor">Distributor</option>
                                <option value="WholeSeller">Whole Seller</option>
                                <option value="Brochure">Brochure</option>
                            </select>

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
