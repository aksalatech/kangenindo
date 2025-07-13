<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Group</title>
  <?php include "includes/include_js_css.php"; ?>
</head>
<body class="bd-group hold-transition skin-blue sidebar-mini">
  <!--<div id="jsonValue"  style="display: none"><?php echo $monthly_trans; ?></div>-->
  <div class="wrapper">

    <?php require("includes/header.php") ?>
    <body>
      <!-- Left side column. contains the logo and sidebar -->
      <?php require("includes/navigation.php") ?>
      <div class="content-wrapper">
        <section class="content-header">
          Group
        </section>

        <form id="productView" method="POST" action="<?php echo base_url() ?>Category">
          <input type="hidden" name="action" id="action">
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Group Table</h3>
                  </div>
                  <div class="box-body">
                    <table id="ProductTable" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <td>Group ID</td>
                          <td>Group Name</td>
                          <td></td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach ($view_type as $key =>$value) {
                      //var_dump($value)
                          $i++;
                          ?>
                          <tr>
                            <td><?php echo $value->group_id; ?></td>
                            <td><?php echo $value->group_name; ?></td>
                            <td><a href="<?php base_url(); ?>Group/update?id=<?php echo $value->group_id; ?>"><input type="button" name="updateBttn" id="updateBttn" value="Update"></a>
                              <a href="#"><input type="button" name="deleteButton" id="deleteButton" onclick="confirmation('<?php echo $value->group_id; ?>')" value="Delete"></a></td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a href="<?php base_url(); ?>Group/add_type_view"><input type="button" name="submitBttn" value="Add New" id="submitBttn" class="form-control"></a>
                </div>
                
              </div>

            </section>
          </form>

        </div>
        <?php include "includes/footer.php";?>
      </div>
    
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/group.js"></script>

</body>
</html>
