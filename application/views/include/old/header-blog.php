<!-- Header -->
<header id="header" class="header">
    <div class="header-inner">

        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>home">
                <img class="logo-light" src="<?php echo base_url(); ?>image/<?php echo $config->logo_light; ?>" alt="<?php echo $config->title; ?>" />
                <img class="logo-dark" src="<?php echo base_url(); ?>image/<?php echo $config->logo_dark; ?>" alt="<?php echo $config->title; ?>" />
            </a>
        </div>
        <!-- End Logo -->

        <!-- Mobile Navbar Icon -->
        <div class="nav-mobile nav-bar-icon">
            <span></span>
        </div>
        <!-- End Mobile Navbar Icon -->

        <!-- Navbar Navigation -->
        <div class="nav-menu singlepage-nav">
            <ul class="nav-menu-inner">
                <li>
                    <a class="current" id="link-home"><strong>Home</strong></a>
                </li>
                <li>
                    <a id="link-blog"><strong>Blog</strong></a>
                </li>
            </ul>
        </div>
        <!-- End Navbar Navigation -->


    </div>
</header>
        <!-- End Header -->

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
                    <button type="button" id="btsave_admin"  class="btn btn-black btn-padding"><i class="icon-pencil icon-white"></i>&nbsp;Create </button>
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
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_admin"><i class="icon-pencil icon-white"></i>&nbsp;Save </button>
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
                               
                                <i data-id="<?php echo $admin->ID_admin;?>" data-title="<?php echo $admin->admin_name;?>" class="btedit-admin icon icon-pencil"  data-email="<?php echo $admin->email;?>" data-visible="<?php echo $admin->active;?>" title="Edit Admin"></i><br/>

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
                    <button type="button" id="btsave_news"  class="btn btn-black btn-padding"><i class="icon-pencil icon-white"></i>&nbsp;Create </button>
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
                    <button type="button"  class="btn btn-black btn-padding" id="btsaveed_news"><i class="icon-pencil icon-white"></i>&nbsp;Save </button>
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
                                <i data-id="<?php echo $blog->ID_blog;?>" data-text='<?php echo str_replace("'", "\"", $blog->blog_text); ?>' data-visible="<?php echo $blog->visible; ?>" data-image="<?php echo $blog->image;?>" data-creator="<?php echo $blog->creator; ?>" data-title="<?php echo $blog->title;?>" data-link="<?php echo $blog->link;?>" class="btedit-news icon icon-pencil" title="Edit News"></i><br/>
                                <i data-id="<?php echo $blog->ID_blog;?>" class="btchangepic-news icon icon-picture" title="Edit Picture"></i><br/>
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