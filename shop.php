<?php session_start(); ?>
<?php $page = "shop"; ?>
<?php include("./assets/middleware/auth.php"); ?>
<?php include('./assets/includes/header.php'); ?>
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
                            <li class="breadcrumb-item active">Shop</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Shop Category pages -->
<div class="shop-category-area pb-100px pt-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <p>There Are <?= count(getAllProducts()); ?> Products.</p>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort">
                                <option data-display="Relevance">Relevance</option>
                                <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option>
                                <option value="3"> Price, low to high</option>
                                <option value="4"> Price, high to low</option>
                            </select>

                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <div class="row">
                        <?php foreach(getAllProducts() as $product): extract($product); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="200">
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
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-6" data-aos="fade-up">
                        <ul>
                            <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <div class="main-heading">
                            <h3 class="sidebar-title">Category</h3>
                        </div>
                        <div class="sidebar-widget-category">
                            <ul>
                                <li><a href="#" class="selected">All <span>(<?= count(getAllProducts()); ?>)</span> </a></li>
                                <?php foreach(getAllTags() as $tags): extract($tags); ?>
                                    <li><a href="<?= $tag_id; ?>" class="text-capitalize"><?= $tag_name; ?> <span>(<?= getTagCount($tag_name); ?>)</span> </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget-group">
                        <h3 class="sidebar-title">Filter By</h3>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Price</h4>
                            <div class="price-filter">
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" class="p-0 h-auto lh-1" name="price" placeholder="Add Your Price" />
                                </div>
                                <div id="slider-range"></div>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title mt-5">Size</h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <?php foreach(getAllSizes() as $sizes):  extract($sizes);  ?>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" /> <a href="#" class="text-capitalize"><?= $size_name; ?> <span>(<?= getCurrentSize($size_name); ?>)</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget no-cba">
                            <h4 class="pro-sidebar-title">Colour</h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <?php foreach(getAllColor() as $colors):  extract($colors);  ?>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" /> <a href="#" class="text-capitalize"><?= $color_name; ?> <span>(<?= getCurrentColor($color_name); ?>)</span> </a>
                                                <span class="checkmark <?php if($color_name == "gray") echo 'grey';  else  echo $color_name; ?>"></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget tag">
                        <div class="main-heading">
                            <h3 class="sidebar-title mt-3">Tags</h3>
                        </div>
                        <div class="sidebar-widget-tag">
                            <ul>
                                <li><a href="#">All</a></li>
                                <?php foreach(getAllTags() as $tags): extract($tags); ?>
                                    <li><a href="<?= $tag_id; ?>"><?= $tag_name; ?></a></li>
                                <?php endforeach;  ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top mb-4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/4.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/4.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/5.jpg" alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Originals Kaval Windbr</h2>
                            <p class="reference">Reference:<span> demo_17</span></p>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">$18.90</li>
                                </ul>
                            </div>
                            <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <button class="add-cart btn btn-primary btn-hover-primary ml-4"> Add To
                                        Cart</button>
                                </div>
                            </div>
                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i>Add to
                                        wishlist</a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                </div>
                            </div>
                            <div class="pro-details-social-info">
                                <span>Share</span>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<?php include("./assets/includes/footer.php"); ?>