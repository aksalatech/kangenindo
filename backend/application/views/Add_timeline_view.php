<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Daftar Timeline</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Daftar Timeline</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Timeline" class="text-muted"> Daftar Timeline</a>
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
                  <?php
                  if (isset($req)) {
                  ?> <form method="POST" action="<?php echo base_url(); ?>Timeline/update_type" enctype="multipart/form-data">
                      <input type="hidden" name="id_timeline" id="id_timeline" value="<?php echo $req ?>">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Timeline</h3>
                        </div>
                        <!--begin::Form-->
                        <?php
                        if (isset($err)) {
                        ?>
                          <h3 class="text-center text-danger"><?php echo $err; ?></h3>
                        <?php
                        }
                        ?>
                        <div class="card-body">
                          <?php
                          foreach ($viewProduct as $key) {
                          ?>
                            <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Judul Timeline</label>:
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="title" id="title" value="<?php echo $key->title; ?>" required>
                                </div>
                              </div>
                               <div class="col-lg-6">
                              <label>Tahun:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="year" id="year" value="<?php echo $key->year; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Content:</label>
                              <div class="row">
                                <textarea rows="5" class="form-control col-md-11" name="content" id="content"><?php echo $key->content; ?></textarea>
                              </div>
                            </div>
                            <!-- <div class="col-lg-6">
                              <label>Urutan</label>:
                              <div class="row">
                                <input type="number" class="form-control col-md-12" name="seq_no" id="seq_no" value="<?php echo $key->seq_no; ?>" required>
                              </div>
                            </div> -->
                          </div>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                          <a href="<?php echo site_url(); ?>Slider" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } else {
                  ?>
                    <form method="POST" action="<?php echo base_url(); ?>Timeline/add_type" enctype="multipart/form-data">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Daftar Timeline</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Judul Slider</label>:
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="title" id="title" required>
                                </div>
                              </div>
                              <div class="col-lg-6">
                              <label>Tahun:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="year" id="year" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Content:</label>
                              <div class="row">
                                <textarea rows="5" class="form-control col-md-11" name="content" id="content"></textarea>
                              </div>
                            </div>
                            <!-- <div class="col-lg-6">
                              <label>Urutan</label>:
                              <div class="row">
                                <input type="number" class="form-control col-md-11" name="seq_no" id="seq_no" required>
                              </div>
                            </div> -->
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo site_url(); ?>Slider" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } ?>
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