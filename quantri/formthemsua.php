	<?php
//khai báo biến 
$ma = 0 ;
$tensanpham = "" ;
$theloai = "" ;
$hinhanh = "" ;
$mota = "" ;
$danhmuc = "" ;
$tenthuonghieu = "";
$gia = 0 ;
$tinhtrang = "" ;
$noidung = "" ;
$mathuonghieu = "";
$matl ="" ;
		include('../conn.php');
		$sql = "select matl,tentl from theloai" ;
		$ketqua = mysqli_query($conn,$sql);
		$sql1 = "select * from thuonghieu";
		$ketqua1 = mysqli_query($conn,$sql1);
	//hiển thị chi tiết 
if(isset($_REQUEST['ma'])) {
	//lấy về mã
	$ma = intval($_REQUEST['ma']);
	//khai báo câu lệnh truy vấn 
	$sql = "select ma,ten,theloai.tentl,theloai.matl,makeup.danhmuc,makeup.mathuonghieu,makeup.mota,gia,tinhtrang,hinhanh,thuonghieu.tenthuonghieu,makeup.noidung from makeup INNER JOIN theloai on makeup.matl = theloai.matl INNER JOIN thuonghieu ON makeup.mathuonghieu = thuonghieu.mathuonghieu WHERE makeup.ma = $ma" ;
	//thực thi câu truy vấn 
	$rs = mysqli_query($conn,$sql) ;
	while($row= mysqli_fetch_array($rs)) {
		//$ma = $row['txtma'];
		$tensanpham = $row['ten'];
		$theloai = $row['tentl'];
		$hinhanh = $row['hinhanh'];
		$mota = $row['mota'];
		$danhmuc = $row['danhmuc'];
		$tenthuonghieu = $row['tenthuonghieu'];
		$gia = $row['gia'];
		$tinhtrang = $row['tinhtrang'];
		$noidung = $row['noidung'];
		$mathuonghieu = $row['mathuonghieu'];
		$matl = $row['matl'];
	}
	
}
	
	//thêm mới 
	if(isset($_REQUEST['btncapnhat'])) {
		//lấy về các giá trị 
		$ma = intval($_POST['txtma']);
		$tensanpham = $_POST['txttensanpham'];
		$matl = $_POST['theloai'];
		$hinhanh = $_FILES['txtanhsp']['name'] ;
		$tmp_anh=$_FILES['txtanhsp']['tmp_name'];
		$mota = $_POST['txtmota'];
		$danhmuc = $_POST['danhmuc'];
		$mathuonghieu = $_POST['txtthuonghieu'];
		$gia = intval($_POST['txtgia']);
		$tinhtrang = intval($_POST['rdotinhtrang']);
		$noidung = $_POST['txtnoidung'];
		
	 //di chuyển hình ảnh
	 //Xử lý ảnh từ form
		if (isset($_FILES['txtanhsp']) && $_FILES['txtanhsp']['error'] != UPLOAD_ERR_NO_FILE){
			if($_FILES['txtanhsp']['error']>0) {
				echo "Tải file lỗi" .$_FILES['txtanhsp']['error'] ;
			} else {
				//nếu file đã tồn tại trên project 
				if(file_exists('../images/'.$_FILES['txtanhsp']['name'])) {
					echo "File đã tồn tại trên hệ thống !" ;
				} else {
					//di chuyển vào thư mục 
				  move_uploaded_file($_FILES['txtanhsp']['tmp_name'], "../anhsanpham/" . $_FILES['txtanhsp']['name']);
					$hinhanh = $_FILES['txtanhsp']['name'] ;
					echo "Tải file thành công !" ;
				}
			} 
     } 
		//khai báo câu lệnh insert
	
		$sql = "insert into makeup (ten,matl,mota,danhmuc,mathuonghieu,gia,tinhtrang,hinhanh,noidung) values(?,?,?,?,?,?,?,?,?)";
		
		//khai báo câu lệnh cập nhật 
		if($ma>0) {
			$sql = "update makeup set ten=?,matl=?,mota=?,danhmuc =?,mathuonghieu=?,gia=?,tinhtrang=?,hinhanh=?,noidung=? where ma = $ma" ;
		}
		//khai báo thực hiện công việc 
		$comm = $conn->prepare($sql);
		//gán giá trị cho các tham số : 
		$comm->bind_param("ssssdddss",$tensanpham,$matl,$mota,$danhmuc,$mathuonghieu,$gia,$tinhtrang,$hinhanh,$noidung);
		//thực thi nội dung 
		$ketqua = $comm->execute() ;
		if($ketqua>0) {
			header('Location:quanlymakeup.php');
			$conn->close();
			$comm->close();
		}
	}
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Thêm sửa sản phẩm</title>

	
	<!-- khai báo sd checkeditor-->
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body style="background-color: #F3DEDF">
	<div align="center" >
		<h2 style="color: #181CE2;font-size: 30px">NHẬP THÔNG TIN SẢN PHẨM</h2>
			<form name="myform" method="post" enctype="multipart/form-data" >
				<fieldset style="width: 1000px">
					<legend>Form nhập thông tin</legend>
				
				<table width="1000px">
					<tr>
						<td>Tên sản phẩm :</td>
						<td><input type="text" name="txttensanpham" value="<?php echo $tensanpham ?>" size="50"/>
							<input type="hidden" name="txtma" value ="<?php echo $ma ?>"/></td>
					</tr>
					<tr>
						<td>Thể loại :</td>
						<td><select name="theloai">
							<?php while($row = mysqli_fetch_array($ketqua)) { ?>
								<option <?php if($matl == $row['matl']) echo "selected='selected'" ?> value="<?php echo $row['matl'] ?>"><?php echo $row['tentl'] ?></option> <?php } ?>
							</select></td>
					</tr>
					<tr>
						<td>Hình ảnh :</td>
						<td><input type="file" name="txtanhsp" value="<?php echo $hinhanh ?>"/></td>
					</tr>
					
					<tr>
						<td>Mô tả :</td>
						<td><textarea cols="50" rows="4" name="txtmota" ><?php echo $mota ?> </textarea></td>
					</tr>
					<tr>
						<td>Danh mục </td>
						<td>
							<select name="danhmuc">
							
								<option <?php if($danhmuc == 'MK') echo "selected='selected'" ?> value="MK">Make Up</option> 
								<option <?php if($danhmuc == 'SK') echo "selected='selected'" ?> value="SK">Skincare</option> 
							</select>
						</td>

					
					</tr>	
					<tr>
						<td>Thương hiệu :</td>
						<td><select name="txtthuonghieu" >
							<?php while($row1 = mysqli_fetch_array($ketqua1)) {
								
								   ?>
						
								<option <?php if($mathuonghieu == $row1['mathuonghieu']) echo "selected='selected'" ?> value="<?php echo $row1['mathuonghieu']?>" ><?php echo $row1['tenthuonghieu'] ?></option>
								<?php } ?>
							</select></td>
						
				
					</tr>
					<tr>
						<td>Giá :</td>
						<td><input type="text" name="txtgia" value="<?php echo $gia ?>"/></td>
					</tr>
					<tr>
						<td>Tình trạng:</td>
						<td>
							<input type="radio" name="rdotinhtrang" value="0"/>Hết hàng
							<input type="radio" name="rdotinhtrang" value="1"/>Còn hàng
							<input type="radio" name="rdotinhtrang" value="2"/>Sắp về
						</td>
						<script>
						
						document.all.rdotinhtrang[<?php echo $tinhtrang ?>].setAttribute("checked","checked");
						</script>
					</tr>
						<tr>
						<td>Nội dung :</td>
						<td><textarea name="txtnoidung" id="txtnoidung" >
                                       <?php echo $noidung ?>
                                    </textarea>
                                        </td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="btncapnhat" value="Cập nhật"/></td>
					</tr>
				</table>
				</fieldset>
			</form>
	</div>
</body>
	<script>
		CKEDITOR.replace('txtnoidung');
                                        </script>
</html>