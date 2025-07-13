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
                <h5 class="text-dark font-weight-bold my-1 mr-5">Database Alumni IPB HAE</h5>
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
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <!--begin::Card-->
                  <?php
                  if (isset($req)) {
                  ?> <form method="POST" action="<?php echo base_url(); ?>Cert_type/update_type">
                      <input type="hidden" name="catID" id="catID" value="<?php echo $req ?>">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Alumni IPB HAE</h3>
                        </div>
                        <!--begin::Form-->
                        <?php
                        if (isset($err)) {
                        ?>
                          <h3 class="text-center text-danger"><?php echo $err; ?></h3>
                        <?php
                        }
                        ?>
                        <div class="card-body">
                          <?php
                          foreach ($viewProduct as $key) {
                          ?>
                            <div class="form-group row">
                              <!-- <div class="col-lg-4">
                                <label>Kode Lembaga:</label>
                                <input type="text" class="form-control" name="typeCode" id="typeCode" value="<?php // echo $key->typeCode; 
                                                                                                              ?>" required>
                              </div> -->
                              <div class="col-lg-6">
                                <label>Nama Alumni:</label>
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="nama" id="nama" value="<?php echo $key->nama; ?>" required>
                                  <input type="hidden" class="form-control" name="alumniID" id="alumniID" value="<?php echo $key->alumniid; ?>" />
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label>NRP/NIM:</label>
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="nrp_nim" id="nrp_nim" value="<?php echo $key->nrp_nim; ?>" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-6">
                                <label>Angkatan:</label>
                                <div class="row">
                                  <select id="angkatan" name="angkatan" required class="form-control col-md-11">
                                    <?php foreach ($angkatanList as $k) { ?>
                                      <option value="<?php echo $k->angkatan_nm ?>" <?php echo ($k->angkatan_nm == $key->angkatan) ? "selected" : "" ?>><?php echo $k->angkatan_nm ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label>Jenis Kelamin:</label>
                                <div class="row">
                                  <select class="form-control col-md-11" name="sex" id="sex" required>
                                    <option value="M" <?php echo ($key->sex == "M") ? "selected" : "" ?>>Pria</option>
                                    <option value="F" <?php echo ($key->sex == "F") ? "selected" : "" ?>>Wanita</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-4">
                                <label>Tingkat Pendidikan:</label>
                                <div class="row">
                                  <select id="tkt_pddk" name="tkt_pddk" required class="form-control col-md-11">
                                    <?php foreach ($tktpddkList as $k) { ?>
                                      <option value="<?php echo $k->tkt_pddk_nm ?>" <?php echo ($k->tkt_pddk_nm == $key->tkt_pddk) ? "selected" : "" ?>><?php echo $k->tkt_pddk_nm ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>Program Studi:</label>
                                <div class="row">
                                  <select id="program_studi" name="program_studi" required class="form-control col-md-11">
                                    <?php foreach ($fakultasList as $k) { ?>
                                      <option value="<?php echo $k->fakultas_nm ?>" data-pddk="<?php echo $k->tkt_pddk_nm ?>" <?php echo ($k->fakultas_nm == $key->program_studi) ? "selected" : "" ?>><?php echo $k->fakultas_nm ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>No. HP:</label>
                                <div class="row">
                                  <input type="text" class="form-control col-md-11" name="no_hp" id="no_hp" value="<?php echo $key->no_hp; ?>" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-4">
                                <label>Email:</label>
                                <div class="row">
                                  <input type="email" class="form-control col-md-11" name="email" id="email" value="<?php echo $key->email; ?>" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>Pekerjaan:</label>
                                <div class="row">
                                  <select id="pekerjaan" name="pekerjaan" required class="form-control col-md-11">
                                    <?php foreach ($pekerjaanList as $k) { ?>
                                      <option value="<?php echo $k->pekerjaan_nm ?>" <?php echo ($k->pekerjaan_nm == $key->pekerjaan) ? "selected" : "" ?>><?php echo $k->pekerjaan_nm ?></option>
                                    <?php } ?>
                                  </select>
                                  <input type="text" class="form-control col-md-11" id="pekerjaan_lainnya" name="pekerjaan_lainnya" <?php echo ($key->pekerjaan == "Lainnya") ? "" : "style='display:none'" ?> value="<?php echo $key->pekerjaan_lainnya ?>" />
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>Keahlian: </label>
                                <div class="row">
                                  <select id="keahlian" name="keahlian" required class="form-control col-md-11">
                                    <?php foreach ($keahlianList as $k) { ?>
                                      <option value="<?php echo $k->keahlian_nm ?>" <?php echo ($k->keahlian_nm == $key->keahlian) ? "selected" : "" ?>><?php echo $k->keahlian_nm ?></option>
                                    <?php } ?>
                                  </select>
                                  <input type="text" class="form-control col-md-11" id="keahlian_lainnya" name="keahlian_lainnya" <?php echo ($key->keahlian == "Lainnya") ? "" : "style='display:none'" ?> value="<?php echo $key->keahlian_lainnya ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-4">
                                <label>Provinsi:</label>
                                <div class="row">
                                  <select id="province_nm" name="province_nm" class="form-control col-md-11 chosen">
                                    <option value="">Belum Ada</option>
                                    <?php foreach ($provList as $p) { ?>
                                      <option value="<?php echo $p->prov_id ?>" <?php echo ($p->prov_id == $key->province_nm) ? "selected" : "" ?>><?php echo $p->prov_name ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>Kab/Kota:</label>
                                <div class="row">
                                  <select id="kabkota_nm" name="kabkota_nm" class="chosen form-control col-md-11">
                                    <option value="">Belum Ada</option>
                                    <?php foreach ($kabList as $k) { ?>
                                      <option value="<?php echo $k->kabkot_id ?>" data-prov="<?php echo $k->prov_id ?>" <?php echo ($k->kabkot_id == $key->kabkota_nm) ? "selected" : "" ?>><?php echo $k->kabkot_name ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <label>Status Hidup:</label>
                                <div class="row">
                                  <select class="form-control col-md-11" name="status_hidup" id="status_hidup" required>
                                    <option value="Hidup" <?php echo ($key->status_hidup == "Hidup") ? "selected" : "" ?>>Hidup</option>
                                    <option value="Meninggal" <?php echo ($key->status_hidup == "Meninggal") ? "selected" : "" ?>>Meninggal</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Tempat Lahir:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tmptlahir" id="tmptlahir" value="<?php echo $key->tempat_lahir; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Tanggal Lahir:</label>
                              <div class="row">
                                <input type="date" class="form-control col-md-11" name="tgllhr" id="tgllhr" value="<?php echo $key->tanggal_lahir; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Tahun Masuk:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tahunmasuk" id="tahunmasuk" value="<?php echo $key->tanggal_masuk; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Tahun Selesai:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tahunkeluar" id="tahunkeluar" value="<?php echo $key->tanggal_selesai; ?>" required>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                          <a href="<?php echo site_url(); ?>Cert_type" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } else {
                  ?>
                    <form method="POST" action="<?php echo base_url(); ?>Cert_type/add_type">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Alumni IPB HAE</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Nama Alumni:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="nama" id="nama" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>NRP/NIM:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="nrp_nim" id="nrp_nim" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Angkatan:</label>
                              <div class="row">
                                <select id="angkatan" name="angkatan" required class="form-control col-md-11">
                                  <?php foreach ($angkatanList as $k) { ?>
                                    <option value="<?php echo $k->angkatan_nm ?>"><?php echo $k->angkatan_nm ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Jenis Kelamin:</label>
                              <div class="row">
                                <select class="form-control col-md-11" name="sex" id="sex" required>
                                  <option value="M">Pria</option>
                                  <option value="F">Wanita</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-4">
                              <label>Tingkat Pendidikan:</label>
                              <div class="row">
                                <select id="tkt_pddk" name="tkt_pddk" required class="form-control col-md-11">
                                  <?php foreach ($tktpddkList as $k) { ?>
                                    <option value="<?php echo $k->tkt_pddk_nm ?>"><?php echo $k->tkt_pddk_nm ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Program Studi:</label>
                              <div class="row">
                                <select id="program_studi" name="program_studi" required class="form-control col-md-11">
                                  <?php foreach ($fakultasList as $k) { ?>
                                    <option value="<?php echo $k->fakultas_nm ?>" data-pddk="<?php echo $k->tkt_pddk_nm ?>"><?php echo $k->fakultas_nm ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>No. HP:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="no_hp" id="no_hp" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-4">
                              <label>Email:</label>
                              <div class="row">
                                <input type="email" class="form-control col-md-11" name="email" id="email" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Pekerjaan:</label>
                              <div class="row">
                                <select id="pekerjaan" name="pekerjaan" required class="form-control col-md-11">
                                  <?php foreach ($pekerjaanList as $k) { ?>
                                    <option value="<?php echo $k->pekerjaan_nm ?>"><?php echo $k->pekerjaan_nm ?></option>
                                  <?php } ?>
                                </select>
                                <input type="text" class="form-control col-md-11" id="pekerjaan_lainnya" name="pekerjaan_lainnya" style='display:none' />
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Keahlian:</label>
                              <div class="row">
                                <select id="keahlian" name="keahlian" required class="form-control col-md-11">
                                  <?php foreach ($keahlianList as $k) { ?>
                                    <option value="<?php echo $k->keahlian_nm ?>"><?php echo $k->keahlian_nm ?></option>
                                  <?php } ?>
                                </select>
                                <input type="text" class="form-control col-md-11" id="keahlian_lainnya" name="keahlian_lainnya" style='display:none' />
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-4">
                              <label>Provinsi:</label>
                              <div class="row">
                                <select id="province_nm" name="province_nm" class="chosen form-control col-md-11">
                                  <option value="">Belum Ada</option>
                                  <?php foreach ($provList as $p) { ?>
                                    <option value="<?php echo $p->prov_id ?>"><?php echo $p->prov_name ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Kab/Kota:</label>
                              <div class="row">
                                <select id="kabkota_nm" name="kabkota_nm" class="chosen form-control col-md-11">
                                  <option value="">Belum Ada</option>
                                  <?php foreach ($kabList as $k) { ?>
                                    <option value="<?php echo $k->kabkot_id ?>" data-prov="<?php echo $k->prov_id ?>"><?php echo $k->kabkot_name ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Status Hidup:</label>
                              <div class="row">
                                <select class="form-control col-md-11" name="status_hidup" id="status_hidup" required>
                                  <option value="Hidup">Hidup</option>
                                  <option value="Meninggal">Meninggal</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Tempat Lahir:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tmptlahir" id="tmptlahir" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Tanggal Lahir:</label>
                              <div class="row">
                                <input type="date" class="form-control col-md-11" name="tgllhr" id="tgllhr" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Tahun Masuk:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tahunmasuk" id="tahunmasuk" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>Tahun Selesai:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="tahunkeluar" id="tahunkeluar" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                          <a href="<?php echo site_url(); ?>Cert_type" class="btn btn-secondary font-weight-bolder">Cancel</a>
                        </div>
                        <!--end::Form-->
                      </div>
                      <!--end::Card-->

                    </form>
                  <?php
                  } ?>
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
  $(document).ready(function(e) {
    $("#province_nm").change(function(e) {
      var val = $("#province_nm").val();
      $("#kabkota_nm option").hide();
      $("#kabkota_nm option[data-prov='" + val + "']").show();
      $("#kabkota_nm").val($("#kabkota_nm option[data-prov='" + val + "']:first").val());
    });

    $("#tkt_pddk").change(function(e) {
      var val = $("#tkt_pddk").val();
      $("#program_studi option").hide();
      $("#program_studi option[data-pddk='" + val + "']").show();
      $("#program_studi").val($("#program_studi option[data-pddk='" + val + "']:first").val());
    });

    var val = $("#province_nm").val();
    $("#kabkota_nm option").hide();
    $("#kabkota_nm option[data-prov='" + val + "']").show();
    if ("<?php echo isset($req) ? 1 : 0  ?>" != "1" )
      $("#kabkota_nm").val($("#kabkota_nm option[data-prov='" + val + "']:first").val());

    var val2 = $("#tkt_pddk").val();
    $("#program_studi option").hide();
    $("#program_studi option[data-pddk='" + val2 + "']").show();
    if ("<?php echo isset($req) ? 1 : 0  ?>" != "1" )
      $("#program_studi").val($("#program_studi option[data-pddk='" + val2 + "']:first").val());

    $("#pekerjaan").change(function(e) {
      var val = $("#pekerjaan").val();
      if (val == "Lainnya")
        $("#pekerjaan_lainnya").show();
      else
        $("#pekerjaan_lainnya").hide();
    });

    $("#keahlian").change(function(e) {
      var val = $("#keahlian").val();
      if (val == "Lainnya")
        $("#keahlian_lainnya").show();
      else
        $("#keahlian_lainnya").hide();
    });
  });
</script>