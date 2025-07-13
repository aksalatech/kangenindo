<!--Navbar Start-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        
        <!-- LOGO -->
        <div class="logo">
            <div class="pull-left div-settings dnone" style="position:absolute;left:30px;top:34px;z-index:999">
                <img title="Edit" id="btedit-logo" style="width:28px;height:28px" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
            </div>
            <a href="<?php echo base_url() ?>">
                <img class="logo-light" src="<?php echo base_url(); ?>image/<?php echo $config->logo_light; ?>" alt="<?php echo $config->title; ?>" />
                <img class="logo-dark dnone" src="<?php echo base_url(); ?>image/<?php echo $config->logo_dark; ?>" alt="<?php echo $config->title; ?>" />
            </a>
        </div>

       <!--  <a class="navbar-brand logo" href="<?php echo base_url() ?>">
            <?php echo $config->title; ?>
        </a> -->

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-scroll-nav="0" >Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-scroll-nav="1" >About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-scroll-nav="2" >Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-scroll-nav="3">Works</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-scroll-nav="4">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-scroll-nav="5">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Navbar End-->

<!-- Side Bar after login -->
<div id="side-bar" class="side-bar div-settings dnone">
    <table>
        <tr>
            <td>
                <a href="<?php echo base_url();?>home/do_logout">
                <img src="<?php echo base_url();?>assets/logout-icon.png" title="Log-out" width="30px" class="icon panel" /></a>
            </td>
        </tr>
        <tr>
            <td>
                <div style="margin:5px 0px 5px 0px;border-bottom:thin solid silver;width:auto;height:1px;"></div>
            </td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo base_url();?>assets/keys.png" title="Change Password" id="btmanage-change" width="30px" class="icon panel" />
            </td>
        </tr>
        <tr>
            <td>
                <div style="margin:5px 0px 5px 0px;border-bottom:thin solid silver;width:auto;height:1px;"></div>
            </td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo base_url();?>assets/admin-icon.png" title="Change Password" id="btmanage-admin" width="30px" class="icon panel" />
            </td>
        </tr>
        <tr>
            <td>
                <div style="margin:5px 0px 5px 0px;border-bottom:thin solid silver;width:auto;height:1px;"></div>
            </td>
        </tr>
        <!--  <tr>
            <td>
                <img src="<?php echo base_url();?>assets/book-icon.png" title="View Booking List" id="btmanage-booking" width="30px" class="icon" />
            </td>
        </tr>
        <tr>
            <td>
                <div style="margin:5px 0px 5px 0px;border-bottom:thin solid silver;width:auto;height:1px;"></div>
            </td>
        </tr> -->
        <tr>
            <td>
                <img src="<?php echo base_url();?>image/favicon.png" title="Change Logo" id="btchangeweblogo" width="35px" class="icon panel" />
                <input type="file" id="fnchweblogo" name="fnchweblogo" accept="image/x-png" />
            </td>
        </tr>
    </table>
</div>

<!-- Manage Admin -->
<div class="side-box" id="manage-admin-box">
    <span class="spclose" id="close-admin">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_admin" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Admin</button>
    <div class="uploadpanel dnone bnone" id="upload_admin">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Admin : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Username</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="25" id="txtad_username" placeholder="Username.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" maxlength="25" id="txtad_password" placeholder="Password.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="25" id="txtad_name" placeholder="Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Email</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="60" id="txtad_email" placeholder="Email.."  /></td>
            </tr>
            <tr>
                <td class="error_format" id="error-admin">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_admin"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_admin" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right"><input type="checkbox" checked="checked" id="chkad_visible" title="Active" /></td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_admin">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Admin :  </strong>
                    <input type="hidden" id="hid_id_evt" name="hid_id_evt" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Username</label>
                </td>
            </tr>
           <tr>
                <td colspan="2"><input type="text" maxlength="25" id="txtad_ed_username" readonly="readonly" placeholder="Username.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="25" id="txtad_ed_name" placeholder="Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Email</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="60" id="txtad_ed_email" placeholder="Email.."  /></td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-admin">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_admin"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_admin" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right"><input type="checkbox" checked="checked" id="chkvisible_ed_admin" title="Visible" /></td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="admin-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($fulluserList as $admin):
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" >
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $admin->ID_admin;?>">
                               
                                <i data-id="<?php echo $admin->ID_admin;?>" data-title="<?php echo $admin->admin_name;?>" class="btedit-admin icon fa fa-pencil"  data-email="<?php echo $admin->email;?>" data-visible="<?php echo $admin->active;?>" title="Edit Admin"></i><br/>

                                <input type="checkbox" disabled class="cursor"
                                <?php
                                    if ($admin->active==1) echo "checked";
                                ?> />
                               
                            </span>
                            <span class="btdelete-admin spclose back-white" data-id="<?php echo $admin->ID_admin;?>">X</span>
                            <span class="events_box" data-id="<?php echo $admin->ID_admin;?>" data-title="<?php echo $admin->admin_name;?>">
                                <strong><?php echo $admin->admin_name; ?></strong>
                                <br/>
                                <?php echo $admin->ID_admin; ?>
                                <br/>
                                <?php echo $admin->email; ?>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 

