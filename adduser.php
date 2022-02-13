<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	include('conn.php');
	//lấy dữ liệu từ form đăng ký 
	$tendangnhap = $_POST['txttendangnhap'];
	$matkhau = $_POST['txtmatkhau'];
	$email = $_POST['txtemail'];
	
	//khai báo và thực thi câu lệnh sql 
	$sql = "Insert into user(tendangnhap,matkhau,email) values('$tendangnhap','$matkhau','$email')" ;
	
	//thực thi câu lệnh sql 
	mysqli_query($conn,$sql);
	//đóng kết nối 
	mysqli_close($conn);
	
	header("location:dangnhap.php");
	?>
</body>
</html>