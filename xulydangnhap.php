<!doctype html>
<?php 
//khởi tạo session 
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
</head>

<body>
	<?php
	//include file kết nối 
	include('conn.php');
	
	//lấy thông tin từ form 
	$tendangnhap = $_POST['txttendangnhap'];
	$matkhau = $_POST['txtmatkhau'];
	//truy vấn dữ liệu từ CSDL 
	$sql = "Select * from user where tendangnhap='$tendangnhap' and matkhau='$matkhau'";
	$result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$tdn= $row['tendangnhap'];
			$quyen = $row['quyen'];
			//thiết lập biến session 

			$_SESSION['tendangnhap'] = $tdn ;
			$_SESSION['quyen'] = $quyen ;
			$_SESSION['id'] = $id ;
			$_SESSION['iddonhang'] = $id ;
			//thông báo đăng nhập thành công : 
			echo '<script type="text/javascript">';
            echo 'alert("Đăng nhập thành công!");';
            echo '</script>';

			if(isset($_SESSION['cart'])) {
				header("location:dathang.php");
			} else {
			
			header('location:trangchu.php');
			 }
		}
	} else {
		//ở lại trang đăng ký 
		header('location:dangky.php');
	}
	?>
</body>
</html>