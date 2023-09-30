<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="?index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <form action="" method="post">
                        <tbody>
                            <?php if (isset($_SESSION['cart'])) { ?>
                                <?php
                                $total_product = 0;
                                $total = 0;
                                ?>
                                <?php foreach ($_SESSION['cart'] as $item) :

                                ?>
                                    <?php
                                    $total_product = $item['sale_price'] * $item['qty'];
                                    $total += $total_product;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="/admin/<?= substr($item['image'], 1) ?>" alt="" width="120px">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $item['name'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= number_format($item['sale_price']) ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <a href="?pages=cart&action=list&downQty=<?= $item['id'] ?>" class="text-dark"><i class="fa-solid fa-minus"></i></a>
                                                <input type="text" name="qty" id="sst" value="<?= $item['qty'] ?>" title="Quantity:" class="text-center" style="width:50px;padding:0;">
                                                <a href="?pages=cart&action=list&upQty=<?= $item['id'] ?>" class="text-dark"><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= number_format($total_product) ?></h5>
                                        </td>
                                        <td><input type="hidden" value="<?= $item['id'] ?>" name="id"><button onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng?')" class="btn btn-danger" type="submit" name="deleteCart">Xoá</button></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php } else {
                            ?>
                                <tr>
                                    <td>Hiện tại không có sản phẩm nào trong giỏ hàng</td>
                                </tr>
                            <?php } ?>
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5><?= isset($total) ? number_format($total) : ''; ?></h5>
                                </td>

                            </tr>

                            <tr class="out_button_area">
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">

                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->