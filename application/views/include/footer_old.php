<!-- footer start-->
<footer class="footer"><img class="footer__bg img--bg" src="<?php echo base_url(); ?>images/background__layout.png" alt="bg"/>
    <div class="container">
        <div class="row bottom-50">
            <div class="col-md-5 col-xl-4 text-center text-md-left"><a class="logo logo--footer" href="<?php echo base_url(); ?>"><img class="logo__img" src="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" alt="logo"/></a>
                <div class="footer__details">
                    <p><strong>Location:</strong> <span><?php echo $contact->location; ?></span></p>
                </div>
            </div>
            <div class="col-md-7 col-xl-5">
                <h6 class="footer__title">Menu & Links</h6>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo base_url() ?>gallery"> <span>Galeri Foto</span></a></li>
                    <li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo base_url() ?>blog">Artikel </a></li>
                    <li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo base_url() ?>gallery/video"> <span>Galeri Video</span></a></li>
                </ul>
                <ul class="footer-submenu">
                    <li class="footer-submenu__item"><a class="footer-submenu__link" href="<?php echo base_url() ?>dashboard">Dashboard </a></li>
                </ul>
            </div>
            <div class="col-lg-3 text-center">
                <h6 class="footer__title"><span>Ikuti Kami</span></h6>
                <ul class="socials">
                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="row align-items-center">
            <div class="col-sm-6 text-center text-sm-left">
                <div class="footer-privacy"><a class="footer-privacy__link" href="#">Privacy Policy</a><span class="footer-privacy__divider">|</span><a class="footer-privacy__link" href="#">Term and Condision</a></div>
            </div>
            <div class="col-sm-6 text-center text-sm-right"><a class="footer__link" href="#"><img src="img/footer-logo.png" alt="logo"/></a></div>
        </div> -->
    </div>
</footer>
<!-- footer end-->

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