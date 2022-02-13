<?php 
//khởi tạo session
session_start();
$quyen = 0;
if(isset($_SESSION['tendangnhap'])){
	$quyen = $_SESSION['quyen'];
	if($quyen==1) {
		header("location:../quanlysanpham.php");
	} else {
		header("location:../trangchu.php");
	}
}

	
