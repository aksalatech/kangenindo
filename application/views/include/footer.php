<!--==========================
    FOOTER 2 START
===========================-->
<footer class="footer_2">
    <div class="container">
        <div class="row justify-content-between pt_70 wow fadeInUp">
            <div class="col-lg-4 col-md-4">
                <div class="footer_info">
                    <a class="footer_logo" href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_light; ?>" alt="Kangen Indo" class="img-fluid w-100">
                    </a>
                </div>
            </div>
            <!-- <div class="col-lg-2 col-sm-6 col-md-4">
                <div class="footer_link">
                    <h3>OUR MENU</h3>
                    <ul>
                        <?php foreach ($brandList as $b) { ?>
                            <li>
                                <a href="<?php echo $b->link ?>"><?php echo $b->brandNm ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div> -->
             <div class="col-lg-4 col-sm-6 col-md-4">
                <div class="footer_link">
                    <h3>FOLLOW KANGEN INDO ON</h3>
                    <ul class="sosmed-icon">
                        <?php if ($config->linkedin_link != "") { ?>
                            <li><a href="<?php echo $config->linkedin_link ?>" target="_blank"><img src="<?php echo base_url();?>images/icon-instagram.png"></a></li>
                        <?php } ?>
                        <?php if ($config->facebook_link != "") { ?>
                            <li><a href="<?php echo $config->facebook_link ?>" target="_blank"><img src="<?php echo base_url();?>images/icon-facebook.png"></a></li>
                        <?php } ?>
                        <?php if ($config->twitter_link != "") { ?>
                            <li><a href="<?php echo $config->twitter_link ?>" target="_blank"><img src="<?php echo base_url();?>images/icon-x.png"></a></li>
                        <?php } ?>
                        <?php if ($config->google_link != "") { ?>
                            <li><a href="<?php echo $config->google_link ?>" target="_blank"><img src="<?php echo base_url();?>images/icon-tiktok.png"></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-9">
                <div class="footer_post">
                    <h2 style="color:#fff">MAILING LIST</h2>
                    <input type="text" placeholder="ENTER YOUR EMAIL HERE" autocomplete="off" id="subscribe_email" style="margin-bottom: 0px" required>
                    <white id="error-subscribe"></white>
                    <button class="btn_subscribe" id="btn-subscribe" style="margin-top: 15px">SUBSCRIBE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_copyright mt_40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p style="font-size: 13pt">COPYRIGHT &copy; KANGEN INDO 2025. ALL RIGHTS RESERVED</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--==========================
    FOOTER 2 END
===========================-->

<!--==========================
        SCROLL BUTTON START
===========================-->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!--==========================
    SCROLL BUTTON END
===========================-->