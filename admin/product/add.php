<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Thêm Sản Phẩm
                    <a href="./index.php?pages=product&action=list" class="btn btn-danger float-end">Trở Về</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">Tên sản phẩm: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">Danh mục: </label>
                        <select name="category" id="" class="form-select mr-3">
                            <?php foreach( getAllCategory() as $category):?>
                            <option
                                value="<?= $category['id']?>"><?= $category['name']?>
                            </option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Hình Ảnh: </label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="">Giá: </label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="">Giá khuyến mãi: </label>
                        <input type="text" class="form-control" name="sale_price">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô Tả: </label><br>
                        <textarea class="form-control" name="content" id="" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="addProduct" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>