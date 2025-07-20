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
	<body class="home_2">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_120 xs_mt_100 section-map-contact">
			<div class="container-fluid ">
				<div class="row wow fadeInUp">
					<div class="col-md-6 col-sm-12 col-xs-12 m-auto">
						<div class="contact_map">
							<iframe
							src="<?php echo $contact->location; ?>"
							width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 m-auto">
						<h2 class="contact-title text-center">Your direct line with us</h2>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="contact_info">
									<div class="icon">
										<img src="<?php echo base_url(); ?>images/contact_map.png" alt="location" class="img-fluid w-100">
									</div>
									<div class="text">
										<h5>Position:</h5>
										<p><?php echo $contact->address; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="contact_info">
									<div class="icon">
										<img src="<?php echo base_url(); ?>images/contact_hours.png" alt="call" class="img-fluid w-100">
									</div>
									<div class="text">
										<h5>Open Hours:</h5>
										<p><?php echo $contact->open_hours; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="contact_info">
									<div class="icon">
										<img src="<?php echo base_url(); ?>images/contact_phone.png" alt="call" class="img-fluid w-100">
									</div>
									<div class="text">
										<h5>Contact:</h5>
										<a href="callto:<?php echo $contact->mp1; ?>"><?php echo $contact->mp1; ?></a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="contact_info">
									<div class="icon">
										<img src="<?php echo base_url(); ?>images/contact_email.png" alt="mail" class="img-fluid w-100">
									</div>
									<div class="text">
										<h5>Write us:</h5>
										<a href="mailto:<?php echo $contact->email; ?>"><?php echo $contact->email; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu mt_120 xs_mt_100 section-contact-form mx-auto">
			<div class="container">
				<div class="row wow fadeInUp box-contact-title mx-auto">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25 row-contact-left" style="position: relative">
							<img src="<?php echo base_url(); ?>images/contact_form1.png" alt="" class="img-contact-left">
							<h1 class="title taste-logo mb_40"><span class="highlight">LETS TASTED</span> AND TALK</h1>
							<p class="description-about text-center" style="font-size: 20px; font-weight: 400">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<img src="<?php echo base_url(); ?>images/contact_form2.png" alt="" class="img-contact-right">
						</div>
					</div>
				</div>
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
		</section>

		<section class="breakfast_menu pt_20 pb_40 form-franchise">
			<div class="container">
				
			</div>
		</section>


		<!--==========================
			MENU STYLE 02 END
		===========================-->

		<?php include("include/footer.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
		<?php include("include/success_modal.php"); ?>
    </body>
</html>
<script type="text/javascript" src="<?php echo base_url() ?>js2/contact.js"></script>