<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | User Administrator</title>
  <?php include "includes/include_js_css_new.php"; ?>
  <link href="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="bd_user" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">List User</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>user" class="text-muted">List User</a>
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
            <div class="container" style="padding: 0 10px;">
              <div>
                <div class="card card-custom">
                  <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                      <h3 class="card-label">User Table
                        <!-- <div class="text-muted pt-2 font-size-sm">custom colu rendering</div></h3> -->
                    </div>
                    <div class="card-toolbar">
                      <!--begin::Button-->
                      <a href="<?php echo base_url(); ?>User/add_user_view" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <circle fill="#000000" cx="9" cy="15" r="6" />
                              <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>Tambah Data</a>
                      <!--end::Button-->
                    </div>
                  </div>
                  <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-checkable" id="userTable">
                      <thead>
                        <tr>
                          <th width="25px">No.</th>
                          <th width="120px">Nama User</th>
                          <!-- <td>No. KTP</td> -->
                          <th>Address</th>
                          <th>Position</th>
                          <!-- <th>Level</th> -->
                          <th>Phone</th>
                          <th>Email</th>
                          <th width="50px">Aktif ?</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($view_user as $key => $value) {
                        ?>
                          <tr>
                            <td align="center"><?php echo $i ?>.</td>
                            <td><?php echo $value->employee_name ?></td>
                            <!-- <td><?php echo $value->No_KTP ?></td> -->
                            <td><?php echo $value->address ?></td>
                            <td>
                              <?php echo $value->position ?>
                            </td>
                            <!-- <td>
                              <?php echo $value->level ?>
                            </td> -->
                            <td><a href="https://api.whatsapp.com/send?phone=<?php echo $value->phone ?>" target="_blank"><?php echo $value->phone ?></a></td>
                            <td><?php echo $value->email ?></td>
                            <td><input type="checkbox" disabled <?php echo ($value->active == 1) ? "checked" : "" ?> value="1" /></td>
                            <td>
                              <a href="<?php echo base_url(); ?>User/Chg_pass?d=<?php echo $value->userid ?>" class="btn btn-sm btn-info btn-icon mr-2 mb-1"><i class="fas fa-lock"></i></a>
                              <a href="<?php echo base_url(); ?>User/Update?d=<?php echo $value->userid ?>" class="btn btn-sm btn-warning btn-icon mr-2 mb-1"><i class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-sm btn-danger btn-icon mr-2 mb-1" name="dltButton" id="dltButton" onclick="confirmation('<?php echo $value->userid ?>')" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        <?php
                          $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                    <!--end: Datatable-->
                  </div>
                </div>
              </div>
            </div>
            <!--end::Entry-->
          </div>
          <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/user.js"></script>
  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>

</html>