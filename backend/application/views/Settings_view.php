<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Daftar Slider</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Pengaturan</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Settings" class="text-muted"> Pengaturan</a>
                  </li>
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          <!--end::Subheader-->
          <form action="<?php echo base_url() ?>Settings/update_settings" enctype="multipart/form-data" method="post">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">

              <!--begin::Container-->
              <div class="container">
                <div class="card card-custom">
                  <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                      <h3 class="card-label">Pengaturan Website
                    </div>
                    <div class="card-toolbar">

                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tabPengaturan1">
                          <span class="nav-icon">
                            <i class="flaticon2-chat-1"></i>
                          </span>
                          <span class="nav-text">Header</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile">
                          <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                          </span>
                          <span class="nav-text">About</span>
                        </a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="ketum-tab" data-toggle="tab" href="#ketum" aria-controls="ketum">
                          <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                          </span>
                          <span class="nav-text">About Ketua Umum</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="fahutan-tab" data-toggle="tab" href="#fahutan" aria-controls="fahutan">
                          <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                          </span>
                          <span class="nav-text">About Fakultas</span>
                        </a>
                      </li> -->
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" aria-controls="contact">
                          <span class="nav-icon">
                            <i class="flaticon2-rocket-1"></i>
                          </span>
                          <span class="nav-text">Contact</span>
                        </a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="kebijakan-tab" data-toggle="tab" href="#kebijakan" aria-controls="kebijakan">
                          <span class="nav-icon">
                            <i class="flaticon2-rocket-1"></i>
                          </span>
                          <span class="nav-text">Kebijakan</span>
                        </a>
                      </li> -->
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                      <div class="tab-pane fade show active" id="tabPengaturan1" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Judul Website</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="title" id="title" value="<?php echo $configList->title; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Gambar Logo:</label>
                            <div class="row">
                              <?php if ($configList->logo_dark != "") { ?>
                                <a href="<?php echo base_url() ?>./../images/logo/<?php echo $configList->logo_dark ?>" target="_blank">Lihat gambar logo..</a>
                              <?php } ?>
                              <input type="file" class="form-control col-md-11" name="logo_dark" id="logo_dark">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Gambar Favicon:</label>
                            <div class="row">
                              <?php if ($configList->favicon != "") { ?>
                                <a href="<?php echo base_url() ?>./../images/logo/<?php echo $configList->favicon ?>" target="_blank">Lihat gambar favicon..</a>
                              <?php } ?>
                              <input type="file" class="form-control col-md-11" name="favicon" id="favicon">
                            </div>
                          </div>
                          <!-- <div class="col-lg-6">
                            <label>Judul Form Absensi</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->att_type; ?>">
                            </div>
                          </div> -->
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Keywords</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->keywords; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Description</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->description; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Team Text</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->team_text; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Twitter Link</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->twitter_link; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Google Link</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->google_link; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Linkedin Link</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->linkedin_link; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Web Link</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="att_type" id="att_type" value="<?php echo $configList->web_link; ?>">
                            </div>
                          </div>
                          
                        </div>
                      </div>

                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Title Text:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="quote_text" id="quote_text"><?php echo $about->quote_text; ?></textarea>
                            </div>
                          </div>
                          <!-- <div class="col-lg-6">
                            <label>About Text 2:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="simple_quote" id="simple_quote"><?php echo $about->simple_quote; ?></textarea>
                            </div>
                          </div> -->
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label>About Text 2:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="simple_quote" id="simple_quote" rows="9" cols="50"><?php echo $about->simple_quote; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="form-group row">
                          <div class="col-lg-6">
                            <label>About Text 3:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="content" id="content"><?php echo $about->content; ?></textarea>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Sejarah Singkat:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="sejarah_singkat" id="sejarah_singkat"><?php echo $about->quote_text2; ?></textarea>
                            </div>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Gambar About 1:</label>
                            <div class="row">
                              <?php if ($about->picture != "") { ?>
                                <a href="<?php echo base_url() ?>./../images/about/<?php echo $about->picture ?>" target="_blank">Lihat gambar..</a>
                              <?php } ?>
                              <input type="file" class="form-control col-md-11" name="picture" id="picture">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Gambar About 2:</label>
                            <div class="row">
                              <?php if ($about->picture2 != "") { ?>
                                <a href="<?php echo base_url() ?>./../images/about/<?php echo $about->picture2 ?>" target="_blank">Lihat gambar..</a>
                              <?php } ?>
                              <input type="file" class="form-control col-md-11" name="picture2" id="picture2">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">

                          
                          <div class="col-lg-6">
                            <label>Gambar About 3:</label>
                            <div class="row">
                              <?php if ($about->picture3 != "") { ?>
                                <a href="<?php echo base_url() ?>./../images/about/<?php echo $about->picture3 ?>" target="_blank">Lihat gambar..</a>
                              <?php } ?>
                              <input type="file" class="form-control col-md-11" name="picture3" id="picture3">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="tab-pane fade" id="ketum" role="tabpanel" aria-labelledby="ketum-tab">
                         <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Name:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="name" id="name"><?php echo $ketum->name; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Title:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="title_ketum" id="title_ketum"><?php echo $ketum->title; ?></textarea>
                              </div>
                            </div>
                         </div>
                         <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Simple Quote:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="simple_quote_ketum" id="simple_quote_ketum"><?php echo $ketum->simple_quote; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Content:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="content_ketum" id="content_ketum"><?php echo $ketum->content; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Foto Ketua Umum:</label>
                              <div class="row">
                                <?php if ($ketum->picture != "") { ?>
                                  <a href="<?php echo base_url() ?>./../images/about/<?php echo $ketum->picture ?>" target="_blank">Lihat gambar..</a>
                                <?php } ?>
                                <input type="file" class="form-control col-md-11" name="picture_ketum" id="picture_ketum">
                              </div>
                            </div>
                         </div>
                      </div> -->

                      <!-- <div class="tab-pane fade" id="fahutan" role="tabpanel" aria-labelledby="fahutan-tab">
                         <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Judul Sejarah:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="title_sejarah" id="title_sejarah"><?php echo $fahutan->title_sejarah; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Text Sejarah:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="text_sejarah" id="text_sejarah"><?php echo $fahutan->text_sejarah; ?></textarea>
                              </div>
                            </div>
                         </div>
                         <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Title Program:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="title_program" id="title_program"><?php echo $fahutan->title_program; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Text Program:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="text_program" id="text_program"><?php echo $fahutan->text_program; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>List Sarjana:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="list_sarjana" id="list_sarjana"><?php echo $fahutan->list_sarjana; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>List Magister:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="list_magister" id="list_magister"><?php echo $fahutan->list_magister; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>List Doktor:</label>
                              <div class="row">
                                <textarea class="form-control col-md-11" name="list_doktor" id="list_doktor"><?php echo $fahutan->list_doktor; ?></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Gambar Sejarah:</label>
                              <div class="row">
                                <?php if ($fahutan->picture_sejarah != "") { ?>
                                  <a href="<?php echo base_url() ?>./../images/about/<?php echo $fahutan->picture_sejarah ?>" target="_blank">Lihat gambar..</a>
                                <?php } ?>
                                <input type="file" class="form-control col-md-11" name="picture_sejarah" id="picture_sejarah">
                              </div>
                            </div>
                          </div>
                      </div> -->

                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Contact Email 1</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="email" id="email" value="<?php echo $contact->email; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Open Hours</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="email2" id="email2" value="<?php echo $contact->open_hours; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Contact Message</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="contactmsg" id="contactmsg" value="<?php echo $contact->contactmsg; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Contact Phone</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="mp1" id="mp1" value="<?php echo $contact->mp1; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Location</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="location" id="location" value="<?php echo $contact->location; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Contact Whatsapp</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="whatsapp" id="whatsapp" value="<?php echo $contact->whatsapp; ?>">
                            </div>
                          </div>
                        </div>
                       <!--  <div class="form-group row">
                          <div class="col-lg-6">
                            <label>Langitude</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="langitude" id="langitude" value="<?php echo $contact->langitude; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label>Latitude</label>:
                            <div class="row">
                              <input type="text" class="form-control col-md-11" name="latitude" id="latitude" value="<?php echo $contact->latitude; ?>">
                            </div>
                          </div>
                        </div> -->
                      </div>

                      <div class="tab-pane fade" id="kebijakan" role="tabpanel" aria-labelledby="kebijakan-tab">
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label>Judul Sejarah:</label>
                            <div class="row">
                              <textarea class="form-control col-md-11" name="kebijakantext" id="kebijakantext"><?php echo $about->kebijakan_text; ?></textarea>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                    <a href="<?php echo site_url(); ?>" class="btn btn-secondary font-weight-bolder">Cancel</a>
                  </div>
                </div>
              </div>
              <!--end::Content-->

            </div>
            <!--end::Wrapper-->
          </form>
        </div>
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/slider.js"></script>

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>

</html>