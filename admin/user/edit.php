<?php
if(!isset($_GET['id'])){
    exit();
}else{
$id = $_GET['id'];
$data = getOneUser($id);
}
?>
<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sửa Khách Hàng
                    <a href="./index.php?pages=user&action=list" class="btn btn-danger float-end">Trở Về</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php foreach($data as $user):?>
                    <div class="mb-3">
                        <label for="">Họ và tên: </label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ tên...." value="<?= $user['name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Email: </label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email...." value="<?= $user['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Mật khẩu: </label>
                        <input type="hidden" class="form-control" name="password" placeholder="Nhập mật khẩu...." value="<?= $user['password']?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="editUser" class="btn btn-primary">Sửa</button>
                    </div>
                    <?php endforeach?>
                </form>
            </div>
        </div>
    </div>
</div>