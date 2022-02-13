<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quản lý tài khoản</title>
	<?php include('../conn.php'); 
	$strsql = "select * from user";
	$ketqua = mysqli_query($conn,$strsql);
	
	?>
	<style>
		th{
			text-align: center;
			padding: 10px;
			white-space: nowrap;
		}

	</style>
		
</head>
	
<body style="background-color: #F3DEDF">
	<h1 style="text-align: center;color: #1E0CF3;">QUẢN LÝ TÀI KHOẢN</h1>
	<a style="float: left" href="../trangchu.php">Quay lại trang chủ</a>
	
	<table border="1" width="100%" style="margin-top: 70px">
		<tr style="background-color: #B4D8F5;">
			<th>ID</th>
			<th>Tên đăng nhập</th>
			<th>Mật khẩu</th>
			<th>Email</th>
			<th>Quyền</th>
			
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php 
		while($row = mysqli_fetch_array($ketqua)) { ?>
			
		
		<tr>
			<td><?php echo $row['id'] ?></td>
			
			<td><?php echo $row['tendangnhap'] ?></td>
			<td><input type="password" name="txtpassword" value="<?php echo $row['matkhau'] ?>"></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php if($row['quyen']==1){echo "Admin" ;}
					  if($row['quyen']==0){echo "Người dùng" ;}
			 ?></td>
			
			<td><a href="suataikhoan.php?id=<?php echo $row['id']?>">Sửa</a></td>
			<td><a href="xoataikhoan.php?id=<?php echo $row['id']?>" onClick="return confirm('Bạn có thật sự muốn xóa?');">Xóa</a></td>
			
		</tr>
		
		<?php } ?>
	</table>
</body>
</html>