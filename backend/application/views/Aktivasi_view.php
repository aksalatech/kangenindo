<?php
$tempDate = array();
$tempValue = array();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME ?> | Dashboard HAE IPB</title>
  <?php include "includes/include_js_css_new.php"; ?>
  <style type="text/css">
    .dnone {
      display: none;
    }

    .no-padding {
      padding: 0 !important;
    }

      .tooltips {
        /*display: inline-block;*/
        background: #ffffff;
        color: #000000;
        padding: 5px 10px;
        width: 140px;
        font-size: 13px;
        border-radius: 4px;
        position: absolute;
        top: -75px;
      }

      .tooltips2 {
        /*display: inline-block;*/
        background: #ffffff;
        color: #000000;
        padding: 5px 10px;
        width: 200px;
        font-size: 13px;
        border-radius: 4px;
        position: absolute;
        top: -90px;
      }

      .arrow,
      .arrow::before {
        position: absolute;
        width: 8px;
        height: 8px;
        background: inherit;
      }

      .arrow {
        visibility: hidden;
      }

      .arrow::before {
        visibility: visible;
        content: '';
        transform: rotate(45deg);
      }

      .labels {
        color: #ffffff;
        background-color: green;
        font-family: Roboto, Arial, sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-align: center;
        width: 28px;
        height: 28px;
        border-radius: 100%;
        padding: 6px 0px;
        border: 1px solid #999;
        box-sizing: border-box;
        white-space: nowrap;
      }

      .labels2 {
        color: #ea4335;
        background-color: yellow;
        font-family: Roboto, Arial, sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-align: center;
        width: 28px;
        height: 28px;
        border-radius: 100%;
        padding: 6px 0px;
        border: 1px solid #999;
        box-sizing: border-box;
        white-space: nowrap;
      }

    .card-container2 {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: flex-start;
    }

    .card2 {
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: calc(25% - 20px);
      text-align: center;
    }

    .info-bar2 {
      background-color: #f2f2f2;
      border-top: 1px solid #ccc;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 0 0 8px 8px;
    }

    .info-column2 {
      flex-basis: 33%;
      text-align: center;
    }

    .info-column2:not(:last-child) {
      border-right: 1px solid #ccc;
    }

    .info-box {
      width: 40px;
      height: 40px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .pagination button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      background-color: #f2f2f2;
      cursor: pointer;
    }

    .pagination button:hover {
      background-color: #e0e0e0;
    }

    .pagination button.active {
      background-color: blue;
      color: #fff;
    }

    .overflow-chart {
        overflow-x:auto !important;
        
      }

      #chart_1 {
        min-width: 1360px !important;
      }


    @media only screen and (max-width: 500px) {
      .card2 {
        width: 95%;
      }

      .row-cols-sm-1 > * {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
       }  
    }
    
  </style>
</head>

