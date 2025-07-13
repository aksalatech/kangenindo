<?php
$halaman = $this->uri->segment(1);
$halamanSeg2 = $this->uri->segment(2);
$current = $halaman . "/" . $halamanSeg2;
$halamanfull = $this->uri->segment(1) . $this->uri->segment(2);
?>
<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
  <!--begin::Brand-->
  <div class="brand flex-column-auto" id="kt_brand">
    <!--begin::Logo-->
    <a href="<?php echo base_url(); ?>Home" class="brand-logo">
      <!-- <img alt="Logo" src="<?php echo base_url(); ?>dist/img/indotown/Frame.png" width="100%" /> -->
      <img alt="Logo" src="<?php echo base_url(); ?>dist/img/indotown/Frame.png" width="100%" style="
    width: 100px;
    height: 77px;
    margin-top: 15px;
">
    </a>
    <!--end::Logo-->
    <!--begin::Toggle-->
    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
      <span class="svg-icon svg-icon svg-icon-xl">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24" />
            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
          </g>
        </svg>
        <!--end::Svg Icon-->
      </span>
    </button>
    <!--end::Toolbar-->
  </div>
  <!--end::Brand-->
  <!--begin::Aside Menu-->
  <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
      <!--begin::Menu Nav-->
      <ul class="menu-nav">
        <!-- DASHBOARD MENU -->
        <li class="menu-item menu-item-submenu <?= ($halaman == 'Home' || $halaman == 'home') ? 'menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true" data-menu-toggle="hover">
          <a href="<?php echo base_url() ?>" class="menu-link mn-dashboardGisGroup">

            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Home</span>
            <!-- <i class="menu-arrow"></i> -->
          </a>
         <!--  <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                  <span class="menu-text">Dashboard</span>
                </span>
              </li>
              <li class="menu-item <?= ($halamanSeg2 == '' || $current == 'home/aktivasi') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a id="mn-dashboardGis" href="<?php echo base_url(); ?>home" class="menu-link">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Dashboard Statistic</span>
                </a>
              </li>
            </ul>
          </div> -->
        </li>
        <!-- END DASHBOARD MENU -->

        <?php // if ($this->session->userdata("position") == POSITION_SUPERADMIN) { ?>
          <!-- ADMIN USERS MENU -->
          <li class="menu-item <?= ($halaman == 'user') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
            <a href="<?php echo base_url(); ?>user" class="menu-link mn-userRev">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                  </g>
                </svg>
              </span>
              <span class="menu-text">Admin Users</span>
            </a>
          </li>
        <?php // } ?>

        <!-- <li class="menu-item <?= ($halaman == 'order') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>order" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                </g>
              </svg>
            </span>
            <span class="menu-text">Order List</span>
          </a>
        </li> -->
        <li class="menu-item <?= ($halaman == 'catering') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>catering" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M2,14 L22,14 L22,14 C22,18.9705627 17.9705627,23 13,23 L11,23 C6.02943725,23 2,18.9705627 2,14 Z" fill="#000000"/>
                    <path d="M16.7233675,1.41763641 C17.1846056,1.68393238 17.3426375,2.27371529 17.0763415,2.73495343 C17.070507,2.74505905 17.0644896,2.75505793 17.0582922,2.76494514 L10.5379559,13.1673758 C10.3897629,13.4038004 10.08104,13.4805452 9.83939289,13.3410302 C9.59774579,13.2015152 9.50984729,12.8957809 9.64050046,12.6492297 L15.3891015,1.80123745 C15.6384827,1.33063867 16.2221417,1.15130634 16.6927405,1.40068748 C16.7030512,1.40615136 16.7132619,1.41180193 16.7233675,1.41763641 Z M21.8768598,4.21665558 C22.2332333,4.61244851 22.2012776,5.22219993 21.8054847,5.57857348 C21.796813,5.58638154 21.7880002,5.59403156 21.7790508,5.60151976 L12.3633147,13.4799245 C12.1493155,13.6589835 11.8319871,13.6365715 11.6452796,13.4292118 C11.458572,13.221852 11.4694527,12.9039193 11.6698998,12.7098092 L20.4893582,4.16917098 C20.8719568,3.79866796 21.4824663,3.80847334 21.8529693,4.19107192 C21.8610869,4.19945456 21.8690517,4.20798385 21.8768598,4.21665558 Z" fill="#000000" opacity="0.3"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Catering</span>
          </a>
        </li>
        <li class="menu-item <?= ($halaman == 'franchise') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>franchise" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z" fill="#000000"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Franchise</span>
          </a>
        </li>
        <li class="menu-item <?= (strtolower($halaman) == 'regis') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>regis" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Registered User</span>
          </a>
        </li>
        <li class="menu-item <?= ($halaman == 'contact') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>contact" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M7.5,4 L7.5,19 L16.5,19 L16.5,4 L7.5,4 Z M7.71428571,2 L16.2857143,2 C17.2324881,2 18,2.8954305 18,4 L18,20 C18,21.1045695 17.2324881,22 16.2857143,22 L7.71428571,22 C6.76751186,22 6,21.1045695 6,20 L6,4 C6,2.8954305 6.76751186,2 7.71428571,2 Z" fill="#000000" fill-rule="nonzero"/>
                    <polygon fill="#000000" opacity="0.3" points="7.5 4 7.5 19 16.5 19 16.5 4"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Contact Message</span>
          </a>
        </li>

        <!-- <li class="menu-item <?= ($halaman == 'cert_type') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>cert_type" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                  <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                </g>
              </svg>
            </span>
            <span class="menu-text">Database Alumni</span>
          </a>
        </li> -->

        <!-- <li class="menu-item <?= ($halaman == 'attendance') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>attendance" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                  <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                </g>
              </svg>
            </span>
            <span class="menu-text">Daftar Kehadiran</span>
          </a>
        </li> -->




        <!-- <li class="menu-item menu-item-submenu <?= ($halamanfull == 'Salesbyproduct' || $halamanfull == 'Salesbybrand' || $halamanfull == 'Salesbystore') ? 'menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true" data-menu-toggle="hover">
          <a href="javascript:void(0);" class="menu-link menu-toggle mn-dashboardMasterGroup">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3" />
                  <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000" />
                </g>
              </svg>
            </span>
            <span class="menu-text">Sales</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                  <span class="menu-text">Sales</span>
                </span>
              </li>
              <li class="menu-item <?= ($halamanfull == 'Salesbystore') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a id="mn-masterLemPeg" href="<?php echo base_url(); ?>Sales/bystore" class="menu-link">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Sales By Store</span>
                </a>
              </li>
              <li class="menu-item <?= ($halamanfull == 'Salesbybrand') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a id="mn-masterLemPeg" href="<?php echo base_url(); ?>Sales/bybrand" class="menu-link">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Sales By Brand</span>
                </a>
              </li>
              <li class="menu-item <?= ($halamanfull == 'Salesbyproduct') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a id="mn-masterLemPeg" href="<?php echo base_url(); ?>Sales/byproduct" class="menu-link">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Sales By Product</span>
                </a>
              </li>
            </ul>
          </div>
        </li> -->
        <li class="menu-item menu-item-submenu <?= ($halaman == 'gallerydep' || $halaman == 'Gallerydep' || $halaman == 'banner' || $halaman == 'Banner' || $halaman == 'promotion' || $halaman == 'Promotion' || $halaman == 'brand' || $halaman == 'Brand' || $halaman == 'blog' || $halaman == 'Blog' || $halaman == 'event' || $halaman == 'Event' || $halaman == 'testimony' || $halaman == 'Testimony' || $halaman == 'frequent' || $halaman == 'Frequent' || $halaman == 'Store' || $halaman == 'store' || $halaman == 'Video' || $halaman == 'video' || $halaman == 'blogkategori' || $halaman == 'Blogkategori' || $halaman == 'contactkomda' || $halaman == 'Contactkomda' || $halaman == 'books' || $halaman == 'Books' || $halaman == 'team' || $halaman == 'Team' || $halaman == 'gallery' ||  $halaman == 'Gallery' || $halaman == 'category' ||  $halaman == 'Category' || $halaman == 'events' ||  $halaman == 'Events' || $halaman == 'timeline' ||  $halaman == 'Timeline' || $halaman == 'slider' ||  $halaman == 'Slider' || $halaman == 'Blog' || $halaman == 'Customer' || $halaman == 'customer') ? 'menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true" data-menu-toggle="hover">
          <a href="javascript:void(0);" class="menu-link menu-toggle mn-dashboardMasterGroup">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3" />
                  <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000" />
                </g>
              </svg>
            </span>
            <span class="menu-text">Master Data Website</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                  <span class="menu-text">Master Data Website</span>
                </span>
              </li>
              <?php if ($this->session->userdata("position") == POSITION_SUPERADMIN) { ?>
                <!-- <li class="menu-item <?= ($halaman == 'slider' || $halaman == 'Slider') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>slider" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Slider</span>
                  </a>
                </li> -->
              <?php } ?>
              <!-- <li class="menu-item <?= ($halaman == 'events' || $halaman == 'Events') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a href="<?php echo base_url(); ?>events" class="menu-link">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Events</span>
                </a>
              </li> -->
              <?php if ($this->session->userdata("position") == POSITION_SUPERADMIN) { ?>
                <!-- <li class="menu-item <?= ($halaman == 'customer' || $halaman == 'Customer') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>customer" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Mitra</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'timeline' || $halaman == 'Timeline') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>timeline" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Timeline</span>
                  </a>
                </li> -->
              <?php } ?>
              <!-- <li class="menu-item <?= ($halaman == 'blog' || $halaman == 'Blog') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?> <?= ($halaman == 'blogkategori' || $halaman == 'Blogkategori') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Blog</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="400" style="">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item <?= ($halaman == 'blog' || $halaman == 'Blog') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?> " aria-haspopup="true">
                      <a href="<?php echo base_url(); ?>Blog" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                          <span></span>
                        </i>
                        <span class="menu-text">Posting Blog</span>
                      </a>
                    </li>
                    <li class="menu-item <?= ($halaman == 'blogkategori' || $halaman == 'Blogkategori') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                      <a href="<?php echo base_url(); ?>Blogkategori" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                          <span></span>
                        </i>
                        <span class="menu-text">Kategori Blog</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> -->
              <li class="menu-item <?= ($halaman == 'gallery' || $halaman == 'Gallery') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?> <?= ($halaman == 'category' || $halaman == 'Category') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-bullet menu-bullet-dot">
                    <span></span>
                  </i>
                  <span class="menu-text">Menu</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="400" style="">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                    <li class="menu-item <?= ($halaman == 'category' || $halaman == 'Category') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                      <a href="<?php echo base_url(); ?>Category" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                          <span></span>
                        </i>
                        <span class="menu-text">Category Menu</span>
                      </a>
                    </li>
                    <li class="menu-item <?= ($halaman == 'gallery' || $halaman == 'Gallery') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                      <a href="<?php echo base_url(); ?>Gallery" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                          <span></span>
                        </i>
                        <span class="menu-text">Menu List</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <?php // if ($this->session->userdata("position") == POSITION_SUPERADMIN) { ?>
                <li class="menu-item <?= ($halaman == 'customer' || $halaman == 'Customer') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Customer" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Brand</span>
                  </a>
                </li>
                <!-- <li class="menu-item <?= ($halaman == 'store' || $halaman == 'Store') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Store" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Store</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'promotion' || $halaman == 'Promotion') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Promotion" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Promotion</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'events' || $halaman == 'Events') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Events" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Events</span>
                  </a>
                </li> -->
                <li class="menu-item <?= ($halaman == 'blog' || $halaman == 'Blog') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Blog" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Whats On</span>
                  </a>
                </li>
                <!-- <li class="menu-item <?= ($halaman == 'frequent' || $halaman == 'Frequent') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Frequent" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">FAQ</span>
                  </a>
                </li> -->
                <li class="menu-item <?= ($halaman == 'testimony' || $halaman == 'Testimony') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Testimony" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Testimony</span>
                  </a>
                </li>
                <li class="menu-item <?= ($halaman == 'banner' || $halaman == 'Banner') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>banner" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Banner Home</span>
                  </a>
                </li>
                <li class="menu-item <?= ($halaman == 'slider' || $halaman == 'Slider') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>slider" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Slider</span>
                  </a>
                </li>
                <li class="menu-item <?= ($halaman == 'gallerydep' || $halaman == 'Gallerydep') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>gallerydep" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Gallery</span>
                  </a>
                </li>
                <!-- <li class="menu-item <?= ($halaman == 'team' || $halaman == 'Team') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Team" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Team</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'books' || $halaman == 'Books') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Books" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Publikasi</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'Video' || $halaman == 'video') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Video" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Video</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'contactkomda' || $halaman == 'contactkomda') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Contactkomda" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Komisi Daerah</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'settings' || $halaman == 'Settings') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Settings" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Settings</span>
                  </a>
                </li> -->
                <!-- <li class="menu-item <?= ($halaman == 'contactkomda' || $halaman == 'Contactkomda') ? 'menu-item-submenu menu-item-open menu-item-here' : ''; ?>" aria-haspopup="true">
                  <a href="<?php echo base_url(); ?>Contactkomda" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Contact Komda</span>
                  </a>
                </li> -->
              <?php // } ?>
            </ul>
          </div>
        </li>


        <li class="menu-item <?= ($halaman == 'settings' || $halaman == 'Settings') ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
          <a href="<?php echo base_url(); ?>Settings" class="menu-link mn-userRev">
            <span class="svg-icon menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                </g>
              </svg>
            </span>
            <span class="menu-text">Settings</span>
          </a>
        </li>



      </ul>
      <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
  </div>
  <!--end::Aside Menu-->
</div>
<!--end::Aside-->