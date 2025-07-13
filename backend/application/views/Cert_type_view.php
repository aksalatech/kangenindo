<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Database Alumni</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Database Alumni</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Cert_type" class="text-muted"> Database Alumni</a>
                  </li>
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          <!--end::Subheader-->
          <!--begin::Entry-->
          <form id="productView" method="POST" action="<?php echo base_url() ?>Cert_type">
          <input type="hidden" name="action" id="action">
          <input type="hidden" name="action2" id="action2">
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="card card-custom">
              <div class="card-header flex-wrap py-5">
                  <div class="card-title">
                    <h3 class="card-label">Tabel Database Alumni
                  </div>
                  <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#dialog-upload" data-toggle="modal" class="btn btn-success">
                      <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Import.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1"/>
                              <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                              <path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" fill="#000000" fill-rule="nonzero"/>
                          </g>
                        </svg>
                        Import Excel
                    </a>
                    &nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>Report/exportAlumni?angkatan=<?php echo $temp ?>&tktpddk=<?php echo $temp2 ?>" target="_blank" class="btn btn-warning">
                      <span class="svg-icon svg-icon-md">
                          <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Export.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="2" width="2" height="12" rx="1"/>
                                <path d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) "/>
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                        Export Excel
                    </a>
                    &nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>Cert_type/add_type_view" class="btn btn-primary font-weight-bolder">
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
                <div class="card-header flex-wrap py-5">
                  <div class="card-toolbar">
                  <b>Angkatan</b> &nbsp;
                    <!--begin::Button-->
                    <select name="brancOption" onchange="doit()" id="brancOption">
                    <option value="">Semua</option>
                      <?php
                      foreach ($view_branch as $key) {
                        ?>
                        <option <?php echo ($temp == $key->info) ? "selected" : ""; ?> value="<?php echo $key->info ?>"><?php echo $key->info ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    &nbsp;
                    <b>Tingkat Pendidikan</b> &nbsp;
                    <!--begin::Button-->
                    <select name="brancOption2" onchange="doit()" id="brancOption2">
                    <option value="">Semua</option>
                      <?php
                      foreach ($view_branch2 as $key) {
                        ?>
                        <option <?php echo ($temp2 == $key->info) ? "selected" : ""; ?> value="<?php echo $key->info ?>"><?php echo $key->info ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <!--end::Button-->
                  </div>
                </div>
                
                <div class="card-body">

                  <table id="ProductTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="30px">No.</th>
                        <th width="140px">Nama Alumni</th>
                        <th width="90px">NRP/NIM</th>
                        <th width="90px">Kelamin</th>
                        <th width="90px">Angkatan</th>
                        <th width="125px">Program Studi</th>
                        <th width="125px">No. HP</th>
                        <th width="125px">Domisili</th>
                        <th width="120px">Tempat, Tgl Lahir</th>
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
                          <td><?php echo $value->nama; ?></td>
                          <td><?php echo $value->nrp_nim; ?></td>
                          <td><?php echo $value->sex == "M" ? "Pria" : (($value->sex == "F") ? "Wanita" : ""); ?></td>
                          <td><?php echo $value->angkatan; ?></td>
                          <td><?php echo $value->program_studi; ?></td>
                          <td><?php echo $value->no_hp; ?></td>
                          <td><?php echo $value->provinsi."<br/>".$value->kab_kota; ?></td>
                          <td><?php echo $value->tempat_lahir.(($value->tanggal_lahir != "") ? ", ".date("d M Y", strtotime($value->tanggal_lahir)) : ""); ?></td>
                          <td align="center">
                            <a href="<?php echo base_url(); ?>Cert_type/update?typeID=<?php echo $value->alumniid; ?>" class="btn btn-sm btn-warning btn-text-warning btn-icon mr-2 mb-1" title="Update Data"><i class="fas fa-pencil-alt"></i> </a>

                            <a href="#" type="button" class="btn btn-sm btn-danger btn-text-danger btn-icon mr-2 mb-1" name="deleteButton" id="deleteButton" onclick="confirmation('<?php echo $value->alumniid; ?>')" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
          </form>
          <!--end::Wrapper-->
        </div>
        <?php include("includes/footer.php"); ?>
        <?php include("includes/upload-dialog.php"); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/cert_type.js"></script>

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
</body>
</html>
