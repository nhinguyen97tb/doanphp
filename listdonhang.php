<?php 
include('conn.php');
include('./layout/css.php');
include('./layout/header.php');
?>
	       <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('./images/bg/bannergiohang.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="trangchu.php">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Danh sách đơn</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#" method="post">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Mã đơn hàng</th>
                                            <th class="product-name">Tên khách hàng</th>
                                            <th class="product-name">Địa chỉ</th>
                                            <th class="product-name">Tỉnh thành</th>
                                            <th class="product-subtotal">Email</th>
                                            <th class="product-name">Số điện thoại</th>
                                            <th class="product-name">Ngày đặt</th>
                                             <th class="product-name">Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	$id = 0 ;
                                    		if(isset($_SESSION['tendangnhap'])) {
                                    			$id = $_SESSION['id'];
                                    		}
                                    		$sql = "select madon,hoten,diachi,tinhthanh,email,sodienthoai,madonhang.ngaydat from madonhang,thongtinkhachhang where madonhang.iduser=thongtinkhachhang.id and madonhang.ngaydat = thongtinkhachhang.ngaydat and madonhang.iduser =".$id ;
                                    		$ketqua = mysqli_query($conn,$sql);
                                    		if($ketqua==null) {
                                    			echo "Chưa có đơn hàng !"  ;
                                    		} else {
                                    		while($row = mysqli_fetch_array($ketqua)) {
                                    	 ?>
                                        <tr>
                                            <td class="product-name"><a href="#"><?php echo $row['madon'] ?></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['hoten'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $row['diachi'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $row['tinhthanh'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $row['email'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $row['sodienthoai'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $row['ngaydat'] ?></a>
                                                
                                            </td>
                                            <td class="product-name"><a href="checkdon.php?madon=<?php echo $row['madon']?>">Chi tiết</a></td>
                                        </tr>
                                        
		                                  <?php } }?>
                                 
                                    </tbody>
                                </table>
                            </div>
                        
                           
                        </form> 
                    </div>
                </div>
            </div>
        </div>
<?php 
include('./layout/brand.php');
include('./layout/footer.php');
include('./layout/jquery.php');
?>