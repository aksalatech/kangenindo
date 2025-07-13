<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "include/include_css.php" ?>
</head>
<body class="room archive">

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
            <div class="page-title-wrapper" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo base_url() ?>image/full/banner_apps.jpg')">
                <div class="content container">
                    <h1 class="heading_primary">Activity &amp; Facility</h1>
                    <ul class="breadcrumbs">
                        <li class="item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="item"><span class="separator"></span></li>
                        <li class="item active">Activity &amp; Facility</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="site-content container" style="padding-top: 54px">
            <div class="div-settings dnone" style="float:left;width:36px;position:relative;">
                <img title="Edit" id="btedit-events" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
            </div>
            <div class="rooms-content layout-grid style-01">
                <div id="div-back" class="pull-right dnone">
                    <a href="javascript:void(0)" id="btn-back" class="btn-back pull-right"><span class="fa fa-arrow-left"></span> &nbsp;KEMBALI</a>
                </div>
                <div class="clear"><br/></div>
                
                <div class="row" id="event_section">
                    
                    <?php 
                        $i = 0;
                        foreach ($eventsList as $events) : ?>
                        
                        <div class="room col-sm-6 clearfix divDet<?php echo $i ?> divHeads">
                            <a class="link" href="#divDet<?php echo $i ?>">
                                <div class="room-item" style="border: thin solid #CECECE;min-height: 630px">
                                    <div class="room-media">
                                        <img src="<?php echo base_url() ?>image/gallery/<?php echo $events->events_img ?>" style="min-height: 430px;width: 100%" alt="">
                                    </div>
                                    <div class="room-summary">
                                        <h3 class="room-title">
                                            <?php echo $events->events_name ?>
                                        </h3>
                                        <p class="room-description"><?php echo $events->events_desc ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                        <?php if (isset($eventsDetList[$events->ID_events])) : ?>
                        <div id="divDet<?php echo $i ?>" class="col-sm-6 clearfix dnone divDets wrapper-gallery" style="padding: 0px">

                            <?php foreach ($eventsDetList[$events->ID_events] as $detail) : ?>
                               
                                <div class="col-sm-4 float-left static">
                                    <div class="room-item" style="border: thin solid #CECECE;min-height: 196px;margin-bottom: 20px">
                                        <div class="room-media">
                                             <a href="<?php echo base_url() ?>image/gallery/<?php echo $detail->imagePath ?>" class="gallery-popup">
                                                <img src="<?php echo base_url() ?>image/gallery/<?php echo $detail->imagePath ?>" style="width: 100%" alt="">
                                            </a>
                                        </div>
                                        <div class="room-summary" style="padding:8px">
                                            <h3 class="room-title" style="font-size: 14px;margin-bottom: 0px">
                                                <a href="javascript:void(0)"><?php echo $detail->imageTitle ?></a>
                                            </h3>
                                            <p class="room-description"><?php echo $detail->imageDesc ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                    <?php
                        $i++; 
                        endforeach; ?>
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