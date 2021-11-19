    <?php $page = "index"; ?>
    <?php session_start(); ?>
    <?php include("./assets/includes/header.php"); ?>
    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Flexible Chair </h2>
                                    <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                    <a href="shop.php" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="assets/images/slider-image/slider-1.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Flexible Chair </h2>
                                    <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                    <a href="shop.php" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="assets/images/slider-image/slider-2.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Product Category Start -->
    <div class="section pt-100px pb-100px">
        <div class="container">
            <div class="category-slider swiper-container" data-aos="fade-up">
                <div class="category-wrapper swiper-wrapper">
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="single-product.php" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/1.png" alt="">
                                <span class="title">Office Chair</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="single-product.php" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/2.png" alt="">
                                <span class="title">Book Shelf</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="single-product.php" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/3.png" alt="">
                                <span class="title">Light & Sofa</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="single-product.php" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/4.png" alt="">
                                <span class="title">Reading Table</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class="swiper-slide">
                        <a href="single-product.php" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/5.png" alt="">
                                <span class="title">Corner Table</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                </div>
            </div>
        </div>
    </div>

    <!-- Product Category End -->

    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">Our Products</h2>
                        <p class="sub-title mb-6">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center mb-8" data-aos="fade-up" data-aos-delay="200">
                    <ul class="product-tab-nav nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-product-new-arrivals">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-product-best-sellers">Best Sellers </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-product-sale-item">Sale Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-product-on-sales">On Sales</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                            <div class="row">
                                <?php foreach(getAllProducts() as $product): extract($product); ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Prodect -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.php" class="image">
                                                    <img src="./admin/images/products/<?php echo json_decode($image)[0]; ?>" alt="Product" />
                                                    <img class="hover-image" src="./admin/images/products/<?php echo json_decode($image)[1]; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                                    <a href="compare.php" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                                </div>
                                                <a href="./assets/handlers/cart.php?id=<?= $product_id; ?>" title="Add To Cart" class=" add-to-cart">Add
                                                    To Cart
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.php"><?= $product_name; ?></a></h5>
                                                <span class="price">
                                                    <span class="new"><?php echo "&#8358;". number_format($new_price); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 1st tab end -->
                        <!-- 2nd tab start -->
                        <div class="tab-pane fade" id="tab-product-best-sellers">
                            <div class="row">
                                <?php foreach(getAllProducts() as $product): extract($product); ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Prodect -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.php" class="image">
                                                    <img src="./admin/images/products/<?php echo json_decode($image)[0]; ?>" alt="Product" />
                                                    <img class="hover-image" src="./admin/images/products/<?php echo json_decode($image)[1]; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                                    <a href="compare.php" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                                </div>
                                                <a href="./assets/handlers/cart.php?id=<?= $product_id; ?>" title="Add To Cart" class=" add-to-cart">Add
                                                    To Cart
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.php"><?= $product_name; ?></a></h5>
                                                <span class="price">
                                                    <span class="new"><?php echo "&#8358;". number_format($new_price); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 2nd tab end -->
                        <!-- 3rd tab start -->
                        <div class="tab-pane fade" id="tab-product-sale-item">
                            <div class="row">
                                <?php foreach(getAllProducts() as $product): extract($product); ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Prodect -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.php" class="image">
                                                    <img src="./admin/images/products/<?php echo json_decode($image)[0]; ?>" alt="Product" />
                                                    <img class="hover-image" src="./admin/images/products/<?php echo json_decode($image)[1]; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                                    <a href="compare.php" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                                </div>
                                                <a href="./assets/handlers/cart.php?id=<?= $product_id; ?>" title="Add To Cart" class=" add-to-cart">Add
                                                    To Cart
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.php"><?= $product_name; ?></a></h5>
                                                <span class="price">
                                                    <span class="new"><?php echo "&#8358;". number_format($new_price); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 3rd tab end -->
                        <!-- 4th tab start -->
                        <div class="tab-pane fade" id="tab-product-on-sales">
                            <div class="row">
                                <?php foreach(getAllProducts() as $product): extract($product); ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Prodect -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.php" class="image">
                                                    <img src="./admin/images/products/<?php echo json_decode($image)[0]; ?>" alt="Product" />
                                                    <img class="hover-image" src="./admin/images/products/<?php echo json_decode($image)[1]; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                                    <a href="compare.php" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                                </div>
                                                <a href="./assets/handlers/cart.php?id=<?= $product_id; ?>" title="Add To Cart" class=" add-to-cart">Add
                                                    To Cart
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.php"><?= $product_name; ?></a></h5>
                                                <span class="price">
                                                    <span class="new"><?php echo "&#8358;". number_format($new_price); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 4th tab end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->

    <!-- Banner Section Start -->
    <div class="section pb-100px pt-100px">
        <div class="container">
            <!-- Banners Start -->
            <div class="row">
                <!-- Banner Start -->
                <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="shop.php" class="banner">
                        <img src="assets/images/banner/1.jpg" alt="" />
                        <div class="info justify-content-end">
                            <div class="content align-self-center">
                                <h3 class="title">
                                    Sale Furniture <br /> For Summer
                                </h3>
                                <p>Great Discounts Here</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Banner End -->

                <!-- Banner Start -->
                <div class="col-lg-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <a href="shop.php" class="banner">
                        <img src="assets/images/banner/2.jpg" alt="" />
                        <div class="info justify-content-start">
                            <div class="content align-self-center">
                                <h3 class="title">
                                    Office Chair <br /> For Best Offer</h3>
                                <p>Great Discounts Here</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Banner End -->
            </div>
            <!-- Banners End -->
        </div>
    </div>
    <!-- Banner Section End -->
    <!--  Blog area Start -->
    <div class="main-blog-area pb-100px">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">
                    <div class="section-title text-center mb-11">
                        <h2 class="title">Latest News</h2>
                        <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore
                        </p>
                    </div>
                </div>
            </div>
            <!-- section title start -->
            <div class="blog-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
                <!-- Start single blog -->
                <div class="swiper-wrapper">
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single.php"><img src="assets/images/blog-image/1.jpg" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single.php">Interior design is the art.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="single-product.php" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single.php"><img src="assets/images/blog-image/2.jpg" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single.php">Decorate your home with furns.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="single-product.php" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single.php"><img src="assets/images/blog-image/3.jpg" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single.php">Spatialize with that the furns.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="single-product.php" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single.php"><img src="assets/images/blog-image/4.jpg" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single.php">Unique products will impress.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="single-product.php" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!--  Blog area End -->

    <!-- Instagram Area Start -->
    <div class="section pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">
                    <div class="section-title text-center mb-11">
                        <h2 class="title">Follow Us Instagram</h2>
                        <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <div class="insta-wrapper">
                        <a href="https://www.instagram.com/" target="_blank"><img class="w-100" src="assets/images/instragram-image/1.png" alt="">

                        </a>
                    </div>
                </div>
                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="400">
                    <div class="insta-wrapper">
                        <a href="https://www.instagram.com/" target="_blank"><img class="w-100" src="assets/images/instragram-image/2.png" alt="">

                        </a>
                    </div>
                </div>
                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-xs-30px" data-aos="fade-up" data-aos-delay="600">
                    <div class="insta-wrapper">
                        <a href="https://www.instagram.com/" target="_blank"><img class="w-100" src="assets/images/instragram-image/3.png" alt="">

                        </a>
                    </div>
                </div>
                <!-- Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 " data-aos="fade-up" data-aos-delay="800">
                    <div class="insta-wrapper">
                        <a href="https://www.instagram.com/" target="_blank"><img class="w-100" src="assets/images/instragram-image/4.png" alt="">

                        </a>
                    </div>
                </div>
                <!-- Single Item -->
            </div>
        </div>
    </div>
    <!-- Instagram Area End -->
    <?php include("./assets/includes/footer.php"); ?>