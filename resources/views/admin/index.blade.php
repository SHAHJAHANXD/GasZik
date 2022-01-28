@extends('admin.layout')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_25 f_w_700 dark_text">Admin</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="{{ asset('admin') }}/javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="white_card card_height_100 mb_30 social_media_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Social media</h3>
                                <span>About Your Social Popularity</span>
                            </div>
                        </div>
                        <div class="media_thumb ml_25">
                            <img src="img/media.svg" alt="">
                        </div>
                        <div class="media_card_body">
                            <div class="media_card_list">
                                <div class="single_media_card">
                                    <span>Users</span>
                                    <h3>{{ $users }}</h3>
                                </div>
                                <div class="single_media_card">
                                    <span>Drivers</span>
                                    <h3>{{ $drivers }}</h3>
                                </div>
                                <div class="single_media_card">
                                    <span>Items</span>
                                    <h3>{{ $items }}</h3>
                                </div>
                                <div class="single_media_card">
                                    <span>On Going Orders</span>
                                    <h3>{{ $ongoing }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
