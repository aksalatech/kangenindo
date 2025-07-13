<?php
$tempDate=array();
$tempValue=array();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME ?> | Dashboard</title>
  <?php include "includes/include_js_css_new.php"; ?>
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
							<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="javascript:void(0)" class="text-muted">Home</a>
								</li>
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home" class="text-muted">Dashboard</a>
								</li>
							</ul>
							<!--end::Breadcrumb-->
						</div>
						<div class="d-flex align-items-center flex-wrap">
							<!--begin::Daterange-->
							<form id="productView" action="<?php echo base_url(); ?>home/index" method="GET">
								<div class="row">
									<div class="col">
										<div class="input-group" id="startDateFilter" data-target-input="nearest">
											<input type="text" class="form-control" placeholder="Start date" data-target="#startDateFilter" name="sd" id="startDt" value="<?php echo $sd ?>"/>
											<div class="input-group-append" data-target="#startDateFilter" data-toggle="datetimepicker">
												<span class="input-group-text">
													<i class="ki ki-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									
									<div class="col">
										<div class="input-group" id="endDateFilter" data-target-input="nearest">
											<input type="text" class="form-control" placeholder="End date" data-target="#endDateFilter" name="ed" id="endDt" value="<?php echo $ed ?>"/>
											<div class="input-group-append" data-target="#endDateFilter" data-toggle="datetimepicker">
												<span class="input-group-text">
													<i class="ki ki-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									
									<!-- <input type="text" class="date" value="<?php echo $sd ?>" readonly name="sd" id="startDt" placeholder="Start Date" />&nbsp; <strong>s/d</strong> &nbsp; 
									<input type="text" class="date" value="<?php echo $ed ?>" readonly name="ed" id="endDt" placeholder="End Date" /> -->
									<div class="col">
										<div class="input-group">
											<select class="form-control" name="t" id="t" style="margin-right: 10px;">
												<option <?php echo ($param == "day") ? "selected" : ""; ?> value="day">Day</option>
												<option <?php echo ($param == "month") ? "selected" : ""; ?> value="month">Month</option>
												<option <?php echo ($param == "year") ? "selected" : ""; ?> value="year">Year</option>
											</select>
											<button type="button" class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="btfilter" name="btfilter" onclick="doit()">Filter</button>
										</div>
									</div>
									
									
								</div>
							</form>
							<!--end::Daterange-->
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
						<!--begin::Row-->
						<div class="row draggable-zone">
							<div class="col-lg-12 col-xxl-12  draggable">
								<!--begin::Mixed Widget 1-->
								<div class="card card-custom bg-gray-100 card-stretch gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 bg-danger py-5">
										<h3 class="card-title font-weight-bolder text-white">Request Stats</h3>
										<div class="card-toolbar">
											<!-- <div class="dropdown dropdown-inline">
												<a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
											</div> -->
											<a href="#" class="btn btn-icon btn-sm btn-hover-light-danger draggable-handle">
												<i class="ki ki-menu-grid"></i>
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
											<div class="row m-0 draggable-zone">
												<div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7 draggable">
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
														<?php echo $cert_count; ?>
													</div>
													<a href="#" class="text-primary font-weight-bold font-size-h6 draggable-handle">All Request </a>
												</div>
												<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 draggable">
													<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
														<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Waiting.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<div class="text-warning font-weight-bolder font-size-h2 mt-3">
														<?php echo number_format($cert_done + $cert_receive); ?>
													</div>
													<a href="#" class="text-warning font-weight-bold font-size-h6 mt-2 draggable-handle">Done &amp; Receive</a>
												</div>
												<div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7 draggable">
													<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
														<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-check.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
																<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
																<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<div class="text-success font-weight-bolder font-size-h2 mt-3">
														<?php echo number_format($cert_apv) ?>
													</div>
													<a href="#" class="text-success font-weight-bold font-size-h6 mt-2 draggable-handle">Approved</a>
												</div>
												<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7 draggable">
													<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
														<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<div class="text-danger font-weight-bolder font-size-h2 mt-3">
														<?php echo number_format($cert_rejected) ?>
													</div>
													<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2 draggable-handle">Rejected</a>
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
							<div class="col-lg-8 col-xxl-8 draggable">
								<?php
									if(isset($_GET['t'])){
									?>
									<input type="hidden" name="dayAct" id="dayAct" value="<?php echo $_GET['t'] ?>" />
									<?php
									}
								?>
								<!--begin::Card-->
								<div class="card card-custom gutter-b">
									<!--begin::Header-->
									<div class="card-header h-auto">
										<!--begin::Title-->
										<div class="card-title py-5">
											<h3 class="card-label">Recapitulation Report</h3>
										</div>
										<!--end::Title-->
										<div class="card-toolbar">
											<a href="#" class="btn btn-icon btn-sm btn-hover-light-danger draggable-handle">
												<i class="ki ki-menu-grid"></i>
											</a>
										</div>
									</div>
									<!--end::Header-->
									<div class="card-body">
										<!--begin::Chart-->
										<div id="chart_1"></div>
										<!--end::Chart-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<div class="col-lg-4 col-xxl-4  draggable">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label font-weight-bolder text-dark">Current Completion</span>
											<!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">Pending 10 tasks</span> -->
										</h3>
										<div class="card-toolbar">
											<a href="#" class="btn btn-icon btn-sm btn-hover-light-danger draggable-handle">
												<i class="ki ki-menu-grid"></i>
											</a>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-0">
										<div class="card card-custom bg-light-primary card-shadowless gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3" style="padding-top: 0; padding-bottom:10px;">
												<?php 
													$total= $cert_count / $cert_count * 100; 
													if ($total>=100) {
														$total='100';
													}
													else if ($total < 0) {
														$total = '0';
												} ?>
												<a href="#" class="la-pull-left card-title font-weight-bolder text-primary text-hover-state-dark font-size-h6 mb-4 d-block">Total Requests</a>
												<div class="la-pull-right font-weight-bold text-muted font-size-sm">
													<span class=" text-dark-75 font-size-h4 font-weight-bolder mr-2"><?php echo $total ?>% </span> (<?php echo number_format($cert_count) ?></b>/<?php echo number_format($cert_count) ?>)
												</div>
												<div class="progress progress-xs mt-7 bg-primary-o-60" style="width: 100%;">
													<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $total ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end:: Body-->
										</div>
										<div class="card card-custom bg-light-warning card-shadowless gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3" style="padding-top: 0; padding-bottom:10px;">
												<?php $total=( ($cert_done + $cert_receive)/$cert_count)*100;
													if ($total>=100) {
														$total='100';
													}
													else if ($total < 0) {
														$total = '0';
												} ?>
												<a href="#" class="la-pull-left card-title font-weight-bolder text-warning text-hover-state-dark font-size-h6 mb-4 d-block">Done &amp; Receive</a>
												<div class="la-pull-right font-weight-bold text-muted font-size-sm">
													<span class="text-dark-75 font-size-h4 font-weight-bolder mr-2"><?php echo number_format((float)$total, 2, '.',''); ?>% </span> (<?php echo number_format($cert_done + $cert_receive) ?>/<?php echo number_format($cert_count) ?>)
												</div>
												<div class="progress progress-xs mt-7 bg-warning-o-60" style="width: 100%">
													<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $total ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end:: Body-->
										</div>
										<div class="card card-custom bg-light-info card-shadowless gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3" style="padding-top: 0; padding-bottom:10px;">
												<?php $total=($cert_pending/$cert_count)*100;
													if ($total>=100) {
														$total='100';
													}
													else if ($total < 0) {
														$total = '0';
												} ?>
												<a href="#" class="la-pull-left card-title font-weight-bolder text-info text-hover-state-dark font-size-h6 mb-4 d-block">On Progress</a>
												<div class="la-pull-right font-weight-bold text-muted font-size-sm">
													<span class="text-dark-75 font-size-h4 font-weight-bolder mr-2"><?php echo number_format((float)$total, 2, '.',''); ?>% </span> (<?php echo number_format($cert_pending) ?>/<?php echo number_format($cert_count) ?>)
												</div>
												<div class="progress progress-xs mt-7 bg-info-o-60" style="width: 100%;">
													<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $total ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end:: Body-->
										</div>
										<div class="card card-custom bg-light-success card-shadowless gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3" style="padding-top: 0; padding-bottom:10px;">
												<?php $total=($cert_apv/$cert_count)*100;
													if ($total>=100) {
														$total='100';
													}
													else if ($total < 0) {
														$total = '0';
												} ?>
												<a href="#" class="la-pull-left card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">Approved</a>
												<div class="la-pull-right font-weight-bold text-muted font-size-sm">
													<span class="text-dark-75 font-size-h4 font-weight-bolder mr-2"><?php echo number_format((float)$total, 2, '.',''); ?>% </span> (<?php echo number_format($cert_apv) ?>/<?php echo number_format($cert_count) ?>)
												</div>
												<div class="progress progress-xs mt-7 bg-success-o-60" style="width: 100%;">
													<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $total ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end:: Body-->
										</div>
										<div class="card card-custom bg-light-danger card-shadowless gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3" style="padding-top: 0; padding-bottom:10px;">
												<?php $total=($cert_rejected/$cert_count)*100;
													if ($total>=100) {
														$total='100';
													}
													else if ($total < 0) {
														$total = '0';
												} ?>
												<a href="#" class="la-pull-left card-title font-weight-bolder text-danger text-hover-state-dark font-size-h6 mb-4 d-block">Rejected</a>
												<div class="la-pull-right font-weight-bold text-muted font-size-sm">
													<span class="text-dark-75 font-size-h4 font-weight-bolder mr-2"><?php echo number_format((float)$total, 2, '.',''); ?>% </span> (<?php echo number_format($cert_rejected) ?>/<?php echo number_format($cert_count) ?>)
												</div>
												<div class="progress progress-xs mt-7 bg-danger-o-60" style="width: 100%">
													<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo number_format((float)$total, 2, '.',''); ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end:: Body-->
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::List Widget 1-->
							</div>
							<div class="col-lg-8 col-xxl-8  draggable">
								<!--begin::Card-->
								<div class="card card-custom gutter-b">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title">
											<h3 class="card-label">On Progress Personalization Process
											<!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span></h3> -->
										</div>
										<div class="card-toolbar">
											<!-- <div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
														</g>
													</svg>
													
												</span>Export</button>
												
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													
													<ul class="navi flex-column navi-hover py-2">
														<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-print"></i>
																</span>
																<span class="navi-text">Print</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
																<span class="navi-text">Copy</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
																<span class="navi-text">Excel</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
																<span class="navi-text">CSV</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
																<span class="navi-text">PDF</span>
															</a>
														</li>
													</ul>
													
												</div>
												
											</div> -->
											
											<a href="#" class="btn btn-icon btn-sm btn-hover-light-danger draggable-handle">
												<i class="ki ki-menu-grid"></i>
											</a>
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
											<thead>
												<tr>
													<th>No</th>
													<th>Lembaga Produsen</th>
													<th>Tgl Requests</th>
													<th>Mulai Perso</th>
													<th style="text-align:center">Judul Permintaan</th>
													<th style="text-align:center">Jml Mesin</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if (count($unfinish_certif)==0) {
													?>
														<tr>
															<td colspan="3" align="center">[Tidak ada data]</td>
														</tr>
													<?php
													}
													else{
														$i = 0;
														foreach ($unfinish_certif as $value) {
														$i++;
														?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $value->employee_name; ?></a></td>
															<td><?php echo date('d M Y H:i', strtotime($value->request_date)); ?></td>
															<td><?php echo date('d M Y H:i', strtotime($value->actual_start)); ?></td>
															<td><?php echo $value->request_title; ?></td>
															<td align="center"><?php echo $value->jml_mesin; ?></td>
														</tr>
														<?php
														}
													}
												?>
											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<div class="col-lg-4 col-xxl-4  draggable">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label font-weight-bolder text-dark">On Progress (Produsen)</span>
											<!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">Pending 10 tasks</span> -->
										</h3>
										<div class="card-toolbar">
											<a href="#" class="btn btn-sm btn-success font-weight-bold draggable-handle">
												<?php echo count($group); ?> Data
											</a>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-8">
										<?php
											if (count($group)==0) {
												?>
												<tr>
												<td align="center">[Tidak ada data]</td>
												</tr>
											<?php 
											}
											else{
												$i = 1;
												foreach ($group as $key => $value) {
												if ($i > 6) break;
												?>
													<!--begin::Item-->
													<div class="d-flex align-items-center mb-10">
														<!--begin::Symbol-->
														<div class="symbol symbol-40 symbol-light-warning mr-5">
															<span class="symbol-label">
																<span class="svg-icon svg-icon-xl svg-icon-primary">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																			<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Text-->
														<div class="d-flex flex-column font-weight-bold">
															<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $value->employee_name ?></a>
															<span class="text-muted"><?php echo $value->request_title; ?></span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
												<?php
												$i++;
												}
											}
										?>
									</div>
									<!--end::Body-->
								</div>
								<!--end::List Widget 1-->
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


		
			<?php include("includes/footer.php"); ?>
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
  <!--end::Page Scripts-->

<script src="<?php echo base_url(); ?>dist/js/home.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVVSqxxlhct_UCU6GGEpJqAl5fSxTGojc&callback=initMap" async defer></script> -->
</body>
</html>
