<?php
    require_once "../config/db.php";
    require_once "code.php";
    //slug
    function createSlug($string){
    $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $string), '-'));
    return $slug;   
    }
    //lấy tất cả danh mục
    function getAllCategory(){
        global $conn;
        $query = $conn->query("SELECT * FROM product_category");
        if(mysqli_num_rows($query)>0){
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }
    //lấy tất cả sản phẩm
    function getAllProduct(){
        global $conn;
        $query = "SELECT p.id as id, p.name as name, p.slug as slug, c.name as category, p.image as image, p.price as price, p.sale_price as sale_price, p.created_at as created_at, p.category_id as category_id FROM product p, product_category c Where p.category_id = c.id";
        $sql = mysqli_query($conn, $query);
        if($sql){
            return $sql->fetch_all(MYSQLI_ASSOC);
        }
    } 
    //lấy 1 sản phẩm
    function getOneProduct($id){
        global $conn;
        $query = "SELECT * FROM product where id = $id";
        $sql = mysqli_query($conn, $query);
        if($sql){
           return $sql -> fetch_all(MYSQLI_ASSOC);
        }
    }
    //thêm sản phẩm
    function createProduct($name, $slug, $category, $image, $content, $price, $sale_price){
        global $conn;
        $query = ("INSERT INTO product (name, slug, category_id, image, content, price, sale_price ) VALUES('$name', '$slug', '$category', '$image', '$content', '$price', '$sale_price')");
        mysqli_query($conn, $query);
        header("location: index.php?pages=product&action=list");
    }
    //sửa sản phẩm 
    function editProduct($id,$name, $slug, $category, $image, $content, $price, $sale_price){
        global $conn;
        $query = "UPDATE product SET name = '$name', slug = '$slug', category_id = '$category', image = '$image', content = '$content', price = '$price', sale_price = '$sale_price' WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);
        header("location: index.php?pages=product&action=list");
    }
    //xóa sản phẩm
    function deleteProduct($id){
        global $conn;
        $query = "DELETE FROM product WHERE id = '$id'";
        mysqli_query($conn, $query);
        header("location: index.php?pages=product&action=list");
    }
    //Thêm user
    function createUser($name, $email, $password){
        global $conn;
        $query = "INSERT INTO user (name, email, password) VALUES ('$name','$email','$password')";
        mysqli_query($conn, $query);
        header("location: index.php?pages=user&action=list");
    }
    //Sửa user
    function editUser($id, $name, $email, $password){
        global $conn;
        $query = "UPDATE user SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
        mysqli_query($conn, $query);
        header("location: index.php?pages=user&action=list");
    }
    //Lấy tất cả user
    function getAllUser(){
        global $conn;
        $query = "SELECT * FROM user";
        $sql = mysqli_query($conn, $query);
        if($sql){
            return $sql->fetch_all(MYSQLI_ASSOC);
        }
    }
    //Lấy 1 user
    function getOneUser($id){
        global $conn;
        $query = "SELECT * FROM user where id = $id";
        $sql = mysqli_query($conn, $query);
        if($sql){
           return $sql -> fetch_all(MYSQLI_ASSOC);
        }
    }
?>
