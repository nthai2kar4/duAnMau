<?php
    $host = 'localhost';
    $user = 'root';
    $password = '123456';
    $database = 'duanmau_db';
    global  $conn;
    $conn = mysqli_connect($host, $user, $password, $database);
    if(!$conn){
        echo "Kết nối cơ sở dữ liệu không thành công";
        die();
    }