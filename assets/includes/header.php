<?php include("./assets/handlers/config/index.php"); ?>
<?php if (isset($_SESSION["USER"])) $USER_ID =  $_SESSION["USER"]; ?>
<?php require_once("./assets/data/store.php"); ?>
<?php require_once("./assets/data/cart.php"); ?>
<!DOCTYPE html>
<html lang="zxx" ng-app="shop">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
        Furns - Furniture eCommerce |
        <?php
        if (isset($page)) echo $page;
        else echo "Home";
        ?> Page
    </title>
    <meta name="description" content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/furns/" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Furns - Responsive eCommerce HTML Template" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="Furns - Responsive eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Furns - Responsive eCommerce HTML Template" />
    <meta name="robots" content="noindex, follow" />
    <!-- Add site Favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />
    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }
    </script>

    <!-- vendor css (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css" />

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/plugins/venobox.css" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/css/resets.css" />

    <!-- SweetAlert -->
    <script src="./assets/js/sweetalert.min.js"></script>

    <!-- Angular JS -->
    <script src="./assets/js/angularJS.js"></script>

</head>

<body>
    <!--Alerts  -->
    <?php include("./assets/includes/alert.php"); ?>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="#">
                                        <input class="form-control" autocomplete="work" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                                    <i class="icon-user"></i>
                                    <?php if (isset($USER_ID)) : ?>
                                        <span class="header-action-num bg-success"></span>
                                    <?php endif; ?>
                                </button>
                                <?php if (isset($USER_ID)) : ?>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="my-account.php">My account</a></li>
                                        <li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
                                        <li><a class="dropdown-item" href="./assets/handlers/logout.php">Sign out</a></li>
                                    </ul>
                                <?php else : ?>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="my-account.php">My account</a></li>
                                        <li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
                                        <li><a class="dropdown-item" href="login.php">Sign in</a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Single Wedge End -->
                            <?php if (isset($USER_ID)) : ?>
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="icon-handbag"></i>
                                    <span class="header-action-num"><?= getCartCount(); ?></span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>
                            <?php endif; ?>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-lg-none sticky-nav bg-white">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="#">
                                        <input class="form-control" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                                    <i class="icon-user"></i>
                                    <?php if (isset($USER_ID)) : ?>
                                        <span class="header-action-num bg-success"></span>
                                    <?php else : ?>
                                        <span class="header-action-num bg-danger"></span>
                                    <?php endif; ?>
                                </button>
                                <?php if (isset($USER_ID)) : ?>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="my-account.php">My account</a></li>
                                        <li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
                                        <li><a class="dropdown-item" href="./assets/handlers/logout.php">Sign out</a></li>
                                    </ul>
                                <?php else : ?>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="my-account.php">My account</a></li>
                                        <li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
                                        <li><a class="dropdown-item" href="login.php">Sign in</a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Single Wedge End -->
                            <?php if (isset($USER_ID)) : ?>
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="icon-handbag"></i>
                                    <span class="header-action-num">01</span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>
                            <?php endif; ?>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Main Menu Start -->
        <?php include("./assets/includes/nav.php"); ?>
        <!-- Main Menu End -->
    </div>
    <!-- Header Area End  -->
    <!-- OffCanvas Cart Start -->
    <?php include("./assets/includes/cart.php"); ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php include("./assets/includes/mobile_nav.php"); ?>
    <!-- OffCanvas Menu End -->


    <div class="offcanvas-overlay"></div>