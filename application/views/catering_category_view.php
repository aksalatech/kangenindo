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
            <div class="row">
				<div class="col-xs-12 mb_70">
					<h2>CATERING</h2>
					
					<section class="breakfast_menu pt_20 pb_40 form-franchise form-catering">
						<div class="container">
							<form onsubmit="return submitCatering()">
								<div class="row wow fadeInUp mt_80">
									<div class="col-xl-12 m-auto">
										<p>Full Name <span class="mandatory-color">*</span></p>
										<input type="text" id="full_name_cat" name="full_name" required class="form-control">
									</div>
									<div class="col-xl-12 m-auto">
										<p>Email <span class="mandatory-color">*</span></p>
										<input type="email" id="email_cat" name="email" required class="form-control">
									</div>
									<div class="col-xl-12 m-auto">
										<p>Message <span class="mandatory-color">*</span></p>
										<textarea name="message" id="message_cat" required cols="30" rows="5"></textarea>
									</div>
									<div class="col-xl-12">
										<button type="submit" class="btn-submit" style="margin-left: 0">SUBMIT</button>
									</div>
									
								</div>
							</form>
						</div>
					</section>
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