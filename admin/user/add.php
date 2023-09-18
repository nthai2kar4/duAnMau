<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Thêm Khách Hàng
                    <a href="./index.php?pages=user&action=list" class="btn btn-danger float-end">Trở Về</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">Họ và tên: </label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ tên....">
                    </div>
                    <div class="mb-3">
                        <label for="">Email: </label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email....">
                    </div>
                    <div class="mb-3">
                        <label for="">Mật khẩu: </label>
                        <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu....">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="addUser" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>