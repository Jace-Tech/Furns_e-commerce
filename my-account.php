<?php
session_start();
if (!isset($_SESSION["USER"])) :
    header("location: ./login.php?alert=login");
endif;
?>
<?php include("./assets/includes/header.php"); ?>
<?php
$query = "SELECT * FROM `customer` WHERE `customer_id` = ?";
$result = $connect->prepare($query);
$result->execute([$USER_ID]);

$row = $result->fetch();
extract($row);
?>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                        <h2 class="breadcrumb-title">Shop</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- account area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true" href="#my-account-1">Edit your account information </a>
                                </h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>First Name</label>
                                                    <input type="text" value="<?= $firstname; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Last Name</label>
                                                    <input type="text" value="<?= $lastname; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Email Address</label>
                                                    <input type="email" value="<?= $email; ?>" />

                                                    <input type="hidden" id="userId" value="<?= $USER_ID; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Telephone</label>
                                                    <input type="text" value="<?= $phone; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="./index.php"><i class="icon-arrow-up-circle"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button id="update" class="rounded">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="400">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#my-account-2">Change your password </a></h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Password</label>
                                                    <input type="password" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Password Confirm</label>
                                                    <input type="password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button id="password">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account " data-aos="fade-up" data-aos-delay="600">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>3 .</span> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#my-account-3">Modify your address book entries
                                    </a></h3>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>Jone Deo</p>
                                                        <p>hastech</p>
                                                        <p>28 Green Tower,</p>
                                                        <p>Street Name.</p>
                                                        <p>New York City,</p>
                                                        <p>USA</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <a class="edit" href="#">Edit</a>
                                                        <a href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account m-0" data-aos="fade-up" data-aos-delay="800">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>4 .</span> <a href="wishlist.php">Modify your wish
                                        list </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area end -->
<?php include("./assets/includes/footer.php");
?>