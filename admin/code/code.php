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
    } else {
        echo "<div class='alert alert-danger'>Email không đúng định dạng</div>";
    }
}
//sua user
if (isset($_POST['editUser'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        editUser($id, $name, $email, $password);
    } else {
        echo "<div class='alert alert-danger'>Email không đúng định dạng</div>";
    }
}
//dang nhap user
if (isset($_POST['logIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $erro = '';
    $erroEmail = '';
    $erroPass = '';
    if (empty($email)) {
        $erroEmail = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Email không được để trống</span>";
    }
    if (empty($password)) {
        $erroPass = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Mật khẩu không được để trống</span>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Email không đúng định dạng</span>";
    } else {
        getUser($email, $password);
        if (getUser($email, $password) === '') {
            $erro = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Email hoặc mật khẩu chưa đúng</span>";
        } else {
            header('Location: ?index.php');
        }
    }
}
//dang ki user
if (isset($_POST['register'])) {
    session_start();
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirmpassword = $_POST['confirmpassword'];
    $erroName = '';
    $erroEmail = '';
    $erroPass = '';
    $erroConfirm = '';
    $acp = '';
    if (empty($name)) {
        $erroName = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Họ và tên không được để trống</span>";
    }
    if (empty($email)) {
        $erroEmail = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Email không được để trống</span>";
    }
    if (empty($password)) {
        $erroPass = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Mật khẩu không được để trống</span>";
    }
    if (empty($confirmpassword)) {
        $erroConfirm = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Xác nhận lại mật khẩu</span>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Email không đúng định dạng</span>";
    } else if ($confirmpassword != $password) {
        $erroConfirm = "<span class='text-danger'><i class='fa-solid fa-circle-exclamation' style='color: #ff0000;'></i> Mật khẩu nhập lại không đúng</span>";
    } else {
        register($name, $email, $hash);
        $_SESSION['success'] = "Đăng kí thành công";
    }
}
//dang xuat
if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION['login_user']);
}
//them gio hang
if (isset($_POST['addCart'])) {
    session_start();
    if (isset($_SESSION['login_user']) && $_SESSION['login_user'] != '') {
        $id = $_POST['id'];
        $qty = 1;
        foreach (getOneProduct($id) as $cart_item);
        $data = [
            'name' => $cart_item['name'],
            'id' => $id,
            'sale_price' => $cart_item['sale_price'],
            'image' => $cart_item['image'],
            'qty' => $qty
        ];
        $found = false;
        if (isset($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $_SESSION['cart']["$id"]['qty']++;
                    $found = true;
                    break;
                }
            }
        }
        if (!$found) {
            $_SESSION['cart'][$id] = $data;
        }
        $_SESSION['success'] = 'Sản phẩm đã được thêm';
    } else {
        header('Location: ?pages=login');
    }
}
//tang 1 san pham trong gio hang
if (isset($_GET['upQty'])) {
    session_start();
    $id = $_GET['upQty'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $id) {
                $data[] = [
                    'name' => $cart_item['name'],
                    'id' => $cart_item['id'],
                    'sale_price' => $cart_item['sale_price'],
                    'image' => $cart_item['image'],
                    'qty' => $cart_item['qty']
                ];
                $_SESSION['cart'] = $data;
            } else {
                $upQty = $cart_item['qty'] + 1;
                $data[] = [
                    'name' => $cart_item['name'],
                    'id' => $id,
                    'sale_price' => $cart_item['sale_price'],
                    'image' => $cart_item['image'],
                    'qty' => $upQty
                ];
                $_SESSION['cart'] = $data;
            }
        }
    }
    header("location: ?pages=cart&action=list");
}
//giam 1 san pham trong gio hang
if (isset($_GET['downQty'])) {
    session_start();
    $id = $_GET['downQty'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $id) {
                $data[] = [
                    'name' => $cart_item['name'],
                    'id' => $cart_item['id'],
                    'sale_price' => $cart_item['sale_price'],
                    'image' => $cart_item['image'],
                    'qty' => $cart_item['qty']
                ];
                $_SESSION['cart'] = $data;
            } else {
                $upQty = $cart_item['qty'] - 1;
                if ($upQty == 0) {
                    unset($_SESSION['cart']);
                } else {
                    $data[] = [
                        'name' => $cart_item['name'],
                        'id' => $id,
                        'sale_price' => $cart_item['sale_price'],
                        'image' => $cart_item['image'],
                        'qty' => $upQty
                    ];
                    $_SESSION['cart'] = $data;
                }
            }
        }
    }
    header("location: ?pages=cart&action=list");
}
//xoa 1 san pham ra khoi gio hang
if (isset($_POST['deleteCart'])) {
    session_start();
    $id = $_GET['deleteCart'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $id) {
                $data[] = [
                    'name' => $cart_item['name'],
                    'id' => $cart_item['id'],
                    'sale_price' => $cart_item['sale_price'],
                    'image' => $cart_item['image'],
                    'qty' => $cart_item['qty']
                ];
            }
            $_SESSION['cart'] = $data;
            header('Location: ?pages=cart&action=list');
        }
    }
}
