<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="?index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
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
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
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
                                $_SESSION['total'] = $total += $total_product;
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

                                    <td>
                                        <a href="?page=cart&action=delete&deleteCart=<?= $item['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng?')" class="btn btn-danger">Xoá</a>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        <?php } else {
                        ?>
                            <tr>
                                <td>Hiện tại không có sản phẩm nào trong giỏ hàng</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Tổng cộng:</h5>
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
                                    <a class="primary-btn" href="?pages=checkout">Thanh Toán</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->