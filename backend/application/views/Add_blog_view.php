<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Daftar Blog</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Daftar Blog</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Blog" class="text-muted"> Daftar Blog</a>
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
                  ?> <form method="POST" action="<?php echo base_url(); ?>Blog/update_type" enctype="multipart/form-data">
                      <input type="hidden" name="blogID" id="blogID" value="<?php echo $req; ?>">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Blog</h3>
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
                            <div class="card-body">
                              <div class="form-group row">
                                  <div class="col-lg-6">
                                    <label>Judul Blog</label>:
                                    <input type="text" class="form-control" name="blog_title" id="blog_title" value="<?php echo $key->title; ?>" required>
                                  </div>
                                  <div class="col-lg-6">
                                    <label>Deskripsi Singkat</label>:
                                    <textarea class="form-control" name="blog_subtitle" id="blog_subtitle"><?php echo $key->subtitle; ?></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <!-- <div class="col-lg-6">
                                    <label>Gambar Thumbnail</label>:
                                    <?php if ($key->thumbnail != "") { ?>
                                      <a href="<?php echo base_url() ?>./../images/blog/<?php echo $key->thumbnail ?>" target="_blank">Lihat Thumbnail..</a>
                                    <?php } ?>

                                    <b style="color: red;">*Maksimal Ukuran Gambar 300*200</b>
                                    <input type="file" class="form-control" name="image_thumbnail" id="image_thumbnail">
                                  </div> -->
                                  <div class="col-lg-6">
                                    <label>Gambar Blog</label>:
                                    <?php if ($key->image != "") { ?>
                                      <a href="<?php echo base_url() ?>./../images/blog/<?php echo $key->image ?>" target="_blank">Lihat Gambar..</a>
                                    <?php } ?>
                                    <input type="file" class="form-control" name="image_blog" id="image_blog">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <!-- <div class="col-lg-6">
                                  <label>Kategori:</label>
                                  <select class="form-control" name="blog_kategori" id="blog_kategori">
                                    <option value="1">DPP HA-E IPB</option>
                                    <option value="2">Komda</option>
                                    <option value="3">Angkatan</option>
                                  </select>
                                </div> -->
                                <!-- <div class="col-lg-3">
                                  <label>Urutan</label>:
                                  <input type="number" class="form-control" name="imageindex" id="imageindex" value="<?php echo $key->seq_no; ?>" required>
                                </div> -->
                                <div class="col-lg-3 checkbox-inline">
                                  <label class="checkbox checkbox-primary">
                                    <input type="checkbox" name="active" id="active" value="1" <?php echo ($key->visible == 1) ? "checked" : "" ?>>
                                    <span>
                                    </span>
                                    Aktif? 
                                  </label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-lg-12">
                                  <label>Konten</label>:
                                  <textarea name="kt-kontenEditor" id="kt-kontenEditor">
                                    <?php echo $key->blog_text; ?>
                                  </textarea>
                                </div>
                              </div>
                            </div>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                          <a href="<?php echo site_url(); ?>Blog" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } else {
                  ?>
                    <form method="POST" action="<?php echo base_url(); ?>Blog/add_type" enctype="multipart/form-data">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Blog</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Judul Blog</label>:
                                <input type="text" class="form-control" name="blog_title" id="blog_title" required>
                              </div>
                              <div class="col-lg-6">
                                <label>Deskripsi Singkat</label>:
                                <textarea class="form-control" name="blog_subtitle" id="blog_subtitle"></textarea>
                              </div>
                          </div>
                          <div class="form-group row">
                              <!-- <div class="col-lg-6">
                                <label>Gambar Thumbnail</label>: <b style="color: red;">*Maksimal Ukuran Gambar 300*200</b>
                                <input type="file" class="form-control" name="image_thumbnail" id="image_thumbnail" required>
                              </div> -->
                              <div class="col-lg-6">
                                <label>Gambar Blog</label>:
                                <input type="file" class="form-control" name="image_blog" id="image_blog">
                              </div>
                          </div>
                          <div class="form-group row">
                            <!-- <div class="col-lg-6">
                              <label>Kategori:</label>
                              <select class="form-control" name="blog_kategori" id="blog_kategori">
                                <option value="1">DPP HA-E IPB</option>
                                <option value="2">Komda</option>
                                <option value="3">Angkatan</option>
                              </select>
                            </div> -->
                            <!-- <div class="col-lg-3">
                              <label>Urutan</label>:
                              <input type="number" class="form-control" name="imageindex" id="imageindex" required>
                            </div> -->
                            <div class="col-lg-3 checkbox-inline">
                              <label class="checkbox checkbox-primary">
                                <input type="checkbox" name="active" id="active" value="1" checked>
                                <span>
                                </span>
                                Aktif? 
                              </label>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <label>Konten</label>:
                              <textarea name="kt-kontenEditor" id="kt-kontenEditor"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo site_url(); ?>Blog" class="btn btn-secondary font-weight-bolder">Cancel</a>
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

    <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
		<script src="<?php echo base_url(); ?>dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
    <script src="<?php echo base_url(); ?>plugins/ckfinder/ckfinder.js"></script>

</body>
</html>

<script>
  var KTCkeditor = function () {

  var kontenEditor = function () {
      ClassicEditor
          .create( document.querySelector( '#kt-kontenEditor' ), {
            ckfinder: {
                uploadUrl: '<?php echo base_url(); ?>plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            }
          })
          .then( editor => {
              console.log( editor );
          })
          .catch( error => {
              console.error( error );
          });
  }

    return {
        // public functions
        init: function() {
          kontenEditor();
        }
    };
  }();
</script>