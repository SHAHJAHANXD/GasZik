<div class="container-fluid no-gutters">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <label class="switch_toggle d-none d-lg-block" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round open_miniSide"></div>
                </label>

                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">

                    </div>
                    <div class="profile_info">
                        <img src="{{ asset('admin') }}/img/client_img.png" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <h5>{{ Auth::guard('admin')->user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="/admin/logout">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
