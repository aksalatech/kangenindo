<!DOCTYPE html>
<html>
<head>
  <title><?php echo APP_NAME; ?> | Profile</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>
<body id="bd-profile" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                  <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">My Profile Information</h5>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0)" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="<?php echo base_url(); ?>Profile" class="text-muted">Profile</a>
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
								<!--begin::Profile Personal Information-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
										<!--begin::Profile Card-->
										<div class="card card-custom card-stretch">
                      <?php include("includes/profile-navigation.php"); ?>
										</div>
										<!--end::Profile Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
                    <!--begin::Form-->
                    <form class="form" action="<?php echo base_url() ?>home/save_profile" method="post" enctype="multipart/form-data">
                      <!--begin::Card-->
                      <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                          <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                          </div>
                          <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                            <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                          </div>
                        </div>
                        <!--end::Header-->
                      
                        <!--begin::Body-->
                        <div class="card-body">
                          <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                              <h5 class="font-weight-bold mb-6">Update Information</h5>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Profil</label>
                            <div class="col-lg-9 col-xl-6">
                              <input class="form-control form-control-lg" type="text" name="name" id="name" value="<?php echo $user->employee_name ?>" required/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Lembaga</label>
                            <div class="col-lg-9 col-xl-6">
                              <input class="form-control form-control-lg form-control-solid" type="text" readonly name="nama_lembaga" id="penanggungjawab" class="form-control" value="<?php
                              echo $user->position; ?>" />
                              <span class="form-text text-muted">Lembaga tidak dapat dirubah.</span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                            <div class="col-lg-9 col-xl-6">
                              <input class="form-control form-control-lg form-control-solid" type="text" readonly name="username" id="username" class="form-control" value="<?php echo $user->username ?>" />
                              <span class="form-text text-muted">username tidak dapat dirubah.</span>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                              <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">No Telepon</label>
                            <div class="col-lg-9 col-xl-6">
                              <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control form-control-lg" name="notelp" id="notelp" class="form-control" value="<?php echo $user->phone ?>"/>
                              </div>
                              <span class="form-text text-muted">Kami tidak akan pernah membagikan email anda dengan orang lain.</span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                            <div class="col-lg-9 col-xl-6">
                              <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-at"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control form-control-lg" name="email" id="email" class="form-control" value="<?php echo $user->email ?>"/>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>
                            <div class="col-lg-9 col-xl-6">
                              <div class="input-group input-group-lg">
                                <textarea class="form-control form-control-lg" id="alamat" name="alamat"><?php echo $user->address ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--end::Body-->
                      </div>
                    </form>
											<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Personal Information-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
          </div>
          <!--end::Content-->
        <?php include("includes/footer.php"); ?>
      
      </div>
			<!--end::Wrapper-->
    </div>
  </div>
  <!--begin::Page Scripts(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/custom/profile/profile.js"></script>
</body>
</html>
