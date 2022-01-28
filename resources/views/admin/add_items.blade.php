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
                            $url = url('admin/add-items');
                            ?>
                            <form action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                aria-describedby="emailHelp" placeholder="Enter Item Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">اسم</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                                name="nameAr" placeholder="أدخل الاسم">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Description</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                                name="description" placeholder="Enter First Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">وصف</label>
                                            <input type="text" class="form-control" name="descriptionAr"
                                                aria-describedby="emailHelp" placeholder="أدخل الوصف">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Item Type</label>
                                            <select class="form-control form-control-user" name="itemtype">
                                                <option>New</option>
                                                <option>Refill</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="ItemTypeAr">الرجاء تحديد نوع العنصر</label>
                                            <select class="form-control form-control-user" name="itemtypeAr">
                                                <option>الجديد</option>
                                                <option>اعادة تعبئه</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Item Price</label>
                                            <input type="number" name="unitprice" class="form-control form-control-user"
                                                aria-describedby="emailHelp" placeholder="Enter item price ..." step=".01">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Item Image</label>
                                            <input type="file" name="image" class="form-control form-control-user"
                                                aria-describedby="emailHelp" placeholder="Please Upload image...">
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