<!-- Change Password -->
<div class="side-box" id="div-change-pass">
    <div class="uploadpanel" >
        <table width="100%">
            <tr>
                <td colspan="2" >
                    <legend>Change Password..
                    <span class="spclose" id="close-chpass">X</span>
                    </legend>
                     
                </td>
            </tr>
             <tr>
                <td class="error_format" id="error-chpass" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Old Password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" maxlength="30" name="txtoldpass" id="txtoldpass" placeholder="Old Password"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>New Password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" maxlength="30" id="txtnewpass" name="txtnewpass" placeholder="New Password.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Confirm Password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" maxlength="30" id="txtconfirm" name="txtconfirm" placeholder="New Password.."  /></td>
            </tr>            
            <tr>
                <td colspan="2" align="right" style="padding-top:15px">
                    <button type="button" id="btchangepass" class="btn btn-black btn-padding"><i class="icon-edit icon-white"></i>&nbsp;Change Password</button>
                </td>
            </tr>
        </table>
    </div>
 </div>

<!-- Change Logo -->
<div class="side-box" id="div-change-logo">
    <div class="uploadpanel" >
        <table width="100%">
            <tr>
                <td colspan="2" >
                    <legend>Change Logo..
                    <span class="spclose" id="close-chlogo">X</span>
                    </legend>
                     
                </td>
            </tr>
             <tr>
                <td class="error_format" id="error-chlogo" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Logo Light</label>
                </td>
            </tr>
            <tr>
                <td><input type="file" class="mini-input fluid"  name="fnlogolight" id="fnlogolight" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Logo Dark</label>
                </td>
            </tr>
            <tr>
                <td><input type="file" class="mini-input fluid" accept="image/*" name="fnlogodark" id="fnlogodark"  /></td>
            </tr>       
            <tr>
                <td colspan="2" align="right" style="padding-top:15px">
                    <button type="button" id="btuploadlogo" class="btn btn-black btn-padding"><i class="icon-edit icon-white"></i>&nbsp;Change Logo</button>
                </td>
            </tr>
        </table>
    </div>
 </div>

<!-- Login -->
<div class="side-box" id="div-login">
    <div class="uploadpanel" >
        <!-- Forgot Password-->
        <table width="100%" class="dnone" id="tbl_forgot">
            <tr>
                <td colspan="2" >
                    <legend>Forgot Password..</legend>
                </td>
            </tr>
             <tr>
                <td class="error_format" id="error-forgot" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Username</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="30" name="txtforgot_username" id="txtforgot_username" placeholder="USERNAME.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Email</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="30" id="txtforgot_email" name="txtforgot_email" placeholder="EMAIL.."  /></td>
            </tr>             
            <tr>
                <td colspan="2" align="right" style="padding-top:12px;">
                    <button type="button" id="btsendforgot" class="btn btn-black btn-padding"><i class="icon-envelope icon-white"></i>&nbsp;Send</button>
                    <button type="button" id="btback_forgot" class="btn btn-black btn-padding"><i class="icon-chevron-left icon-white"></i>&nbsp;Back</button>
                </td>
            </tr>
        </table>
        
        <!-- Login -->
        <table width="100%" id="tbl_login">
            <tr>
                <td colspan="2" >
                    <legend>Please Sign-In Here..</legend>
                </td>
            </tr>
             <tr>
                <td class="error_format" id="error-login" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Username</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="30" name="txtusername" id="txtusername" placeholder="USERNAME.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" maxlength="30" id="txtpassword" name="txtpassword" placeholder="PASSWORD.."  /></td>
            </tr>
            <tr>
                <td colspan="2" align="right" style="padding-top:12px;padding-bottom:5px;"><a href="#" id="btforgot" class="link small-font">Forgot Password</a></td>
            </tr>              
            <tr>
                <td colspan="2" align="right">
                    <button type="button" id="btlogin" class="btn btn-black btn-padding"><i class="icon-user icon-white"></i>&nbsp;Sign in</button>
                </td>
            </tr>
        </table>
    </div>
 </div>

