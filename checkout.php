<?php session_start(); ?>
<?php include("./assets/middleware/auth.php"); ?>
<?php include("./assets/includes/header.php"); ?>
<?php include("./assets/data/user.php"); ?>

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
                            <li class="breadcrumb-item active">Checkout</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- checkout area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <form class="billing-info-wrap" id="address">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>First Name</label>
                                <input type="text" name="firstname" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Last Name</label>
                                <input type="text" name="lastname" value="<?= $lastname; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-4">
                                <label>Country</label>
                                <select name="country" >
                                    <option>Select a country</option>
                                    <option value="nigeria">Nigeria</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-4">
                                <label>Street Address</label>
                                <input class="billing-address" placeholder="House number and street name" name="address" type="text" value="<?= $address ?>" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-4">
                                <label>Town / City</label>
                                <input type="text" name="state" value="<?= $state; ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?= $phone; ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Email Address</label>
                                <input type="text" name="email" value="<?= $email; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="checkout-account mb-30px">
                        <input class="checkout-toggle2 w-auto h-auto" type="checkbox" />
                        <label>Create an account?</label>
                    </div>
                    <div class="checkout-account-toggle open-toggle2 mb-30">
                        <input placeholder="Email address" type="email" />
                        <input placeholder="Password" type="password" />
                        <button class="btn-hover checkout-btn" type="submit">register</button>
                    </div>
                    <div class="additional-info-wrap">
                        <h4>Additional information</h4>
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                        </div>
                    </div>
                    <div class="checkout-account mt-25">
                        <input class="checkout-toggle w-auto h-auto" type="checkbox" />
                        <label>Ship to a different address?</label>
                    </div>
                    <div class="different-address open-toggle mt-30px">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>First Name</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>Last Name</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>Company Name</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-4">
                                    <label>Country</label>
                                    <select>
                                        <option>Select a country</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text" />
                                    <input placeholder="Apartment, suite, unit etc." type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>Town / City</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>State / County</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>Postcode / ZIP</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>Phone</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-4">
                                    <label>Email Address</label>
                                    <input type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    <?php foreach(getCartItems() as $cartItems): extract($cartItems); ?>
                                        <?php foreach(getCurrentProduct($product_id) as $products): extract($products); ?>
                                            <li><span class="order-middle-left"><?= $product_name; ?> X <?= $quantity; ?></span> <span class="order-price">&#8358;<?= number_format(intval($new_price) * intval($quantity)); ?> </span></li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>&#8358;<?=  number_format(getTotalAmount()); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <!-- <div id="faq" class="panel-group">
                                    <div class="panel panel-default single-my-account m-0">
                                        <div class="panel-heading my-account-title">
                                            <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1" class="collapsed" aria-expanded="true">Direct bank transfer</a>
                                            </h4>
                                        </div>
                                        <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">

                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account m-0">
                                        <div class="panel-heading my-account-title">
                                            <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-2" aria-expanded="false" class="collapsed">Check payments</a></h4>
                                        </div>
                                        <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">

                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account m-0">
                                        <div class="panel-heading my-account-title">
                                            <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-3">Cash on delivery</a></h4>
                                        </div>
                                        <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">

                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <!-- <button type="submit" form="address" href="./assets/handlers/payment.php" name="orderBtn" formmethod="POST" class="postBtn w-100">Place Order</button> -->
                        <a href="./assets/handlers/payment.php" class="postBtn w-100 text-decoration-none">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout area end -->
<?php include("./assets/includes/footer.php"); ?>