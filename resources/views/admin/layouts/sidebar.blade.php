<nav class="sidebar">
  <div class="logo d-flex justify-content-between">
    <a class="large_logo" href="index.html">
      <h2> <b>GasZik</b> </h2>
    </a>
    <a class="small_logo" href="index.html">
      <h2>GasZik</h2>
    </a>
    <div class="sidebar_close_icon d-lg-none">
      <i class="ti-close"></i>
    </div>
  </div>
  <ul id="sidebar_menu">
    <li>
      <a href="/admin/dashboard" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="nav-icon fas fa-tachometer-alt"></i>
        </div>
        <div class="nav_title">
          <span>Dashboard</span>
        </div>
      </a>
    </li>
    <h4 class="menu-text"><span>Drivers</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li>
      <a href="/admin/manage-drivers" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="fas fa-users-cog nav-icon"></i>
        </div>
        <div class="nav_title">
          <span>Manage Drivers</span>
        </div>
      </a>
    </li>
    <h4 class="menu-text"><span>Items</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li>
      <a href="/admin/manage-items" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="fas fa-project-diagram nav-icon"></i>
        </div>
        <div class="nav_title">
          <span>Manage Items</span>
        </div>
      </a>
    </li>
    <h4 class="menu-text"><span>Customers</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li>
      <a href="/admin/manage-customers" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="fa fa-users nav-icon"></i>
        </div>
        <div class="nav_title">
          <span>Manage Customers</span>
        </div>
      </a>
    </li>
    <h4 class="menu-text"><span>Orders</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    </div>
                    <div class="nav_title">
                        <span>Pages</span>
                    </div>
                </a>
                <ul>
                    <li><a href="/admin/ongoing-orders">Ongoing Orders</a></li>
                    <li><a href="/admin/all-orders">All Orders</a></li>

                </ul>
            </li>
    <h4 class="menu-text"><span>Configuration</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li>
        <?php

            $url = url('admin/configuration');

        ?>
      <a href="{{url($url)}}" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="fa fa-users nav-icon"></i>
        </div>
        <div class="nav_title">
          <span>Configuration</span>
        </div>
      </a>
    </li>
    <li>
      <a href="/admin/templates" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="fa fa-users nav-icon"></i>
        </div>
        <div class="nav_title">
          <span>Admin Templates</span>
        </div>
      </a>
    </li>
    <h4 class="menu-text"><span>Session</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li>
      <a href="/admin/logout" aria-expanded="false">
        <div class="nav_icon_small">
          <i class="nav-icon fas fa-sign-out-alt"></i>
        </div>
        <div class="nav_title">
          <span>Logout</span>
        </div>
      </a>
    </li>
  </ul>
</nav>
