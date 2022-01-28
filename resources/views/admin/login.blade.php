<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from demo.dashboardpack.com/analytic-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 22:50:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>GasZik Admin Panel Login</title>
    <!-- <link rel="icon" href="img/favicon.png" type="image/png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/font_awesome/css/all.min.css" />
    <!-- datatable CSS -->
    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/scroll/scrollable.css" />
    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/css/colors/default.css" id="colorSkinCSS">
</head>
<style>
    .main_content {
        padding-left: 0px !important;
    }
</style>
<body class="crm_body_bg">
    <section class="main_content dashboard_part large_header_bg">
        <!--/ menu  -->
        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dashboard_header_title">
                                        <h3>GasZik Admin Panel</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">

                                <div class="col-lg-6">
                                    <!-- sign_in  -->
                                    <div class="modal-content cs_modal">
                                        <div class="modal-header justify-content-center theme_bg_1">
                                            <h5 class="modal-title text_white">Log in</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/login" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Enter your email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Password">
                                                </div>
                                                <button type="submit" class="btn_1 full_width text-center">Log
                                                    in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/### CHAT_MESSAGE_BOX  ### -->
    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
    <!-- footer  -->
    <!-- jquery slim -->
    <script src="{{ asset('admin') }}/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="{{ asset('admin') }}/js/popper.min.js"></script>
    <!-- bootstarp js -->
    <script src="{{ asset('admin') }}/js/bootstrap.min.js"></script>
    <!-- sidebar menu  -->
    <script src="{{ asset('admin') }}/js/metisMenu.js"></script>
    <!-- scrollabe  -->
    <script src="{{ asset('admin') }}/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('admin') }}/vendors/scroll/scrollable-custom.js"></script>
    <!-- custom js -->
    <script src="{{ asset('admin') }}/js/custom.js"></script>
</body>
<!-- Mirrored from demo.dashboardpack.com/analytic-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 22:50:51 GMT -->
</html>
