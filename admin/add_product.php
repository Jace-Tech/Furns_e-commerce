<?php $page = "products"; ?>
<?php include("./includes/header.php"); ?>

<?php

// Gets all Color
$query_color = "SELECT * FROM `color`";
$result_color = $connect->prepare($query_color);
$result_color->execute();

if ($result_color->rowCount() > 0) $rows_color = $result_color->fetchAll();

// Gets all Tags
$query_tags = "SELECT * FROM `tags`";
$result_tags = $connect->prepare($query_tags);
$result_tags->execute();

if ($result_tags->rowCount() > 0) $rows_tags = $result_tags->fetchAll();

// Gets all sizes
$query_size = "SELECT * FROM `size`";
$result_size = $connect->prepare($query_size);
$result_size->execute();

if ($result_size->rowCount() > 0) $rows_size = $result_size->fetchAll();

?>

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 rounded" style="background-color: #fff; padding: 20px 18px;">
                <h3 class="my-4 pb-2 border-bottom text-dark">Add Product</h3>
                <form action="./handlers/products.php" method="post" enctype="multipart/form-data" class="mg-t-20">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Product Name</label>
                                <input type="text" class="form-control" name="productName">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Product Details</label>
                                <input type="text" class="form-control" name="productDetails">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Price <small class="text-muted">(New)</small></label>
                                <div class="input-group">
                                    <span class="input-group-addon">&#8358;</span>
                                    <input class="form-control" name="newPrice">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Price <small class="text-muted">(Old)</small></label>
                                <div class="input-group">
                                    <span class="input-group-addon">&#8358;</span>
                                    <input class="form-control" name="oldPrice">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Weight</label>
                                <div class="input-group">
                                    <input type="number" placeholder="eg. 42g" class="form-control" name="weight">
                                    <span class="input-group-addon">g</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="" style="font-weight: 400;">Dimensions</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="eg. 10 x 10 x 13cm" class="form-control" name="dimensions">
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Materials</label>
                                <input type="text" class="form-control" placeholder="eg. 60% cotton, 40% polyester" name="material">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="" style="font-weight: 400;">Quantity</label>
                                    <input type="number" class="form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="" style="font-weight: 400;">Color</label>
                                    <div class="chosen-select-act fm-cmp-mg">
                                    <select class="chosen" name="color[]" multiple data-placeholder="Choose Colors...">
                                        <?php foreach ($rows_color as $color): extract($color); ?>
                                            <option value="<?= $color_id; ?>"><?= $color_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Sizes</label>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select class="chosen" name="size[]" multiple data-placeholder="Choose Sizes...">
                                        <?php foreach ($rows_size as $size): extract($size); ?>
                                            <option value="<?= $size_id; ?>"><?= $size_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Product Images</label>
                                <input type="file" name="image[]" accept="image/*" id="" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="" style="font-weight: 400;">Product Description</label>
                                    <textarea name="productDescription" id="" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="" style="font-weight: 400;">Tags</label>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select class="chosen" name="tags[]" multiple data-placeholder="Choose Tags...">
                                        <?php foreach ($rows_tags as $tags): extract($tags); ?>
                                            <option value="<?= $tag_id; ?>"><?= $tag_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-success notika-btn-success btn-lg" type="submit" name="submit">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Realtime sts area-->
 <!-- jquery
		============================================ -->
    <script src="./js/vendor/jquery-1.12.4.min.js"></script>
    <!--  chosen JS
    ============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
<!-- flot JS
        ============================================ -->
    <!-- <script src="./js/flot/jquery.flot.js"></script>
    <script src="./js/flot/jquery.flot.resize.js"></script>
    <script src="./js/flot/flot-active.js"></script> -->
<!-- Input Mask JS
    ============================================ -->
    <script src="./js/jasny-bootstrap.min.js"></script>
<!-- icheck JS
		============================================ -->
    <script src="./js/icheck/icheck.min.js"></script>
    <script src="./js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="./js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="./js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="./js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="./js/datapicker/bootstrap-datepicker.js"></script>
    <script src="./js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="./js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="./js/color-picker/farbtastic.min.js"></script>
    <script src="./js/color-picker/color-picker.js"></script>

    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="./js/notification/bootstrap-growl.min.js"></script>
    <script src="./js/notification/notification-active.js"></script>
    
<?php include("./includes/footer.php"); ?>