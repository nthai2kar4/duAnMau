<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sản Phẩm</h4>
                <a href="./index.php?pages=products&action=add_product" class="btn btn-primary float-right">Thêm</a>
            </div>
            <div class="card-body">       
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>Huy ngu</td>
                                <td>
                                    <div class="d-flex justify-content-center"><a href="/" class="btn btn-primary"
                                            style="margin-right: 10px;">Sửa</a><button
                                            class="btn btn-danger">Xóa</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