<!-- How it Works -->
<div class="side-box" id="manage-how-box">
    <span class="spclose" id="close-how">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_how" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add How It Works</button>
    <div class="uploadpanel dnone bnone" id="upload_how">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create How It Works : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Icon Picture</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <i id="iIcon" class="icon-mobile fa fa-mobile" style="font-size:45px;margin-top:8px"></i>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select name="cbIcon" id="cbIcon" style="font-size:11pt" class="fluid">
                        <?php foreach($iconList as $icon) : ?>
                            <option value="<?php echo $icon->icon_class; ?>"><?php echo $icon->icon_name; ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txthow_title" placeholder="Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>How-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:200px" maxlength="250" id="txthow_text" placeholder="How Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-how">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_how"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_how" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_how">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit How It Works :  </strong>
                    <input type="hidden" id="hid_id_how" name="hid_id_how" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Icon Picture</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <i id="iedIcon" class="fa fa-mobile" style="font-size:45px;margin-top:8px"></i>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select name="cbedIcon" id="cbedIcon" style="font-size:11pt" class="fluid">
                        <?php foreach($iconList as $icon) : ?>
                            <option value="<?php echo $icon->icon_class; ?>"><?php echo $icon->icon_name; ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedhow_title" placeholder="Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>How-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:200px" maxlength="250" id="txtedhow_text" placeholder="How Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-how">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_how"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_how" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="how-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($howList as $how):
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" >
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $how->ID_hows;?>">
                                <i data-id="<?php echo $how->ID_hows;?>" data-title="<?php echo $how->how_title;?>" class="btedit-how icon fa fa-pencil" data-pict="<?php echo $how->how_pict; ?>" data-text="<?php echo $how->how_text;?>" title="Edit How"></i><br/>
                                <br/>
                                <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $how->ID_hows?>" data-value="<?php echo $how->seq_no;?>" class="bthow-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $how->ID_hows?>" data-value="<?php echo $how->seq_no;?>" class="bthow-down icon mini" />
                            </span>
                            <span class="btdelete-how spclose back-white" data-id="<?php echo $how->ID_hows;?>">X</span>
                            <span class="events_box" data-id="<?php echo $how->ID_hows;?>" data-title="<?php echo $how->how_title;?>">                               
                                <i style="font-size:30px" class="fa <?php echo $how->how_pict; ?>"></i>
                                <br/>
                                <strong><?php echo $how->how_title; ?></strong>
                                <br/>
                                <span class="small-font"><?php echo $how->how_text; ?></span>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 

<!-- Testimoni -->
<div class="side-box" id="manage-testimoni-box">
    <span class="spclose" id="close-testimoni">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_testimoni" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Testimonial</button>
    <div class="uploadpanel dnone bnone" id="upload_testimoni">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Testimonial : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Person Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtperson_name" placeholder="Person Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Corporation Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtcorp_name" placeholder="Corporation Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Person Photo</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fnperson_photo" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Testimoni-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:150px" maxlength="150" id="txttestimoni_text" placeholder="Testimonial Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent-test" class="dnone">
                    Status : <span id="percent_test"></span>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-testimoni">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_testimoni"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_testimoni" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_testimoni">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Testimonial :  </strong>
                    <input type="hidden" id="hid_id_testimoni" name="hid_id_testimoni" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Person Name</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <input type="text" maxlength="130" id="txtedperson_name" placeholder="Person Name.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Corporation Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedcorp_name" placeholder="Corporation Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Testimoni-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:300px" maxlength="250" id="txtedtestimoni_text" placeholder="Testimonial Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-testimoni">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_testimoni"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_testimoni" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="testimoni-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($testimoniList as $testimoni):
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" >   
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $testimoni->ID_testimoni;?>">
                                <i data-id="<?php echo $testimoni->ID_testimoni;?>" data-person="<?php echo $testimoni->person_name;?>" class="btedit-testimoni icon fa fa-pencil" data-corp="<?php echo $testimoni->corporation_name; ?>" data-text="<?php echo $testimoni->testimoni_text;?>" title="Edit Testimoni"></i><br/>
                                <i data-id="<?php echo $testimoni->ID_testimoni;?>" class="btchangepic-test icon fa fa-picture-o" title="Edit Picture"></i><br/>
                                <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $testimoni->ID_testimoni?>" data-value="<?php echo $testimoni->seq_no;?>" class="bttestimoni-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $testimoni->ID_testimoni;?>" data-value="<?php echo $testimoni->seq_no;?>" class="bttestimoni-down icon mini" />
                                <input type="file" class="fnchtest dnone" data-id="<?php echo $testimoni->ID_testimoni;?>" accept="image/*" />
                            </span>
                            <span class="btdelete-testimoni spclose back-white" data-id="<?php echo $testimoni->ID_testimoni;?>">X</span>
                            <span class="events_box" data-id="<?php echo $testimoni->ID_testimoni;?>" data-person="<?php echo $testimoni->person_name;?>">
                                <strong><?php echo $testimoni->person_name; ?></strong>
                                <?php if ($testimoni->corporation_name != "") : ?>
                                    <br/>
                                    (<em><?php echo $testimoni->corporation_name; ?></em>)
                                <?php endif; ?>
                                <br/>
                                <center><img style="width:85px;height:85px" src="<?php echo base_url() ?>image/photo/<?php echo $testimoni->person_photo; ?>" class="round" alt="" /></center>
                                <br/>
                                <span class="small-font"><?php echo $testimoni->testimoni_text; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 

