<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $config->title; ?></title>
        <?php include "include/meta.php"; ?>

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

        <div class="preloader">
            <div class="loader "></div>
        </div>

        <!-- Header -->
        <?php include "include/header-blog2.php"; ?>

        <section class="banner-blog pt-100 pb-100" style="background-image: url('<?php echo base_url(); ?>image/full/wallpaper1.jpg');background-size: cover">
            <div id="particles-js"></div>
            <!--Banner Caption-->
            <div class="banner-caption text-center">
                <h1>Blog List</h1>
                <div class="bread-crumb mt-10">
                    <a href="index.html">Home</a>
                    <a href="#">Blogs</a>
                </div>
            </div>
        </section>

        <!--Blog List Section Starts-->
        <section class="blogs blog-list pt-100 pb-50" data-scroll-index="4">
            <div class="container">
                <div class="row">
                    <?php foreach ($blogList as $blog) :?>
                        <div class="col-lg-4 col-md-6">
                            <!--Blogs Item-->
                            <div class="blog-item" style="min-height: 580px">
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
                        </div>
                    <?php endforeach; ?>                    
                </div>
            </div>
        </section>
        <!--Blog List Section End-->

        <!-- Footer -->
        <?php include("include/footer2.php") ?>
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
<!--Particles js-->
<script src="<?php echo base_url() ?>js2/particles.min.js"></script>
<!--Site Main js-->
<script src="<?php echo base_url() ?>js2/main.js"></script>
<script>
    //Particles
    particlesJS.load('particles-js', base_url + 'js2/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

