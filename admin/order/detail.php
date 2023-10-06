<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Chi Tiết Đơn hàng</h4>
            </div>
            <div class="card-body">
                <div class="tanle-resposive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Code cart</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $i = 0;
                        ?>

                            <tbody>
                                <?php foreach (getOrdersDetail($id) as $data) {
                                    $i++; ?>
                                    <tr class="text-center">
                                        <td><?= $i ?></td>
                                        <td><?= $data['cart_code'] ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['qty'] ?></td>
                                        <td><?= number_format($data['sale_price']) ?></td>
                                        <td><?= number_format($data['qty'] * $data['sale_price']) ?></td>
                                    </tr>
                                <?php }; ?>
                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>