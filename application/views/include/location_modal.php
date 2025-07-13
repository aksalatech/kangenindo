<!-- MODAL POPUT START -->
<div class="cart_popup">
    <div class="modal fade" id="locationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 920px;max-width: 920px">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>
                    <section class="breakfast_menu location-page">
                        <!-- hidden start-->
                        <div class="d_none" id="data-map"><?php echo json_encode($storeList) ?></div>
                        <!-- hidden end-->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 m-auto">
                                    <div class="section_heading mb_25">
                                        <!-- <h5>Menu Book</h5> -->
                                        <h3 class="red">SELECT A BINTANG BRO RESTAURANT</h3>
                                        <br/>
                                        <!--<h3>Find all restaurant opening hours PLUS you can place your order for restaurant pick up or delivery.</h3> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <a class="common_btn" href="javascript:void(0)" id="btCurrentLocation">
                                       USE CURRENT LOCATION
                                       <span class="icon">
                                            <img src="<?php echo base_url();?>images/location-icon.png"class="img-fluid w-100">
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="label-loc">OR</label>
                                </div>
                                <div class="col-md-6 text-center contact_form">
                                    <input type="text" id="autocomplete" class="form-search-loc" placeholder="POST CODE OR SUBURB/TOWN">
                                </div>
                            </div>
                            <div class="box-location-store d_none" style="width: 100%; padding:20px 12px">
                                
                                <div class="row" style="margin-top: 20px;">
                    
                                    <div class="col-xl-6 scrollable-content">
                                        <?php foreach($storeList as $store) : ?>
                                        <div class="storeDiv">
                                            <div class="title-store">
                                                <h5 class="pull-left"><?php echo $store->store_name; ?></h5>
                                                <h5 class="pull-right"><span><img class="pin-store" src="<?php echo base_url(); ?>images/pin-location.png"></span> <span class="distance" data-id="<?php echo $store->id_store ?>">0KM</span></h5>
                                                <div class="clear"></div>
                                            </div>
                                            <p>
                                                <?php echo $store->store_address; ?>
                                            </p>
                                            <p>
                                                Phone: <?php echo $store->store_phone; ?>
                                            </p>
                                            <div class="box-directions">
                                                <a href="javascript:void(0)" data-id="<?php echo $store->id_store ?>" class="btOpenHours">Open Hours</a>
                                                <a href="javascript:void(0)" data-lat="<?php echo $store->latitude ?>" data-lang="<?php echo $store->longitude ?>" class="btGetDirection">Get Directions</a>
                                                <hr>
                                            </div>
                                            <ul class="scheduleDiv d_none" style="margin-bottom: 20px" data-id="<?php echo $store->id_store ?>">
                                                <li><a href="javascript:void(0)" class='marklink'>Sun-Thu</a><?php echo $store->open_hours ?></li>
                                                <li><a href="javascript:void(0)" class='marklink'>Fri-Sat</a><?php echo $store->open_hours2 ?></li>
                                            </ul>
                                            <div id="marketDiv">
                                                <a href="javascript:void(0)" data-id="<?php echo $store->id_store ?>" data-name="<?php echo $store->store_name ?>" data-addr="<?php echo $store->store_address ?>" data-phone="<?php echo $store->store_phone ?>" data-op1="<?php echo $store->open_hours ?>" data-op2="<?php echo $store->open_hours2 ?>" class="btPickLocation"><span class="fa fa-store" style="color:#DA402E"></span> &nbsp;Select this store</a>

                                                <!-- <a href="https://ubereats.com"><img style="height: 18px !important" src="<?php echo base_url(); ?>images/ubereats.png"></span></a> -->
                                            </div>
                                            <p style="margin-top: 30px">
                                                Our current opening hours may change from 
                                                day to day as a reflection of the current 
                                                trading environment.
                                            </p>

                                            <hr style="margin: 40px 0px" />
                                        </div>
                                        
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-xl-6">
                                        <div id="maps" style="width: 100%;height: 500px">
                                          <!-- Maps Here... -->
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL POPUT END -->