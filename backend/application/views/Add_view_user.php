<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | User</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>

<body id="bd_faqView" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <?php include "includes/hidden.php"; ?>

  <?php require("includes/header_new.php"); ?>

  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <?php require("includes/navigation_new.php"); ?>

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <?php require("includes/header-top.php"); ?>

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Subheader-->
          <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
              <!--begin::Toolbar-->
              <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold my-1 mr-5">User</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>user" class="text-muted"> User</a>
                  </li>
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          <!--end::Subheader-->
          <!--begin::Entry-->
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <!--begin::Card-->
                  
                        
                    <?php if (isset($req)) { ?> 
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Update User</h3>
                        </div>
                        <!--begin::Form--> 
                        <?php if (isset($err)) { ?>
                          <h3 class="text-center text-danger"><?php echo $err; ?></h3>
                        <?php } ?>

                        <form method="POST" action="<?php echo base_url(); ?>User/update_user">
                      <?php
                        foreach ($viewUser as $key) {
                          ?>
                        <input type="hidden" name="userID" id="userID" value="<?php echo $key->userid; ?>" />

                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>User Name:</label>
                              <input type="text" class="form-control" name="username" id="username" value="<?php echo $key->username ?>">
                            </div>
                            <div class="col-lg-6">
                              <label>Name:</label>
                              <input type="text" class="form-control" name="nameUser" id="nameUser" value="<?php echo $key->employee_name ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Address:</label>
                              <input type="text" class="form-control" name="addressUser" id="addressUser" value="<?php echo $key->address ?>">
                            </div>
                            <div class="col-lg-6">
                              <label>Email:</label>
                              <input type="email" class="form-control" name="emailUser" id="emailUser" value="<?php echo $key->email ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Phone:</label>
                              <input type="text" class="form-control" name="phoneUser" id="phoneUser" value="<?php echo $key->phone ?>">
                            </div>
                            <div class="col-lg-6">
                              <label>Position:</label>
                              <div class="radio-inline">
                                <!-- <label class="radio">
                                  <input type="radio" <?php echo ($key->position == 'Super Admin') ? 'checked' : ''; ?> name="position" id="position1" value="Super Admin"/>
                                  <span></span>Super Admin
                                </label> -->
                                <label class="radio">
                                  <input type="radio" <?php echo ($key->position == 'Admin') ? 'checked' : ''; ?> name="position" id="position2" value="Admin"/>
                                  <span></span>Admin
                                </label>
                                <!-- <label class="radio">
                                  <input type="radio" <?php echo ($key->position == 'User') ? 'checked' : ''; ?> name="position" id="position3" value="User" >
                                  <span></span>User
                                </label>
                                <label class="radio">
                                  <input type="radio" <?php echo ($key->position == 'Cook') ? 'checked' : ''; ?> name="position" id="position4" value="Cook"/>
                                  <span></span>Cook
                                </label>
                                <label class="radio">
                                  <input type="radio" <?php echo ($key->position == 'Store') ? 'checked' : ''; ?> name="position" id="position5" value="Store"/>
                                  <span></span>Store
                                </label> -->
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            
                            <div class="col-lg-4">
                              <label>Aktif?</label>
                              <label class="checkbox">
                                <input type="checkbox" name="active" id="active" <?php echo ($key->active == 1) ? "checked" : "" ?> value="1"/>
                                <span></span>
                                &nbsp;Yes
                              </label>
                            </div>
                            <div class="col-lg-4">
                              <label>Is Expired ?</label>
                              <label class="checkbox">
                                <input type="checkbox" name="isExpired" id="isExpired" <?php echo ($key->is_expired == 1) ? "checked" : "" ?> value="1"/>
                                <span></span>
                                &nbsp;Yes
                              </label>
                            </div>
                            <div class="col-lg-4 expired <?php echo ($key->is_expired == 1) ? "" : "d_none" ?>">
                              <label>Expired Date</label>
                              <input type="text" readonly class="date form-control" name="expiredDt" id="expiredDt" value="<?php echo ($key->expired_dt == null) ? '' : date('Y-m-d',strtotime($key->expired_dt)) ?>"/>
                            </div>
                          </div>

                        </div>
                        <?php
                      }
                      ?>
                    <?php
                    } else {
                    ?>
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran User Baru</h3>
                        </div>
                        <!--begin::Form--> 
                        <?php if (isset($err)) { ?>
                          <h3 class="text-center text-danger"><?php echo $err; ?></h3>
                        <?php } ?>

                        <form method="POST" action="<?php echo base_url(); ?>User/add_user">

                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>User Name:</label>
                              <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="col-lg-6">
                              <label>Password:</label>
                              <input type="password" class="form-control" name="password" id="password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Name:</label>
                              <input type="text" class="form-control" name="nameUser" id="nameUser">
                            </div>
                            <div class="col-lg-6">
                              <label>Address:</label>
                              <input type="text" class="form-control" name="addressUser" id="addressUser">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Position:</label>
                              <div class="radio-inline">
                                <!-- <label class="radio">
                                  <input type="radio" name="position" id="position1" value="Super Admin" checked/>
                                  <span></span>Super Admin
                                </label> -->
                                <label class="radio">
                                  <input type="radio" name="position" id="position2" value="Admin" checked/>
                                  <span></span>Admin
                                </label>
                                <!-- <label class="radio">
                                  <input type="radio" name="position" id="position3" value="User">
                                  <span></span>User
                                </label>
                                <label class="radio">
                                  <input type="radio" name="position" id="position4" value="Cook">
                                  <span></span>Cook
                                </label>
                                <label class="radio">
                                  <input type="radio" name="position" id="position5" value="Store">
                                  <span></span>Store
                                </label> -->
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Email:</label>
                              <input type="email" class="form-control" name="emailUser" id="emailUser">
                            </div>
                            <div class="col-lg-6">
                              <label>Phone:</label>
                              <input type="text" class="form-control" name="phoneUser" id="phoneUser">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-4">
                              <label>Aktif?</label>
                              <label class="checkbox">
                                <input type="checkbox" name="active" id="active" value="1" />
                                <span></span>
                                &nbsp;Yes
                              </label>
                            </div>
                            <div class="col-lg-4">
                              <label>Is Expired ?</label>
                              <label class="checkbox">
                                <input type="checkbox" name="isExpired" id="isExpired" value="1" />
                                <span></span>
                                &nbsp;Yes
                              </label>
                            </div>
                            <div class="col-lg-4 expired d_none">
                              <label>Expired Date</label>
                              <input type="text" readonly class="date form-control" name="expiredDt" id="expiredDt"  />
                            </div>
                          </div>

                        </div>
                    <?php
                    } ?>
                      
                        
                        <div class="card-footer text-right">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo base_url(); ?>User" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::Wrapper-->
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
    function showTR()
    {
      var position1 = $("#position1").prop("checked");
      var position2 = $("#position2").prop("checked");
      var position3 = $("#position3").prop("checked");
     
      if (position1) {
        $("#trLevel").show();
        $("#trPengguna").hide();
        $("#trProdusen").hide();
        $("#trPejabat").show();
      } else if (position2) {
        $("#trPengguna").hide();
        $("#trProdusen").show();
        $("#trPejabat").hide();
        $("#trLevel").hide();
        
        
      } else if (position3) {
        $("#trPengguna").show();
        $("#trProdusen").hide();
        $("#trPejabat").hide();
        $("#trLevel").hide();
      }
    }
	
	function setValueAutomation()
    {
      var position1 = $("#position1").prop("checked");
      var position2 = $("#position2").prop("checked");
      var position3 = $("#position3").prop("checked");

      if (position2) {
	    //Produsen        
		var businessID = document.getElementById("businessID").value;
		showEditForm(businessID,"produsen");
		//alert("PRODUSEN :"+businessID);
		$("#businessID").change(function(e)
        {          
		  setValueAutomation();
        });
      } else if (position3) {
	    var typeID = document.getElementById("typeID").value;
		showEditForm(typeID,"pengguna");
		//alert("PENGGUNA :"+typeID);
		$("#typeID").change(function(e)
        {          
		  setValueAutomation();
        });
	   //Pengguna       
      }
    }
	
	function showEditForm(id,type){		
			
			$.ajax({
				url: "http://dev1.dsb-id.com/User/get_detail_user?userID="+id+"&type="+type ,
				dataType: 'json',                				
				success: function(data){
									
					var obj = JSON.parse(JSON.stringify(data));
					console.log(obj);	
					console.log("TEST ADDRESS"+obj['detail']['0'].address);
					$("#addressUser").val (obj['detail']['0'].address);	
				}
			});			
			
			
			
	    }
	
    $(document).ready(function(e) {
        showTR();
        $("#isExpired").change(function(e) {
            var show = $(this).prop("checked");
            if (show)
              $(".expired").show();
            else
              $(".expired").hide();
        });

        $("#position3,#position2,#position1").change(function(e)
        {
          showTR();
		  setValueAutomation();
        });
    });
</script>