<!-- Manage Slider -->
<div class="side-box" id="manage-home-box">
    <span class="spclose" id="close-home">X</span>
    <!-- <div class="clear"></div> -->
    <!-- <button type="button" id="btadd_home" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Slider Item</button> -->
    <div class="uploadpanel dnone bnone" id="upload_home">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Slider Item : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Slider Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtslider_name" placeholder="Slider Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Slider Image</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fnslider_image" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>HTML Element</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:300px" id="txthtml_element" placeholder="Place HTML Element here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent" class="dnone">
                    Status : <span id="percent"></span>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-home">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_home"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_home" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right"><input type="checkbox" checked="checked" id="chkslider_visible" title="Active" /></td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_home">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Slider Item :  </strong>
                    <input type="hidden" id="hid_id_home" name="hid_id_home" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Slider Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedslider_name" placeholder="Slider Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>HTML Element</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:300px" id="txtedhtml_element" placeholder="Place HTML Element here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-home">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_home"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_home" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right"><input type="checkbox" checked="checked" id="chkedslider_visible" title="Active" /></td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="home-scroll">
        <div class="child-scrollpanel">
        <?php
            $no=0;
            foreach($fullsliderList as $slider):
        ?>
            <div class="slide-img no-border">
                <div class="img-thumbnail wid" style="margin-bottom:-8px">
                    <div style="background-image:url('<?php echo base_url();?>image/full/<?php echo $slider->imagePath;?>')" class="div-img">
                        <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $slider->imageID;?>">
                            <i data-visible="<?php echo $slider->visible; ?>" data-html="<?php echo htmlentities($slider->content); ?>" data-name="<?php echo $slider->imageTitle; ?>" data-id="<?php echo $slider->imageID;?>" class="btedit-home fa fa-pencil" title="Edit Item"></i>
                            <br/>
                            <i data-id="<?php echo $slider->imageID;?>" class="btchangepic-home icon fa fa-picture-o" title="Edit Picture"></i><br/>
                            <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $slider->imageID?>" data-value="<?php echo $slider->imageIndex;?>" class="bthome-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $slider->imageID?>" data-value="<?php echo $slider->imageIndex;?>" class="bthome-down icon mini" />
                            <input type="file" class="fnchpic dnone" data-id="<?php echo $slider->imageID;?>" accept="image/*" />
                        </span>
                        <!-- <span class="btdelete-home spclose back-white" data-value="<?php echo $slider->imagePath;?>" data-id="<?php echo $slider->imageID;?>">X</span> -->
                    </div>
                </div>
                <div class="input-prepend input-append dnone" data-id="<?php echo $slider->imageID;?>">
                    <span class="add-on mini icon btclose-edit-home" data-id="<?php echo $slider->imageID;?>"><i class="icon-remove"></i></span>
                    <input type="text" class="txttitle-home mini-input span2" placeholder="Title.." value="<?php echo $slider->imageTitle;?>" data-id="<?php echo $slider->imageID;?>" />
                    <span class="add-on mini icon btsave-edit-home" data-id="<?php echo $slider->imageID;?>"><i class="icon-ok"></i></span>
                </div>
                <span class="splabel" data-id="<?php echo $slider->imageID;?>" style="margin-top:-30px"><?php echo $slider->imageTitle;?></span>
            </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
</div>


<!-- Why Us ? -->
<div class="side-box" id="manage-why-box">
    <span class="spclose" id="close-why">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_why" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Why Us ?</button>
    <div class="uploadpanel dnone bnone" id="upload_why">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Why Us ? : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Icon Picture</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <i id="iwhyIcon" class="icon-mobile" style="font-size:45px;margin-top:8px"></i>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select name="cbwhyIcon" id="cbwhyIcon" style="font-size:11pt" class="fluid">
                        <?php foreach($iconList as $icon) : ?>
                            <option value="<?php echo $icon->icon_class; ?>"><?php echo $icon->icon_name; ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Side</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="fluid small-font" name="cbSide" id="cbSide">
                        <option value="L">Left</option>
                        <option value="R">Right</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtwhy_title" placeholder="Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Why-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:200px" maxlength="250" id="txtwhy_text" placeholder="Why Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-why">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_why"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_why" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_why">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Why Us ? :  </strong>
                    <input type="hidden" id="hid_id_why" name="hid_id_why" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Icon Picture</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <i id="iedwhyIcon" class="icon-mobile" style="font-size:45px;margin-top:8px"></i>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select name="cbedwhyIcon" id="cbedwhyIcon" style="font-size:11pt" class="fluid">
                        <?php foreach($iconList as $icon) : ?>
                            <option value="<?php echo $icon->icon_class; ?>"><?php echo $icon->icon_name; ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Side</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="fluid" name="cbedSide" id="cbedSide">
                        <option value="L">Left</option>
                        <option value="R">Right</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedwhy_title" placeholder="Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Why-Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class="fluid" style="height:200px" maxlength="250" id="txtedwhy_text" placeholder="Why Text here.." ></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-why">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_why"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_why" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="why-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($whyList as $why):
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" >
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $why->ID_why;?>">
                                <i data-id="<?php echo $why->ID_why;?>" data-side="<?php echo $why->why_side;?>" data-title="<?php echo $why->why_title;?>" class="btedit-why icon fa fa-pencil" data-pict="<?php echo $why->why_pict; ?>" data-text="<?php echo $why->why_text;?>" title="Edit Why"></i><br/>
                                <br/>
                                <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $why->ID_why?>" data-value="<?php echo $why->seq_no;?>" class="btwhy-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $why->ID_why;?>" data-value="<?php echo $why->seq_no;?>" class="btwhy-down icon mini" />
                            </span>
                            <span class="btdelete-why spclose back-white" data-id="<?php echo $why->ID_why;?>">X</span>
                            <span class="events_box" data-id="<?php echo $why->ID_why;?>" data-title="<?php echo $why->why_title;?>">                               
                                <i style="font-size:30px" class="<?php echo $why->why_pict; ?>"></i>
                                <br/>
                                (<em><?php echo ($why->why_side == "L") ? "Left" : "Right"; ?></em>)
                                <br/>
                                <strong><?php echo $why->why_title; ?></strong>
                                <br/>
                                <span class="small-font"><?php echo $why->why_text; ?></span>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 

