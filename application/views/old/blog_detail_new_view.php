<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $config->title; ?></title>
        <?php include "include/meta_old.php"; ?>

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

        <!--Preloader Start-->
        <div class="preloader">
            <div class="loader "></div>
        </div>
        <!--Preloader End-->

        <!-- Header -->
        <?php include "include/header-blog2.php"; ?>

        <!-- Hidden Value -->
        <input type="hidden" id="hid_login" name="hid_login" value="<?php echo $id_admin;?>" />
        <section class="banner-blog pt-100 pb-100" style="background-image: url('<?php echo base_url(); ?>image/full/wallpaper2.jpg');background-size: none">
            <div id="particles-js"></div>
            <!--Banner Caption-->
            <div class="banner-caption text-center">
                <h1>Blog Article</h1>
                <div class="bread-crumb mt-10">
                    <a href="index.html">Home</a>
                    <a href="blogs-page.html">Blogs</a>
                    <a href="#">Blog Article</a>
                </div>
            </div>
        </section>

        <section class="blog-detail pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <!--Blog Content-->
                    <div class="col-lg-8 offset-lg-2">
                        <!--Blog Heading-->
                        <div class="blog-heading">
                            <h2><?php echo $blog->title; ?></h2>
                            <div class="blog-meta">
                                <span class="date"><?php echo date('d M Y', strtotime($blog->created_date));?></span>
                                <span class="by">by <?php echo $blog->creator; ?>.</span>
                            </div>
                        </div>
                        <!--Blog Image-->
                        <div class="blog-image">
                            <img src="<?php echo base_url() ?>image/blog/<?php echo $blog->image; ?>" alt="">
                        </div>
                        <br/>
                        <!--Blog Content-->
                        <div class="blog-content">
                            <?php echo $blog->blog_text; ?>
                        </div>
                        <hr />
                        <div class="post-share">
                            <span>Share this Post:</span>
                            <div class="post-share-social social-box" >
                            </div>
                        </div>
                        <hr />
                        <br />
                        <div id="disqus_thread"></div>
                        <script>

                        /**
                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        
                        var disqus_config = function () {
                        this.page.url = "<?php echo base_url(); ?>blog/detail/<?php echo $blog->ID_blog; ?>";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = "<?php echo $blog->ID_blog; ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://tanjordy.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        s.setAttribute('post-id', '2');
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer -->
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
<!-- Social Link Builder -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/socialLinkBuilder.js"></script>
<!-- Disqus -->
<script id="dsq-count-scr" src="//tanjordy.disqus.com/count.js" async></script>
<!-- Admin JS -->
<script src="<?php echo base_url(); ?>js/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/blog.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/home.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/main_admin.js" type="text/javascript"></script>
<script>
    //Particles
    particlesJS.load('particles-js', base_url + 'js2/particles.json', function() {
        console.log('particles loaded');
    });
</script>


