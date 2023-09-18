<?php
//them san pham
if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $slug = createSlug($name);
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'];
    $content = $_POST['content'];
    $upload = $_FILES['image'];
        if ($upload['error'] === UPLOAD_ERR_OK) {
            $tempName = $upload['tmp_name'];
            // Xác định tên file mới
            $originalName = basename($upload['name']);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file

            // Thư mục lưu trữ ảnh
            $uploadDir = './upload/';

            // Di chuyển file ảnh đến thư mục lưu trữ
            if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                // Trả về đường dẫn ảnh mới
                $image = $uploadDir . $newFileName;
            } else {
                echo "<div class='alert alert-danger style='width: 400px;
                    margin-left: 250px;'>Có lỗi xảy ra khi lưu trữ file ảnh.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' style='width: 400px;
                     margin-left: 250px;'>Có lỗi khi upload hình ảnh</div>";
        }
        if ($sale_price < $price && $sale_price > 0 && $price > 0) {
            createProduct($name, $slug, $category, $image, $content, $price, $sale_price);
        } else {
            echo "<div class='alert alert-danger'>Giá giảm phải nhỏ hơn giá gốc và cả hai phải lớn hơn 0.</div>";
        }
}
//sua san pham
if (isset($_POST['editProduct'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $slug = createSlug($name);
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'];
    $content = $_POST['content'];
    $upload = $_FILES['image'];
    if ($upload['error'] === UPLOAD_ERR_OK) {
        $tempName = $upload['tmp_name'];

        // Xác định tên file mới
        $originalName = basename($upload['name']);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file
        // Thư mục lưu trữ ảnh
        $uploadDir = './upload/';

        // Di chuyển file ảnh đến thư mục lưu trữ
        if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
            // Trả về đường dẫn ảnh mới
            $image = $uploadDir . $newFileName;
        } else {
            echo "<div class='alert alert-danger style='width: 400px;
                    margin-left: 250px;'>Có lỗi xảy ra khi lưu trữ file ảnh.</div>";
        }
    } else {
        $image = $_POST['thumbnail'];
    }
    if ($sale_price < $price && $sale_price > 0 && $price > 0) {
        editProduct($id, $name, $slug, $category, $image, $content, $price, $sale_price);
    } else {
        echo "<div class='alert alert-danger'>Giá giảm phải nhỏ hơn giá gốc và cả hai phải lớn hơn 0.</div>";
    }
}
//xoa san pham
if (isset($_POST['deleteProduct'])) {
    $id = $_POST['idProduct'];
    deleteProduct($id);
}
//them user
if (isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        createUser($name, $email, $password);
    }
    else{
        echo "<div class='alert alert-danger'>Email không đúng định dạng</div>";
    }
}
//sua user
if(isset($_POST['editUser'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        editUser($id, $name, $email, $password);
    }
    else{
        echo "<div class='alert alert-danger'>Email không đúng định dạng</div>";
    }
}
