<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Daftar Gallery Detail</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Daftar Gallery Detail</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Gallery" class="text-muted"> Daftar Gallery Detail</a>
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
                  ?> <form method="POST" action="<?php echo base_url(); ?>Gallery/update_type_detail" enctype="multipart/form-data">
                      <input type="hidden" name="sliderID" id="sliderID" value="<?php echo $req ?>">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Gallery Detail</h3>
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
                                <label>Judul Gallery</label>:
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="imagetitle" id="imagetitle" value="<?php echo $key->imagetitle; ?>" required>
                                  <input type="hidden" class="form-control col-md-11" name="ids" id="ids" value="<?php echo $ids; ?>" required>
                                </div>
                              </div>
                               <div class="col-lg-6">
                              <label>Gambar Gallery:</label>
                              <div class="row">
                                <?php if ($key->imagepath != "") { ?>
                                  <a href="<?php echo base_url() ?>./../images/gallery/detail/<?php echo $key->imagepath ?>" target="_blank">Lihat gambar gallery..</a>
                                <?php } ?>
                                <input type="file" class="form-control col-md-11" name="imagepath" id="imagepath">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <!-- <div class="col-lg-6">
                            <label>Ukuran Gambar:</label>
                              <div class="row">
                              <select id="ukuranGal" name="ukuranGal" class="form-control col-md-11">
                                  
                                    <option value="small" <?php echo ($key->imagesize == "small") ? "selected" : "" ?>>Small</option>
                                    <option value="large" <?php echo ($key->imagesize == "large") ? "selected" : "" ?>>Large</option>
                                  
                                </select>
                              </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                              <label>Urutan</label>:
                              <div class="row">
                                <input type="number" class="form-control col-md-12" name="imageindex" id="imageindex" value="<?php echo $key->imageindex; ?>" required>
                              </div>
                            </div> -->
                          </div>
                          <div class="form-group row">
                          
                            <div class="col-lg-4 checkbox-inline">
                              <label class="checkbox checkbox-primary">
                                <input type="checkbox" name="active" id="active" value="1" <?php echo ($key->visible == 1) ? "checked" : "" ?>>
                                <span>
                                </span>
                                Aktif? 
                              </label>
                            </div>
                          </div>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                          <a href="<?php echo site_url(); ?>Gallery" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } else {
                  ?>
                    <form method="POST" action="<?php echo base_url(); ?>Gallery/add_type_detail" enctype="multipart/form-data">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Daftar Gallery</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Judul Gallery</label>:
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="imagetitle" id="imagetitle" required>
                                  <input type="hidden" class="form-control col-md-11" name="ids" id="ids" value="<?php echo $ids; ?>" required>
                                </div>
                              </div>
                               <div class="col-lg-6">
                              <label>Gambar Gallery:</label>
                              <div class="row">
                                <input type="file" class="form-control col-md-11" name="imagepath" id="imagepath" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                          <!-- <div class="col-lg-6">
                              <label>Ukuran Gambar:</label>
                              <div class="row">
                              <select id="ukuranGal" name="ukuranGal" class="form-control col-md-11">
                                  
                                    <option value="small" >Small</option>
                                    <option value="large" >Large</option>
                                  
                                </select>
                              </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                              <label>Urutan</label>:
                              <div class="row">
                                <input type="number" class="form-control col-md-11" name="imageindex" id="imageindex" required>
                              </div>
                            </div> -->
                          </div>
                          <div class="form-group row">
                            
                            <div class="col-lg-4 checkbox-inline">
                              <label class="checkbox checkbox-primary">
                                <input type="checkbox" name="active" id="active" value="1" checked>
                                <span>
                                </span>
                                Aktif? 
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo site_url(); ?>Gallery" class="btn btn-secondary font-weight-bolder">Cancel</a>
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