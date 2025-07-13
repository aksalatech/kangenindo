<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
		<title>Login Page | <?php echo APP_NAME ?></title>
    	<?php include "includes/include_js_css_new.php"; ?>
	</head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body" style="background-color:#222222"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >       
    	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
	<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/metronic/theme/html/demo1/dist/assets/media/bg/bg-2.jpg);">
		<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
			<!--begin::Login Header-->
			<div class="d-flex flex-center mb-15">
				<a href="#">
					<img src="<?php echo base_url();?>dist/img/indotown/Frame.png" class="" alt=""/>
				</a>
			</div>
			<!--end::Login Header-->

			<!--begin::Login Sign in form-->
			<div class="login-signin">
				<div class="mb-20">
					<h3 class="opacity-40 font-weight-normal">Sign In To Admin</h3>
					<p class="opacity-40">Enter your details to login to your account:</p>
				</div>
				<?php

					if (isset($err)) {
				?>
					<h3 style="color:red"><?php echo $err ?></h3>
				<?php
					}

				?>
				<form class="form" id="kt_login_signin_form" action="<?php echo base_url() ?>Login/confirm" method="post">
					<div class="form-group">
						<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Username" name="username" autocomplete="off"/>
					</div>
					<div class="form-group">
						<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password"/>
					</div>
					<!--end::Form group-->
					<p><?php echo $captcha ?></p>
					<div class="form-group has-feedback">
						<input type="text" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" name="captcha" id="captcha" placeholder="Captcha">
						<span class="fa fa-pencil form-control-feedback"></span>
					</div>
					<div class="form-group text-center mt-10">
						<button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
					</div>
				</form>
			</div>
			<!--end::Login Sign in form-->
		</div>
	</div>
</div>
<!--end::Login-->
	</div>
<!--end::Main-->

        
        <script>var HOST_URL = "/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->
            </body>
    <!--end::Body-->
</html>
