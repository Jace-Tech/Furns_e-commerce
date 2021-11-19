<?php $page = "products"; ?>
<?php include("./includes/header.php"); ?>

<?php

$query = "SELECT * FROM `product`";
$result = $connect->prepare($query);
$result->execute();

$rows = $result->fetchAll();
$x = 1;

?>

<!-- Start Status area -->

<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive shadow">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Details</th>
                                    <th>Colors</th>
                                    <th>Sizes</th>
                                    <th>Materials</th>
                                    <th>Price</th>
                                    <th>Weight</th>
                                    <th>Dimensions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rows as $row): extract($row); ?>
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td>
                                            <img class="img-thumbnail" style="width: 35px; object-fit: contain;" src="./images/products/<?= json_decode($image)[0]; ?>" alt="">
                                        </td>
                                        <td><?= $product_name; ?></td>
                                        <td><?= $quantity; ?></td>
                                        <td title="<?= $product_description; ?>"><?= substr($product_description, 0, 15) . '...'; ?></td>
                                        <td title="<?= $product_details; ?>"><?= substr($product_details, 0, 15) . '...'; ?></td>
                                        <td><?= join(', ', json_decode($color)); ?></td>
                                        <td><?= join(', ', json_decode($size)); ?></td>
                                        <td><?= $material; ?></td>
                                        <td><?= '$' . number_format($new_price); ?></td>
                                        <td><?= $weight . ' kg'; ?></td>
                                        <td><?= $dimensions; ?></td>
                                        <td></td>
                                    </tr>
                                <?php $x++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<!-- End Realtime sts area-->
<?php include("./includes/footer.php"); ?>