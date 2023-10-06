<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Đơn hàng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Code cart</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        
                       
                            <tbody>
                            <?php $i = 0; foreach (getOrders() as $data) : $i++ ?>
                                <tr class="text-center">
                                    <td><?= $i ?></td>
                                    <td><?= $data['cart_code'] ?></td>
                                    <td style="width:130px;"><?= $data['user_name'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['user_phone'] ?></td>
                                    <td><?= $data['user_address'] ?></td>
                                    <td style="width:120px;">
                                        <div class="d-flex justify-content-center">
                                            <a href="./index.php?pages=order&action=detail&id=<?= $data['cart_code'] ?>" class="btn btn-primary" style="margin-right: 10px;">Chi tiết</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>

                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>