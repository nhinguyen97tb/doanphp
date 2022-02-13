<?php 
include ('../conn.php');
//lấy về id của tài khoản 
$id = intval($_GET['id']);
if($id>0) {
	$sql = "delete from user where id =".$id ;
	$ketqua = mysqli_query($conn,$sql);
	if($ketqua>0) {
		header("location:../quantri/quanlytaikhoan.php");
	}
}
