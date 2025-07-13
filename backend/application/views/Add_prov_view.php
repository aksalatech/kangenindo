<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Daftar Provinsi</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Daftar Provinsi</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Prov" class="text-muted"> Daftar Provinsi</a>
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
                  ?> <form method="POST" action="<?php echo base_url(); ?>Prov/update_type">
                      <input type="hidden" name="catID" id="catID" value="<?php echo $req ?>">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Provinsi</h3>
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
                              <!-- <div class="col-lg-4">
                                <label>Kode Lembaga:</label>
                                <input type="text" class="form-control" name="typeCode" id="typeCode" value="<?php // echo $key->typeCode; ?>" required>
                              </div> -->
                              <div class="col-lg-6">
                                <label>Kode Provinsi</label>:
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" readonly name="prov_id" id="prov_id" value="<?php echo $key->prov_id; ?>" required>
                                </div>
                              </div>
                               <div class="col-lg-6">
                              <label>Nama Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="prov_name" id="prov_name" value="<?php echo $key->prov_name; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="provinsi" id="provinsi" value="<?php echo $key->provinsi; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Initial Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="kd_provinsi" id="kd_provinsi" value="<?php echo $key->kd_provinsi; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Latitude:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="latitude" id="latitude" value="<?php echo $key->latitude; ?>">
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Langitude:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="langitude" id="langitude" value="<?php echo $key->langitude; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Negara:</label>
                              <div class="row">
                                  <select id="countryid" name="countryid" required class="form-control col-md-11">
                                    <?php foreach ($countryList as $k) { ?>
                                      <option value="<?php echo $k->countryid ?>" <?php echo ($k->countryid == $key->countryid) ? "selected" : "" ?>><?php echo $k->country_name ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                          <a href="<?php echo site_url(); ?>Prov" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } else {
                  ?>
                    <form method="POST" action="<?php echo base_url(); ?>Prov/add_type">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Daftar Provinsi</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Kode Provinsi:</label>
                                <div class="row">
                                <input type="text" class="form-control col-md-11" name="prov_id" id="prov_id" required>
                              </div>
                              </div>
                               <div class="col-lg-6">
                              <label>Nama Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="prov_name" id="prov_name" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="provinsi" id="provinsi" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Initial Provinsi:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="kd_provinsi" id="kd_provinsi">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Latitude:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="latitude" id="latitude">
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Langitude:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="langitude" id="langitude">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Negara:</label>
                              <div class="row">
                                  <select id="countryid" name="countryid" required class="form-control col-md-11">
                                    <?php foreach ($countryList as $k) { ?>
                                      <option value="<?php echo $k->countryid ?>" ><?php echo $k->country_name ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo site_url(); ?>Prov" class="btn btn-secondary font-weight-bolder">Cancel</a>
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