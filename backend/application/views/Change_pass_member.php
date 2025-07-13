<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Change Password Account</title>
  <?php include "includes/include_js_css.php"; ?>
</head>
<body class="bd-account hold-transition skin-blue sidebar-mini">
  <!--<div id="jsonValue"  style="display: none"><?php echo $monthly_trans; ?></div>-->
  <div class="wrapper">

    <!-- Header Navbar: style can be found in header.less -->
    <?php require("includes/header.php") ?>
    <body>
      <!-- Left side column. contains the logo and sidebar -->
      <?php require("includes/navigation.php") ?>
      <div class="content-wrapper">
        <section class="content-header">
          Change Password
        </section>
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div align="center" class="box-header">
                    <h3 align="center" class="box-title">Change Password</h3>
                    <?php if (isset($err)) {
                        ?>
                        <h3 align="center" style="color:red"><?php echo $err; ?></h3>

                        <?php
                      }
                      ?>
                  </div>

                  <div class="box-body">
                    <form method="POST" action="<?php echo base_url();?>member/submitpass">
                      <input type="hidden" id="userID" name="userID" value="<?php echo $userID; ?>" />
                      <table id="userTable" class="table table-bordered table-hover">
                        <tr>
                          <td width="32%">New Password</td>
                          <td><input type="password" placeholder="New Password" class="form-control" name="newpass" id="newpass" /></td>
                        </tr>
                        <tr>
                          <td>Confirmation Password</td>
                          <td><input type="password" placeholder="Confirm Password" class="form-control" name="confirm" id="confirm" /></td>
                        </tr>
                      </table>
                      <input type="submit" class="form-control" name="sbmtBttn" id="sbmtBttn" value="Change" />
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </section>
      </div>

      <?php include "includes/footer.php"; ?>
    </div>
  </body>
  </html>