<!-- Pricing Plan -->
<div class="side-box" id="manage-plan-box">
    <span class="spclose" id="close-plan">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_plan" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Pricing Plan</button>
    <div class="uploadpanel dnone bnone" id="upload_plan">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Pricing Plan : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Plan Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtplan_name" placeholder="Plan Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Currency</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="20" id="txtcurrency" placeholder="Currency.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Plan Price</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" class="num fluid" maxlength="16" id="txtplan_price" placeholder="Plan price amount here.." />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Per each</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" class="fluid" maxlength="250" id="txtper_each" placeholder="Per each here.." />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-plan">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_plan"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_plan" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_plan">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Pricing Plan :  </strong>
                    <input type="hidden" id="hid_id_plan" name="hid_id_plan" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Plan Name</label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding:12px;">
                    <input type="text" maxlength="130" id="txtedplan_name" placeholder="Plan Name.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Currency</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedcurrency" placeholder="Currency.."  /></td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Plan Price</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" class="num fluid" maxlength="16" id="txtedplan_price" placeholder="Plan price amount here.." />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Per each</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" class="fluid" maxlength="250" id="txtedper_each" placeholder="Per each here.." />
                </td>
            </tr>
            <tr>
                <td class="error_format" colspan="2"  id="error-edit-plan">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_plan"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_plan" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="plan-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($planList as $plan):
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" >   
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $plan->ID_plan;?>">
                                <i data-id="<?php echo $plan->ID_plan;?>" data-name="<?php echo $plan->plan_name;?>" class="btedit-plan icon fa fa-pencil" data-currency="<?php echo $plan->currency; ?>" data-price="<?php echo $plan->price;?>" data-pereach="<?php echo $plan->per_each; ?>" title="Edit Pricing Plan"></i><br/>
                                <i data-id="<?php echo $plan->ID_plan;?>" data-name="<?php echo $plan->plan_name;?>" class="btedit-detail icon icon-document" title="Edit Detail Plan"></i><br/>
                                <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $plan->ID_plan; ?>" data-value="<?php echo $plan->seq_no;?>" class="btplan-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $plan->ID_plan;?>" data-value="<?php echo $plan->seq_no;?>" class="btplan-down icon mini" />
                            </span>
                            <span class="btdelete-plan spclose back-white" data-id="<?php echo $plan->ID_plan;?>">X</span>
                            <span class="events_box" data-id="<?php echo $plan->ID_plan;?>" data-name="<?php echo $plan->plan_name;?>">
                                <strong><?php echo $plan->plan_name; ?></strong>
                                <br/>
                                (<em><?php echo $plan->currency; ?></em>)
                                <br/>
                                <?php echo number_format($plan->price,0,",","."); ?> <span class="small-font">/ <?php echo $plan->per_each; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 


<!-- Detail Pricing Plan -->
<div class="side-box" id="manage-detail-plan-box">
    <span class="spclose" id="close-detail-plan">X</span>
    <div class="clear"></div>
    <strong><h5 id="planc"></h5></strong>
    <div class="uploadpanel" id="upload_detail" style="margin-top:-10px">
        <input type="hidden" id="hid_id_detail" name="hid_id_detail" />
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2">
                    <label>Detail Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtdetail_text" placeholder="Detail Text.."  /></td>
            </tr>
            <tr>
                <td class="error_format" id="error-detail">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important" align="right">
                    <button type="button" id="btsave_detail"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btclear_detail" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Clear</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" style="min-height:200px;height:63%">
        <div class="child-scrollpanel" id="detail-plan-scroll" >
            <!-- Detail Item here.. -->
        </div>
    </div>
</div> 


<!-- Category Portfolio -->
<div class="side-box" id="manage-category-box">
    <span class="spclose" id="close-category">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_category" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Category</button>
    <div class="uploadpanel dnone bnone" id="upload_category">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Category : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Category Code</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="10" id="txtcategory_code" placeholder="Category Code.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Category Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtcategory_name" placeholder="Category Name.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2" class="error_format" id="error-category">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_category"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_category" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" id="chkVisible" checked />
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_category">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Category :  </strong>
                    <input type="hidden" id="hid_id_category" name="hid_id_category" />
                </td>
            </tr>
              <tr>
                <td colspan="2">
                    <label>Category Code</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="10" id="txtedcategory_code" placeholder="Category Code.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Category Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtedcategory_name" placeholder="Category Name.."  />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-category" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_category"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_category" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" id="chkedVisible" />
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="category-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($fullcategoryList as $category) :
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" style="min-height:68px">
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $category->ID_category;?>">
                                <i data-id="<?php echo $category->ID_category;?>" data-visible="<?php echo $category->is_active; ?>" data-code="<?php echo $category->category_code;?>" data-name="<?php echo $category->category_name;?>" class="btedit-category fa fa-pencil" title="Edit Category"></i><br/>
                                <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $category->ID_category; ?>" data-value="<?php echo $category->seq_no;?>" class="btcategory-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $category->ID_category;?>" data-value="<?php echo $category->seq_no;?>" class="btcategory-down icon mini" />
                            </span>
                            <span class="btdelete-category spclose back-white" data-id="<?php echo $category->ID_category;?>">X</span>
                            <span class="events_box" data-id="<?php echo $category->ID_category;?>" data-title="<?php echo $category->category_name;?>">                               
                                <strong><?php echo $category->category_name; ?></strong>
                                <br/>
                                (<em><?php echo $category->category_code; ?></em>)
                                <br/>
                                <b>(<font class="small-font"><?php echo $category->is_active == "1" ? "Active" : "Not Active"; ?></font>)</b>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 


