<header class="main-header">

  <!-- Logo -->
  <a href="<?php echo base_url() ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img src="<?php echo base_url() ?>dist/img/logo-kemendagri.png" width="30px" /></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="<?php echo base_url() ?>dist/img/logo_huge.png" width="168px" /></span>
  </a>
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <!-- <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                    page and may cause design problems
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li> -->
        <!-- Control Sidebar Toggle Button -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url() ?>uploads/profile/<?php echo $this->session->userdata('photo') ?>" onerror="this.src=base_url + 'dist/img/default-photo.png'" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata("name") ?></span>
          </a>

          <!-- <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i> &nbsp; Welcome, &nbsp;<?php echo $this->session->userdata("name") ?> (<?php echo $this->session->userdata("position") ?>)
            &nbsp;
            <span class="caret"></span>
          </a> -->
          <ul class="dropdown-menu" >
            <li>
              <a href="<?php echo base_url();?>/home/changepass"><i class="fa fa-lock"></i> Change Password</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>/home/profile"><i class="fa fa-user"></i> Profil Saya</a>
            </li>
         </ul>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-power-off"></i></a>
        </li>
      </ul>
    </div>

  </nav>
</header>
<?php include "setting-modal.php" ?>