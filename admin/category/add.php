<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Thêm Danh Mục
                    <a href="./index.php?pages=category&action=list" class="btn btn-danger float-end">Trở Về</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">Tên danh mục: </label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="addCate" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>