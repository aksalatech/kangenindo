<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Database Alumni</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Import Result</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> Import Result</a>
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
                    <h3 class="card-label">Tabel Import Result
                  </div>
                  <div class="card-toolbar">
                  </div>
                </div>
                <div class="card-body" style="overflow: auto">
                  <center><green><h3><?php echo $num ?> dari <?php echo $all ?> data sukses diimport !</h3></green></center>
                  <table id="ProductTable" class="table table-bordered table-hover">
                    <?php echo $content ?>
                  </table>
                </div>

                <button type="button" class="btn btn-success" name="sbmtBttn" id="sbmtBttn" onclick="back()">OK</button>
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
  <!--end::Page Vendors-->
</body>
</html>
  <script type="text/javascript">
    function back()
    {
       window.location = document.referrer;
    }
  </script>
