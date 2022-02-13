<?php 
include('../conn.php');
//khai báo biến 
$id = 0;
$tendangnhap = "";
$matkhau ="";
$email = "";
$quyen = 0 ;
$id = intval($_GET['id']) ;

//khai báo câu lệnh truy vấn
$sql = "Select * from user where id =".$id;
$ketqua = mysqli_query($conn,$sql);
 while($row= mysqli_fetch_array($ketqua)) {
 	$id = $row['id'];
 	$tendangnhap = $row['tendangnhap'];
 	$matkhau = $row['matkhau'];
 	$email = $row['email'];
 	$quyen = $row['quyen'];

 }
 //cập nhật 
 if(isset($_REQUEST['btncapnhat'])) {
 	//lấy về giá trị trong form 
 	$quyen = $_POST['rdoquyen'];
 	$capnhat = "update user set quyen = ? where id =".$id;
 	$comm = $conn->prepare($capnhat);
 	$comm->bind_param("d",$quyen);
 	$ketqua = $comm->execute();
 	if($ketqua>0) {
 		header("location:quanlytaikhoan.php");
 	}
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản trị</title>
</head>
<body style="background-color: #F3DEDF">
	<h1 style="text-align: center;color: #1E0CF3;">QUẢN LÝ TÀI KHOẢN</h1>
	<div align="center">
	<form method="post" name="fomr2">
		<table width="500PX">
			<tr>
				<td>ID :</td>
				<td><input type="hidden" name="txtid" value="<?php echo $id ?>" /></td>
			</tr>
			<tr>
				<td>Tên đăng nhập :</td>
				<td><input type="text" name="txttendangnhap" value="<?php echo $tendangnhap ?>" onClick="alert('Bạn không được sửa nội dung này !');"  /></td>
			</tr>
			<tr>
				<td>Mật khẩu :</td>
				<td><input type="password" name="txtpassword" value="<?php echo $matkhau ?>" onClick="alert('Bạn không được sửa nội dung này !');" /></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" name="txtemail" value="<?php echo $email  ?>" onClick="alert('Bạn không được sửa nội dung này !');" /></td>
			</tr>
			<tr>
				<td>Quyền :</td>
				<td><input type="radio" name="rdoquyen" value="0">Người dùng
					<input type="radio" name="rdoquyen" value="1">Admin
				</td>
				<script >
					
						
						document.all.rdoquyen[<?php echo $quyen ?>].setAttribute("checked","checked");
						
				</script>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="btncapnhat" value="Cập nhật"></td>
			</tr>

		</table>

	</form>
</div>
</body>
</html>
