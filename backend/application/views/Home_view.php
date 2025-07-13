<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Penggunaan Mesin Card Reader</title>
  <?php include "includes/include_js_css_new.php"; ?>
  <link href="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.fixedcolumn.css" rel="stylesheet" type="text/css" />
</head>

<body id="bd_user" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <?php include "includes/hidden.php"; ?>

  <?php require("includes/header_new.php"); ?>

  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <?php require("includes/navigation_new.php"); ?>

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <?php require("includes/header-top.php"); ?>

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Subheader-->
          <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
              <!--begin::Toolbar-->
              <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold my-1 mr-5"> Home</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Home</a>
                  </li>
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          <!--end::Subheader-->

          <!--begin::Entry-->
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container" style="padding: 0 25px; max-width: 100%">
              <div class="card card-custom">
                <div class="card-body">
                  <div class="hero-unit mb-10" style="height: 160px;width: 100%;border-radius:12px;padding:28px; background-image: url('<?php echo base_url();?>dist/img/bgimg.png');background-size:cover;background-position: center">
                    <h3>Welcome to Little Indo Town Administration Panel</h3>
                    <p>Administration Panel is a backend system to manage your website content and perform many other more configuration.</p>
                  </div>

                  <div class="mb-10 row">
                    <div class="col-md-6">
                      <h2>Content Management</h2>
                      <table width="100%">
                        <tr>
                          <td width="80px"><img src="<?php echo base_url();?>/dist/img/app-icon.png" class="main-img" width="65px" /></td>
                          <td>
                            <p class="text-justify"><strong>Content Management</strong> is a feature that enable the user to maintain, insert, update, remove and manipulate the website contents.</p>
                          </td>
                        </tr>
                      </table>
                      
                    </div>
                    
                    <div class="col-md-6">
                      <h2>Configuration</h2>
                      <table width="100%">
                        <tr>
                          <td width="80px"><img src="<?php echo base_url();?>/dist/img/rpt-icon.png" class="main-img" width="65px" /></td>
                          <td>
                            <p class="text-justify"><strong>Configuration</strong> is a feature that enable the user to insert other settings and configuration to manipulate elements inside the website.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include "includes/footer.php"; ?>
      </div>
    </div>
  </div>
  <?php include "includes/reject-dialog.php"; ?>
  <?php include "includes/reason-dialog.php"; ?>
  <!-- ./wrapper -->
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/statistik.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.fixedcolumn.js"></script>

</body>

</html>