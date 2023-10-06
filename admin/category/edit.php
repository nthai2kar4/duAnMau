<?php
if(!isset($_GET['id'])){
    exit();
}else{
$id = $_GET['id'];
$data = getOneCategory($id);
}
?>
<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sửa Danh Mục
                    <a href="./index.php?pages=category&action=list" class="btn btn-danger float-end">Trở Về</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php foreach($data as $user):?>
                        <div class="mb-3">
                        <label for="">Tên danh mục: </label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="<?= $user['name']?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="editCate" class="btn btn-primary">Sửa</button>
                    </div>
                    <?php endforeach?>
                </form>
            </div>
        </div>
    </div>
</div>