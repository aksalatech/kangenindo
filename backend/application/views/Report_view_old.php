<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Laporan</title>
  <?php include "includes/include_js_css.php"; ?>
</head>
<body class="bd-finance hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php require("includes/header.php") ?>
    <body>
      <!-- Left side column. contains the logo and sidebar -->
      <?php require("includes/navigation.php") ?>
      <div class="content-wrapper">
        <section class="content-header">
          Laporan
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Laporan</h3>
                </div>
                <div class="box-body">
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
                          <td align="center">1.</td>
                          <td>Laporan Daftar Personalisasi</td>
                          <td><a class="repo" data-mod="exportPerso" href="#dialog-trans" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">2.</td>
                          <td>Laporan Statistik Permintaan Personalisasi</td>
                          <td><a class="repo" data-mod="exportReq" href="#dialog-trans" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">3.</td>
                          <td>Laporan Daftar Penerimaan Personalisasi</td>
                          <td><a class="repo" data-mod="exportRcvCsv" href="#dialog-simple" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>

                      <tr>
                          <td align="center">4.</td>
                          <td>Nota Dinas Direktur (Surat Perintah)</td>
                          <td><a class="repo" data-mod="exportSP" href="#dialog-nodin" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">5.</td>
                          <td>Nota Dinas Direktur (Surat Izin Masuk)</td>
                          <td><a class="repo" data-mod="exportIzin" href="#dialog-izin" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">6.</td>
                          <td>Laporan Rekap SAM Per Produsen</td>
                          <td><a class="repo" data-mod="exportPerProdusen" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">7.</td>
                          <td>Laporan Rekap SAM Per Pengguna</td>
                          <td><a class="repo" data-mod="exportPerPengguna" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                      <tr>
                          <td align="center">8.</td>
                          <td>Laporan Peningkatan Per Tahun</td>
                          <td><a class="repo" data-mod="exportPerTahun" href="#dialog-date" data-toggle="modal"><span class="fa fa-download"></span> &nbsp;Download</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>

          </div>

        </section>

      </div>
      <?php include "includes/footer.php"; ?>
      <?php include "includes/report/trans-dialog.php"; ?>
      <?php include "includes/report/simple-dialog.php"; ?>
      <?php include "includes/report/nodin-dialog.php"; ?>
      <?php include "includes/report/izin-dialog.php"; ?>
      <?php include "includes/report/date-dialog.php"; ?>
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript" src="<?php echo base_url()?>dist/js/report.js"></script>

  </body>
  </html>