<body id="kt_body" class="subheader-enabled subheader-fixed aside-enabled aside-minimize-hoverable page-loading" style="background:#fff">
  <?php include "includes/hidden.php"; ?>

  <?php // require("includes/header_new.php"); ?>

  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <?php // require("includes/navigation_new.php"); ?>

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <?php // require("includes/header-top.php"); ?>
        <form id="productView" action="<?php echo base_url(); ?>dashboard" method="GET">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Subheader-->
          <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
              <!--begin::Toolbar-->
              <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="text-muted">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>Home" class="text-muted">Dashboard IPB HAE</a>
                  </li>
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <div class="d-flex align-items-center flex-wrap">
                <!--begin::Daterange-->
                
                  <div class="row">
                    <!-- <div class="col">
                      <div class="input-group" id="startDateFilter" data-target-input="nearest">
                        <input type="text" class="form-control" placeholder="Start date" data-target="#startDateFilter" name="sd" id="startDt" value="<?php echo $sd ?>" />
                        <div class="input-group-append" data-target="#startDateFilter" data-toggle="datetimepicker">
                          <span class="input-group-text">
                            <i class="ki ki-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="input-group" id="endDateFilter" data-target-input="nearest">
                        <input type="text" class="form-control" placeholder="End date" data-target="#endDateFilter" name="ed" id="endDt" value="<?php echo $ed ?>" />
                        <div class="input-group-append" data-target="#endDateFilter" data-toggle="datetimepicker">
                          <span class="input-group-text">
                            <i class="ki ki-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="input-group">
                        <select class="form-control" name="t" id="t" style="margin-right: 10px;">
                          <option <?php echo ($param == "day") ? "selected" : ""; ?> value="day">Day</option>
                          <option <?php echo ($param == "month") ? "selected" : ""; ?> value="month">Month</option>
                          <option <?php echo ($param == "year") ? "selected" : ""; ?> value="year">Year</option>
                        </select>
                        <button type="button" class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="btfilter" name="btfilter" onclick="doit()">Filter</button>
                      </div>
                    </div>-->


                  </div> 
                
                <!--end::Daterange-->
              </div>
              <!--end::Toolbar-->
            </div>
          </div>
          <!--end::Subheader-->

          <!--begin::Entry-->
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container" style="max-width:100%">
              <!--begin::Dashboard-->
              <!--begin::Row-->
              <div class="row draggable-zone">
                <div class="col-lg-12 col-xxl-12">
                  <!--begin::Mixed Widget 1-->
                  <div class="card card-custom bg-gray-100 gutter-b" data-card="true" id="minimize_1">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-danger py-5">
                      <h3 class="card-title font-weight-bolder text-white">Dashboard IPB HAE</h3>
                      <div class="card-toolbar">
                        <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                          <i class="ki ki-arrow-down icon-nm"></i>
                        </a>
                      </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0 position-relative overflow-hidden">
                      <!--begin::Chart-->
                      <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                      <!--end::Chart-->
                      <!--begin::Stats-->
                      <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row row-cols-sm-1 row-cols-lg-4 m-0 draggable-zone">
                          <div class="col">
                            <div class="bg-light-primary px-6 py-8 rounded-xl  mb-7 draggable">
                              <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                  </g>
                                </svg>
                                <!--end::Svg Icon-->
                              </span>
                              <div class="text-primary font-weight-bolder font-size-h2 mt-3">
                                <?php echo number_format($perso_count); ?>
                              </div>
                              <a href="#" class="text-primary font-weight-bold font-size-h6 draggable-handle">Total Jumlah Alumni </a>
                            </div>
                          </div>
                          <div class="col">
                            <div class="bg-light-warning px-6 py-8 rounded-xl mb-7 draggable">
                              <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Waiting.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                  </g>
                                </svg>
                                <!--end::Svg Icon-->
                              </span>
                              <div class="text-warning font-weight-bolder font-size-h2 mt-3">
                                <?php echo number_format($cert_count); ?>
                              </div>
                              <a href="#" class="text-warning font-weight-bold font-size-h6 mt-2 draggable-handle">Total Sebaran Provinsi</a>
                            </div>
                          </div>
                          <div class="col">
                            <div class="bg-light-success px-6 py-8 rounded-xl mb-7 draggable">
                              <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                  <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Clothes/T-Shirt.svg-->
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M7.83498136,4 C8.22876115,5.21244017 9.94385174,6.125 11.999966,6.125 C14.0560802,6.125 15.7711708,5.21244017 16.1649506,4 L17.2723671,4 C17.3446978,3.99203791 17.4181234,3.99191839 17.4913059,4 L17.5,4 C17.8012164,4 18.0713275,4.1331782 18.2546625,4.34386406 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,20 C18.5,20.5522847 18.0522847,21 17.5,21 L6.5,21 C5.94771525,21 5.5,20.5522847 5.5,20 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L5.74424153,4.34512566 C5.92759515,4.13371 6.19818276,4 6.5,4 L6.50978325,4 C6.58296578,3.99191839 6.65639143,3.99203791 6.72872211,4 L7.83498136,4 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                              </span>
                              <div class="text-success font-weight-bolder font-size-h2 mt-3">
                                <?php echo number_format($qr_count) ?>
                              </div>
                              <a href="#" class="text-success font-weight-bold font-size-h6 mt-2 draggable-handle">Total Alumni Pria</a>
                            </div>
                          </div>
                          <div class="col">
                            <div class="bg-light-danger px-6 py-8 rounded-xl mb-7 draggable">
                              <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                              <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Clothes/Dress.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <polygon points="0 0 24 0 24 24 0 24"/>
                                      <path d="M8.04050792,3 C8.31778201,4.50768629 9.98487319,5.66666667 12,5.66666667 C14.0151268,5.66666667 15.682218,4.50768629 15.9594921,3 L18.381966,3 C18.9342508,3 19.381966,3.44771525 19.381966,4 C19.381966,4.1552451 19.3458209,4.30835816 19.2763932,4.4472136 L16.2763932,10.4472136 C16.1070012,10.7859976 15.7607381,11 15.381966,11 L8.61803399,11 C8.23926193,11 7.89299881,10.7859976 7.7236068,10.4472136 L4.7236068,4.4472136 C4.47661755,3.9532351 4.6768419,3.35256206 5.17082039,3.10557281 C5.30967583,3.03614509 5.46278889,3 5.61803399,3 L8.04050792,3 Z" fill="#000000" opacity="0.3"/>
                                      <path d="M9.35406592,12 L14.6459341,12 C15.4637433,12 16.1991608,12.4979019 16.5028875,13.2572186 L19.4514437,20.6286093 C19.6565571,21.1413928 19.4071412,21.7233633 18.8943577,21.9284767 C18.7762374,21.9757248 18.6501865,22 18.522967,22 L5.47703296,22 C4.92474821,22 4.47703296,21.5522847 4.47703296,21 C4.47703296,20.8727806 4.50130816,20.7467296 4.54855627,20.6286093 L7.49711254,13.2572186 C7.80083924,12.4979019 8.53625675,12 9.35406592,12 Z" fill="#000000"/>
                                  </g>
                                </svg>
                                <!--end::Svg Icon-->
                              </span>
                              <div class="text-danger font-weight-bolder font-size-h2 mt-3">
                                <?php echo number_format($ikd_count) ?>
                              </div>
                              <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2 draggable-handle">Total Alumni Wanita</a>
                            </div>
                          </div>
                        </div>
                        <!--end::Row-->
                      </div>
                      <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!--end::Mixed Widget 1-->
                </div>
                <!-- Dashboard Monitoring hari ini -->
                

                <div class="col-lg-12 col-xxl-12">
                  <?php
                  if (isset($_GET['t'])) {
                  ?>
                    <input type="hidden" name="dayAct" id="dayAct" value="<?php echo $_GET['t'] ?>" />
                  <?php
                  }
                  ?>
                  <!--begin::Card-->
                  <div class="card card-custom gutter-b" data-card="true" id="minimize_2">
                    <!--begin::Header-->
                    <div class="card-header h-auto">
                      <!--begin::Title-->
                      <div class="card-title py-5">
                        <h3 class="card-label">Recapitulation Report</h3>
                      </div>
                      <!--end::Title-->
                      <div class="card-toolbar">
                        <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                          <i class="ki ki-arrow-down icon-nm"></i>
                        </a>
                      </div>
                    </div>
                    <!--end::Header-->
                    <div class="card-body overflow-chart no-padding">
                      <!--begin::Chart-->
                      <div id="chart_1"></div>
                      <!--end::Chart-->
                    </div>
                  </div>
                  <!--end::Card-->

                  <!--begin::Card-->
                  <div class="card card-custom gutter-b" data-card="true" id="minimize_2">
                    <!--begin::Header-->
                    <div class="card-header h-auto">
                      <!--begin::Title-->
                      <div class="card-title py-5">
                        <h3 class="card-label">Peta Sebaran Alumni</h3>
                      </div>
                      <!--end::Title-->
                      <div class="card-toolbar">
                        <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                          <i class="ki ki-arrow-down icon-nm"></i>
                        </a>
                      </div>
                    </div>
                    <!--end::Header-->
                    <div class="card-body no-padding">
                      <!--begin::Chart-->
                      <!-- <div id="chart_2" style="height:600px"></div> -->
                      <!--end::Chart-->
                       <div>
                        <div id="maps" style="width: 100%;height: 520px">
                          <!-- Maps Here... -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Card-->
                </div>
                <!-- Dashboard Monitoring hari ini -->

                <div class="col-lg-12 col-xxl-12">
                  <!--begin::Card-->
                  <div class="card card-custom gutter-b" data-card="true" id="minimize_2">
                    <!--begin::Header-->
                    <div class="card-header h-auto">
                      <!--begin::Title-->
                      <div class="card-title py-5">
                        <h3 class="card-label">Dashboard Monitoring Alumni</h3>
                      </div>
                      <!--end::Title-->
                      <div class="pull-right" style="padding-top:12px">
                          <select class="form-control" id='group' name='group' onchange="doit()">
                            <option value="Provinsi" <?php echo ($group == "Provinsi") ? "selected" : "" ?> >Provinsi</option>
                            <option value="tkt_pddk" <?php echo ($group == "tkt_pddk") ? "selected" : "" ?>>Tingkat Pendidikan</option>
                            <option value="program_studi" <?php echo ($group == "program_studi") ? "selected" : "" ?>>Program Studi</option>
                            <option value="angkatan" <?php echo ($group == "angkatan") ? "selected" : "" ?>>Angkatan</option>
                            <option value="pekerjaan" <?php echo ($group == "pekerjaan") ? "selected" : "" ?> >Pekerjaan</option>
                            <option value="keahlian" <?php echo ($group == "keahlian") ? "selected" : "" ?>>Keahlian</option>
                          </select>
                        </div>
                    </div>
                    <div class="card-toolbar">
                      <div class="card-container2" style="padding-left: 20px">
                        <?php 
                        $no = 1;
                        foreach ($ikd_all as $p) : ?>
                          <div class="card2">
                            <div style="height: 64px"><b><?php echo $p->province_nm; ?></b></div>
                            <p>Total Alumni</p>
                            <p style="font-size:x-large; font-weight:bold"><?php echo $p->total ?></p>
                            <div class="info-bar2">
                              <div class="info-column2" style="flex-basis:50%">
                                <p>Alumni Pria</p>
                                <p style="font-weight:bold"><?php echo $p->total_male ?></p>
                              </div>
                              <div class="info-column2" style="flex-basis:50%">
                                <p>Alumni Wanita</p>
                                <p style="font-weight:bold"><?php echo $p->total_female ?></p>
                              </div>
                            </div>
                          </div>
                        <?php 
                        $no++;
                        endforeach; ?>
                        
                      </div>
                      <div class="pagination" style="margin-bottom:12px">
                        <!-- Pagination buttons will be added dynamically here -->
                      </div>
                    </div>
                  </div>
                  <!--end::Card-->
                </div>
              </div>
              <!--end::Row-->
              <!--end::Dashboard-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Entry-->
        </div>
        <!--end::Content-->
        </form>


        <?php // include("includes/footer.php"); ?>
      </div>
      <!--end::Wrapper-->
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
  <!--end::Page Scripts-->

  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/draggable/draggable.bundle.js" type="text/javascript"></script>

  <!--begin::Page Scripts(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/features/cards/draggable.js"></script>

  <script src="<?php echo base_url(); ?>dist/assets/js/pages/features/cards/tools.js"></script>
  <!--end::Page Scripts-->

  <script src="<?php echo base_url(); ?>dist/js/home.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/maps.js"></script>

  <!--end::Page Scripts-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRue8nV1tDiW-YsT6lWFPKfiBLjOQoxMs&callback=initMap"
    async defer></script>
  <script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVVSqxxlhct_UCU6GGEpJqAl5fSxTGojc&callback=initMap" async defer></script> -->
  <script>
    const cards = document.querySelectorAll('.card2');
    const cardContainer = document.querySelector('.card-container2');
    const pagination = document.querySelector('.pagination');
    const cardsPerPage = 8;
    let currentPage = 1;

    function showCards(pageNumber) {
      const startIndex = (pageNumber - 1) * cardsPerPage;
      const endIndex = Math.min(startIndex + cardsPerPage, cards.length);

      cards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    function createPaginationButtons() {
      const pageCount = Math.ceil(cards.length / cardsPerPage);

      pagination.innerHTML = '';

      const firstPageButton = createPaginationButton('First', 1);
      pagination.appendChild(firstPageButton);

      const previousPageButton = createPaginationButton('Prev', currentPage - 1);
      pagination.appendChild(previousPageButton);

      let startPage = Math.max(currentPage - 4, 1);
      let endPage = Math.min(currentPage + 4, pageCount);

      if (currentPage <= 4) {
        endPage = Math.min(9, pageCount);
      } else if (currentPage >= pageCount - 4) {
        startPage = Math.max(pageCount - 8, 1);
      }

      for (let i = startPage; i <= endPage; i++) {
        const button = createPaginationButton(i, i);
        pagination.appendChild(button);
      }

      const nextPageButton = createPaginationButton('Next', currentPage + 1);
      pagination.appendChild(nextPageButton);

      const lastPageButton = createPaginationButton('Last', pageCount);
      pagination.appendChild(lastPageButton);

      updatePaginationButtons();
    }

    function createPaginationButton(label, page) {
      const button = document.createElement('button');
      button.textContent = label;
      button.addEventListener('click', () => {
        currentPage = page;
        showCards(currentPage);
        createPaginationButtons(); // Update pagination buttons
      });
      return button;
    }

    function updatePaginationButtons() {
      const buttons = document.querySelectorAll('.pagination button');

      buttons.forEach((button, index) => {
        if (button.textContent === 'First') {
          button.disabled = currentPage === 1;
        } else if (button.textContent === 'Last') {
          button.disabled = currentPage === Math.ceil(cards.length / cardsPerPage);
        } else if (button.textContent === 'Prev') {
          button.disabled = currentPage === 1;
        } else if (button.textContent === 'Next') {
          button.disabled = currentPage === Math.ceil(cards.length / cardsPerPage);
        } else {
          button.disabled = false;
        }

        if (parseInt(button.textContent) === currentPage) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }

    createPaginationButtons();
    showCards(currentPage);
  </script>
</body>

</html>