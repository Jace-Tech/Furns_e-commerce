<?php if(isset($_COOKIE["FORGOT_ID"])) header("location: ./pin.php"); ?>
<?php session_start(); ?>
<?php include("./assets/includes/header.php");  ?>

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
                            <li class="breadcrumb-item active">Forgot Password</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- login area start -->
<div class="login-register-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <h4>Forgot Password</h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="login-form-container shadow-sm rounded">
                                <div class="login-register-form">
                                    <form method="POST" action="./assets/handlers/forgot_password.php">
                                        <input type="text" name="email" required placeholder="Email" />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <a href="./login.php">Back</a>
                                            </div>
                                            <button class="rounded" name="submit" type="submit">submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login area end -->
<script type="module" src="./assets/js/apis/login.js"></script>
<script type="module" src="./assets/js/apis/register.js"></script>
<?php include("./assets/includes/footer.php"); ?>