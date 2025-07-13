<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo APP_NAME; ?> | Order List</title>
    <?php include "includes/include_js_css_new.php"; ?>
    <link href="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <style>
        .box {
            display: inline-block;
            border: 1px solid grey;
            margin: 10px;
            vertical-align: top;
            /* Ensures the boxes align at the top */
            width: 350px;
            /* Change the width as desired */
            height: 300px;
            /* Change the height as desired */
            box-sizing: border-box;
            /* Ensures padding and border are included in the width and height */
            /* padding: 0; */
            /* Removes padding to fit the header properly */
        }

        .box-header {
            background-color: #379777;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            margin: 1px;
            /* Removes default margin */
            box-sizing: border-box;
            /* Ensures padding is included in the height */
            border-bottom: 1px solid black;
            /* Adds a border between the header and content */
        }

        .checkmark-container {
            position: absolute;
            background-color: green;
        }

        .checkmark-circle {
            border-radius: 50%;
            /* Makes the container a circle */
            width: 30px;
            /* Set the width of the circle */
            height: 30px;
            /* Set the height of the circle */
            display: flex;
            align-items: center;
            /* Vertically center the checkmark */
            justify-content: center;
            /* Horizontally center the checkmark */
            border: 2px solid white;
            background-color: green;
        }

        .checkmark {
            font-size: 1.2em;
            /* Increases the size of the checkmark */
            color: white;
            /* Color of the checkmark */
        }

        .checkmark-container2 {
            position: absolute;
            background-color: orange;
        }

        .checkmark-circle2 {
            border-radius: 50%;
            /* Makes the container a circle */
            width: 30px;
            /* Set the width of the circle */
            height: 30px;
            /* Set the height of the circle */
            display: flex;
            align-items: center;
            /* Vertically center the checkmark */
            justify-content: center;
            /* Horizontally center the checkmark */
            border: 2px solid white;
            background-color: orange;
        }

        .checkmark2 {
            font-size: 1.2em;
            /* Increases the size of the checkmark */
            color: white;
            /* Color of the checkmark */
        }

        .checkmark-container3 {
            position: absolute;
            background-color: red;
        }

        .checkmark-circle3 {
            border-radius: 50%;
            /* Makes the container a circle */
            width: 30px;
            /* Set the width of the circle */
            height: 30px;
            /* Set the height of the circle */
            display: flex;
            align-items: center;
            /* Vertically center the checkmark */
            justify-content: center;
            /* Horizontally center the checkmark */
            border: 2px solid white;
            background-color: red;
        }

        .checkmark3 {
            font-size: 1.2em;
            /* Increases the size of the checkmark */
            color: white;
            /* Color of the checkmark */
        }

        .box-footer {
            color: white;
            padding: 5px;
            text-align: center;
        }

        .box-content {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            height: 223px;
            /* Allows scrolling if content overflows */
        }

        .checkmark-button {
            background-color: #f8f8f8;
            /* Light background for the button */
            border: none;
            border-radius: 5px;
            /* Rounded corners */
            padding: 10px 15px;
            /* Add padding for size */
            cursor: pointer;
            /* Pointer cursor on hover */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .checkmark-button:hover {
            background-color: #e0e0e0;
            /* Slightly darker background on hover */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add shadow on hover */
        }
    </style>
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
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Order List</h5>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>user" class="text-muted">Order List</a>
                                    </li>
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <form id="productView" method="POST" action="<?php echo base_url() ?>order">
                        <input type="hidden" name="action" id="action">
                        <input type="hidden" name="action2" id="action2">
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container" style="padding: 0 10px;">
                                <div>
                                    <div class="card card-custom">
                                        <div class="card-header flex-wrap py-5">
                                            <div class="card-title">
                                                <h3 class="card-label">Order Table
                                                    <!-- <div class="text-muted pt-2 font-size-sm">custom colu rendering</div></h3> -->
                                            </div>
                                            <!-- <div class="card-toolbar">
                                            <a href="<?php echo base_url(); ?>User/add_user_view" class="btn btn-primary font-weight-bolder">
                                                <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                </span>Tambah Data</a>
                                            </div> -->
                                        </div>

                                        <div class="card-header flex-wrap py-5">
                                        <div class="card-toolbar">
                                                <b>Status</b> &nbsp;
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
                                                <b>Status</b> &nbsp;
                                                <!--begin::Button-->
                                                <select name="brancOption2" onchange="doit()" id="brancOption2">
                                                    <option value="P" <?php echo ($temp2 == 'P') ? "selected" : ""; ?>>Processing</option>
                                                    <option value="D" <?php echo ($temp2 == 'D') ? "selected" : ""; ?>>Done</option>
                                                    <option value="R" <?php echo ($temp2 == 'R') ? "selected" : ""; ?>>Rejected</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $i = 1;
                                            foreach ($view_user as $key => $value) {
                                            ?>

                                                <div class="box">
                                                    <h3 class="box-header">Order #<?php echo $i; ?> <?php $datetime = strtotime($value->pickup_time);
                                                                                                    echo date('H:i', $datetime); ?></h3>
                                                    <!-- You can display user data here -->
                                                    <div class="box-content">
                                                        <?php
                                                        $totalamount = 0;
                                                        foreach ($view_detail as $det) {
                                                            if ($det->transID === $value->transID) { ?>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-2" style="align-items: center;">
                                                                        <?php echo $det->qty; ?>
                                                                    </div>
                                                                    <div class="col-lg-6" style="align-items: center;">
                                                                        <b><?php echo $det->menuNm; ?></b>
                                                                        <?php if ($det->menuOpts != null) { ?>
                                                                            <br>
                                                                            <?php echo $det->menuOpts; ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <!-- <div class="col-lg-3">
                                                                        $<?php echo $det->quantity * $det->price ?>
                                                                    </div> -->
                                                                    <?php if ($det->status == "P") { ?>
                                                                        <div class="col-lg-2" style="flex: 3;display: flex;justify-content: flex-end;">
                                                                            <a class="checkmark-button btn-rejectverif" data-id2="<?php echo $det->transID ?>" data-id="<?php echo $det->transdetailID ?>">
                                                                                <div class="checkmark-container3">
                                                                                    <div class="checkmark-circle3">
                                                                                        <span class="checkmark3">&#10060;</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-2" style="flex: 3;display: flex;justify-content: flex-end;">
                                                                            <a class="checkmark-button" onclick="confirmationC('<?php echo $det->transdetailID; ?>','<?php echo $det->transID; ?>')">
                                                                                <div class="checkmark-container">
                                                                                    <div class="checkmark-circle">
                                                                                        <span class="checkmark">&#10003;</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?php } else if ($det->status == "C") { ?>
                                                                        <div class="col-lg-4" style="flex: 3;display: flex;justify-content: flex-end;">
                                                                            <div class="checkmark-container">
                                                                                <div class="checkmark-circle">
                                                                                    <span class="checkmark">&#10003;</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else if ($det->status == "R") { ?>
                                                                        <div class="col-lg-4" style="flex: 3;display: flex;justify-content: flex-end;">
                                                                            <div class="checkmark-container3">
                                                                                <div class="checkmark-circle3">
                                                                                    <span class="checkmark3">&#10060;</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <!-- <div class="col-lg-2" style="flex: 3;display: flex;justify-content: flex-end;">
                                                                        <div class="checkmark-container2">
                                                                            <div class="checkmark-circle2">
                                                                                <span class="checkmark2">&minus;</span>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                        <?php
                                                                $totalamount += $det->qty * $det->price;
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                    <?php
                                                    // Initialize $allNotP to null or an empty value
                                                    $allNotP = null;
                                                    $foundR = false;
                                                    $foundC = false;

                                                    foreach ($view_detail as $det) {
                                                        if ($det->transID === $value->transID) {
                                                            if ($det->status == 'P') {
                                                                $allNotP = 'P'; // Set $allNotP to 'P' if found
                                                                break; // Exit the loop once 'P' is found
                                                            } else if ($det->status == 'R') {
                                                                $foundR = true;
                                                            } else if ($det->status == 'C') {
                                                                $foundC = true;
                                                            }
                                                        }
                                                    }

                                                    if ($allNotP !== 'P') {
                                                        if ($foundC && $foundR) {
                                                            $allNotP = 'D'; // Set $allNotP to 'D' if both 'C' and 'R' are found
                                                        } else if ($foundR) {
                                                            $allNotP = 'R'; // Set $allNotP to 'R' if any 'R' is found and no 'P'
                                                        }
                                                    }

                                                    ?>

                                                    <?php if ($allNotP == 'P') { ?>
                                                        <div class="box-footer" style="background-color:orange">
                                                            Processing
                                                        </div>
                                                    <?php } else if ($allNotP == 'R') { ?>
                                                        <div class="box-footer" style="background-color:#af2323">
                                                            Rejected
                                                        </div>
                                                    <?php } else if ($allNotP == 'D') { ?>
                                                        <div class="box-footer" style="background-color:#379777">
                                                            Done
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="box-footer" style="background-color:#379777">
                                                            Done
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Entry-->
                        </div>
                        <!--end::Content-->
                </div>
                </form>
                <!--end::Wrapper-->
                <?php include("includes/footer.php"); ?>
                <?php include "includes/rejectorder-dialog.php"; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/order.js"></script>
    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
</body>

</html>