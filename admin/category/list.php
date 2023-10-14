<div class="container-fluid mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Danh mục<a href="./index.php?pages=category&action=add" class="btn btn-primary float-end">Thêm</a></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getAllCategory() as $data) : ?>
                                <tr class="text-center">
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="./index.php?pages=category&action=edit&id=<?= $data['id'] ?>" class="btn btn-primary" style="margin-right: 10px;">Sửa</a>
                                                <a class="btn btn-danger" href="?./index.php?pages=category&action=delete&cateid=<?= $data['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục?')">Xóa</a>
                                            
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