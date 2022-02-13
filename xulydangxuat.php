
<?php
//Khởi tạo Session
session_start();
if(isset($_SESSION['tendangnhap'])) {
	unset($_SESSION['tendangnhap']);
	unset($_SESSION['quyen']);
	unset($_SESSION['id']);
	unset($_SESSION['cart']);
	unset($_SESSION['iddonhang']);
	header("location:trangchu.php");
} else {
	header("location:dangnhap.php");
}



	

