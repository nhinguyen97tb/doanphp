<?php 
//Khởi tạo Session
include('../conn.php');
session_start();
$id = 0 ;
//lấy về giá trị các phần tử trên form 
$tinhthanh = $_POST['txttinhthanh'];
$hoten = $_POST['txthoten'];
$tencongty = $_POST['txttencongty'];
$tenduong = $_POST['txttenduong'];
$mabuudien = $_POST['txtmabuudien'];
$sodienthoai = $_POST['txtsodienthoai'];
$email = $_POST['txtemail'];
$diachi = $tencongty. ','.$tenduong ;
echo $diachi ;
//lấy về mã của tài khoản đăng nhập 
if(isset($_SESSION['tendangnhap'])) {
	$id = $_SESSION['id']   ;
    //$_SESSION['iddonhang'] = $id;
}

//thêm thông tin khách hàng
$sql = "insert into thongtinkhachhang(hoten,tinhthanh,diachi,mabuudien,email,sodienthoai,id,ngaydat) values(?,?,?,?,?,?,?,now())" ;

$comm = $conn->prepare($sql);
$comm->bind_param("sssdssd",$hoten,$tinhthanh,$diachi,$mabuudien,$email,$sodienthoai,$id);
$rs=$comm->execute();
 if($rs>0) {
 	echo '<script type="text/javascript">';
            echo 'alert("Đặt hàng thành công!");';
            //echo 'return;' ;
            echo '</script>';
 }
 $themmahang = "insert into madonhang(iduser,ngaydat) values(?,now())";
 $comm = $conn->prepare($themmahang);
 //$madon = random_int(1, 100000000000);
 $comm->bind_param("d",$id);
 $result = $comm->execute();

 //thêm sản phẩm vào đơn hàng 
//lấy sản phẩm trong giỏ hàng 
 if(isset($_SESSION['cart'])) {
 	foreach($_SESSION['cart'] as $key => $value) {
 		//khai báo câu lệnh truy vấn 
 		$sql1 = "select * from makeup where ma = ".$key ;
 		$ketqua = mysqli_query($conn,$sql1) ;

 		if($ketqua!=null) {
 			while($row = mysqli_fetch_array($ketqua)) {
 			$ma = $row['ma'];
 			$hinhanh = $row['hinhanh'];
 			$tensanpham = $row['ten'];
 			$gia = $row['gia'];
 			$soluong = $value ;
 			$tongtien = $gia * $value ;
            $tinhtrang = 0 ;
           // $madonhang = random_int(1, 100000000);

 		}
 		$themdon = "insert into donhang values(?,?,?,?,?,?,now(),?,?)";
 		$comm = $conn->prepare($themdon);
 		$comm->bind_param("dssddddd",$ma,$hinhanh,$tensanpham,$gia,$soluong,$tongtien,$id,$tinhtrang);
 		$comm->execute();

 	}
 	}
    
    
 	unset($_SESSION['cart']);
 	header("location:../listdonhang.php");
 }
