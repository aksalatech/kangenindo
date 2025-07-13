<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo APP_NAME; ?> | Menu List</title>
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
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Menu List</h5>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>Gallery" class="text-muted"> Menu List</a>
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
                                        <h3 class="card-label">Menu List Table
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <a href="<?php echo base_url(); ?>Gallery/add_type_view" class="btn btn-primary font-weight-bolder">
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
                                <div class="card-body">
                                    <table id="ProductTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="36px">No.</th>
                                                <th width="200px">Menu Picture</th>
                                                <th width="180px">Title</th>
                                                <th width="100px">Category</th>
                                                <th width="90px">Urutan</th>
                                                <!-- <th width="90px">Jenis Gambar</th> -->
                                                <th width="90px">Aktif?</th>
                                                <th width="10%" class="text-center">Action</th>
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
                                                    <td>
                                                        <a href="<?php echo base_url() ?>./../images/catering/<?php echo $value->imagepath ?>" target="_blank">
                                                            <img src="<?php echo base_url() ?>./../images/catering/<?php echo $value->imagepath ?>" width="200px" />
                                                        </a>
                                                    </td>
                                                    <td><?php echo $value->imagetitle; ?></td>
                                                    <td><?php echo $value->category_name; ?></td>
                                                    <td style="display: flex; align-items: center;">
                                                        <span style="flex: 2;"><br />
                                                            <br />
                                                            <img style="width: 15%;height:15%;margin-left: 3px" src="<?php echo base_url(); ?>dist/assets/arrow-up.png" data-id="<?php echo $value->imageid ?>" data-value="<?php echo $value->imageindex; ?>" class="btclient-up btn btn-icon icon mini" />
                                                            <br />
                                                            <span style="flex: 1;margin-left: 10px;"><?php echo $value->imageindex; ?></span>
                                                            <br />
                                                            <img style="width: 15%;height:15%;margin-left: 3px" src="<?php echo base_url(); ?>dist/assets/arrow-bottom.png" data-id="<?php echo $value->imageid ?>" data-value="<?php echo $value->imageindex; ?>" class="btclient-down btn btn-icon icon mini" />
                                                    </td>
                                                    <!-- <td><?php echo $value->imagesize; ?></td> -->
                                                    <td class="text-center">
                                                        <input type="checkbox" <?php echo ($value->visible == 1) ? "checked" : "" ?> disabled>
                                                    </td>
                                                    <td align="center">
                                                    <!-- <a href="<?php echo base_url(); ?>Gallery/gallery_detail?typeID=<?php echo $value->imageid; ?>" class="btn btn-sm btn-warning btn-text-warning btn-icon mr-2 mb-1" title="Update Data"><i class="fas fa-list"></i> </a>  -->
                                                        <a href="<?php echo base_url(); ?>Gallery/update?typeID=<?php echo $value->imageid; ?>" class="btn btn-sm btn-warning btn-text-warning btn-icon mr-2 mb-1" title="Update Data"><i class="fas fa-pencil-alt"></i> </a>

                                                        <a href="#" type="button" class="btn btn-sm btn-danger btn-text-danger btn-icon mr-2 mb-1" name="deleteButton" id="deleteButton" onclick="confirmation('<?php echo $value->imageid; ?>')" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
                    <!--end::Wrapper-->
                </div>
                <?php include("includes/footer.php"); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Javascript
        $(function() {
            $('#branchTable').DataTable({
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
        $(function() {
            $('#ProductTable').DataTable({
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all",
                    "orderable": false,
                    "targets": [5]
                }],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        function confirmation(d) {
            var base = base_url + "Gallery/delete?typeID=" + d;
            //alert(base)
            var r = confirm("Are you sure?");
            if (r == true) {
                window.location.assign(base);
            }
        }

        function doit() {
            var temp = $("#brancOption").val();
            $("#action").val(temp);
            $("#productView").submit();
        }

        //Datemask dd/mm/yyyy
        $("#guestBorn").inputmask("yyyy-mm-dd", {
            "placeholder": "yyyy-mm-dd"
        });
        $("#guestPhone").inputmask("(___) ___-____", {
            "placeholder": "(___) ___-____"
        });
    </script>


    <script>
        $(document).ready(function(e) {
            // Button Event
            $(".btclient-up").click(function(e) {
                var clientID = $(this).attr("data-id");
                var index = $(this).attr("data-value");
                $.ajax({
                    url: base_url + "gallery/move_client_up?ID_customer=" + clientID + "&index=" + index,
                    dataType: "html",
                    type: "GET",
                    success: function(result) {
                        window.location.reload();
                    }
                });
            });

            $(".btclient-down").click(function(e) {
                var clientID = $(this).attr("data-id");
                var index = $(this).attr("data-value");
                $.ajax({
                    url: base_url + "gallery/move_client_down?ID_customer=" + clientID + "&index=" + index,
                    dataType: "html",
                    type: "GET",
                    success: function(result) {
                        window.location.reload();
                    }
                });
            });

        });
    </script>

    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
</body>

</html>