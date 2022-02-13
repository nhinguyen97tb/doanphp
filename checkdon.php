<?php
include('./layout/css.php');
include('./layout/header.php');
?>
<style>
    .chitietthongtin{
        padding: 10px;

    }
</style>

        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('https://dncosmetics.vn/wp-content/uploads/2017/09/banner-dncosmetics-2.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="trangchu.php">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Đơn hàng của bạn</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div align="center">
            <h4 align="center" style="color: #064bf3;  background: #f4f4f4; padding-top: 15px;">Đặt hàng thành công</h4>
               <div class="col-md-8" >
                        <div class="order-details">
                            <h5 class="order-details__title" style="font-family: arial;">Đơn hàng của bạn</h5>
                            <div class="order-details__item">

                                <?php
                                $thanhtien = 0;
                                $id = 0 ;
                                $madon = 0 ;
                                $tinhtrang = 0 ;
                                include('conn.php');
                                if(isset($_REQUEST['madon'])){
                                    //lấy về mã đơn hàng
                                    $madon = $_GET['madon'];
                                }
                                if(isset($_SESSION['tendangnhap'])) {
                                    $id = $_SESSION['id'];
                                }

                                    $sql = "SELECT donhang.id,donhang.hinhanh,donhang.tensanpham,donhang.gia,donhang.soluong,donhang.tongtien,donhang.ngaydat,tinhtrang,madonhang.madon from donhang,madonhang WHERE donhang.id = madonhang.iduser and donhang.ngaydat = madonhang.ngaydat and madonhang.madon =".$madon  ;

                                $ketqua = mysqli_query($conn,$sql);
                                if($ketqua==null) {
                                    echo "Chưa có đơn hàng" ;
                                }
                                while($row = mysqli_fetch_array($ketqua)) {  
                                    $ngaydat = $row['ngaydat'];
                                    $tongtien = $row['tongtien'];
                                    $thanhtien += $tongtien ;
                                    
                                    $tinhtrang = $row['tinhtrang'];
                                    $ma = $row['id'];
                                    $madon = $row['madon'] ;

                                 ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="./anhsanpham/<?php echo $row['hinhanh'] ?>"  alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $row['tensanpham'] ?></a>
                                        <span class="quantity">QTY : <?php echo $row['soluong'] ?></span>
                                        <span class="price"><?php echo number_format($tongtien) ?> đ</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                               <?php }
                                $sqlthongtin = "select hoten,tinhthanh, diachi,email,thongtinkhachhang.ngaydat, sodienthoai,madon from thongtinkhachhang,madonhang WHERE thongtinkhachhang.id = madonhang.iduser and thongtinkhachhang.ngaydat = madonhang.ngaydat and madon = ".$madon ;
                                $ketqua = mysqli_query($conn,$sqlthongtin);
                                while($row= mysqli_fetch_array($ketqua)){ 
                                      $hoten = $row['hoten'];
                                      $tinhthanh =$row['tinhthanh'];
                                      $diachi = $row['diachi'];
                                      $email = $row['email'];
                                      $ngaydat = $row['ngaydat'];
                                      $sodienthoai = $row['sodienthoai'];  
                                }
                                ?>
                            </div>
                            <div class="order-details__count">
                                 <div class="order-details__count__single">
                                    <h5>Ngày đặt</h5>
                                    <span class="price"><?php echo $ngaydat ?> </span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tổng tiền hàng</h5>
                                    <span class="price"><?php echo number_format($thanhtien); ?> đ</span>
                                </div>
                               
                                <div class="order-details__count__single">
                                    <h5>Shipping</h5>
                                    <span class="price">15,000đ</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Tổng hóa đơn</h5>
                                <span class="price"><?php echo number_format($thanhtien+15000) ?>đ</span>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Mã đơn:</h5>
                                <span class="price"><?php echo $madon ?></span>
                            </div>
                        </div>
                         <p>Đơn hàng : <?php
                         if($tinhtrang==0) {echo "đang được chuẩn bị" ;}
                         if($tinhtrang==1) {echo "đang được giao" ;}  
                         if($tinhtrang==2) {echo " đã được giao" ;} 
                          ?></p>
                    </div>
                     <div class="col-md-4" >
                         <h5 style="padding-top: 20px;">Thông tin khách hàng</h5>
                         <div class="thongtin" style="padding-top:20px">
                            <p class="chitietthongtin">Họ tên : <?php echo $hoten ?></p>
                            <p class="chitietthongtin">Thành phố : <?php echo $tinhthanh ?></p>
                            <p class="chitietthongtin">Địa chỉ : <?php echo $diachi ?></p>
                            <p class="chitietthongtin">Số điện thoại : <?php echo $sodienthoai ?></p>
                            <p class="chitietthongtin">Email : <?php echo $email ?></p>
                         </div>
                          <a href="trangchu.php" style="align :center"><input type="Button" class="btn btn-primary" value="Quay lại trang chủ"/></a>
                     </div>
                </div>

<?php
include('./layout/brand.php');
include('./layout/footer.php');
include('./layout/jquery.php');

 ?>