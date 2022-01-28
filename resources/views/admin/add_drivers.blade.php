@extends('admin.layout')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Add Drivers Form</h3>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('Success'))
                            <div class="alert alert-success m-4" style="width: 90%;">
                                {{ Session::get('Success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="white_card_body">
                            <?php
                            $url = url('admin/add-drivers');
                            ?>
                            <form action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Driver First Name</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                                name="fname" placeholder="Enter First Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Driver Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                aria-describedby="emailHelp" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Driver Mobile Number</label>
                                            <input type="text" class="form-control" name="number"
                                                aria-describedby="emailHelp" placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                                name="email" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            
                                                <label for="exampleInputEmail1">Driver Password</label>
                                                <input type="password" class="form-control" aria-describedby="emailHelp"
                                                    name="password" placeholder="*********">
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Driver ID Card Number</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                                name="card_no" placeholder="Enter ID Card Number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Driver Company</label>
                                            <input type="text" class="form-control" name="company"
                                                aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">License Image</label>
                                            <input type="file" class="form-control" multiple name="url">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Vehicle License Image</label>
                                            <input type="file" class="form-control" multiple name="url1">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
