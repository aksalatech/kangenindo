<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Report</title>
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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Daftar Laporan</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="" class="text-muted">Reports</a>
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
                    <h3 class="card-label">Daftar Laporan Aktivasi SAM
                  </div>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th width="30px">No. </th>
                        <th>Report Name</th>
                        <th>Files</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1.</td>
                        <td>Laporan Daftar Personalisasi</td>
                        <td><a class="repo" data-mod="exportPerso" href="#dialog-trans" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">2.</td>
                        <td>Laporan Statistik Permintaan Personalisasi</td>
                        <td><a class="repo" data-mod="exportReq" href="#dialog-trans" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">3.</td>
                        <td>Laporan Daftar Penerimaan Personalisasi</td>
                        <td><a class="repo" data-mod="exportRcvCsv" href="#dialog-simple" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>

                      <tr>
                        <td class="text-center">4.</td>
                        <td>Nota Dinas Direktur (Surat Perintah)</td>
                        <td><a class="repo" data-mod="exportSP" href="#dialog-nodin" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">5.</td>
                        <td>Nota Dinas Direktur (Surat Izin Masuk)</td>
                        <td><a class="repo" data-mod="exportIzin" href="#dialog-izin" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">6.</td>
                        <td>Laporan Rekap SAM Per Produsen</td>
                        <td><a class="repo" data-mod="exportPerProdusen" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">7.</td>
                        <td>Laporan Rekap SAM Per Pengguna</td>
                        <td><a class="repo" data-mod="exportPerPengguna" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                        <td class="text-center">8.</td>
                        <td>Laporan Peningkatan Per Tahun</td>
                        <td><a class="repo" data-mod="exportPerTahun" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                    </tbody>
                  </table>
                  <!--end: Datatable-->
                </div>
              </div>
            </div>
            <!--end::Entry-->
          </div>
          <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <?php include "includes/footer.php"; ?>
        <?php include "includes/report/trans-dialog.php"; ?>
        <?php include "includes/report/simple-dialog.php"; ?>
        <?php include "includes/report/nodin-dialog.php"; ?>
        <?php include "includes/report/izin-dialog.php"; ?>
        <?php include "includes/report/date-dialog.php"; ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/report.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/crud/forms/widgets/select2.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
  <!--end::Page Vendors-->
</body>

</html>