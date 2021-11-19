<?php $page = "products"; ?>
<?php include("./includes/header.php"); ?>

<?php

$query = "SELECT * FROM `customer`";
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
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rows as $row): extract($row); ?>
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td>
                                            <?php if(!empty($image)):  ?>
                                                <img class="img-thumbnail" style="width: 35px; object-fit: contain;" src="./images/products/<?= json_decode($image)[0]; ?>" alt="">
                                            <?php else: ?>
                                                <span class="w-25 py-3 h3 rounded-circle text-dark">
                                                    <?= substr($firstname, 0, 2); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $firstname; ?></td>
                                        <td><?= $lastname; ?></td>
                                        <td><?= $email; ?></td>
                                        <td><?= $phone; ?></td>
                                        <td>
                                            <a href="<?= $customer_id; ?>" class="btn mr-2 btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= $customer_id; ?>" class="btn mr-2 btn-danger btn-xs"> &times; </a>
                                        </td>
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