<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Contact List</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Contact Message List</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>contact" class="text-muted"> Contact Message</a>
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
                    <h3 class="card-label">Contact Message
                  </div>
                  <!-- <div class="card-toolbar">
                    <a href="<?php echo base_url(); ?>Store/add_type_view" class="btn btn-primary font-weight-bolder">
                      <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                          </g>
                        </svg>
                      </span>Add New Store</a>
                  </div> -->
                </div>
                <div class="card-body">
                  <table id="ProductTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="36px">No.</th>
                        <th width="100px">Brand</th>
                        <th>Name</th>
                        <th width="100px">Email</th>
                        <th width="100px">Phone</th>
                        <th width="100px">Enquiry</th>
                        <!-- <th width="100px">State</th> -->
                        <!-- <th width="100px">ZIP</th>
                        <th width="100px">Message</th>
                        <th width="100px">Sub Message</th> -->
                        <th width="100px">Sent Date</th>
                        <th width="100px"></th>
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
                          <td><?php echo $value->brand; ?></td>
                          <td><?php echo $value->first_name; ?> <?php echo $value->last_name; ?></td>
                          <td><?php echo $value->email; ?></td>
                          <td><?php echo $value->phone; ?></td>
                          <td><?php echo $value->enquiry; ?></td>
                          <!-- <td><?php echo $value->state; ?></td>
                          <td><?php echo $value->zip; ?></td>
                          
                          <td><?php echo $value->message; ?></td>
                          <td><?php echo $value->subs; ?></td> -->
                          <td><?php echo date("Y-m-d H:i:s", strtotime($value->last_update)); ?></td>
                          <td><a href="javascript:void(0)" data-brand="<?php echo $value->brand ?>" data-name="<?php echo $value->first_name?> <?php echo $value->last_name?>" data-email="<?php echo $value->email ?>" data-phone="<?php echo $value->phone ?>" data-state="<?php echo $value->state ?>" data-enquiry="<?php echo $value->enquiry ?>" data-zip="<?php echo $value->zip ?>" data-message="<?php echo nl2br($value->message) ?>" data-subs="<?php echo nl2br($value->subs) ?>" data-tgl="<?php echo date("Y-m-d H:i:s", strtotime($value->last_update)); ?>" class="btn btViewContact btn-sm btn-primary btn-icon mr-2 mb-1"><i class="fas fa-book"></i></a>
                            <a href="mailto:<?php echo $value->email ?>" class="btn btn-sm btn-success btn-icon mr-2 mb-1"><i class="fas fa-envelope"></i></a></td>
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
        <?php include("includes/viewcontact-dialog.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/contact.js"></script>

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>
</html>
