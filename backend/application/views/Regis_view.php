<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Registered User List</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>

<body id="bd_faqView" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Registered User List</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Regis" class="text-muted"> Registered User</a>
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
            <div class="container">
              <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                  <div class="card-title">
                    <h3 class="card-label">Registered Users
                  </div>
                </div>
                <div class="card-body">
                  <table id="ProductTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="36px">No.</th>
                        <th>Full Name</th>
                        <th width="200px">Email</th>
                        <th width="160px">Phone</th>
                        <th width="180px">Registered Date</th>
                        <th width="100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      foreach ($view_type as $key => $value) {
                        //var_dump($value)
                        $i++;
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td><?php echo $value->name; ?></td>
                          <td><?php echo $value->email; ?></td>
                          <td><?php echo $value->phone; ?></td>
                          <td><?php echo date("Y-m-d H:i:s", strtotime($value->last_update)); ?></td>
                          <td>
                            <a href="mailto:<?php echo $value->email ?>" class="btn btn-sm btn-success btn-icon mr-2 mb-1"><i class="fas fa-envelope"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--end::Content-->
          </div>
          <!--end::Wrapper-->
        </div>
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/regis.js"></script>

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>
</html>
