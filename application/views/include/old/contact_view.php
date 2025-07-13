<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "include/include_css.php" ?>
</head>
<body class="page">

<!-- Wrapper content -->
<div id="wrapper-container" class="content-pusher">
    <div class="overlay-close-menu"></div>

    <!-- Header -->
    <?php include "include/header.php" ?>

    <!-- Hidden Value -->
    <input type="hidden" id="hid_login" name="hid_login" value="<?php echo $id_admin;?>" />

    <!-- Maps Coordinate -->
    <input type="hidden" id="hid_langitude" name="hid_langitude" value="<?php echo $contactList->langitude; ?>" />
    <input type="hidden" id="hid_latitude" name="hid_latitude" value="<?php echo $contactList->latitude; ?>" />

    <!-- Main Content -->
    <div id="main-content">
        <div class="page-title">
            <div class="page-title-wrapper" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo base_url() ?>image/full/contact.jpg')">
                <div class="content container">
                    <h1 class="heading_primary">Contact Us</h1>
                    <ul class="breadcrumbs">
                        <li class="item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="item"><span class="separator"></span></li>
                        <li class="item active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="site-content no-padding">
            <div class="page-content">
                <div class="container">
                    <div class="empty-space"></div>
                    <div class="row tm-flex">
                        <div class="col-sm-6">
                            <div class="sc-heading">
                                <p class="first-title">TINGGALKAN</p>
                                <h3 class="second-title">SEBUAH PESAN</h3>
                                <p class="description">Apakah anda memiliki sesuatu yang ingin ditanyakan ? <br>
                                    Jangan ragu untuk mengirimkan pesan melalui form di bawah ini.</p>
                            </div>

                            <div class="sc-contact-form">
                                <form action="<?php echo base_url() ?>home/send_email" id="ajaxform" method="post">
                                    <input type="text" name="s_name" required placeholder="Your name*">
                                    <input type="text" name="s_subject" required placeholder="Your subject*">
                                    <input type="email" name="s_email" required placeholder="Your email*">
                                    <textarea name="s_message" id="s_message" cols="30" rows="10" required placeholder="Your message*"></textarea>
                                    <input type="submit" class="submit" value="Send message">
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pull-left div-settings dnone">
                                <img title="Edit" id="btedit-contact" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                                <img title="Save" id="btsave-contact" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                                <img title="Cancel" id="btcancel-contact" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                            </div>
                            <div class="sc-contact-info">
                                <div class="sc-heading">
                                    <p class="first-title">KUNJUNGI KAMI</p>
                                    <p class="description contact-label p-location" id="p-location"><?php echo nl2br($contactList->location); ?></p>
                                    <div class="edit-contact">
                                        <textarea id="txtaddress" style="width:100%"><?php echo str_replace("<br/>","\n", $contactList->location); ?></textarea>
                                    </div>
                                </div>

                                <p class="phone">
                                    Call. 
                                    <a class="contact-label p-mp1" id="p-mp1" href="tel:<?php echo $contactList->mp1; ?>"><?php echo $contactList->mp1; ?></a>
                                    <span class="edit-contact">
                                        <input type="text" id="txtphone" style="width:80%" max-length="20" value="<?php echo $contactList->mp1; ?>" />
                                    </span>
                                </p>
                                <p class="email contact-label p-email" id="p-email"><a href="<?php echo $contactList->email; ?>"><?php echo $contactList->email; ?></a></p>
                                <div class="edit-contact">
                                    <input type="text" id="txtemail" "Email 1.." style="width:80%;" value="<?php echo $contactList->email; ?>" /><br/>
                                    <input type="text" id="txtemail2" placeholder="Email 2.." style="display:none;width:80%;margin-top:10px" value="<?php echo $contactList->email2; ?>" />
                                </div>
                                <ul class="sc-social-link style-03">
                                    <li class="<?php echo ($config->facebook_link == "") ? 'vnone' : '' ?>" href="<?php echo $config->facebook_link; ?>"><a target="_blank" class="lnk-facebook face" target="_blank"
                                           title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="<?php echo ($config->twitter_link == "") ? 'vnone' : '' ?>"><a target="_blank" class="lnk-twitter twitter" href="<?php echo $config->twitter_link; ?>" target="_blank"
                                           title="Twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li class="<?php echo ($config->google_link == "") ? 'vnone' : '' ?>"><a class="lnk-google instagram" href="<?php echo $config->google_link; ?>" target="_blank" title="Instagram"><i
                                            class="fa fa-instagram"></i></a></li>
                                    <li class="<?php echo ($config->linkedin_link == "") ? 'vnone' : '' ?>"><a target="_blank" class="lnk-linkedin youtube" href="<?php echo $config->linkedin_link; ?>" target="_blank" title="Youtube"><i
                                            class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sc-google-map" id="sc-google-map">
                    <div class="empty-space"></div>
                    <div class="fluid div-settings dnone" style="min-height:40px;padding:15px 105px">
                        <img title="Edit" id="btedit-map" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                        <img title="Save" id="btsave-map" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                        <img title="Cancel" id="btcancel-map" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                    </div>
            
                    <div id="id-google-map"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include "include/footer.php" ?>
</div><!-- wrapper-container -->

<!-- Fixed Button -->
<?php include "include/addition.php" ?>

<!-- Scripts -->
<?php include "include/include_js.php" ?>

</body>
</html>