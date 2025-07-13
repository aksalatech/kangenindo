<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Change Password</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>
<body id="bd-changepass" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                      <a href="<?php echo base_url(); ?>Home" class="text-muted">Profile</a>
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
                    <form class="form" action="<?php echo base_url() ?>home/submitpass" method="post">
                      <!--begin::Card-->
                      <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                          <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                          </div>
                          <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                          </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="form">
                          <div class="card-body">
                            <!--begin::Alert-->
                            <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                              <div class="alert-icon">
                                <span class="svg-icon svg-icon-3x svg-icon-danger">
                                  <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect x="0" y="0" width="24" height="24" />
                                      <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                      <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                      <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                    </g>
                                  </svg>
                                  <!--end::Svg Icon-->
                                </span>
                              </div>
                              <?php if (isset($err)) { ?>
                                <div class="alert-text font-weight-bold"><?php echo $err; ?></div>
                                <div class="alert-close">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                      <i class="ki ki-close"></i>
                                    </span>
                                  </button>
                                </div>
                              <?php } else { ?>
                              <div class="alert-text font-weight-bold">Ubah password anda secara berkala</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                              <?php } ?>
                            </div>
                            <!--end::Alert-->
                            <div class="form-group row">
                              <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                              <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid mb-2" name="oldpass" id="oldpass" placeholder="Current password" required/>
                                <!-- <a href="#" class="text-sm font-weight-bold">Forgot password ?</a> -->
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                              <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid" name="newpass" id="newpass" placeholder="New password" required/>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                              <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid" name="confirm" id="confirm" placeholder="Verify password" required/>
                              </div>
                            </div>
                          </div>
                        </form>
                        <!--end::Form-->
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
