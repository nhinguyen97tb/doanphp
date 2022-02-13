<?php 
include('../conn.php');
$sosao = 0 ;
$ma = 0;
if(isset($_REQUEST['sosao'])){
	$sosao = $_GET['sosao'];
	//echo $sosao ;
}
if(isset($_REQUEST['masanpham'])){
	$ma = $_GET['masanpham'];
	//echo($ma);
}
//thêm vào CSDL 
$sql = "insert into danhgia (masanpham,sosao) values(?,?)";
$comm=$conn->prepare($sql);
$comm->bind_param("dd",$ma,$sosao);
$ketqua = $comm->execute();
if($ketqua>0) {
	header("location:../chitietsanpham.php?ma=".$ma);
} else {
	echo "Lỗi đánh giá !" ;
}
?>