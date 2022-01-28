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
                                    <h3 class="m-0">Configuration Form</h3>
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
                            if (isset($user->id) && $user->id != 0) {
                                $url = url('admin/add-configurations/' . $user->id ?? '');
                            } else {
                                $url = url('admin/add-configurations');
                            }
                            ?>
                            <form action="{{ url($url) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Service Charges</label>
                                            <input type="number" class="form-control" name="ServiceCharges"
                                                aria-describedby="emailHelp" value="{{$user->ServiceCharges ?? ''}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Delivery Charges</label>
                                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                                name="DeliveryCharges" value="{{$user->DeliveryCharges ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Delivery Time</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                                name="DeliveryTime" value="{{$user->DeliveryTime ?? ''}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Delivery Time Increase Per Order</label>
                                            <input type="text" class="form-control" name="DeliveryTimeIncreasePerOrder"
                                                aria-describedby="emailHelp" value="{{$user->DeliveryTimeIncreasePerOrder ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Tax</label>
                                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                                name="Tax" value="{{$user->Tax ?? ''}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Minimum Radius</label>
                                            <input type="number" class="form-control" name="MinimumRadius"
                                                aria-describedby="emailHelp" value="{{$user->MinimumRadius ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Maximum Radius</label>
                                            <input type="number" class="form-control" name="MaximumRadius"  value="{{$user->MaximumRadius ?? ''}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Minimum Order</label>
                                            <input type="number" class="form-control" name="MinimumOrder"  value="{{$user->MaximumRadius ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Support Contact</label>
                                            <input type="text" class="form-control"  name="SupportContact" value="{{$user->SupportContact ?? ''}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Support Email</label>
                                            <input type="text" class="form-control"  name="SupportEmail" value="{{$user->SupportEmail ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
