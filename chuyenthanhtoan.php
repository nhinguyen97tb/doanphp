<?php 
//Khởi tạo Session
session_start();
if(isset($_SESSION['tendangnhap'])) {
	header('location:dathang.php');
} else {
	header('location:dangnhap.php');
}