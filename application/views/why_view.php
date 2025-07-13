<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title><?php echo $config->title; ?></title>
        <!-- <title>Roker  - Software, Technology , Corporate, Creative, Multi-Purpose, Responsive And Retina Html5/css3 Template</title>  -->
        <meta name="keywords" content="conculta" />
        <meta name="description" content="Roker  - Corporate, Creative, Multi Purpose, Responsive And Retina Template">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <?php 
            if($id_admin == 0){
                include "include/include_css.php";
            } else {
                include "include/include_css.php";   
            }
        ?> 

        <!-- Head Libs -->
        <!-- <script src="<?php echo base_url() ?>js2/modernizr.js"></script> -->

    </head>
    <body class="home-style-14"> 

        <div id="wrapper">
            
            <?php 
                if($id_admin == 0){
                    include "include/header_user.php";
                } else { 
                    include "include/text_modal.php";
                    include "include/cropping_modal.php";
                    include "include/header.php";
                } 
            ?>
            
            <!-- Hidden Value -->
            <input type="hidden" id="hid_login" name="hid_login" value="<?php echo $id_admin;?>" />
            
            <!-- ====== start inner-header style-5 ====== -->
            <section class="inner-header style-5" style="background-image: url('<?php echo base_url(); ?>images/banner/banner-about.png')">
                <div class="container">
                    
                </div>
                <a href="#kenapa-evopet?">
                    <img src="<?php echo base_url(); ?>images/banner/view-more.png" class="side-img-banner slide_up_down">
                </a>
                
            </section>
            <!-- ====== end inner-header style-5 ====== -->
            
            <main id="main">
                <section class="abt-sec section-padding-large container" id="kenapa-evopet?" style="scroll-margin-top: 150px;">
                    <img class="img-tunjuk-about" src="<?php echo base_url(); ?>images/navbar/icon-about-atas.png" alt="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="pull-left div-settings dnone" style="position:absolute;top:20px;z-index:999">
                                <img title="Edit" src="<?php echo base_url();?>image/Icon_tools.png" class="btedit-abouthome icon mini-icon-settings" />
                                <img title="Save" src="<?php echo base_url();?>image/icon-save.png" class="btsave-abouthome icon mini-icon-settings_30" />
                                <img title="Cancel" src="<?php echo base_url();?>image/icon-delete.png" class="btcancel-abouthome icon mini-icon-settings_32"/>
                            </div>
                            <header class="header text-left">
                                <!-- <h2 class="heading text-uppercase">Evo Nusa Bersaudara</h2> -->
                                <div class="title abouthome-text">
                                    <h2 class="heading" id="sp_quote_text_home"><?php echo nl2br(htmlspecialchars_decode($aboutHomeList->quote_text)); ?></h2>
                                </div>
                                <div class="edit-abouthome">
                                    <textarea class="form-control" id="txtquote_home" name="txtquote_home" style="width: 100%;"><?php echo $aboutHomeList->quote_text;?></textarea>                 
                                </div>

                                <span class="icon"><i class="icon-bone"></i></span>

                                <div class="abouthome-text">
                                    <p id="abouthome-text" class="font-dosis-19">
                                        <?php echo nl2br(htmlspecialchars_decode($aboutHomeList->content)); ?>
                                    </p>
                                </div>
                                <div class="edit-abouthome">
                                    <textarea class="form-control" id="txtcontent_home" name="txtcontent_home" style="width: 100%" rows="6"><?php echo $aboutHomeList->content;?></textarea>                  
                                </div>
                            </header>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div class="pull-left div-settings dnone" style="position:absolute;right:100px;top:0px;z-index:999">
                                <img title="Edit" id="btedit-about-home" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                                <input class="vnone" type="file" id="fnabout-home" name="fnabout-home" accept="image/*" />
                            </div>
                            <div class="img-holder"><img id="imgabouthome" src="<?php echo base_url(); ?>images/<?php echo $aboutHomeList->picture;?>" alt="pet-image" class="img-responsive"></div>
                        </div>
                    </div>
                </section>

                <!-- ====== start choose us ====== -->
                <section class="choose-us style-14 section-padding">
                    <div class="fluid-container">
                        <div class="content" style="position: relative">
                            <div class="pull-left div-settings dnone" style="position:relative;">
                                <img title="Edit" id="btedit-why" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
                            </div>
                            <div class="row row-cols-sm-1 row-cols-md-4" style="padding: 0 100px;" id="whyListItem">
                                <?php foreach($whyList as $why) : ?>
                                    <div class="col">
                                        <div class="choose-card">
                                            <div class="icon">
                                                <img src="<?php echo base_url(); ?>images/why/<?php echo $why->why_pict; ?>" alt="<?php echo $product->title; ?>">
                                            </div>
                                            <div class="info">
                                                <h5><?php echo $why->why_title; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="container box-visi-misi">
                        <div class="about-row mb-150">
                            <div class="pull-left div-settings dnone" style="position:absolute;top:20px;z-index:999">
                                <img title="Edit" src="<?php echo base_url();?>image/Icon_tools.png" class="btedit-abouthome icon mini-icon-settings" />
                                <img title="Save" src="<?php echo base_url();?>image/icon-save.png" class="btsave-abouthome icon mini-icon-settings_30" />
                                <img title="Cancel" src="<?php echo base_url();?>image/icon-delete.png" class="btcancel-abouthome icon mini-icon-settings_32"/>
                            </div>
                            <div class="row gx-5">
                                <div class="col-lg-6">
                                    <div class="img">
                                        <img src="<?php echo base_url(); ?>images/visi.png" alt="" class="main-img ">
                                    </div>
                                    <div class="text" id="sp_simple_visi">
                                        <?php echo htmlspecialchars_decode($aboutHomeList->visi); ?>
                                    </div>
                                    <div class="edit-abouthome">
                                        <textarea class="form-control" id="txtabout_visi" name="txtabout_visi" style="width: 100%" rows="6"><?php echo $aboutHomeList->visi;?></textarea>                  
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="img">
                                        <img src="<?php echo base_url(); ?>images/misi.png" alt="" class="main-img ">
                                    </div>
                                    <div class="text" id="sp_simple_misi">
                                        <?php echo htmlspecialchars_decode($aboutHomeList->misi); ?>
                                    </div>
                                    <div class="edit-abouthome">
                                        <textarea class="form-control" id="txtabout_misi" name="txtabout_misi" style="width: 100%" rows="6"><?php echo $aboutHomeList->misi;?></textarea>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ====== end choose us ====== -->

            </main>
        </div>

        <?php include "include/footer.php" ?>

        <?php 
            if($id_admin == 0){
                include "include/include_js_user.php";
            } else {
                include "include/include_js.php";   
            }
        ?> 
        
    </body>
</html>