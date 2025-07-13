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

    <!-- Main Content -->
    <div id="main-content">
        <div class="page-title">
            <div class="page-title-wrapper" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo base_url() ?>image/full/about.jpg')">
                <div class="content container">
                    <h1 class="heading_primary">About Us</h1>
                    <ul class="breadcrumbs">
                        <li class="item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="item"><span class="separator"></span></li>
                        <li class="item active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="site-content no-padding">
            <div class="page-content">

                <div class="container">
                    <div class="empty-space"></div>
                    <div class="pull-right div-settings dnone">
                        <img title="Edit" id="btedit-about" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                        <img title="Save" id="btsave-about" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                        <img title="Cancel" id="btcancel-about" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                    </div>
                    <div class="sc-heading">
                        <p class="first-title"> ABOUT</p>
                        <h3 class="second-title">OUR STORY</h3>
                    </div>
                    <div class="about-info row">
                        <div class="col-sm-12 about-text">
                            <p style="text-align: justify" id="about-text"><?php echo nl2br(htmlspecialchars_decode($aboutList->content)); ?></p>
                        </div>
                        <div class="edit-about col-sm-12">
                            <textarea class="text-about form-control" id="txtcontent" name="txtcontent" style="width: 100%"><?php echo nl2br($aboutList->content);?></textarea>                  
                        </div>
                    </div>
                    <div class="empty-space"></div>
                    <div class="sc-about-slides row">
                        <div class="pull-left div-settings dnone">
                            <img title="Edit" id="btedit-client" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                        </div>
                        <ul class="slides owl-theme owl-carousel client-carousel">
                            <?php foreach ($customerList as $customer) : ?>
                                <li><img src="<?php echo base_url(); ?>image/logos/<?php echo $customer->brand_path; ?>" alt=""></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="empty-space"></div>

                <div class="sc-counter-box" style="background-image: url('<?php echo base_url(); ?>image/full/<?php echo $fact->bg_pict; ?>')">
                    <div class="sc-content-overlay">
                        <div class="pull-left div-settings dnone" style="margin-left: 130px">
                            <img title="Edit" id="btedit-fact" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                            <img title="Save" id="btsave-fact" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
                            <img title="Cancel" id="btcancel-fact" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
                        </div>
                        <div class="container">
                            
                            <div class="wrapper clearfix">
                                <div class="item">
                                    <h1 class="h-fact"><input type="text" class="text-fact num dnone" id="txtaward" maxlength="3" value="<?php echo $fact->awards; ?>" /></h1>
                                    <div class="number counter-title">
                                        <span class="counter-up" data-number="<?php echo $fact->awards; ?>" id="h-award">0</span>
                                    </div>
                                    <div class="text">Rooms</div>
                                </div>
                                <div class="item">
                                    <h1 class="h-fact"><input type="text" class="text-fact num dnone" id="txtteam" maxlength="3" value="<?php echo $fact->teams; ?>" /></h1>
                                    <div class="number counter-title">
                                        <span class="counter-up" id="h-team" data-number="<?php echo $fact->teams; ?>">0</span>
                                    </div>
                                    <div class="text">Staffs</div>
                                </div>
                                <div class="item">
                                    <h1 class="h-fact"><input type="text" class="text-fact num dnone" id="txtproject" maxlength="3" value="<?php echo $fact->projects; ?>" /></h1>
                                    <div class="number counter-title">
                                        <span class="counter-up" id="h-project" data-number="<?php echo $fact->projects; ?>">0</span>
                                    </div>
                                    <div class="text">Menus</div>
                                </div>
                            </div>
                        </div>
                    </div>
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