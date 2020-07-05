@extends('layouts.app')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">POS</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">POS</a></li>

            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="list-group list-group-item ">
                @foreach($categorie as $row)
                    <a  class="btn btn-sm btn-info">{{$row->cat_name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Invoice</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table  id="example1"  class="table table-hover">
                        <thead>
                        <tr>
                            <th class="text-white">Name</th>
                            <th class="text-white">Qty</th>
                            <th class="text-white">Unit Price</th>
                            <th class="text-white">Sub Total</th>
                            <th class="text-white">Action</th>
                        </tr>
                        </thead>
                        @php
                            $cart_product=Cart::content();
                        @endphp
                        <tbody>
                        @foreach($cart_product as $prod)
                            <tr>
                                <td>{{$prod->name}}</td>
                                <td>
                                    <form action="{{url('/cart-update/'.$prod->rowId )}}" method="post">
                                        @csrf
                                        <input type="number" name="qty" value="{{$prod->qty}}" style="width: 40px;">
                                        <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px;"><i class="fa fa-check" ></i></button>
                                    </form>
                                </td>
                                <td>{{$prod->price}}</td>
                                <td>{{$prod->price*$prod->qty}}</td>
                                <td><a href="{{URL::to('/cart-remove/'.$prod->rowId)}}"><i class="fa fa-trash text-danger"></i></a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pricing-footer bg-primary">
                        <p  class="text-center">Quantity: {{Cart::count()}}</p>
                        <p class="text-center">Subtotal: {{Cart::subtotal()}}</p>
                        <p class="text-center"> Vat: {{Cart::tax()}}</p>
                        <hr>
                        <p ><h2 class="text-white text-center">Total: {{Cart::total()}}</h2></p>

                    </div>
                    <form action="{{url('/invoice')}}" method="post">
                        @csrf
                        <div class="panel">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h4 class="text-info">Select Customer
                                <a href="" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                            </h4>
                            @php
                                $customer=DB::table('customers')->get();
                            @endphp
                            <select name="cus_id" class="form-control">
                                <option value=""  selected="" disabled>Select Customer</option>
                                @foreach($customer as $cus)
                                    <option value="{{$cus->id}}">{{$cus->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success">Create Invoice</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product List</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table id="example2"  class="table table-hover">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Product Code</th>
                            <th>Add</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $row)

                            <tr>
                                <form action="{{url('/add-cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input type="hidden" name="name" value="{{$row->product_name}}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{$row->selling_price}}">
                                    <input type="hidden" name="weight" value="1">

                                    <td><a href=""></a><img src="{{URL::to($row->product_image)}}" style="width:60px; height: 60px;" alt=""></td>
                                    <td>{{$row->product_name}}</td>
                                    <td>{{$row->cat_name}}</td>
                                    <td>{{$row->product_code}}</td>
                                    <td> <button type="submit" class="btn btn-sm btn-info" ><i class="fa fa-plus" ></i></button></td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--modal--}}
    <form action="{{url('/store/customer')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add a New Customer</h4>
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
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="field-1" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="field-2"  name="email" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Phone</label>
                                    <input type="text" class="form-control" id="field-2"  name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Address</label>
                                    <input type="text" class="form-control" id="field-1"  name="address" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Shopname</label>
                                    <input type="text" class="form-control" id="field-2" name="shopname" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">City</label>
                                    <input type="text" class="form-control" id="field-2"  name="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Account Number</label>
                                    <input type="text" class="form-control" id="field-1" name="account_holder" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Account Holder</label>
                                    <input type="text" class="form-control" id="field-2" name="account_number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Bank Name</label>
                                    <input type="text" class="form-control" id="field-2"  name="bank_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Branch Name</label>
                                    <input type="text" class="form-control" id="field-1"  name="bank_branch" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="image" src="#" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*" required onchange="readURL(this);">
                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    </form>
@endsection
