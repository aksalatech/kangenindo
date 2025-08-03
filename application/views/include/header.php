<!--==========================
    HEADER START
===========================-->
<!-- <header>
    <div class="container container_large">
        <div class="row">
            <div class="col-xl-12 col-md-12 d-none d-md-block">
                <div class="header_left">
                    <p><?php //echo $contact->address; ?> | <?php //echo $contact->open_hours; ?></p>
                </div>
            </div>
        </div>
    </div>
</header> -->
<!--==========================
    HEADER END
===========================-->

<!--==========================
    MENU 2 START
===========================-->
<nav class="navbar navbar-expand-lg main_menu main_menu_2">
    <div class="container">
        <a class="navbar-brand d-block d-sm-none" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" class="img-fluid w-100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars bar_icon"></i>
            <i class="far fa-times close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" class="img-fluid w-100">
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php
                    $CI =& get_instance();
                    $CI->load->model('Location_model');
                    $regions = $CI->Location_model->get_all_regions();
                    ?>
                    <a class="nav-link" href="javascript:void(0)">LOCATION</a>
                    <ul class="droap_menu menu2 d-sm-none">
                        <?php foreach ($regions as $r) { ?>
                            <li class="header">
                                <a href="javascript:void(0)"><?php echo $r->store_region ?></a>
                            </li>
                            <?php 
                            $stores = $CI->Location_model->get_all_store_by_region($r->store_region);
                            foreach ($stores as $s) { ?>
                                <li class="link">
                                    <a href="<?php echo base_url(); ?>location/detail/<?php echo $s->id_store; ?>"><b><?php echo $s->store_name ?></b></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul class="droap_menu disabled menu3 d-none d-sm-block">
                        <li>
                            <?php foreach ($regions as $r) { ?>
                            <ul class="pull-left droap_menu_new" style="width:280px; margin-right: 40px">
                                <li class="header">
                                    <a href="javascript:void(0)"><?php echo $r->store_region ?></a>
                                </li>
                                <?php 
                                $stores = $CI->Location_model->get_all_store_by_region($r->store_region);
                                foreach ($stores as $s) { ?>
                                    <li class="link">
                                        <a href="<?php echo base_url(); ?>location/detail/<?php echo $s->id_store; ?>"><b><?php echo $s->store_name ?></b></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>menu">MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>catering">CATERING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>events">WHAT'S ON</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>catering">CATERING</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>gallery">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>about">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>contact">CONTACT US</a>
                </li>
                
                <ul class="menu_right">
                        <!-- <li>
                            <a class="menu_order common_btn" href="<?php echo base_url(); ?>catering">
                                <span class="icon">
                                    <img src="<?php echo base_url(); ?>/images/cart_icon_2.png" alt="order" class="img-fluid w-100">
                                </span>
                                catering
                            </a>
                        </li> -->
                    <?php if($storeLocation == "") { ?>
                        <li>
                            <a class="menu_order common_btn" href="<?php echo base_url(); ?>order?store=buy">
                                ORDER NOW
                            </a>
                        </li>
                    <?php  } else { ?>
                    <li>
                        <a class="menu_cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="far fa-shopping-basket" aria-hidden="true"></i> <span class="qnty cart-qnty"></span></a>
                    </li>
                    <?php  } ?>
                   
                </ul>
            </ul>
        </div>
    </div>
</nav>
<!--==========================
    MENU 2 END
===========================-->
<!--==========================
    CART START
===========================-->

<div class="mini_cart">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="far fa-arrow-left"></i></button>
            <h5 class="offcanvas-title" id="offcanvasRightLabel"> CART </h5>
           <img src="<?php echo base_url(); ?>images/icon-cart.png" class="img-icon-cart">
           <span class="cart-qnty d_none"></span>
        </div>
        <div class="offcanvas-body">
            <ul id="cartList">
            </ul>
            <ul>
                <li>
                    <div class="cart_text">
                        <div class="cursor" id="btnChangeStore2">
                            <div style="width: 90%" class="pull-left">
                                <a class="cart_title store_name" href="javascript:void(0)"><?php echo $store->store_name ?></a>
                                <div class="store_address"><?php echo $store->store_address ?></div>
                            </div>
                            <div style="width: 10%" class="pull-left">
                                <span class="fa fa-chevron-down"></span>  
                            </div>  
                        </div>
                        <hr/>
                        <div>
                           <strong style="width: 100px;display: inline-block">Sun-Thu</strong><span class="op1"><?php echo $store->open_hours ?></span><br/>
                           <strong style="width: 100px;display: inline-block">Fri-Sat</strong><span class="op2"><?php echo $store->open_hours2 ?></span>
                        </div>

                    </div>
                </li>
                <li>
                    <div class="cart_text">
                        <a class="cart_title" href="javascript:void(0)">Pick up in store</a>
                        <input type="time" id="pickup_time" value="<?php echo date("H:i") ?>" />        
                    </div>
                </li>
            </ul>
            <h5 id="subtotal">Sub Total <span>$<span class="spTotalAmt">0</span></span></h5>
            <div class="minicart_btn_area">
                <a class="common_btn" id="btnContinue" href="javascript:void(0)">CHECKOUT<span></span></a>
            </div>
        </div>
    </div>
</div>
<div class="d_none" id="div_carts"><?php echo (isset($carts)) ? json_encode($carts) : ""; ?></div>
<!--==========================
    CART END
===========================-->

<!--==========================
    CHECKOUT START
===========================-->

<div class="mini_cart">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasChk" aria-labelledby="offcanvasChkLabel">
        <div class="offcanvas-header box-login-banner">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="far fa-arrow-left"></i></button>  
            <img src="<?php echo base_url(); ?>images/banner-login.png">
        </div>
        <div class="offcanvas-body">
            <ul>
                <li>
                    <p>Login to verify your order</p>
                    <div class="minicart_btn_area_login">
                        <!-- <a class="common_btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasLogin"> -->
                        <a href="javascript:void(0)" id="btGoogle" class="common_btn">
                            <span class="fa fa-google white"></span> &nbsp;SIGN IN WITH GOOGLE
                        </a>
                        <a href="javascript:void(0)" id="btFacebook" class="common_btn bg-navy">
                            <span class="fa fa-facebook white"></span> &nbsp;SIGN IN WITH FACEBOOK 
                        </a>

                        <!-- <br>
                        <p>Don't have an account?</p>
                        <a href="#" class="common_btn bg-white">
                            Sign up now
                        </a> -->
                    </div>
                </li>
            </ul>
            <!-- <h5>Sub Total <span>$<span class="spTotalAmt">0</span></span></h5>
            <div class="minicart_btn_area">
                <a class="common_btn" id="btnCheckout" data-bs-toggle="offcanvas" data-bs-target="#offcanvasChk" aria-controls="offcanvasChk">CONFIRM CHECKOUT<span></span></a>
            </div> -->
        </div>
    </div>
</div>

<!--==========================
    CHECKOUT END
===========================-->

<!--==========================
    LOGIN START
===========================-->

<div class="mini_cart">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLogin" aria-labelledby="offcanvasLoginLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="far fa-arrow-left"></i></button>
            <h5 class="offcanvas-title" id="offcanvasRightLabel"> CONFIRMATION </h5>
           <img src="<?php echo base_url(); ?>images/icon-cart.png" class="img-icon-cart">
           <span class="cart-qnty d_none"></span>
        </div>
        <div class="offcanvas-body">
            <ul id="cartList2">
            </ul>
            <ul>
                <li>
                    <div class="cart_text">
                        <a class="cart_title" href="javascript:void(0)"><?php echo $store->store_name ?></a>
                        <div><?php echo $store->store_address ?></div>
                        <hr/>
                        <div>
                           <strong style="width: 100px;display: inline-block">Sun-Thu</strong><?php echo $store->open_hours ?><br/>
                           <strong style="width: 100px;display: inline-block">Fri-Sat</strong><?php echo $store->open_hours2 ?>
                        </div>                     
                    </div>
                </li>
                <li>
                    <div class="cart_text">
                        <a class="cart_title" href="javascript:void(0)">Pick up in store</a>
                        <input type="time" id="pickup_time2" value="<?php echo date("H:i") ?>" />   
                        <span class="error" id="error_time"></span>     
                    </div>
                </li>
                <li>
                    <div class="cart_text">
                        <div class="cursor" id="btnChoosePromo">
                            <div style="width: 90%" class="pull-left">
                                <a class="cart_title promo_name" href="javascript:void(0)">- No promotion used -</a>
                                <div class="disc_off"></div>
                                <input type="hidden" id="promo_id" name="promo_id" />
                            </div>
                            <div style="width: 10%" class="pull-left">
                                <span class="fa fa-chevron-down"></span>  
                            </div>  
                            <div style="clear: both"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="minicart_btn_area_login form">
                        <p class="label-form no-margin">Full Name</p>
                        <input type="text" id="full_name" class="no-margin" value="<?php echo $users->employee_name ?>" placeholder="Enter your full name">
                        <span class="error d_none" id="error_name"></span>
                        <br/><br/>
                        <p class="label-form no-margin">Email</p>
                        <input type="email" id="email" class="no-margin" value="<?php echo $users->email ?>" placeholder="Enter your email address">
                        <span class="error d_none" id="error_email"></span>
                        <br/><br/>
                        <p class="label-form no-margin">Phone</p>
                        <input type="text" id="phone" class="no-margin" value="<?php echo $users->phone ?>" placeholder="Enter your phone number">
                        <span class="error d_none" id="error_phone"></span>
                        <br/>
                        <!--<a href="#" class="no_btn_forgot">Forgot Password</a>

                        <p>By signing in I agree to Bintang Bro Term & Conditions and Privacy Policy</p> -->
                        <br>
                        <h5>Sub Total <span>$<span class="spTotalAmt">0</span></span></h5>
                        <a class="common_btn" href="javascript:void(0)" id="btnPay">
                            Pay Now
                        </a>
                        <p>Want to use other account ?</p>
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasChk" aria-controls="offcanvasChk" class="no_btn">
                            Change Account
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--==========================
    LOGIN END
===========================-->

<!-- MODAL POPUT START -->
<div class="cart_popup">
    <div class="modal fade" id="notifyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>
                    <div id="detailNotif">
                        
                    </div>
                </div>
                <div class="modal-footer" id="footerNotif">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL POPUT END -->