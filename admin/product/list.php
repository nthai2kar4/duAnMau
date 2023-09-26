<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sản Phẩm <a href="./index.php?pages=product&action=add"
                            class="btn btn-primary float-end">Thêm</a></h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Slug</th>
                                    <th style="width: 100px;">Danh mục</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th style="width:140px;">Giá khuyến mãi</th>
                                    <th style="width: 120px;">Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(getAllProduct() as $item):?>
                                <tr class="text-center">
                                    <td><?= $item['id']?></td>
                                    <td><?= $item['name']?></td>
                                    <td><?= $item['slug']?></td>
                                    <td><?= $item['category']?></td>
                                    <td><img src="<?= $item['image']?>" alt="" width="40px" height="50px"></td>
                                    <td><?= number_format($item['price'])?></td>
                                    <td><?= number_format($item['sale_price'])?></td>
                                    <td><?= date('d-m-Y', strtotime($item['created_at']))?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="./index.php?pages=product&action=edit&id=<?= $item['id']?>&category_id=<?= $item['category_id']?>"
                                                class="btn btn-primary" style="margin-right: 10px;">Sửa</a>
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $item['id']?>" name="idProduct">
                                                <button class="btn btn-danger dlbtn" name="deleteProduct"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm?')"
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

</body>

</html>