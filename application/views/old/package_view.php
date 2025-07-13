<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "include/include_css.php" ?>
</head>
<body class="archive shop">

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
            <div class="page-title-wrapper" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo base_url() ?>image/full/pricing.jpg')">
                <div class="content container">
                    <h1 class="heading_primary">Packages &amp; Pricing</h1>
                    <ul class="breadcrumbs">
                        <li class="item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="item"><span class="separator"></span></li>
                        <li class="item active">Packages &amp; Pricing</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="site-content container">
            <div class="pull-left div-settings dnone" style="position:relative;">
                <img title="Edit" id="btedit-plan" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
            </div>
            <div class="rooms-content layout-grid row archive_switch" id="div-pricing">

                <?php foreach ($planList as $plan) : ?>
                <div class="room col-sm-4 clearfix">
                    <div class="room-item" style="background: #ffffff;min-height: 591px;border: thin solid #CECECE">
                        <div class="room-media">
                            <center>
                                <a href="<?php echo base_url() ?>package/detail?id=<?php echo $plan->ID_plan ?>"><img style="padding:20px" src="<?php echo base_url() ?>image/plan/<?php echo $plan->plan_img; ?>" alt=""></a>
                            </center>
                        </div>
                        <div class="room-summary">
                            <h3 class="room-title">
                                <a href="<?php echo base_url() ?>package/detail?id=<?php echo $plan->ID_plan ?>"><?php echo $plan->plan_name; ?></a>
                            </h3>
                            <div class="room-price">From: <span class="price"><?php echo $plan->currency; ?> <?php echo number_format($plan->price,0,",","."); ?></span> <strong>per <?php echo $plan->per_each ?></strong></div>
                            <p class="room-description">
                                <ul class="list-style">
                                    <?php 
                                        if (isset($planDetailList[$plan->ID_plan])) : 
                                            foreach ($planDetailList[$plan->ID_plan] as $detail) : ?>
                                            <li><?php echo $detail->detail_text; ?></li>
                                    <?php 
                                            endforeach;
                                        endif; 
                                    ?>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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