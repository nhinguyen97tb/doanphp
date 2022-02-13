<?php
include('../conn.php');
$ma = intval($_GET['ma']) ;
if($ma>0) {
	$sql = "delete from makeup where ma = ?" ;
	$con = $conn->prepare($sql) ;
	$con->bind_param("d",$ma) ;
	$ketqua = $con->execute();
	
	if($ketqua>0) {
		$con->close();
		$conn->close();
		header("location:quanlymakeup.php");
	}
}
?>