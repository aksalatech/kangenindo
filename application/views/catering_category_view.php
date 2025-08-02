<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<?php include("include/meta.php"); ?>
		
		<title><?php echo $config->title; ?></title>
		<!-- styles-->

		<?php include("include/include_css.php"); ?>

	</head>
	<body class="home_2 catering">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==================================
			HOME 2 ADD BANNER AREA START
		===================================-->
		<!--==========================
        BREADCRUMB AREA START
    ===========================-->
    <section class="breadcrumb_area" style="background: url(<?php echo base_url();?>images/banner/banner-catering.png);">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>&nbsp;</h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        BREADCRUMB AREA END
    ===========================-->


    <!--==========================
        MENU STYLE 03 START
    ===========================-->
    <section class="menu_grid_view mt_120 xs_mt_100 mb_70">
        <div class="container">
            <div class="row justify-content-center">
				<div class="col-md-8 mb_70">
					<!-- <h2>CATERING</h2> -->
					<img src="<?php echo base_url(); ?>images/catering-title.png" alt="catering" class="" style="height: auto !important">
					<p class="description-about text-center" style="font-size: 20px; font-weight: 400">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					<div class="section-contact-form">
						<form class="form-contact mx-auto" onsubmit="return submitContact()">
							<div class="row wow fadeInUp mt_40">
								<div class="col-xl-6 m-auto">
									<p>First Name <span class="mandatory-color">*</span></p>
									<input type="text" id="first_name" name="first_name" required class="form-control">
								</div>
								<div class="col-xl-6 m-auto">
									<p>Last Name <span class="mandatory-color">*</span></p>
									<input type="text" id="first_name" name="first_name" required class="form-control">
								</div>
								<div class="col-xl-6 m-auto">
									<p>Email <span class="mandatory-color">*</span></p>
									<input type="email" id="email" required name="email" class="form-control">
								</div>
								<div class="col-xl-6 m-auto">
									<p>Phone Number <span class="mandatory-color">*</span></p>
									<input type="text" id="phone" required name="phone" class="form-control">
								</div>

								<div class="col-xl-12 m-auto">
									<p>Message</p>
									<textarea name="message" id="message" cols="30" rows="5"></textarea>
								</div>
								<div class="col-xl-12">
									<button type="submit" id="btn-submit-contact" class="btn-submit" href="#" style="margin-left: 0">SEND</a>
								</div>
								
							</div>
						</form>
					</div>
				</div>
                
            </div>
        </div>
    </section>
		<!--==================================
			HOME 2 ADD BANNER AREA END
		===================================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/success_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>
<script type="text/javascript" src="<?php echo base_url() ?>js2/catering.js"></script>