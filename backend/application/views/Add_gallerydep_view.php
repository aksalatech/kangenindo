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
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Gallery List</h5>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>" class="text-muted">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>Gallerydep" class="text-muted"> Gallery List</a>
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
                                    ?> <form method="POST" action="<?php echo base_url(); ?>Gallerydep/update_type" enctype="multipart/form-data">
                                            <input type="hidden" name="sliderID" id="sliderID" value="<?php echo $req ?>">
                                            <div class="card card-custom gutter-b example example-compact">
                                                <div class="card-header d-flex justify-content-center">
                                                    <h3 class="card-title"> Update List Menu</h3>
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
                                                            <div class="col-lg-6">
                                                                <label>Gallery Image:</label>
                                                                <div class="row">
                                                                    <?php if ($key->img_name != "") { ?>
                                                                        <a href="<?php echo base_url() ?>./../images/gallery/<?php echo $key->img_name ?>" target="_blank">See Picture..</a>
                                                                        <br/>
                                                                    <?php } ?>
                                                                    <input type="file" class="form-control col-md-11" name="imagepath" id="imagepath">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Category:</label>
                                                                <div class="row">
                                                                    <select id="category" name="category" class="form-control col-md-11">
                                                                        <option value="bintangbro" <?php echo ($key->category_gallery == "bintangbro") ? "selected" : "" ?>>Bintang Bro</option>
                                                                        <option value="urbandurian" <?php echo ($key->category_gallery == "urbandurian") ? "selected" : "" ?>>Urban Durian</option>
                                                                        <option value="teguk" <?php echo ($key->category_gallery == "teguk") ? "selected" : "" ?>>Teguk</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            
                                                            <div class="col-lg-6">
                                                                <label>Image Size:</label>
                                                                <div class="row">
                                                                    <select id="ukuranGal" name="ukuranGal" class="form-control col-md-11">
                                                                        <option value="col-lg-1" <?php echo ($key->img_size == "col-lg-1") ? "selected" : "" ?>>col-lg-1</option>
                                                                        <option value="col-lg-2" <?php echo ($key->img_size == "col-lg-2") ? "selected" : "" ?>>col-lg-2</option>
                                                                        <option value="col-lg-3" <?php echo ($key->img_size == "col-lg-3") ? "selected" : "" ?>>col-lg-3</option>
                                                                        <option value="col-lg-4" <?php echo ($key->img_size == "col-lg-4") ? "selected" : "" ?>>col-lg-4</option>
                                                                        <option value="col-lg-5" <?php echo ($key->img_size == "col-lg-5") ? "selected" : "" ?>>col-lg-5</option>
                                                                        <option value="col-lg-6" <?php echo ($key->img_size == "col-lg-6") ? "selected" : "" ?>>col-lg-6</option>
                                                                        <option value="col-lg-7" <?php echo ($key->img_size == "col-lg-7") ? "selected" : "" ?>>col-lg-7</option>
                                                                        <option value="col-lg-8" <?php echo ($key->img_size == "col-lg-8") ? "selected" : "" ?>>col-lg-8</option>
                                                                        <option value="col-lg-9" <?php echo ($key->img_size == "col-lg-9") ? "selected" : "" ?>>col-lg-9</option>
                                                                        <option value="col-lg-10" <?php echo ($key->img_size == "col-lg-10") ? "selected" : "" ?>>col-lg-10</option>
                                                                        <option value="col-lg-11" <?php echo ($key->img_size == "col-lg-11") ? "selected" : "" ?>>col-lg-11</option>
                                                                        <option value="col-lg-12" <?php echo ($key->img_size == "col-lg-12") ? "selected" : "" ?>>col-lg-12</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php
                                                    }
                                                        ?>

                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-warning mr-2" name="sbmtBttn" id="sbmtBttn">Update</button>
                                                            <a href="<?php echo site_url(); ?>Gallerydep" class="btn btn-secondary font-weight-bolder">Cancel</a>
                                                        </div>
                                                        <!--end::Form-->
                                                </div>
                                                <!--end::Card-->

                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form method="POST" action="<?php echo base_url(); ?>Gallerydep/add_type" enctype="multipart/form-data">
                                            <div class="card card-custom gutter-b example example-compact">
                                                <div class="card-header d-flex justify-content-center">
                                                    <h3 class="card-title">Add List Menu</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Gallery Image:</label>
                                                            <div class="row">
                                                                <input type="file" class="form-control col-md-11" name="imagepath" id="imagepath" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Category:</label>
                                                            <div class="row">
                                                                <select id="category" name="category" class="form-control col-md-11">
                                                                    <option value="bintangbro">Bintang Bro</option>
                                                                    <option value="urbandurian">Urban Durian</option>
                                                                    <option value="teguk">Teguk</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Image Size:</label>
                                                            <div class="row">
                                                                <select id="ukuranGal" name="ukuranGal" class="form-control col-md-11">
                                                                    <option value="col-lg-1">col-lg-1</option>
                                                                    <option value="col-lg-2">col-lg-2</option>
                                                                    <option value="col-lg-3">col-lg-3</option>
                                                                    <option value="col-lg-4">col-lg-4</option>
                                                                    <option value="col-lg-5">col-lg-5</option>
                                                                    <option value="col-lg-6">col-lg-6</option>
                                                                    <option value="col-lg-7">col-lg-7</option>
                                                                    <option value="col-lg-8">col-lg-8</option>
                                                                    <option value="col-lg-9">col-lg-9</option>
                                                                    <option value="col-lg-10">col-lg-10</option>
                                                                    <option value="col-lg-11">col-lg-11</option>
                                                                    <option value="col-lg-12">col-lg-12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary mr-2" name="sbmtBttn" id="sbmtBttn">Submit</button>
                                                    <a href="<?php echo site_url(); ?>Gallerydep" class="btn btn-secondary font-weight-bolder">Cancel</a>
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