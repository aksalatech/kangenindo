<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo APP_NAME; ?> | Sales By Brand</title>
    <?php include "includes/include_js_css_new.php"; ?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

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
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Sales By Brand</h5>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>kabkot" class="text-muted"> Sales By Brand</a>
                                    </li>
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <form id="productView" method="POST" action="<?php echo base_url() ?>Sales/bybrand">
                        <input type="hidden" name="action" id="action">
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="card card-custom">
                                    <div class="card-header flex-wrap py-5">
                                        <div class="card-title">
                                            <h3 class="card-label">Sales By Brand Table
                                        </div>
                                        <div class="card-toolbar">
                    
                    <a href="<?php echo base_url() ?>Sales/exportbybrand?store=<?php echo $temp ?>&sd=<?php echo $start ?>&ed=<?php echo $endd ?>" target="_blank" class="btn btn-warning">
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

                  </div>
                                    </div>
                                    <div class="card-header flex-wrap py-5">
                                        <div class="card-toolbar">
                                            <b>Store</b> &nbsp;
                                            <!--begin::Button-->
                                            <select name="brancOption" onchange="doit()" id="brancOption">
                                                <option value="">ALL</option>
                                                <?php
                                                foreach ($view_branch as $key) {
                                                ?>
                                                    <option <?php echo ($temp == $key->store_name) ? "selected" : ""; ?> value="<?php echo $key->store_name ?>"><?php echo $key->store_name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="card-toolbar">
                                            <div class="pull-right">
                                                <input type="date" value="<?php echo $start ?>" name="sd" id="startDt" placeholder="Start Date">&nbsp; <strong>s/d</strong> &nbsp;
                                                <input type="date" value="<?php echo $endd ?>"  name="ed" id="endDt" placeholder="End Date">
                                                <button type="button" id="btfilter" name="btfilter" onclick="doit()" fdprocessedid="oc1rmb">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="ProductTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="36px">No.</th>
                                                    <th width="180px">Brand</th>
                                                    <th width="180px">Qty</th>
                                                    <th width="180px">Revenue</th>
                                                    <th width="180px">Net Revenue</th>
                                                </tr>
                                                <?php
                                                $qtytotal=0;
                                                $transAmttot=0;
                                                $netrevtotal=0;
                                                foreach ($view_type as $key => $value) {
                                                    //var_dump($value)
                                                    $qtytotal= $qtytotal+$value->qty;
                                                    $transAmttot=$transAmttot+$value->transAmt;
                                                    $netrevtotal=$netrevtotal+($value->transAmt - $value->discAmt);
                                                }
                                                ?>
                                                <tr>
                                                        <th class="text-center"></th>
                                                        <th>Grand Total</th>
                                                        <th><?php echo $qtytotal; ?></th>
                                                        <th><?php echo $transAmttot; ?></th>
                                                        <th><?php echo $netrevtotal; ?></th>
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
                                                        <td><?php echo $value->brand_name; ?></td>
                                                        <td><?php echo $value->qty; ?></td>
                                                        <td><?php echo $value->transAmt; ?></td>
                                                        <td><?php echo $value->transAmt - $value->discAmt; ?></td>
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
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/sales.js"></script>

    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('#brancOption').select2();
        });
    </script>
    <!--end::Page Vendors-->
</body>

</html>