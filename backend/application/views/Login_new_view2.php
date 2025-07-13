<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Log in</title>
  <?php include "includes/include_js_css_new.php"; ?>
  <link href="<?php echo base_url(); ?>dist/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />

</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
    <div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
					<!--begin: Aside Container-->
					<div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
						<!--begin::Logo-->
						
						<!--end::Logo-->
						<!--begin::Aside body-->
						<div class="d-flex flex-column-fluid flex-column flex-center">
							<!--begin::Signin-->
							<div class="login-form login-signin py-11">
								<!--begin::Form-->
								<form class="form form-login-general" novalidate="novalidate" action="<?php echo base_url() ?>Login/confirm" method="post">
									<!--begin::Title-->

									<div class="text-center pb-8">
										<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Selamat Datang di HAE IPB Dashboard </h3>
										<span class="text-muted font-weight-bold font-size-h4">Silahkan Memasukkan 
										<a href="javascript:void(0);" class="text-primary font-weight-bolder">Username &amp; Password</a></span>
									</div>
									<?php

										if (isset($err)) {
									?>
										<h3 style="color:red"><?php echo $err ?></h3>
									<?php
										}

									?>
									<!--end::Title-->
									<!--begin::Form group-->
									<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Username</label>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="username" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
											<!-- <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a> -->
										</div>
										<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
									</div>
									<!--end::Form group-->
									<p><?php echo $captcha ?></p>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha">
										<span class="fa fa-pencil form-control-feedback"></span>
									</div>
									<!-- <span class="la-pull-right text-muted font-weight-bold font-size-h4">
										<a href="<?php echo base_url() ?>login/forgot" class="text-primary font-weight-bolder">Lupa Password</a>
									</span> -->
									<!--begin::Action-->
									<div class="pb-lg-0 pb-5">
										<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
										
									</div>
									<!--end::Action-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signin-->
						</div>
						<!--end::Aside body-->
					</div>
					<!--end: Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0">
					<!--begin::Title-->
					
					<div class="d-flex flex-column justify-content-center text-center pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
						<a href="javascript:void(0)" class="text-center">
							<img src="<?php echo base_url();?>dist/img/logo.png" class="max-h-70px" alt="" />
						</a>
						<h3 class="display4 font-weight-bolder my-7" style="font-size:2.2rem !important">Himpunan Alumni Fakultas Kehutanan &amp; Lingkungan
						<br />IPB University</h3>
					</div>
					<!--end::Title-->
					<!--begin::Image-->
					<div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-size:cover;background-image: url(<?php echo base_url();?>dist/img/picture3.png);"></div>
					<!--end::Image-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo base_url();?>dist/assets/js/pages/custom/login/login-general.js"></script>
		<!--end::Page Scripts-->
</body>
</html>
