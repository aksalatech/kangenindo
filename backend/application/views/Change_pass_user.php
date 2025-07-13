<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Change Password Admin</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>

<body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Change Password</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="" class="text-muted"> Change Password</a>
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
              <div class="row">
                <div class="col-md-12">
                  <!--begin::Card-->
                  <form method="POST" action="<?php echo base_url(); ?>user/submitpass">
                  
                    <div class="card card-custom gutter-b example example-compact">
                      <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title">Change Password</h3>
                      </div>
                      <!--begin::Form--> 
                      
                      <?php if (isset($err)) { ?>
                        <h3 class="text-center text-danger"><?php echo $err; ?></h3>
                      <?php } ?>

                      <input type="hidden" id="userID" name="userID" value="<?php echo $userID; ?>" />

                      <div class="card-body">
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label>New Password</label>
                            <input type="password" placeholder="New Password" class="form-control" name="newpass" id="newpass">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label>Confirmation Password</label>
                            <input type="password" placeholder="Confirm Password" class="form-control" name="confirm" id="confirm">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                        <a href="<?php echo base_url(); ?>User" class="btn btn-secondary font-weight-bolder">Cancel</a>
                      </div>
                      <!--end::Form-->
                    </div>
                  

                  </form>
                  <!--end::Card-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::Wrapper-->
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
</body>

</html>