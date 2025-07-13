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
		<section class="breakfast_menu mt_120 xs_mt_100">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<h1 class="title-h1-franchise">Contact Us</h1>
						</div>
						<div class="contact_map">
							<iframe
							src="<?php echo $contact->location; ?>"
							width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="faq_area pt_95 xs_pt_700">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-6">
						<div class="mb_25 text-left">
							<h2 class="contact-title">LITTLE INDO TOWN</h2>
						</div>
					</div>
					<div class="col-xl-6 m-auto">
						<div class="contact_info">
							<div class="icon">
								<img src="<?php echo base_url(); ?>images/location_2.png" alt="location" class="img-fluid w-100">
							</div>
							<div class="text">
								<p><?php echo $contact->address; ?></p>
							</div>
						</div>
						<div class="contact_info">
							<div class="icon">
								<img src="<?php echo base_url(); ?>images/call_icon_3.png" alt="call" class="img-fluid w-100">
							</div>
							<div class="text">
								<a href="callto:<?php echo $contact->mp1; ?>"><?php echo $contact->mp1; ?></a>
							</div>
						</div>
						<div class="contact_info">
							<div class="icon">
								<img src="<?php echo base_url(); ?>images/mail_icon.png" alt="mail" class="img-fluid w-100">
							</div>
							<div class="text">
								<a href="mailto:<?php echo $contact->email; ?>"><?php echo $contact->email; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu mt_120 xs_mt_100">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25 row-contact-left">
							<h1 class="title-h1-contact-left">GENERAL ENQUIRY FORM</h1>
							<p class="subtitle-franchise">For any events related enquiries, please contact our <a href="#">events team</a>.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu pt_20 pb_40 form-franchise">
			<div class="container">
				<form onsubmit="return submitContact()">
					<div class="row wow fadeInUp mt_80">
						<div class="col-xl-6 m-auto">
							<p>Name <span class="mandatory-color">*</span></p>
							<input type="text" id="first_name" name="first_name" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Choose Brand <span class="mandatory-color">*</span></p>
							<select name="brand" id="brand" required class="form-control">
								<option value="">Please Select</option>
								<option value="Bintang Bro">Bintang Bro</option>
								<option value="Urban Durian">Urban Durian</option>
								<option value="Teguk">Teguk</option>
							</select>
						</div>
						<!-- <div class="col-xl-6 m-auto">
							<p>First Name <span class="mandatory-color">*</span></p>
							<input type="text" id="first_name" name="first_name" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Last Name <span class="mandatory-color">*</span></p>
							<input type="text" id="last_name" name="last_name" required class="form-control">
						</div> -->
						<div class="col-xl-6 m-auto">
							<p>Email <span class="mandatory-color">*</span></p>
							<input type="email" id="email" required name="email" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Phone Number <span class="mandatory-color">*</span></p>
							<input type="text" id="phone" required name="phone" class="form-control">
						</div>
						<!-- <div class="col-xl-6 m-auto">
							<p>State <span class="mandatory-color">*</span></p>
							<input type="text" id="state" name="state" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Post Code <span class="mandatory-color">*</span></p>
							<input type="text" id="zip" name="zip" required class="form-control">
						</div> -->
						<div class="col-xl-12 m-auto">
							<p>Enquiry Type <span class="mandatory-color">*</span></p>
							<select class="form-control" id="enquiry" name="enquiry" required>
								<option value="">Please Select</option>
								<option value="Ask Question">Ask Question</option>
								<option value="Send Feedback">Send Feedback</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>Message</p>
							<textarea name="message" id="message" cols="30" rows="5"></textarea>
						</div>
						<div class="col-xl-12">
							<p>Check the boxes below to subscribe to Little Indo Town email updates — be the first to know and gain access to exclusive deals!</p>
							<input class="checkbox-form chkbrand" type="checkbox" name="exclusive_brand" id="bintang_bro" value="Bintang Bro">
							<label for="saving">Bintang Bro</label><br>
							<input class="checkbox-form chkbrand" type="checkbox" name="exclusive_brand" id="urban_durian" value="Urban Durian">
							<label for="Liquid Assets">Urban Durian</label><br>
							<input class="checkbox-form chkbrand" type="checkbox" name="exclusive_brand" id="teguk" value="Teguk">
							<label for="Bank Loan">Teguk</label><br>
						</div>
						<div class="col-xl-7" style="margin-top: 30px">
							<p>
								By submitting this form with the above boxes checked, you are consenting to receiving marketing communications from Little Indo Town. 
								Little Indo Town  will only use your contact information to contact you about our products and services. You may unsubscribe from these 
								communications at any time. For information on how to unsubscribe, as well as our privacy practices and commitment to protecting your privacy, 
								please review our Privacy Policy.
							</p>
						</div>
						<div class="col-xl-12">
							<button type="submit" id="btn-submit-contact" class="btn-submit" href="#" style="margin-left: 0">SUBMIT</a>
						</div>
						
					</div>
				</form>
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