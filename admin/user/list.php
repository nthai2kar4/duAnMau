<div class="container-fluid mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Khách hàng<a href="./index.php?pages=user&action=add"
                            class="btn btn-primary float-end">Thêm</a></h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(getAllUser() as $user):?>
                                <tr class="text-center">
                                    <td><?= $user['id']?></td>
                                    <td><?= $user['name']?></td>
                                    <td><?= $user['email']?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="./index.php?pages=user&action=edit&id=<?= $user['id']?>"
                                                class="btn btn-primary" style="margin-right: 10px;">Sửa</a>
                                            <form action="" method="post">
                                                <input type="hidden" value="" name="idUser">
                                                <button class="btn btn-danger" name="deleteUser"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng?')"
                                                    type="submit">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>