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
            <div class="page-title-wrapper" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo base_url() ?>image/full/gallery.jpg')">
                <div class="content container">
                    <h1 class="heading_primary">Gallery</h1>
                    <ul class="breadcrumbs">
                        <li class="item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="item"><span class="separator"></span></li>
                        <li class="item active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="site-content">
            <div class="page-content">
                <div class="container">
                    <div class="pull-left div-settings dnone">
                        <img title="Edit" id="btedit-category" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                    </div>
                    <div class="sc-gallery">
                        <ul class="filter-controls" id="ul-filter">
                            <li><a href="javascript:;" class="filter active" id='all'>All</a></li>
                            <?php foreach ($categoryList as $category) : ?>
                                <li><a href="javascript:;" class="filter" data-filter=".<?php echo $category->ID_category; ?>"><?php echo $category->category_name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="pull-left div-settings dnone">
                            <img title="Edit" id="btedit-portfolio" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                        </div>
                        <div class="wrapper-gallery row" id="portfolio-header" itemscope itemtype="http://schema.org/ItemList">
                            <?php foreach($imageList as $image) : ?>
                                <div class="col-sm-4 <?php echo $image->ID_category; ?>">
                                    <div class="item">
                                        <a href="<?php echo base_url() ?>image/portfolio/large/<?php echo $image->imagePath; ?>" class="gallery-popup">
                                            <img style="min-height: 241px" src="<?php echo base_url() ?>image/portfolio/thumb/<?php echo $image->imagePath; ?>" alt="">
                                        </a>
                                        <div class="content">
                                           <h3><?php echo $image->imageTitle; ?></h3>
                                           <p><?php echo $image->imageDesc; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include "include/footer.php" ?>

</div><!-- wrapper-container -->

<!-- Modal Dialog -->
<?php include "include/cropping_modal.php"; ?>

<!-- Fixed Button -->
<?php include "include/addition.php" ?>

<!-- Scripts -->
<?php include "include/include_js.php" ?>

</body>
</html>