<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Statistic Dashboard</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>
<body id="bd_permohonan" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
        <!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<h5 class="text-dark font-weight-bold my-1 mr-5">Statistik Berdasarkan Lembaga Pengguna	</h5>
								</div>
								<div class="d-flex align-items-center flex-wrap">
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
										<li class="breadcrumb-item">
											<a href="<?php echo base_url(); ?>" class="text-muted">Home</a>
										</li>
										<li class="breadcrumb-item">
											<a href="javascript:void(0)" class="text-muted">Statistik Pengguna</a>
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
								<!--begin::Dashboard-->

								<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
									<div class="alert-text text-center">
										<h1>Jumlah Lembaga Pengguna: <code><?php echo sizeof($pengguna) ?></code> Lembaga</h1>
										<h1>Total Request: <code><?php echo $total ?></code> Request</h1>
                    <form method="GET" action="<?php echo base_url() ?>Dashboard">
                      <div class="form-group mt-10">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for..." value="<?php echo $search ?>" id="s" name="s"/>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Go!</button>
                          </div>
                        </div>
                      </div>
                    </form>
									</div>
								</div>

								<!--begin::Row-->
								<div class="row draggable-zone bg-light-white gutter-b" style="border-radius: 0.42rem;margin:0; padding: 20px;">
                  <?php 
                  $i = 0;
                  foreach ($pengguna as $p) { ?>
                    <div class="col-xl-3 draggable">
                      <!--begin::List Widget 7-->
                      <div class="card card-custom card-stretch gutter-b bg-light-<?php
                        $mod = $i % 5;
                        switch($mod)
                        {
                          case 0 : echo "primary"; break;
                          case 1 : echo "danger"; break;
                          case 2 : echo "success"; break;
                          case 3 : echo "warning"; break;
                          case 4 : echo "dark"; break;
                        }
                      ?>" style="height: calc(100% - 35px);">
                        <!--begin::Header-->
                        <div class="card-header border-0" style="min-height: 50px;">
                          <a title="<?php echo $p->typeNm ?>" class="card-title text-box-permohonan" href="<?php echo base_url() ?>dashboard/detail?id=<?php echo $p->typeID ?>">
                            <h5 class="font-weight-bolder text-dark"><?php echo $p->typeNm ?></h5>
                          </a>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0">
                          <!--begin::Item-->
                          <div class="d-flex align-items-center flex-wrap">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-50 symbol-light mr-5 draggable-handle">
                              <span class="symbol-label">
                                <span class="svg-icon svg-icon-lg svg-icon-<?php
                                  $mod = $i % 5;
                                  switch($mod)
                                  {
                                    case 0 : echo "primary"; break;
                                    case 1 : echo "danger"; break;
                                    case 2 : echo "success"; break;
                                    case 3 : echo "warning"; break;
                                    case 4 : echo "dark"; break;
                                  }
                                ?>">
                                  <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg-->
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect x="0" y="0" width="24" height="24"/>
                                      <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                      <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                      <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                      <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                      <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                      <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                      <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                      <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                    </g>
                                  </svg>
                                  <!--end::Svg Icon-->
                                </span>
                              </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1 mr-2">
                              <a href="<?php echo base_url() ?>dashboard/detail?id=<?php echo $p->typeID ?>" class="font-weight-bold text-dark-75 text-hover-<?php
                                $mod = $i % 5;
                                switch($mod)
                                {
                                  case 0 : echo "primary"; break;
                                  case 1 : echo "danger"; break;
                                  case 2 : echo "success"; break;
                                  case 3 : echo "warning"; break;
                                  case 4 : echo "dark"; break;
                                }
                              ?> font-size-lg mb-1"><?php echo $p->jml_request ?></a>
                              <span class="text-muted font-weight-bold">
                                <?php echo ($p->request_date == null) ? "N/A" : date('d M Y H:i', strtotime($p->request_date)) ?>
                              </span>
                            </div>
                            <!--end::Text-->
                            <!-- <span class="label label-xl label-light label-inline my-lg-0 my-2 text-dark-50 font-weight-bolder">+82$</span> -->
                            <div class="progress progress-xs mt-7 bg-<?php
                                $mod = $i % 5;
                                switch($mod)
                                {
                                  case 0 : echo "primary"; break;
                                  case 1 : echo "danger"; break;
                                  case 2 : echo "success"; break;
                                  case 3 : echo "warning"; break;
                                  case 4 : echo "dark"; break;
                                }
                              ?>-o-60" style="width: 100%">
                              <div class="progress-bar bg-<?php
                                $mod = $i % 5;
                                switch($mod)
                                {
                                  case 0 : echo "primary"; break;
                                  case 1 : echo "danger"; break;
                                  case 2 : echo "success"; break;
                                  case 3 : echo "warning"; break;
                                  case 4 : echo "dark"; break;
                                }
                              ?>" role="progressbar" style="width: <?php echo $p->proportion ?>%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <!--end::Item-->
                        </div>
                        <!--end::Body-->
                      </div>
                      <!--end::List Widget 7-->
                    </div>
                  <?php 
                    $i++;
                  } ?>
								</div>
								<!--end::Row-->

                <div class="text-center mt-10">
                    <h3 style="display: inline">
                        Halaman :
                    </h3>
                

                    <div class="mt-2">
                        <?php echo $pagination; ?>
                    </div>
                   
                    <br/><br/>
                </div>
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
        <!--end::Content-->

        <?php include("includes/footer.php"); ?>
			
				

      </div>
			<!--end::Wrapper-->
		</div>
	</div>
	<!-- /.content-wrapper -->

  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/draggable/draggable.bundle.js" type="text/javascript"></script>

  <!--begin::Page Scripts(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/features/cards/draggable.js"></script>
  <!--end::Page Scripts-->
	<script src="<?php echo base_url() ?>dist/js/patch.js"></script>
	
</body>
</html>
