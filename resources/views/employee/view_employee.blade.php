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
                                <img src="{{URL::to($single->photo)}}" class="thumb-lg img-circle img-thumbnail"
                                     alt="profile-image">
                                <h3 class="text-white">{{$single->name}}</h3>
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
                                                <h3 class="panel-title">Personal Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->name}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->phone}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->email}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Address</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->address}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Experience</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->experience}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>NID</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->nid_no}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Salary</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->salary}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Vacation</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->vacation}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>City</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->city}}</p>
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
