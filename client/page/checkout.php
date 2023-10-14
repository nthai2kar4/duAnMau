<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Thanh toán</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Thanh toán</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Chi tiết thanh toán</h3>
                    <form class="row contact_form" action="" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="name" placeholder="Họ và tên" value="<?php if (isset($_SESSION['login_user'])) {
                                                                                                                                foreach (login() as $user) {
                                                                                                                                    echo $user['name'];
                                                                                                                                }
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="phoneNumber" placeholder="Số điện thoại">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Chú thích đơn hàng"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <h6 class="mb-3">Hình thức thanh toán</h6>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="httt-2" name="payment" type="radio" class="custom-control-input" required="" value="Chuyển khoản">
                                    <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-3" name="payment" type="radio" class="custom-control-input" required="" value="COD">
                                    <label class="custom-control-label" for="httt-3">Ship COD</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Đơn hàng của bạn</h2>
                        <ul class="list">
                            <li><a href="#">Sản phẩm<span>Tổng</span><span class="mr-5">SL</span></a></li>
                            <?php if (isset($_SESSION['cart']) && $_SESSION['cart'] != '') { ?>
                                <?php foreach ($_SESSION['cart'] as $data) : ?>
                                    <?php
                                    $text = $data['name'];
                                    $max_length = 15; // Chiều dài tối đa của đoạn văn bản sau khi được rút gọn.

                                    if (strlen($text) > $max_length) {
                                        $shortened_text = substr($text, 0, $max_length) . "...";
                                    } else {
                                        $shortened_text = $text;
                                    }
                                    ?>
                                    <li><a href="#"><?= $shortened_text ?> <span class="middle">x <?= $data['qty'] ?></span> <span class="last"><?= number_format($data['sale_price']) ?></span></a></li>
                                <?php endforeach ?>
                        </ul>

                        <ul class="list list_2">
                            <li><a href="">Tổng tiền hàng <span><?php echo number_format($_SESSION['total']) ?></span></a></li>
                        </ul>
                        <button class="primary-btn" style="border: none;" type="submit" name="payCart">Proceed to Paypal</button>
                    <?php } else {
                                echo '';
                            } ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>