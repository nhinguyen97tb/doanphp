<?php
//Khởi tạo Session
session_start();
	if(isset($_SESSION['tendangnhap'])) {

	//echo "hello";
	//echo $_SESSION['tendangnhap'];
	//echo $_SESSION['quyen'];
	//echo $_SESSION['id'];	
	
	header('location:../dathang.php') ;
}
 else {
	header('location:../dangnhap.php') ;
}