<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quản lý sản phẩm</title>
	<?php include('../conn.php'); 
	$tukhoa = "";
	$timtheloai ="";
	$danhmuc = "";
	$thuonghieu = "";
	$strsql = "select ma,ten,theloai.tentl,danhmuc,makeup.mota,gia,tinhtrang,hinhanh,thuonghieu.tenthuonghieu from makeup INNER JOIN theloai on makeup.matl = theloai.matl INNER JOIN thuonghieu ON makeup.mathuonghieu = thuonghieu.mathuonghieu WHERE 1=1";
	$ketqua = mysqli_query($conn,$strsql);
	$theloai = "select * from theloai" ;
	$ketqua1 = mysqli_query($conn,$theloai);
	$thuonghieu = "select * from thuonghieu";
	$ketqua2 = mysqli_query($conn,$thuonghieu);

	//xử lý tìm kiếm 
	if(isset($_REQUEST['btntimkiem'])) {
		//lấy về giá trị được nhập ở form
		$tukhoa = $_POST['txttukhoa'];
		$timtheloai = $_POST['timtheloai'];
		$danhmuc = $_POST['danhmuc'];
		$thuonghieu = $_POST['thuonghieu'];
		
		//nếu nhập từ khóa
		if(strlen($tukhoa)>0) {
			$strsql .= " And (ten like '%" . $tukhoa . "%' or makeup.mota like '%".$tukhoa."%')";
		}
		if(strlen($timtheloai)>0) {
			$strsql .= " And makeup.matl like '%" . $timtheloai . "%' ";
		}
		if(strlen($danhmuc)>0) {
			$strsql .= " And makeup.danhmuc like '%" . $danhmuc . "%' ";
		}
		if(strlen($thuonghieu)>0){
			$strsql .= " And makeup.mathuonghieu like '%" . $thuonghieu . "%' ";
		}
		$ketqua = mysqli_query($conn,$strsql);
	}
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
	<h1 style="text-align: center;color: #1E0CF3;">QUẢN LÝ SẢN PHẨM</h1>
	<a style="float: left" href="../trangchu.php">Quay lại trang chủ</a>
	<a style="float: right;font-size: 20px;color: #0C11FB " href="formthemsua.php">Thêm mới</a>
	<br><br>
	<form method="post" name="form3">
		<fieldset>
			<legend>Nhập thông tin tìm kiếm</legend>
			<table>
				<tr>
					<td>Từ khóa :</td>
					<td><input type="text" name="txttukhoa" value="<?php echo $tukhoa; ?>" /></td>
					<td style="padding-left: 20px;">Thể loại</td>
					<td><select name="timtheloai">
						<option value=""></option>
						<?php while($row1 = mysqli_fetch_array($ketqua1)) { ?>
							<option <?php if($timtheloai == $row1['matl']) echo "selected='selected'" ?> value="<?php echo $row1['matl'] ?>"><?php echo $row1['tentl'] ?></option>
						<?php } ?>
					</select></td>
					<td style="padding-left: 20px;">Danh mục :</td>
						<td>
							<select name="danhmuc">
								<option value=""></option>
								<option <?php if($danhmuc=="MK"){ echo "selected = 'selected'" ;} ?> value="MK">Makeup</option>
								<option  <?php if($danhmuc=="SK"){ echo "selected = 'selected'" ;} ?> value="SK">Skincare</option>
							</select>
						</td>
						<td style="padding-left: 20px;">Thương hiệu :</td>
						<td>
							<select name="thuonghieu">
								<option value=""></option>
								<?php while($row2 = mysqli_fetch_array($ketqua2)) { ?>
							<option <?php if($thuonghieu == $row2['mathuonghieu']) echo "selected='selected'" ?>  value="<?php echo $row2['mathuonghieu'] ?>"><?php echo $row2['tenthuonghieu'] ?></option>
						<?php } ?>
							</select>
						</td>
						<td><input type="submit" name="btntimkiem" value="Tìm kiếm"/></td>
						
				</tr>

			</table>
		</fieldset>
	</form>
	<table border="1" width="100%" style="margin-top: 70px">
		<tr style="background-color: #B4D8F5;">
			<th>Mã</th>
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Thể loại</th>
			<th>Danh mục</th>
			<th>Mô tả</th>
			<th>Thương hiệu</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php 
		while($row = mysqli_fetch_array($ketqua)) { ?>
			
		
		<tr align="center">
			<td><?php echo $row['ma'] ?></td>
			<td><img src="../anhsanpham/<?php echo $row['hinhanh'];?>" width="150" height="150"/></td>
			<td><?php echo $row['ten'] ?></td>
			<td><?php echo $row['tentl'] ?></td>
			<td><?php
				if($row['danhmuc']=='MK') {
					echo 'Makeup';
				} 
				if($row['danhmuc']=='SK') {
					echo 'Skincare' ;
				}
			 ?></td>
			<td><?php echo $row['mota'] ?></td>
			<td><?php echo $row['tenthuonghieu'] ?></td>
			<td><?php echo $row['gia'] ?></td>
			<td><?php
				if($row['tinhtrang']==0){echo "Hết hàng";}
				if($row['tinhtrang']==1){echo "Còn hàng";}
				if($row['tinhtrang']==2){echo "Sắp về";}
			 ?></td>
			<td><a href="formthemsua.php?ma=<?php echo $row['ma']?>">Sửa</a></td>
			<td><a href="xoasanpham.php?ma=<?php echo $row['ma']?>" onClick="return confirm('Bạn có thật sự muốn xóa?');">Xóa</a></td>
			
		</tr>
		
		<?php } ?>
	</table>
</body>
</html>