<?php

//Khởi tạo Session
session_start();

//Lấy mã sản phẩm
$id = intval($_GET['ma']);

$value = 0 ;
if(isset($_SESSION['cart'][$id]))//Nếu sản phẩm đã có
{
    $value = intval($_SESSION['cart'][$id]) + 1;
}
else//Nếu chưa có sản phẩm trong giỏ
{
    $value = $_POST['txtsoluong'] ;
}

//Lưu số lượng gán với sản phẩm vào giỏ hàng
$_SESSION['cart'][$id] = $value;

header("location:trangchu.php"); 