<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <?php include "include/meta.php" ?>

        <title><?php echo $config->title; ?></title>
        <!-- Favicone Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>image/<?php echo $config->favicon; ?>" />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>image/<?php echo $config->favicon; ?>" />
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>image/<?php echo $config->favicon; ?>" />

        <!--Font Awesome css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/font-awesome.min.css">

        <!--Bootstrap css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/bootstrap.css">

        <!--Owl Carousel css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/owl.theme.default.min.css">

        <!--Magnific Popup css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/magnific-popup.css">

        <!-- Cropper -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugin/cropper-plugin/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugin/cropper-plugin/css/tether.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugin/cropper-plugin/dist/cropper.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugin/cropper-plugin/css/main.css">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900%7cOpen+Sans:400,600,700,800" rel="stylesheet">

        <!--Site Main Style css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style-admin.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css2/style.css">

        <script type="text/javascript">
            var base_url="<?php echo base_url();?>";
            var max_size="<?php echo $this->config->item("max_size_upload");?>";
            var title="<?php echo $config->title;?>";
        </script>
    </head>

    <body>
        <!--Preloader-->
        <div class="preloader">
            <div class="loader "></div>
        </div>
        <!--Preloader-->

        <!-- Header -->
        <?php include("include/header2.php"); ?>

        <!-- Hidden Value -->
        <input type="hidden" id="hid_login" name="hid_login" value="<?php echo $id_admin;?>" />

        <!--Home Section Start-->
        <section id="home" class="banner" style="background-image: url('<?php echo base_url(); ?>image/full/<?php echo $sliderList[0]->imagePath; ?>')" data-stellar-background-ratio=".7" data-scroll-index="0">
            <div class="pull-left div-settings dnone" style="position:absolute;left:100px;top:150px;z-index:999">
                <img title="Edit" id="btedit-home" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
            </div>
            <div class="container">
                <!--Banner Content-->
                <div class="banner-caption">
                    <h1>Hi! I'm <?php echo $config->title; ?>.</h1>
                    <div id="content"><?php echo $sliderList[0]->content ?></div>
                    <!-- <p class="cd-headline clip mt-30">
                        <span><?php echo $aboutList->quote_text; ?>.</span><br>
                        <span class="blc">Specialized in</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Creating Websites.</b>
                            <b>Designing Logo.</b>
                            <b>Designing UI/UX.</b>
                        </span>
                    </p> -->
                </div>
                <div class="arrow bounce">
                    <a class="fa fa-chevron-down fa-2x" href="#" data-scroll-nav="1"></a>
                </div>
            </div>
            <!--Creative Background Svg-->
            <svg id="home-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1400 300" preserveAspectRatio="none">
                <path class="p-curve" d="M0,96.1c109.9,67.5,145.1,201.1,329.6,202.5S1043.2,99.5,1400,0v300H0V96.1z"/>
            </svg>
        </section>
        <!--Home Section End-->

        <!--About Section Start-->
        <section class="about pt-100 pb-100" data-scroll-index="1">
            <div class="container">
                <div class="pull-left div-settings dnone" style="margin-top: -12px">
                    <img title="Edit" id="btedit-about" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                    <img title="Save" id="btsave-about" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                    <img title="Cancel" id="btcancel-about" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <!--About Image-->
                        <div class="about-img">
                            <img id="imgwhypict" src="<?php echo base_url(); ?>image/mockup/<?php echo $config->why_pict; ?>" alt="">
                        </div>
                        <div class="pull-left div-settings dnone" style="position:relative;">
                            <img title="Edit" id="btedit-why-pict" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                            <input type="file" id="fnwhy-pict" class="dnone" name="fnwhy-pict" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <!--About Content-->
                        <div class="about-content">
                            <div class="about-heading">
                                <h2>About Me.</h2>
                                <span class="about-text" id="sp_simple_quote"><?php echo htmlspecialchars_decode($aboutList->simple_quote); ?></span>
                                <div class="edit-about">
                                    <input type="text" placeholder="Quote..." class="fluid" id="txtsimple" name="txtsimple" value="<?php echo htmlspecialchars_decode($aboutList->simple_quote); ?>" />
                                </div>
                            </div>
                            <p class="about-text" id="about-text">
                                <?php echo nl2br(htmlspecialchars_decode($aboutList->content)); ?>
                            </p>
                            <div class="edit-about">
                                <textarea class="text-about fluid" id="txtcontent" name="txtcontent"><?php echo nl2br($aboutList->content);?></textarea>                  
                            </div>
                            <!--About Social Icons-->
                            <div class="pull-right div-settings dnone">
                                <img title="Edit" id="btedit-setting" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                                <img title="Save" id="btsave-setting" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                                <img title="Cancel" id="btcancel-setting" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                            </div>
                            <div class="setting-text social-icons">
                                <a target="_blank" id="lnk-facebook" class="<?php echo ($config->facebook_link == "") ? 'dnone' : '' ?>" href="<?php echo $config->facebook_link; ?>"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" id="lnk-twitter" class="<?php echo ($config->twitter_link == "") ? 'dnone' : '' ?>" href="<?php echo $config->twitter_link; ?>"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" id="lnk-linkedin" class="<?php echo ($config->linkedin_link == "") ? 'dnone' : '' ?>" href="<?php echo $config->linkedin_link; ?>"><i class="fa fa-instagram"></i></a>
                                <a target="_blank" id="lnk-google" href="<?php echo $config->google_link; ?>" class="<?php echo ($config->google_link == "") ? 'dnone' : '' ?>"><i class="fa fa-youtube"></i></a>
                            </div>
                            <table class="edit-setting tbl-social">
                                <tr>
                                    <td><i class="fa fa-facebook"></i></td>
                                    <td><input type="text" value="<?php echo $config->facebook_link; ?>" class="fluid" placeholder="Insert facebook link here.." name="txtFacebook" id="txtFacebook" maxlength="250" /></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-twitter"></i></td>
                                    <td><input type="text" value="<?php echo $config->twitter_link; ?>" class="fluid" placeholder="Insert Twitter link here.." name="txtTwitter" id="txtTwitter" maxlength="250" /></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-instagram"></i></td>
                                    <td><input type="text" value="<?php echo $config->linkedin_link; ?>" class="fluid" placeholder="Insert Instagram link here.." name="txtLinkedIn" id="txtLinkedIn" maxlength="250" /></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-youtube"></i></td>
                                    <td><input type="text" value="<?php echo $config->google_link; ?>" class="fluid" placeholder="Insert Youtube link here.." name="txtGooglePlus" id="txtGooglePlus" maxlength="250" /></td>
                                </tr>
                            </table>
                            <!-- <div class="about-button">
                                <a class="main-btn" id="btDownload" target="_blank" href="<?php echo base_url() ?>image/cv/<?php echo $config->cv_path; ?>">Download CV</a>
                                <div class="pull-right div-settings dnone">
                                    <img title="Edit" id="btedit-cv" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                                    <input type="file" id="fnchcv" name="fnchwallpaper" accept="application/pdf" />
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Section End-->

        <!--Services Section Start-->
        <section class="services bg-gray pt-100 pb-50" data-scroll-index="2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="heading text-center">
                            <h6>Services</h6>
                            <h2>What I Can Do</h2>
                        </div>
                    </div>
                </div>
                <div class="pull-left div-settings dnone">
                    <img title="Edit" id="btedit-how" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                </div>
                <div class="row" id="row-how">
                    <?php foreach($howList as $how) : ?>
                        <div class="col-md-4">
                            <!--Service Item-->
                            <div class="service-item">
                                <span class="icon">
                                    <i class="fa <?php echo $how->how_pict; ?>"></i>
                                </span>
                                <h4><?php echo $how->how_title; ?></h4>
                                <p><?php echo $how->how_text;?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--Services Section End-->

        <!--Stats Section Start-->
        <section class="stats pt-100 pb-100" style="background-image: url('<?php echo base_url(); ?>image/full/<?php echo $fact->bg_pict; ?>')">
            <div class="container">
                <div class="pull-left div-settings dnone" style="position:relative;z-index:1500">
                    <img title="Edit" id="btedit-fact" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                    <img title="Save" id="btsave-fact" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                    <img title="Cancel" id="btcancel-fact" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!--Stats Item-->
                        <div class="single-stat">
                            <span class="stat-icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                            <h2 class="h-fact"><input type="text" class="text-fact num" id="txtclient" maxlength="5" value="<?php echo $fact->clients; ?>" /></h2>
                            <h2 class="counter-title counter" data-count="<?php echo $fact->clients; ?>" id="h-client"><?php echo $fact->clients * 0.1; ?></h2>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!--Stats Item-->
                        <div class="single-stat">
                            <span class="stat-icon">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            </span>
                            <h2 class="h-fact"><input type="text" class="text-fact num" id="txtproject" maxlength="5" value="<?php echo $fact->projects; ?>" /></h2>
                            <h2 class="counter-title counter" data-count="<?php echo $fact->projects; ?>" id="h-project"><?php echo $fact->projects * 0.1; ?></h2>
                            <p>Projects Completed</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!--Stats Item-->
                        <div class="single-stat">
                            <span class="stat-icon">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </span>
                            <h2 class="h-fact"><input type="text" class="text-fact num" id="txtteam" maxlength="5" value="<?php echo $fact->teams; ?>" /></h2>
                            <h2 class="counter-title counter" data-count="<?php echo $fact->teams; ?>" id="h-team"><?php echo $fact->teams * 0.1; ?></h2>
                            <p>Photos Shoot</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!--Stats Item-->
                        <div class="single-stat">
                            <span class="stat-icon">
                                <i class="fa fa-trophy" aria-hidden="true"></i>
                            </span>
                            <h2 class="h-fact"><input type="text" class="text-fact num" id="txtaward" maxlength="5" value="<?php echo $fact->awards; ?>" /></h2>
                            <h2 class="counter-title counter" data-count="<?php echo $fact->awards; ?>" id="h-award"><?php echo $fact->awards * 0.1; ?></h2>
                            <p>Awards Achieved</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Stats Section End-->


        <!--Portfolio Section Start-->
        <section class="portfolio pt-100 pb-70" data-scroll-index="3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="heading text-center">
                            <h6>Portfolio</h6>
                            <h2>Work I Have Done</h2>
                        </div>
                        <div class="pull-left div-settings dnone">
                            <img title="Edit" id="btedit-category" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                        </div>
                        <div class="portfolio-filter text-center">
                            <ul id="ul-filter">
                                <li class="sel-item" data-filter="*">All</li>
                                <?php foreach ($categoryList as $category) : ?>
                                    <li data-filter=".<?php echo $category->ID_category; ?>"><?php echo $category->category_name; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pull-left div-settings dnone">
                    <img title="Edit" id="btedit-portfolio" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                </div>
                <div id="portfolio-header" class="row portfolio-items">
                    <?php foreach($imageList as $image) : ?>
                        <!--Portfolio Item-->
                        <div class="col-lg-4 col-md-6 item-folder item <?php echo $image->ID_category; ?>" data-count="<?php echo $image->jml_detail; ?>" data-id="<?php echo $image->imageID; ?>">
                            <div class="item-content">
                                <img style="height:214px" src="<?php echo base_url(); ?>image/portfolio/thumb/<?php echo $image->imagePath; ?>" alt="">
                                <div class="item-overlay">
                                    <h6><?php echo $image->imageTitle; ?></h6>
                                    <div class="icons">
                                        <span class="icon link">
                                            <?php if ($image->jml_detail <= 1){ echo "<a href='".base_url()."image/portfolio/large/".$image->imagePath."'>"; } ?>
                                                <i class="fa fa-search"></i>
                                            <?php if ($image->jml_detail <= 1){ echo "</a>"; } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div id="portfolio-detail" class="row portfolio-items" style="padding-top: 36px">

                </div>
                <div class='clear'></div>
            </div>
        </section>
        <!--Portfolio Section End-->

        <!--Blog Section Start-->
        <section class="blogs pt-100 pb-100 bg-gray" data-scroll-index="4">
            <div class="container">
                <div class="pull-left div-settings dnone" style="position:relative;">
                    <img title="Edit" id="btedit-news" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="heading text-center">
                            <h6>Blog</h6>
                            <h2>Latest News</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="blogList" class="owl-carousel owl-theme">
                        <?php foreach ($blogList as $blog) :?>
                            <!--Blogs Item-->
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="<?php echo ($blog->link != "") ? $blog->link : base_url()."blog/detail/".$blog->ID_blog; ?>">
                                        <img style="object-fit: cover;height:300px" src="<?php echo base_url(); ?>image/blog/<?php echo $blog->image; ?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3><?php echo $blog->title; ?></h3>
                                    <p><?php 
                                    $text = str_replace("&nbsp;"," ",$blog->blog_text);
                                    echo substr(strip_tags($text), 0, 160)."..."; ?></p>
                                    <div class="blog-meta">
                                        <span class="more">
                                            <a href="<?php echo ($blog->link != "") ? $blog->link : base_url()."blog/detail/".$blog->ID_blog; ?>">Read More</a>
                                        </span>
                                        <span class="date">
                                            <?php echo date('d M Y', strtotime($blog->created_date));?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="blog-button pt-40">
                            <a class="main-btn" href="<?php echo $config->blog_link; ?>">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Section End-->

        <!--Testimonials Section Start-->
        <section class="testimonials pt-100 pb-100" style="background-image: url('<?php echo base_url(); ?>image/full/15.jpg')">
            <div class="container">
                <div class="pull-left div-settings dnone" style="position:relative;z-index:9999">
                    <img title="Edit" id="btedit-testimoni" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div id="testimoniList" class="owl-carousel owl-theme text-center">
                            <?php foreach ($testimoniList as $testimoni) : ?>
                                <!--Testimonials Item-->
                                <div class="testimonial-item">
                                    <div class="author-img">
                                        <img style="width:120px;height:120px" src="<?php echo base_url() ?>image/photo/<?php echo $testimoni->person_photo; ?>" alt="">
                                    </div>
                                    <h5><?php echo $testimoni->person_name; ?></h5>
                                    <span><?php echo (($testimoni->corporation_name != "") ? "( ".$testimoni->corporation_name." )" : ""); ?></span>
                                    <p><?php echo $testimoni->testimoni_text; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials Section End-->

        <!--Contact Section Start-->
        <section class="contact pt-100 pb-100" data-scroll-index="5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="heading">
                            <h6>Contact</h6>
                            <h2>Get In Touch</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <!--Contact Form-->
                        <form id='contact-form' method='POST' role="form">
                            <input type='hidden' name='form-name' value='contactForm' />
                             <div class="col-md-12 text-center">
                                    <h5 class="successContent">
                                        <i class="fa fa-check left" style="color: #5cb45d;"></i><span class="success">Your message has been sent successfully.</span>
                                    </h5>
                                    <h5 class="errorContent" style="color: #e1534f;">
                                        <i class="fa fa-exclamation-circle left"></i><span class="errorMsg">There was a problem validating the form please check!</span>
                                    </h5>
                                </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <!--name-->
                                    <input type="text" class="form-control con-validate" id="txts_name" placeholder="Name" minlength=3 >
                                </div>
                                <div class="col-md-6 form-group">
                                    <!--email-->
                                    <input type="email" class="form-control con-validate" id="txts_email" placeholder="Email" >
                                </div>
                                <div class="col-md-12 form-group">
                                    <!--message box-->
                                    <textarea class="form-control con-validate" id="txts_message" placeholder="How can we help you?" rows=6 ></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <!--contact button-->
                                    <button id="btsend_email" class="mt-30 main-btn">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Section End-->

        <!-- Footer -->
        <?php include("include/footer2.php") ?>

        <!-- Include Modal Dialog -->
        <?php include "include/cropping_modal.php"; ?>
        <?php include "include/text_modal.php"; ?>

    </body>