<!-- Latest News -->
<div class="side-box" id="manage-news-box">
    <span class="spclose" id="close-news">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_news" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add News</button>
    <div class="uploadpanel dnone bnone" id="upload_news">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Latest News : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="10" id="txttitle" placeholder="News Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Image</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fnnews_image" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtlink" placeholder="News Link.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Text</label>
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <a href="#textModal" data-toggle="modal" class="btn btn-black fluid"><span class="icon-document"></span> &nbsp;Edit Blog Text</a>
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Creator</label>
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtcreator" placeholder="News Creator.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2" class="error_format" id="error-news">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent-news" class="dnone">
                    Status : <span id="percent-news"></span>
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_news"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_news" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" id="chkblogVisible" checked />
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_news">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Latest News :  </strong>
                    <input type="hidden" id="hid_id_news" name="hid_id_news" />
                </td>
            </tr>
              <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="120" id="txtedtitle" placeholder="News Title.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtedlink" placeholder="News Link.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Text</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="#textModal" data-toggle="modal" class="btn btn-black fluid"><span class="icon-document"></span> &nbsp;Edit Blog Text</a>
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Creator</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="240" id="txtedcreator" placeholder="News Creator.."  />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-news" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_news"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_news" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" id="chkedblogVisible" />
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="news-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($fullblogList as $blog) :
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" style="min-height:68px">
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $blog->ID_blog;?>">
                                <i data-id="<?php echo $blog->ID_blog;?>" data-text='<?php echo str_replace("'", "\"", $blog->blog_text); ?>' data-visible="<?php echo $blog->visible; ?>" data-image="<?php echo $blog->image;?>" data-creator="<?php echo $blog->creator; ?>" data-title="<?php echo $blog->title;?>" data-link="<?php echo $blog->link;?>" class="btedit-news icon fa fa-pencil" title="Edit News"></i><br/>
                                <i data-id="<?php echo $blog->ID_blog;?>" class="btchangepic-news icon fa fa-picture-o" title="Edit Picture"></i><br/>
                                <input type="file" class="fnchimg dnone" data-id="<?php echo $blog->ID_blog;?>" accept="image/*" />
                            </span>
                            <span class="btdelete-news spclose back-white" data-id="<?php echo $blog->ID_blog;?>" data-value="<?php echo $blog->image; ?>">X</span>
                            <span class="events_box" data-id="<?php echo $blog->ID_blog;?>" data-title="<?php echo $blog->title;?>">                               
                                <strong><?php echo $blog->title; ?></strong>
                                <br/>
                                By <em><?php echo $blog->creator; ?></em>
                                <br/>
                                <b>(<font class="small-font"><?php echo $blog->visible == "1" ? "Active" : "Not Active"; ?></font>)</b><br/>
                                 <font style="font-size:9pt"><?php echo date('d M Y H:m', strtotime($blog->created_date)); ?></font>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 

<!-- Our Team -->
<div class="side-box" id="manage-team-box">
    <span class="spclose" id="close-team">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_team" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Team Member</button>
    <div class="uploadpanel dnone bnone" id="upload_team">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Team Member : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtteam_name" placeholder="Slider Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Photo</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fnteam_photo" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Position</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtposition" placeholder="Position Name.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Facebook Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtfb_link" placeholder="Facebook Link.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Twitter Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txttwitter_link" placeholder="Twitter Link.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>LinkedIn Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtlinkedin_link" placeholder="LinkedIn Link.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent-team" class="dnone">
                    Status : <span id="percent-team"></span>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-team">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_team"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_team" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_team">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Team Member :  </strong>
                    <input type="hidden" id="hid_id_team" name="hid_id_team" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Name</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" maxlength="130" id="txtedteam_name" placeholder="Slider Name.."  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Position</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedposition" placeholder="Position Name.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Facebook Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedfb_link" placeholder="Facebook Link.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Twitter Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedtwitter_link" placeholder="Twitter Link.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>LinkedIn Link</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedlinkedin_link" placeholder="LinkedIn Link.."  />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-team">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_team"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_team" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>                
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="team-scroll">
        <div class="child-scrollpanel">
        <?php
            $no=0;
            foreach($teamList as $team) :
        ?>
            <div class="slide-img no-border">
                <div class="img-thumbnail wid" style="margin-bottom:-8px">
                    <div style="background-image:url('<?php echo base_url();?>image/team/<?php echo $team->photo_path;?>')" class="div-img">
                        <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $team->ID_team;?>">
                            <i data-name="<?php echo $team->name; ?>" data-position="<?php echo $team->position_name; ?>" data-fb="<?php echo $team->facebook_link; ?>" data-twitter="<?php echo $team->twitter_link; ?>" data-linkedin="<?php echo $team->linkedin_link; ?>" data-id="<?php echo $team->ID_team;?>" class="btedit-team icon fa fa-pencil" title="Edit Member"></i>
                            <br/>
                            <i data-id="<?php echo $team->ID_team;?>" class="btchangepic-team icon fa fa-picture-o" title="Edit Photo"></i><br/>
                            <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $team->ID_team?>" data-value="<?php echo $team->seq_no;?>" class="btteam-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $team->ID_team?>" data-value="<?php echo $team->seq_no;?>" class="btteam-down icon mini" />
                            <input type="file" class="fnchphoto dnone" data-id="<?php echo $team->ID_team;?>" accept="image/*" />
                        </span>
                        <span class="btdelete-team spclose back-white" data-value="<?php echo $team->photo_path;?>" data-id="<?php echo $team->ID_team;?>">X</span>
                    </div>
                </div>
                <span class="splabel" data-id="<?php echo $team->ID_team;?>" style="margin-top:-30px"><?php echo $team->name;?></span>
            </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
