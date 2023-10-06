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
    unset($_SESSION['cart']);
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
//thanh toan
if (isset($_POST['payCart'])) {
    session_start();
    foreach (login() as $user)
        $id = $user['id'];
    $email = $user['email'];
    $name = $_POST['name'];
    $payment = $_POST['payment'];
    $phone = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $cart_code = rand(0, 9999);
    $tbody = array();
    addToCart($id, $name, $address, $phone, $cart_code);
    foreach ($_SESSION['cart'] as $data) {
        $product_id = $data['id'];
        $qty = $data['qty'];
        addToCartDetail($cart_code, $product_id, $qty);
         $tbody[] = "<tr>
        <td style='color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word'
            align='left' class='hihi'>
             $data[name]
        </td>
        <td style='color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif'
            align='left' class='hihi'>
            $data[qty]
        </td>
        <td style='color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif'
            align='left' class='hihi'>
            <span>" . number_format($data['sale_price']) . "<span>VND</span></span>
        </td>
       </tr>";
    }
    $item = implode($tbody);
    $tieuDe = "Đơn hàng mới #$cart_code";
    $noiDung = "<div id=':n1' class='a3s aiL msg-7628188207803792935><u></u>
    <div marginwidth='0' marginheight='0' style='background-color:#f7f7f7;padding:0;text-align:center'
        bgcolor='#f7f7f7'>
        <table width='100%' id='m_-7628188207803792935outer_wrapper' style='background-color:#f7f7f7'
            bgcolor='#f7f7f7'>
            <tbody>
                <tr>
                    <td></td>
                    <td width='600'>
                        <div id='m_-7628188207803792935wrapper' dir='ltr'
                            style='margin:0 auto;padding:70px 0;width:100%;max-width:600px' width='100%'>
                            <table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'>
                            <tbody>
                            <tr>
                                <td align='center' valign='top'>
                                    <div id='m_-7628188207803792935template_header_image'>
                                    </div>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'
                                        id='m_-7628188207803792935template_container'
                                        style='background-color:#fff;border:1px solid #dedede;border-radius:3px'
                                        bgcolor='#fff'>
                                        <tbody>
                                            <tr>
                                                <td align='center' valign='top'>
                    
                                                    <table border='0' cellpadding='0' cellspacing='0'
                                                        width='100%'
                                                        id='m_-7628188207803792935template_header'
                                                        style='background-color:#7f54b3;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0'
                                                        bgcolor='#7f54b3'>
                                                        <tbody>
                                                            <tr>
                                                                <td id='m_-7628188207803792935header_wrapper'
                                                                    style='padding:36px 48px;display:block'>
                                                                    <h1 style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#fff;background-color:inherit'
                                                                        bgcolor='inherit'>Đơn hàng mới: #$cart_code 
                                                                    </h1>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align='center' valign='top'>
                    
                                                    <table border='0' cellpadding='0' cellspacing='0'
                                                        width='100%'
                                                        id='m_-7628188207803792935template_body'>
                                                        <tbody>
                                                            <tr>
                                                                <td valign='top'
                                                                    id='m_-7628188207803792935body_content'
                                                                    style='background-color:#fff'
                                                                    bgcolor='#fff'>
                    
                                                                    <table border='0' cellpadding='20'
                                                                        cellspacing='0' width='100%'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign='top'
                                                                                    style='padding:48px 48px 32px'>
                                                                                    <div id='m_-7628188207803792935body_content_inner'
                                                                                        style='color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left'
                                                                                        align='left'>
                    
                                                                                        <p
                                                                                            style='margin:0 0 16px'>
                                                                                            Bạn vừa nhận
                                                                                            được đơn hàng từ
                                                                                            $name Đơn
                                                                                            hàng như sau:
                                                                                        </p>
                    
                                                                                       
                    
                                                                                        <div
                                                                                            style='margin-bottom:40px'>
                                                                                            <table
                                                                                                cellspacing='0'
                                                                                                cellpadding='6'
                                                                                                border='1'
                                                                                                style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue,Helvetica,Roboto,Arial,sans-serif'
                                                                                                width='100%'>
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Sản
                                                                                                            phẩm
                                                                                                        </th>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Số
                                                                                                            lượng
                                                                                                        </th>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Giá
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>                                                                                                   
                                                                                                  $item
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px'
                                                                                                            align='left'>
                                                                                                            Tổng
                                                                                                            số
                                                                                                            phụ:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px'
                                                                                                            align='left'>
                                                                                                            <span>0<span> VND</span></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Phương
                                                                                                            thức
                                                                                                            thanh
                                                                                                            toán:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            $payment
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Tổng
                                                                                                            cộng:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            <span>" . number_format($_SESSION['total']) . "<span>VND</span></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tfoot>
                                                                                            </table>
                                                                                        </div>
                    
                                                                                        <table
                                                                                            id='m_-7628188207803792935addresses'
                                                                                            cellspacing='0'
                                                                                            cellpadding='0'
                                                                                            border='0'
                                                                                            style='width:100%;vertical-align:top;margin-bottom:40px;padding:0'
                                                                                            width='100%'>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign='top'
                                                                                                        width='50%'
                                                                                                        style='text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0'
                                                                                                        align='left'>
                                                                                                        <h2
                                                                                                            style='color:#7f54b3;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left'>
                                                                                                            Địa
                                                                                                            chỉ
                                                                                                            thanh
                                                                                                            toán
                                                                                                        </h2>
                    
                                                                                                        <address
                                                                                                            style='padding:12px;color:#636363;border:1px solid #e5e5e5'>
                                                                                                            $name<br>$address
                                                                                                            <br><a
                                                                                                                href='tel:0923343434'
                                                                                                                style='color:#7f54b3;font-weight:normal;text-decoration:underline'
                                                                                                                target='_blank'>$phone</a>
                                                                                                            <br><a
                                                                                                                href='mailto:$email'
                                                                                                                target='_blank'>$email</a>
                                                                                                        </address>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <p
                                                                                            style='margin:0 0 16px'>
                                                                                            Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi!</p>
                                                                                        
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                    
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class='yj6qo'></div>
        <div class='adL'>
        </div>
    </div>
    <div class='adL'>
    </div>
</div>";
    thanhToanVaGuiEmail($email, $tieuDe, $noiDung);
    unset($_SESSION['cart']);
    header('Location: ?pages=thank');
}
