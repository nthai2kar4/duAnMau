<?php
require_once "../config/db.php";
require_once "code.php";
//slug
function createSlug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}
//lấy tất cả danh mục
function getAllCategory()
{
    global $conn;
    $query = $conn->query("SELECT * FROM product_category");
    if (mysqli_num_rows($query) > 0) {
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}
//lấy 1 danh mục
function getOneCategory($id){
    global $conn;
    $query = "SELECT * FROM product_category where id='$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//thêm danh mục
function createCategory($name){
    global $conn;
    $query = "INSERT INTO product_category (name) values('$name')";
    mysqli_query($conn, $query);
    header("Location: index.php?pages=category&action=list");
}
//sửa danh mục
function editCategory($id,$name){
    global $conn;
    $query = "UPDATE product_category SET name = '$name' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: index.php?pages=category&action=list");
}
//xóa danh mục
function deleteCategory($id){
    global $conn;
    $query = "DELETE FROM product_category WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: index.php?pages=category&action=list");
}
//lấy tất cả sản phẩm
function getAllProduct()
{
    global $conn;
    $query = "SELECT p.id as id, p.name as name, p.slug as slug, c.name as category, p.image as image, p.price as price, p.sale_price as sale_price, p.created_at as created_at, p.category_id as category_id FROM product p, product_category c Where p.category_id = c.id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//lấy 1 sản phẩm
function getOneProduct($id)
{
    global $conn;
    $query = "SELECT * FROM product where id = $id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
// lấy 1 sản phẩm theo danh mục
function getOneProductByCategory($id){
    global $conn;
    $query = "SELECT * FROM product_category c WHERE '$id' = c.id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//thêm sản phẩm
function createProduct($name, $slug, $category, $image, $content, $price, $sale_price)
{
    global $conn;
    $query = ("INSERT INTO product (name, slug, category_id, image, content, price, sale_price ) VALUES('$name', '$slug', '$category', '$image', '$content', '$price', '$sale_price')");
    mysqli_query($conn, $query);
    header("location: index.php?pages=product&action=list");
}
//sửa sản phẩm 
function editProduct($id, $name, $slug, $category, $image, $content, $price, $sale_price)
{
    global $conn;
    $query = "UPDATE product SET name = '$name', slug = '$slug', category_id = '$category', image = '$image', content = '$content', price = '$price', sale_price = '$sale_price' WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    header("location: index.php?pages=product&action=list");
}
//xóa sản phẩm
function deleteProduct($id)
{
    global $conn;
    $query = "DELETE FROM product WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("location: index.php?pages=product&action=list");
}
//Thêm user
function createUser($name, $email, $password)
{
    global $conn;
    $query = "INSERT INTO user (name, email, password) VALUES ('$name','$email','$password')";
    mysqli_query($conn, $query);
    header("location: index.php?pages=user&action=list");
}
//Sửa user
function editUser($id, $name, $email, $password)
{
    global $conn;
    $query = "UPDATE user SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("location: index.php?pages=user&action=list");
}
//Lấy tất cả user
function getAllUser()
{
    global $conn;
    $query = "SELECT * FROM user";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy 1 user
function getOneUser($id)
{
    global $conn;
    $query = "SELECT * FROM user where id = $id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
//Lấy 1 user để đăng nhập
function getUser($email, $password)
{
    global $conn;
    $query = "SELECT * FROM user where email = '$email'"; 
    $sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql)==1) {
        $row = mysqli_fetch_array($sql); 
        $hash = $row['password'];
        if(password_verify($password, $hash)) {
            session_start();
             $_SESSION['login_user'] = $email;
            header('Location: ?index.php');
        }
        else {
            return '';
        }
    } 
    else{
        return '';
    }
}
//Đăng nhập
function login()
{
    global $conn;
    $query = "SELECT * FROM user where email = '$_SESSION[login_user]'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
// Đăng kí
function register($name, $email, $hash)
{
    global $conn;
    $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email','$hash')";
    mysqli_query($conn, $query);
}
//Thêm giỏ hàng vào db
function addToCart($id, $name, $address, $phone, $cart_code)
{
    global $conn;
    $query = "INSERT INTO orders (user_id, user_name, user_address, user_phone, cart_code, cart_status) VALUES ('$id', '$name', '$address', '$phone', '$cart_code', 1)";
    mysqli_query($conn, $query);
}
function addToCartDetail($cart_code, $product_id, $qty){
    global $conn;
    $query = "INSERT INTO orders_detail (cart_code, product_id, qty) VALUES ('$cart_code', '$product_id','$qty')";
    mysqli_query($conn, $query);
}
function getOrders(){
    global $conn;
    $query = "SELECT o.*, u.email as email FROM orders o, user u where o.user_id = u.id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
function getOrdersDetail($id){
    global $conn;
    $query = "SELECT * FROM orders_detail o, product p  WHERE o.product_id = p.id and o.cart_code = $id order by o.id desc";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
// function setCookies()
// {
//     // lưu và set thời gian lưu thông tin trên thanh input
//     setcookie('email', $_POST['email'], time() + 15, '/');
//     setcookie('password', $_POST['password'], time() + 15, '/');
// }
//sửa số đt user
function editPhone($phone, $id){
    global $conn;
    $query = "UPDATE user SET phone = '$phone' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: ?pages=profile&action=profile');
}
function editAddress($address, $id){
    global $conn;
    $query = "UPDATE user SET address = '$address' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: ?pages=profile&action=profile');
}
function editAvatar($avatar, $id){
    global $conn;
    $query = "UPDATE user SET avatar = '$avatar' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: ?pages=profile&action=profile');
}