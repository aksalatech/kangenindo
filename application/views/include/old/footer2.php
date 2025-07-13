<!--  Footer Bar -->
<footer class="pt-50 pb-50">
	<div class="container">
		<div class="pull-left div-settings dnone">
            <img title="Edit" id="btedit-contact" src="<?php echo base_url();?>image/Icon_tools.png" class="icon mini-icon-settings" />
            <img title="Save" id="btsave-contact" src="<?php echo base_url();?>image/icon-save.png" class="icon mini-icon-settings_30" />
            <img title="Cancel" id="btcancel-contact" src="<?php echo base_url();?>image/icon-delete.png" class="icon mini-icon-settings_32"/>
        </div>
		<div class="row text-center">
			<div class="col-md-3 col-sm-6">
				<!--Contant Item-->
				<div class="contact-info">
					<h5><?php echo $config->title; ?></h5>
					<p><?php echo htmlspecialchars_decode($aboutList->simple_quote); ?>.</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!--Contant Item-->
				<div class="contact-info">
					<h5>Phone No.</h5>
					<p id="p-mp1" class="contact-label"><?php echo $contactList->mp1; ?></p>
					<div class="edit-contact">
                        <input type="text" id="txtphone" style="width:80%;text-align:center" max-length="20" value="<?php echo $contactList->mp1; ?>" />
                    </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!--Contant Item-->
				<div class="contact-info">
					<h5>Email</h5>
					<p id="p-email" class="contact-label"><?php echo $contactList->email; ?></p>
					<div class="edit-contact">
                        <input type="text" id="txtemail" placeholder="Email 1.." style="width:80%;text-align:center" value="<?php echo $contactList->email; ?>" /><br/>
                        <input type="text" id="txtemail2" placeholder="Email 2.." style="width:80%;text-align:center;margin-top:10px" value="<?php echo $contactList->email2; ?>" />
                    </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!--Contant Item-->
				<div class="contact-info">
					<h5>Address</h5>
					<p id="p-location" class="contact-label"><?php echo nl2br($contactList->location); ?>.</p>
					<div class="edit-contact">
                        <textarea id="txtaddress" style="width:100%;text-align:center"><?php echo str_replace("<br/>","\n", $contactList->location); ?></textarea>
                    </div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<hr>
				<p class="copy pt-30">
					<?php echo $config->title; ?> &copy; 2018. All Right Reserved, created By <a href="#">Albert Ricia</a>.
				</p>
			</div>
		</div>
	</div>
</footer>