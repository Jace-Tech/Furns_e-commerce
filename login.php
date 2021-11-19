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
                            <li class="breadcrumb-item active">Login</li>
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
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4>login</h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4>register</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container shadow-sm rounded">
                                <div class="login-register-form">
                                    <form id="login">
                                        <input type="text" required id="login_username" placeholder="Username / Email" />
                                        <input type="password" required id="login_password" placeholder="Password" />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <a href="./forgot_password.php">Forgot Password?</a>
                                            </div>
                                            <button class="rounded" id="loginBtn" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container shadow-sm rounded">
                                <div class="login-register-form">
                                    <form id="register">
                                        <input required type="text" id="username" placeholder="Username" />
                                        <input required type="password" id="password" placeholder="Password" />
                                        <input required id="email" placeholder="Email" type="email" />
                                        <div class="button-box">
                                            <button type="submit" class="rounded" id="btn">Register</button>
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