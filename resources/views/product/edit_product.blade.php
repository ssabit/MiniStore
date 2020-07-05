@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Product</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Product</a></li>
                <li class="active">Update</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
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
                    <form action="{{url('update-product/'.$edit->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control"  value="{{$edit->product_name}}" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="code">Product Code</label>
                            <input type="text" class="form-control"  value="{{$edit->product_code}}" name="product_code" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Categorye</label>
                            @php
                                $cat=DB::table('categories')->get();
                            @endphp

                            <select name="cat_id" id="" class="form-control" >
                                @foreach($cat as $row)
                                    <option value="{{$row->id}}"<?php if($edit->cat_id==$row->id){echo "selected";}?>>{{$row->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            @php
                                $sup=DB::table('suppliers')->get();
                            @endphp

                            <select name="sup_id" id="" class="form-control" >
                                @foreach($sup as $row)
                                    <option value="{{$row->id}}"<?php if($edit->sup_id==$row->id){echo "selected";}?>>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_garage">Godaun</label>
                            <input type="text" class="form-control" value="{{$edit->product_garage}}"name="product_garage" required>
                        </div>
                        <div class="form-group">
                            <label for="product_route">Product Route</label>
                            <input type="text" class="form-control" value="{{$edit->product_route}}" name="product_route" required>
                        </div>
                        <div class="form-group">
                            <label for="buying_date">Buying Date</label>
                            <input type="date" class="form-control" value="{{$edit->buy_date}}" name="buying_date" required>
                        </div>
                        <div class="form-group">
                            <label for="exp_date">Exp Date</label>
                            <input type="date" class="form-control" name="exp_date" value="{{$edit->exp_date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="buying_price">Buying Price</label>
                            <input type="text" class="form-control"  value="{{$edit->buying_price}}" name="buying_price" required>
                        </div>
                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="text" class="form-control"  value="{{$edit->selling_price}}" name="selling_price" required>
                        </div>

                        <div class="control-group">
                            <label for="old-img">  Old Photo</label>
                            <img src="{{URL::to($edit->product_image)}}" style="height:80px; width:80px";  alt="">
                            <input type="hidden" name="old_photo" value="{{$edit->product_image}}">
                        </div>


                        <div class="form-group">
                            <img id="image" src="#" alt="">
                            <label for="photo">Product Image</label>
                            <input type="file" class="form-control" name="product_image" accept="image/*"  onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->
    </div>
@endsection
