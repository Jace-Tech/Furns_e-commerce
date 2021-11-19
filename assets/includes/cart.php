<?php require_once("./assets/data/store.php"); ?>
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>

        <?php if(count(getCartItems())): ?>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <?php foreach(getCartItems() as $cartItems): extract($cartItems); ?>
                        <?php foreach(getCurrentProduct($product_id) as $product): extract($product);?>
                            <li>
                                <a href="single-product.php" class="image"><img src="./admin/images/products/<?= json_decode($image)[0]; ?>" alt="Cart product Image"></a>
                                <div class="content">
                                    <a href="single-product.php" class="title"><?= $product_name; ?></a>
                                    <span class="quantity-price"> <?= intval($quantity); ?> x <span class="amount">&#8358;<?= number_format($new_price); ?></span></span>
                                    <a href="./assets/handlers/cart.php?del_id=<?= $cart_id; ?>" class="remove">×</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right theme-color"><?= "&#8358;" . number_format(getTotalAmount());  ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <a href="cart.php" class="btn btn-dark btn-hover-primary mb-6">view cart</a>
                    <a href="checkout.php" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
            </div>
        <?php else: ?>
            <h6 class="text-small mt-5 pt-5 text-center text-muted fw-light">Cart Empty! <a href="./shop.php" class="text-decoration-none text-primary fw-light">Shop Now</a></h6>
        <?php endif; ?>
    </div>
</div>