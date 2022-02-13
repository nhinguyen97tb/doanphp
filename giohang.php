
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
   <?php  include('./layout/css.php');;?>


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->

       <?php
   

        include('./layout/header.php'); ?>
        <!-- End Header Area -->


            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('https://dncosmetics.vn/wp-content/uploads/2017/09/banner-dncosmetics-2.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Giỏ hàng</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
					
                        <form action="#" method="post">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Hình ảnh</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Thành tiền</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
									<?php include('conn.php');
									  
									$tongtien = 0 ; $thanhtien = 0 ;
            if(isset($_SESSION['cart']))
            {  if(isset($_REQUEST['btncapnhat'])) {
                    foreach($_POST['txtsoluong'] as $k=>$value) {
                        $_SESSION['cart'][$k] = $value;
                        continue;
                    }
                }

                //Duyệt các sản phẩm trong giỏ hàng để lấy chi tiết thông tin
                //phục vụ hiển thị lên danh sách
                
                foreach($_SESSION['cart'] as $k=>$value)
                {
                    echo "<tr>";
                    //Khai báo câu lệnh truy vấn
                    $strsql = "Select ma, hinhanh , ten, gia from makeup where ma = " . $k;


                    //Lấy thông tin sản phẩm
                    $ketqua = mysqli_query($conn, $strsql);

                  
                    while($row = mysqli_fetch_array($ketqua))
                    { ?>
					
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="./anhsanpham/<?php echo $row['hinhanh']?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="chitiet.php?ma=<?php echo $row['ma'];  ?>"><?php echo $row['ten']; ?></a></td>
										
                                            <td class="product-price"><span class="amount" ><?php echo  number_format($row['gia']) ?></span></td>
                                            <td class="product-quantity"><input type="number" name="txtsoluong[<?php echo $k ?>]" value="<?php echo $value; ?>"/></td>
											<?php $thanhtien = $value * $row['gia']; ?>
                                            <td class="product-subtotal"><?php echo number_format($thanhtien)?></td>
                                            <td class="product-remove"><a href="xulygiohang.php?deleteid=<?php echo $k ?>"><i class="icon-trash icons"></i></a></td>
									         <?php $tongtien += $thanhtien ?>
                                        </tr>
                                     </tbody>
                <?php } } ?>


                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="trangchu.php">Tiếp tục mua hàng</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <button name="btncapnhat"><a>Cập nhật</a></button>
                                            <a href="xulygiohang.php?xoahet=1">Xóa giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
								
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="ht__coupon__code">
                                        <span>Nhập mã giảm giá của bạn</span> 
                                        <div class="coupon__box">
                                            <input type="text" placeholder="">
                                            <div class="ht__cp__btn">
                                                <a href="#">Enter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                    <div class="htc__cart__total">
                                        <h6>Tổng tiền</h6>
                                        <div class="cart__desk__list">
                                            <ul class="cart__desc">
                                                <li>Tổng tiền hàng</li>
                                               
                                                <li>Ship</li>
                                            </ul>
                                            <ul class="cart__price">
                                                <li><?php echo number_format($tongtien) ; ?></li>
                                               
                                                <li>15,000</li>
                                            </ul>
                                        </div>
                                        <div class="cart__total">
                                            <span>Tổng hóa đơn</span>
                                            <span><?php echo number_format($tongtien+15000) ; ?></span>
                                        </div>
										<?php } ?>
                                        <ul class="payment__btn">
                                            <li  class="active"><a href="./xuly/xulydathang.php" <?php if(!isset($_SESSION['tendangnhap'])) {
                                                ?>
                                                onClick = "alert('Bạn phải đăng nhập để thanh toán !')"
                                                <?php
                                            } ?> >Thanh toán</a></li>
                                            <li><a href="trangchu.php">Tiếp tục mua hàng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Brand Area -->
        <?php include('./layout/brand.php'); ?>
        <!-- End Brand Area -->
        
       
        <!-- Start Footer Area -->
       <?php include('./layout/footer.php'); ?>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
   <?php include('./layout/jquery.php');?>
</body>

</html>