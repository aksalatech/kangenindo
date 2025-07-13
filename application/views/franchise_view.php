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

		<section class="breakfast_menu mt_120 xs_mt_150">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<h1 class="title-h1-contact">READY <span>TO BE YOUR <br>OWN <b>BOSS</b></span></h1>
							<p class="subtitle-franchise" style="text-align: center">
							Want to be a part of our
							team? Join our partnership
							program and benefit from
							business development in new
							locations. Let's discuss your
							interests and get your
							recommendations for the
							best locations to expand
							Little Indo Town! 
							<br>
							<br>
							For more
							info, contact us at
							Hello@littleindotown.com.au.
							</p>
							<div class="row row-img-contact">
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/about1.png" class="img-wid-auto">
								</div>
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/about2.png" class="img-wid-auto">
								</div>
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/about3.png" class="img-wid-auto">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu pt_20 pb_40 form-franchise">
			<div class="container">
				<form onsubmit="return submitFranchise()">
					<div class="row wow fadeInUp mt_80">
						<div class="col-xl-6 m-auto">
							<p>Choose Brand <span class="mandatory-color">*</span></p>
							<select name="brand" id="brand" required class="form-control">
								<option value="">Please Select</option>
								<option value="Bintang Bro">Bintang Bro</option>
								<option value="Urban Durian">Urban Durian</option>
								<option value="Teguk">Teguk</option>
							</select>
						</div>
						<div class="col-xl-6 m-auto">
						</div>
						<div class="col-xl-6 m-auto">
							<p>First Name <span class="mandatory-color">*</span></p>
							<input type="text" id="first_name" name="first_name" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Last Name <span class="mandatory-color">*</span></p>
							<input type="text" id="last_name" name="last_name" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Email <span class="mandatory-color">*</span></p>
							<input type="email" id="email" name="email" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Phone Number <span class="mandatory-color">*</span></p>
							<input type="text" id="phone" name="phone" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>State <span class="mandatory-color">*</span></p>
							<input type="text" id="state" name="state" required class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Post Code <span class="mandatory-color">*</span></p>
							<input type="text" id="zip" name="zip" required class="form-control">
						</div>
						<div class="col-xl-12 m-auto">
							<p>How far are you willing to travel to your Bintang Bro store? <span class="mandatory-color">*</span></p>
							<select class="form-control" required id="willing_travel" name="willing_travel">
								<option value="">Please Select</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>Will you be the full time operator? <span class="mandatory-color">*</span></p>
							<select class="form-control" required id="fulltime_operator" name="fulltime_operator">
								<option value="">Please Select</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
						<div class="col-xl-12">
							<p>How would you find the investment? <span class="mandatory-color">*</span></p>
							<input class="checkbox-form investment" type="checkbox" name="investmant" id="saving" value="saving">
							<label for="saving">Saving</label><br>
							<input class="checkbox-form investment" type="checkbox" name="investmant" id="Liquid Assets" value="Liquid Assets">
							<label for="Liquid Assets">Liquid Assets</label><br>
							<input class="checkbox-form investment" type="checkbox" name="investmant" id="Bank Loan" value="Bank Loan">
							<label for="Bank Loan">Bank Loan</label><br>
							<input class="checkbox-form investment" type="checkbox" name="investmant" id="Partnership" value="Partnership">
							<label for="Partnership">Partnership</label><br>
						</div>
						<div class="col-xl-12 m-auto">
							<p>How much liquid assets do you currently have? <span class="mandatory-color">*</span></p>
							<select class="form-control" id="liquid_assets" name="liquid_assets">
								<option value="">Please Select</option>
								<option value="Less than $150,000">Less than $150,000</option>
								<option value="$150,000 - $299,000">$150,000 - $299,000</option>
								<option value="$300,000 - $450,000">$300,000 - $450,000</option>
								<option value="Over $450,000">Over $450,000</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>How did you find us? <span class="mandatory-color">*</span></p>
							<select class="form-control" id="where_find" name="where_find">
								<option value="Google">Google</option>
								<option value="SEEK Business">SEEK Business</option>
								<option value="Facebook/Instagram">Facebook/Instagram</option>
								<option value="LinkedIn">LinkedIn</option>
								<option value="Word of mouth">Word of mouth</option>
								<option value="Direct Store">Direct Store</option>
								<option value="Referral">Referral</option>
								<option value="I currently work at restaurant of Little Indo Town">I currently work at restaurant of Little Indo Town</option>
								<option value="Eden Exchange">Eden Exchange</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>Message</p>
							<textarea name="message" id="message" cols="30" rows="5"></textarea>
						</div>
						<button type="submit" class="btn-submit">SUBMIT</button>
					</div>
				</form>
			</div>
		</section>


		<!--==========================
			MENU STYLE 02 END
		===========================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/success_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>
<script type="text/javascript" src="<?php echo base_url() ?>js2/franchise.js"></script>