</html>

<!--Jquery js-->
<script src="<?php echo base_url() ?>js2/jquery-3.0.0.min.js"></script>

<!--Bootstrap js-->
<script src="<?php echo base_url() ?>js2/bootstrap.min.js"></script>
<!--Stellar js-->
<script src="<?php echo base_url() ?>js2/jquery.stellar.js"></script>
<!--Animated Headline js-->
<script src="<?php echo base_url() ?>js2/animated.headline.js"></script>
<!--Owl Carousel js-->
<script src="<?php echo base_url() ?>js2/owl.carousel.min.js"></script>
<!--ScrollIt js-->
<script src="<?php echo base_url() ?>js2/scrollIt.min.js"></script>
<!--Isotope js-->
<script src="<?php echo base_url() ?>js2/isotope.pkgd.min.js"></script>
<!--Magnific Popup js-->
<script src="<?php echo base_url() ?>js2/jquery.magnific-popup.min.js"></script>
<!--Site Main js-->
<script src="<?php echo base_url() ?>js2/main.js"></script>
<!-- CK Editor + CK Finder -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/ckfinder/ckfinder.js"></script>
<!-- Cropper -->
<script src="<?php echo base_url(); ?>plugin/cropper-plugin/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>plugin/cropper-plugin/dist/cropper.js"></script>
<script src="<?php echo base_url(); ?>plugin/cropper-plugin/js/main.js"></script>

<!-- Admin JS -->
<!-- <script src="<?php echo base_url(); ?>js/theme.js" type="text/javascript"></script> -->
<script src="<?php echo base_url(); ?>js/home.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/main_admin.js" type="text/javascript"></script>