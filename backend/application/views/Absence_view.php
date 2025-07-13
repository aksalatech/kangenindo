<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Database Alumni</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>

<body id="bd_faqView" class="header-fixed header-mobile-fixed subheader-enabled aside-minimize-hoverable page-loading">
  <?php include "includes/hidden.php"; ?>

  <?php require("includes/header2.php"); ?>

  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <?php // require("includes/navigation_new.php"); ?>

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <?php require("includes/header-top2.php"); ?>

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Subheader-->
          <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
              <!--begin::Toolbar-->
              <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold my-1 mr-5">Absensi Alumni IPB HAE</h5>
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Breadcrumb-->
                <!-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url() ?>Cert_type" class="text-muted"> Database Alumni</a>
                  </li>
                </ul> -->
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
                    <form method="POST" action="<?php echo base_url(); ?>Cert_type_global/submit_absence">
                      <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Form Kehadiran Alumni IPB HAE - <?php echo $configList->att_type ?></h3>
                        </div>
                        <div class="card-body">
                         <!--  <red>*NB: Inputkan field data tingkat pendidikan dan jurusan dengan tingkat pendidikan dan jurusan pertama kali 
                            ketika masuk ke Fahutan IPB. Contoh: jika anda telah masuk ke Fahutan IPB pada jenjang S1 kemudian mengambil S2 pada Fahutan IPB, 
                            maka inputkan tingkat pendidikan S1 dan jurusan yang anda ambil pada S1 tersebut.</red>
                          <br/><br/> -->
                          Anda hendak melakukan absen pada lokasi saat ini di <strong id="span_addr"></strong>. Anda dapat melihat lokasi anda pada peta dengan klik link <a id="linkmap" href="" target="_blank">ini</a>.
                          <br/><br/>
                          Mohon konfirmasi data anda dengan mengisi NRP/NIM di bawah ini atau melakukan daftar baru apabila NRP/NIM anda tidak ditemukan.<br/><br/>
                          <div class="form-group row">
                            <div class="col-lg-9">
                              <label>NRP/NIM: <em>(Angka saja tanpa E dan titik, ex: E. 31.01234 menjadi 3101234)</em></label>
                              <div class="row">
                                <input type="number" placeholder="NRP / NIM Anda...." class="form-control col-md-9" name="cari_nrp_nim" id="cari_nrp_nim" required>
                                <button type="submit" id="btCari" class="btn btn-primary ml-2 mr-2" name="sbmtBttn" id="sbmtBttn"><span class="fa fa-search"></span> &nbsp;Cari</button>
                                <button type="button" id="btRegister" class="btn btn-secondary font-weight-bolder"><span class="fa fa-edit"></span> &nbsp;Daftar Baru</a>
                              </div>
                              <div><red id="error"></red></div>
                            </div>
                          </div>
                        <!--end::Form-->
                      </div>


                      <div id="divForm" class="card card-custom gutter-b example example-compact" style="display:none">
                        <!-- <div class="card-header d-flex justify-content-center">
                          <h3 class="card-title">Pendaftaran Alumni IPB HAE</h3>
                        </div> -->
                        <div class="card-body">
                         <!--  <red>*NB: Inputkan field data tingkat pendidikan dan jurusan dengan tingkat pendidikan dan jurusan pertama kali 
                            ketika masuk ke Fahutan IPB. Contoh: jika anda telah masuk ke Fahutan IPB pada jenjang S1 kemudian mengambil S2 pada Fahutan IPB, 
                            maka inputkan tingkat pendidikan S1 dan jurusan yang anda ambil pada S1 tersebut.</red>
                          <br/><br/> -->
                          <input type="hidden" id="hid_latitude" name="latitude" />
                          <input type="hidden" id="hid_langitude" name="langitude" />
                          <input type="hidden" id="hid_address" name="alamat" />
                          <input type="hidden" id="hid_city" name="city" />
                          <input type="hidden" id="hid_country" name="country" />
                          <input type="hidden" id="att_type" name="att_type" value="<?php echo $configList->att_type ?>" />
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Nama Alumni:</label>
                              <div class="row">
                                <input type="text" class="form-control col-md-11" name="nama" id="nama" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <label>NRP/NIM: <em>(Angka saja tanpa E dan titik, ex: E. 31.01234 menjadi 3101234)</em></label>
                              <div class="row">
                                <input type="number" class="form-control col-md-11" name="nrp_nim" id="nrp_nim" required>
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
                              <label>Tingkat Pendidikan: <em><red>(Saat pertama kali masuk fahutan IPB)</red></em></label>
                              <div class="row">
                                <select id="tkt_pddk" name="tkt_pddk" required class="form-control col-md-11">
                                  <?php foreach ($tktpddkList as $k) { ?>
                                    <option value="<?php echo $k->tkt_pddk_nm ?>"><?php echo $k->tkt_pddk_nm ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>Program Studi: <em><red>(Saat pertama kali masuk fahutan IPB)</red></em></label>
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
                          <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit Absence</button>
                          <button type="button" id="btCancel" class="btn btn-danger font-weight-bolder">Cancel</a>
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

    $("#btCari").click(function(e) {
      var nrp_nim = $("#cari_nrp_nim").val();
      if (nrp_nim != "")
      {
        $.ajax({
          url : base_url + "Cert_type_global/cari_nrp?nrp=" + nrp_nim,
          type : "GET",
          dataType: "html",
          success: function(result) {
            console.log(result);
            var json = $.parseJSON(result);
            if (json != null)
            {
              $("#nrp_nim").val(json.cleaned_nrp);
              $("#nama").val(json.nama);
              $("#angkatan").val(json.angkatan);
              $("#sex").val(json.sex);
              $("#tkt_pddk").val(json.tkt_pddk);
              $("#program_studi").val(json.program_studi);
              $("#no_hp").val(json.no_hp);
              $("#email").val(json.email);
              $("#pekerjaan").val(json.pekerjaan);
              $("#keahlian").val(json.keahlian);
              $("#keahlian").trigger("change");
              if (json.keahlian == "Lainnya") {
                $("#keahlian_lainnya").val(json.keahlian_lainnya);
              }
              $("#province_nm").val(json.province_nm);
              $("#province_nm").trigger("change");
              window.setTimeout(function() {
                $("#kabkota_nm").val(json.kabkota_nm);
              }, 600);
              $("#status_hidup").val(json.status_hidup);
              $("#tmptlahir").val(json.tempat_lahir);
              $("#tgllhr").val(json.tanggal_lahir);
              $("#tahunmasuk").val(json.tanggal_masuk);
              $("#tahunkeluar").val(json.tanggal_selesai);

              $("#divForm").show();
              $(".chosen").chosen("destroy");
              $(".chosen").chosen();
              $(".chosen").trigger("chosen:updated");
              $("#btCari").prop("disabled", true);
              $("#btRegister").prop("disabled", true);
              $("#cari_nrp_nim").prop("disabled", true);
              $("#error").html("");
            } else {
              $("#divForm").hide();
              $("#error").html("NRP/NIM tidak ditemukan !");
            }
          },
          error: function (result) {
            console.log(result);
            alert("Error when search NRP !");
          }

        });
      }
    });

    $("#btRegister").click(function(e) {
      $("#nrp_nim").val("");
      $("#nama").val("");
      $("#angkatan").val("");
      $("#sex").val("M");
      $("#tkt_pddk").val("");
      $("#program_studi").val("");
      $("#no_hp").val("");
      $("#email").val("");
      $("#pekerjaan").val("");
      $("#keahlian").val("");
      $("#keahlian").trigger("change");
      $("#province_nm").val("");
      $("#province_nm").trigger("change");
      window.setTimeout(function() {
        $("#kabkota_nm").val("");
      }, 600);
      $("#status_hidup").val("Hidup");
      $("#tmptlahir").val("");
      $("#tgllhr").val("");
      $("#tahunmasuk").val("");
      $("#tahunkeluar").val("");
      $("#divForm").show();
      $("#btCari").prop("disabled", true);
      $("#btRegister").prop("disabled", true);
      $("#cari_nrp_nim").prop("disabled", true);
    });

    $("#btCancel").click(function(e) {
      $("#divForm").hide();
      $("#btCari").prop("disabled", false);
      $("#btRegister").prop("disabled", false);
      $("#cari_nrp_nim").prop("disabled", false);
    });
  });

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    $("#hid_latitude").val(position.coords.latitude);
    $("#hid_langitude").val(position.coords.longitude);
    // alert("Latitude: " + position.coords.latitude +
    // "<br>Longitude: " + position.coords.longitude);
    
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    $("#linkmap").attr("href", "https://www.google.com/maps?q=" + latitude + "," + longitude);

    // Use Google Maps Geocoding API for reverse geocoding
    const geocodingApiUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latitude + "," + longitude + "&key=AIzaSyB4lhzQw0y2D8qM-5axyxmBa6XTq6ce9XM";

    fetch(geocodingApiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.status === "OK") {
                console.log(data);
                const address = data.results[0].formatted_address;
                $("#hid_address").val(address);
                $("#span_addr").html(address);

                const addressComponents = data.results[0].address_components;
                for (const component of addressComponents) {
                    if (component.types.includes("locality") || component.types.includes("administrative_area_level_1")) {
                        const city = component.long_name;
                        $("#hid_city").val(city);
                        // alert("Your city is: " + city);
                        // break;
                    }

                    if (component.types.includes("country")) {
                        const country = component.long_name;
                        $("#hid_country").val(country);
                        // alert("Your country is: " + country);
                        // break;
                    }
                }
                // alert("Your address is: " + address);
            } else {
                alert("Unable to retrieve address.");
            }
        })
        .catch(error => {
            console.error("Error fetching geocoding data:", error);
            alert("Error fetching address.");
        });
  }

  getLocation();
</script>