</div>


<!-- Our Portfolio -->
<div class="side-box" id="manage-portfolio-box">
    <span class="spclose" id="close-portfolio">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_portfolio" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Portfolio</button>
    <div class="uploadpanel dnone bnone" id="upload_portfolio">
        
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Portfolio : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtimgtitle" placeholder="Image Title.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Category</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="fluid" id="cbImgCategory" name="cbImgCategory" style="font-size:11pt">
                        <?php foreach ($categoryList as $category) : ?>
                            <option value="<?php echo $category->ID_category; ?>"><?php echo $category->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Large Image</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fnimg_photo" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Description</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtimgdesc" placeholder="Description.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent-portfolio" class="dnone">
                    Status : <span id="percent-portfolio"></span>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-portfolio">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_portfolio"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_portfolio" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" name="chkImgVisible" id="chkImgVisible" checked />
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_portfolio">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Portfolio :  </strong>
                    <input type="hidden" id="hid_id_portfolio" name="hid_id_portfolio" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedimgtitle" placeholder="Image Title.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Category</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="fluid" id="cbedImgCategory" name="cbedImgCategory" style="font-size:11pt">
                        <?php foreach ($categoryList as $category) : ?>
                            <option value="<?php echo $category->ID_category; ?>"><?php echo $category->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Description</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtedimgdesc" placeholder="Description.."  />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-portfolio">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_portfolio"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_portfolio" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" name="chkedImgVisible" id="chkedImgVisible" />
                </td>            
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="portfolio-scroll">
        <div class="child-scrollpanel">
        <?php
            $no=0;
            foreach($fullimageList as $image) :
        ?>
            <div class="slide-img no-border">
                <div class="img-thumbnail wid" style="margin-bottom:-8px">
                    <div style="background-image:url('<?php echo base_url();?>image/portfolio/thumb/<?php echo $image->imagePath;?>')" class="div-img">
                        <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $image->imageID;?>">
                            <i data-visible="<?php echo $image->visible; ?>" data-title="<?php echo $image->imageTitle; ?>" data-category="<?php echo $image->ID_category; ?>" data-desc="<?php echo $image->imageDesc; ?>"  data-id="<?php echo $image->imageID;?>" class="btedit-portfolio fa fa-pencil" title="Edit Portfolio"></i>
                            <br/>
                            <i data-id="<?php echo $image->imageID;?>" class="btchangepic-portfolio fa fa-picture-o" title="Edit Image"></i><br/>
                            <i data-id="<?php echo $image->imageID;?>" class="btndetail-portfolio fa fa-file-text" title="View Detail"></i><br/>
                            <img src="<?php echo base_url();?>assets/arrow-up.png" data-id="<?php echo $image->imageID?>" data-value="<?php echo $image->imageIndex;?>" class="btportfolio-up icon mini"/><br/><img src="<?php echo base_url();?>assets/arrow-bottom.png" data-id="<?php echo $image->imageID;?>" data-value="<?php echo $image->imageIndex;?>" class="btportfolio-down icon mini" />
                            <input type="file" class="fnchport dnone" data-id="<?php echo $image->imageID;?>" accept="image/*" />
                        </span>
                        <span class="btdelete-portfolio spclose back-white" data-value="<?php echo $image->imagePath;?>" data-id="<?php echo $image->imageID;?>">X</span>
                    </div>
                </div>
                <span class="splabel" data-id="<?php echo $image->imageID;?>" style="margin-top:-30px"><?php echo $image->imageTitle;?></span>
            </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
</div>

