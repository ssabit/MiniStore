@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="wraper container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-picture text-center" style="background-image:url('{{asset('admin/images/big/bg.jpg')}}')">
                            <div class="bg-picture-overlay"></div>
                            <div class="profile-info-name">
                                <img src="{{URL::to($product->product_image)}}" class="thumb-lg img-circle img-thumbnail"
                                     alt="profile-image">
                                <h3 class="text-white">{{$product->name}}</h3>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="tab-content profile-tab-content">
                            <div class="tab-pane active" id="home-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Product Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="about-info-p">
                                                    <strong>Product Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->product_name}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Product Code</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->product_code}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Category</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->cat_name}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Supplier</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->name}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Garage</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->product_garage}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Product Route</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->product_route}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Buy Date</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->buy_date}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Exp Date</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->exp_date}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Selling Price</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$product->selling_price}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Personal-Information -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
