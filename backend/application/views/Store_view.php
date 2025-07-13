<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Store List</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Store Location List</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>kabkot" class="text-muted"> Store Location</a>
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
              <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                  <div class="card-title">
                    <h3 class="card-label">Store Location Table
                  </div>
                  <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="<?php echo base_url(); ?>Store/add_type_view" class="btn btn-primary font-weight-bolder">
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
                      </span>Add New Store</a>
                    <!--end::Button-->
                  </div>
                </div>
                <div class="card-body">
                  <table id="ProductTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="36px">No.</th>
                        <th width="180px">Store Name</th>
                        <th width="180px">Store Address</th>
                        <th width="100px">Store Phone</th>
                        <th width="140px">Open Hours</th>
                        <th width="100px">Position</th>
                        <th width="90px">Aktif?</th>
                        <th width="9%" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      foreach ($view_type as $key => $value) {
                        //var_dump($value)
                        $i++;
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td><?php echo $value->store_name; ?></td>
                          <td><?php echo $value->store_address; ?></td>
                          <td><?php echo $value->store_phone; ?></td>
                          <td>
                            Sun - Thu : <?php echo $value->open_hours; ?> </br>
                            <!-- Fri - Sat : <?php echo $value->open_hours2; ?> -->
                          </td>
                          <td><?php echo $value->latitude." , ".$value->longitude; ?></td>
                          <td class="text-center">
                                                        <input type="checkbox" <?php echo ($value->active == 1) ? "checked" : "" ?> disabled>
                                                    </td>
                          <td align="center">
                            <a href="<?php echo base_url(); ?>Store/update?typeID=<?php echo $value->id_store ; ?>" class="btn btn-sm btn-warning btn-text-warning btn-icon mr-2 mb-1" title="Update Data"><i class="fas fa-pencil-alt"></i> </a>

                            <a href="#" type="button" class="btn btn-sm btn-danger btn-text-danger btn-icon mr-2 mb-1" name="deleteButton" id="deleteButton" onclick="confirmation('<?php echo $value->id_store ; ?>')" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--end::Content-->
          </div>
          <!--end::Wrapper-->
        </div>
        <?php include("includes/footer.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/store.js"></script>

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>
</html>