<!-- Our Detail Portfolio -->
<div class="side-box" id="manage-detail-portfolio-box">
    <span class="spclose" id="close-detail-portfolio">X</span>
    <div class="clear"></div>
    <button type="button" id="btadd_detail_portfolio" class="btn btn-black btn-padding btnfull"><i class="icon-plus icon-white"></i>&nbsp;Add Detail Portfolio</button>
    <div class="uploadpanel dnone bnone" id="upload_detail_portfolio">
         <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Create Detail Portfolio : </strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtdetimgtitle" placeholder="Image Title.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Large Image</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" id="fndetimg_photo" class="mini-input fluid"  accept="image/*"  /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Description</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtdetimgdesc" placeholder="Description.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2" id="td-percent-detail-portfolio" class="dnone">
                    Status : <span id="percent-detail-portfolio"></span>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-detail-portfolio">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button" id="btsave_detail_portfolio"  class="btn btn-black btn-padding"><i class="fa fa-pencil icon-white"></i>&nbsp;Create </button>
                    <button type="button" id="btcancel_detail_portfolio" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" name="chkDetImgVisible" id="chkDetImgVisible" checked />
                </td>
            </tr>
        </table>
    </div>
     <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_detail_portfolio">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Edit Detail Portfolio :  </strong>
                    <input type="hidden" id="hid_id_detail_portfolio" name="hid_id_detail_portfolio" />
                    <input type="hidden" id="hid_id_image_port" name="hid_id_image_port" />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txteddetimgtitle" placeholder="Image Title.."  />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Description</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txteddetimgdesc" placeholder="Description.."  />
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-edit-detail-portfolio">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_detail_portfolio"><i class="fa fa-pencil icon-white"></i>&nbsp;Save </button>
                    <button type="button" id="btcanceled_detail_portfolio" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
                <td align="right">
                    <input type="checkbox" name="chkeddetImgVisible" id="chkeddetImgVisible" />
                </td>            
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull">
        <div class="child-scrollpanel" id="detail-portfolio-scroll">

        </div>
    </div>
</div>

<!-- Booking Schedule -->
<div class="side-box" id="manage-booking-box">
    <table width="100%">
        <tr>
            <td colspan="2" >
                <legend>Booking List..
                <span class="spclose" id="close-booking">X</span>
                </legend>
            </td>
        </tr>
    </table>
    <div class="clear"></div>

    <!-- Edit -->
    <div class="uploadpanel dnone bnone" id="edit_booking">
        <table width="100%" class="tbl-input">
            <tr>
                <td colspan="2" >
                    <strong>Send Message :  </strong>
                    <input type="hidden" id="hid_id_booking" name="hid_id_booking" />
                </td>
            </tr>
              <tr>
                <td colspan="2">
                    <label>Title</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" maxlength="130" id="txtmsgtitle" placeholder="Message Title.."  />
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Message</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea id="txtSendMessage" style="width:100%" name="txtSendMessage" placeholder="Fill your message here.."></textarea>
                </td>
            </tr>
            <tr>
                <td class="error_format" id="error-booking" colspan="2">
                    <!-- Place error here.. -->
                </td>
            </tr>
            <tr>
                <td style="padding-top:12px !important">
                    <button type="button"  class="btn btn-black btn-padding" id="btsend_booking"><i class="icon-envelope icon-white"></i>&nbsp;Send </button>
                    <button type="button" id="btcancel_booking" class="btn btn-black btn-padding"><i class="icon-back icon-white"></i>&nbsp;Cancel</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="scrollpanel sidealfull" id="booking-scroll">
        <div class="child-scrollpanel" >
            <?php
                foreach($bookingList as $booking) :
            ?>
                <div class="slide-img" >
                    <div class="img-polaroid wid_240"  >
                        <div class="div-evt" style="min-height:68px">
                            
                            <span class="spleft back-white-left" style="text-align:center" data-id="<?php echo $booking->ID_booking;?>">
                                <i data-id="<?php echo $booking->ID_booking;?>" class="btsend-mail icon icon-envelope" title="Send Email"></i><br/>
                            </span>
                            <?php if ($booking->status != "R") : ?>
                                <span class="btreject-booking spclose back-white" data-value="R" data-id="<?php echo $booking->ID_booking;?>">X</span>
                            <?php endif; ?>
                            <?php if ($booking->status != "A") : ?>
                                <span class="btaccept-booking spclose back-white" data-value="A" data-id="<?php echo $booking->ID_booking;?>">&#10003;</span>
                            <?php endif; ?>
                            <span class="events_box" data-id="<?php echo $booking->ID_booking;?>" data-title="<?php echo $booking->places;?>">                               
                                <strong><?php echo $booking->places; ?></strong>
                                <br/>
                                By <em><?php echo $booking->contact_name; ?></em> - (<?php echo $booking->contact_phone; ?>)
                                <br/>
                                 - <?php echo $booking->category_name; ?> -<br/>
                                 <font style="font-size:9pt"><?php echo date('d M Y H:i', strtotime($booking->book_date)); ?></font><br/>
                                 <font style="font-size:9pt"><?php echo $booking->notes; ?></font><br/>
                                  <b>(<font class="small-font"><?php 
                                        switch ($booking->status)
                                        {
                                            case "P" : echo "Pending"; break;
                                            case "A" : echo "Accepted"; break;
                                            case "R" : echo "Rejected" ; break;
                                        }; ?></font>)</b>
                            </span>
                        </div>
                    </div>
                   
                </div>
            <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div> 




<!-- Mini Welcome-->
<?php
    if ($this->session->userdata("id")!="")
    {
?>
        <div class="welcome-planc">
            Welcome <strong><?php echo $this->session->userdata("name");?></strong>
        </div>
<?php
    }
?>
