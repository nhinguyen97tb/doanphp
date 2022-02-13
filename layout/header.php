<style>
	.dropdown #thuonghieu li {
		height: 45px;
	   width: 160px;
	}
	::-webkit-scrollbar {
		width: 10px;
		
	}
	::-webkit-scrollbar-thumb {
		background-color:#E0D7D7 ;
		border-radius: 5px;
	}
</style>
<?php include('conn.php') ;
//Khởi tạo Session
	session_start();

	$soluong = 0 ;
	$tongtien = 0 ;

										

?>
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.html"><img src="./anhsanpham/anhlogo.png" alt="logo images" height="80px" width="280px" ></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="trangchu.php">Home</a></li>
										
                                        <li class="drop"><a href="#">Makeup</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Mặt</a>
													<?php 
													$sql = "select matl,tentl from theloai where phanloai='MẶT'" ;
													$ketqua = mysqli_query($conn,$sql);	
													?>
                                                    <ul class="mega__item">
														<?php while($row = mysqli_fetch_array($ketqua)) { ?>
                                                        <li><a href="danhsachchitiet.php?matl=<?php echo $row['matl'] ?>"><?php echo $row['tentl']; ?></a></li>
                                                      	<?php } ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Mắt</a>
													<?php 
													$sql = "select matl,tentl from theloai where phanloai ='EYE'" ;
													$ketqua = mysqli_query($conn,$sql);
													?>
                                                    <ul class="mega__item">
														<?php while($row = mysqli_fetch_array($ketqua)){ ?>
                                                        <li><a href="danhsachchitiet.php?matl=<?php echo $row['matl'] ?>" ?><?php echo $row['tentl'] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Môi</a>
													<?php
													$sql = "Select matl, tentl from theloai where phanloai ='MÔI'";
													$ketqua = mysqli_query($conn,$sql);
													?>
                                                    <ul class="mega__item">
														<?php while($row= mysqli_fetch_array($ketqua)){ ?>
                                                        <li><a href="danhsachchitiet.php?matl=<?php echo $row['matl'] ?>"><?php echo $row['tentl'] ?></a></li>
                                                      <?php } ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Skincare</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Quy trình dưỡng da</a>
													<?php
													$sql = "Select matl, tentl from theloai where phanloai ='DUONGDA'";
													$ketqua = mysqli_query($conn,$sql);
													?>
                                                    <ul class="mega__item">
														<?php while($row = mysqli_fetch_array($ketqua)) { ?>
                                                        <li><a href="danhsachchitiet.php?matl=<?php echo $row['matl'] ?>"><?php echo $row['tentl'] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Giải pháp làn da</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Mụn đầu đen</a></li>
                                                        <li><a href="#">Mụn đỏ-Kích ứng</a></li>
                                                        <li><a href="wishlist.html">Dưỡng trắng- trị thâm nám</a></li>
                                                        <li><a href="cart.html">Cấp nước, kiểm soát dầu</a></li>
                                                        <li><a href="checkout.html">Dưỡng ẩm</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Tay-Body-Tóc</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Sữa tắm</a></li>
                                                        <li><a href="#">Sữa dưỡng thể</a></li>
                                                        <li><a href="#">Tẩy da chết body</a></li>
                                                        <li><a href="#">Dưỡng tóc</a></li>
                                                        <li><a href="#">Dưỡng da tay</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Product</a>
                                            <ul class="dropdown">
                                                <li><a href="danhsachchitiet.php?danhmuc=MK">Makeup</a></li>
                                                <li><a href="danhsachchitiet.php?danhmuc=SK">Skincare</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop" ><a href="#">brand</a>
											<?php
											$sql = "select * from thuonghieu" ;
											$ketqua = mysqli_query($conn,$sql);
											?>
                                            <ul class="dropdown" >
												
												<div id="thuonghieu" style="overflow-y: scroll; height: 500px;">
													<?php while($row= mysqli_fetch_array($ketqua)){ ?>
                                                <li><a href="danhsachchitiet.php?mathuonghieu=<?php echo $row['mathuonghieu'] ?>"><?php echo $row['tenthuonghieu'] ?></a></li>
											<?php } ?>
												</div>
                                            </ul>
                                        </li>
										<li class="drop"><a href="#">Other</a>
                                            <ul class="dropdown">
                                                <li><a href="product-grid.html">Makeup</a></li>
                                                <li><a href="product-details.html">Skincare</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">check</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                
                                                
                                                <li><a <?php if(isset($_SESSION['iddonhang'])) { ?> href="./listdonhang.php" <?php } else { ?> onClick="alert('Chưa có đơn hàng !');" <?php } ?>>Check đơn hàng</a></li>
                                                <li><a <?php if(isset($_SESSION['tendangnhap'])) {?> onClick="alert('Tên đăng nhập : <?php echo $_SESSION['tendangnhap'] ?>')" <?php } ?>>Tài khoản</a></li>
                                            
                                                <li><a href="wishlist.html">Yêu thích</a></li>
                                            </ul>
                                        </li>
                                        <li><a <?php if(!isset($_SESSION['quyen']) || isset($_SESSION['quyen']) && $_SESSION['quyen']!=1) {?> onClick = "alert('Bạn không phải admin');" <?php } else { ?> href="./quantri/quanlyskinfood.php" <?php } ?> >admin</a></li>
                                    </ul>
                                </nav>
                                
                               
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <a href="xulydangxuat.php" <?php if(isset($_SESSION['tendangnhap'])){ ?> onClick="return confirm('Bạn có muốn đăng xuất?')" <?php } ?>><i class="icon-user icons"></i></a>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
										<?php
										//lấy về số lượng sản phẩm nếu có trong giỏ hàng 
									if(isset($_SESSION['cart'])) {
									foreach($_SESSION['cart'] as $value) {
										$soluong += $value;
												}
												 }
										?>
                                        <a href="#"><span class="htc__qua"><?php echo $soluong ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
       <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                               <?php

                                ?>
                                <form action="#" method="post">
                                    <input placeholder="Search here... " type="text" name="txttimkiem" >
                                    <button type="submit" name="btntimkiem"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
						<?php 
						if(isset($_SESSION['cart'])) {
							foreach($_SESSION['cart'] as $key=>$value) {
								
							$sql = "select ma, hinhanh , ten, gia from makeup where ma = ".$key ;
								$ketqua = mysqli_query($conn,$sql) ;
								while($row1 = mysqli_fetch_array($ketqua)) {
									
						
						?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="./anhsanpham/<?php echo $row1['hinhanh'] ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html"><?php echo $row1['ten']; ?></a></h2>
                                <span class="quantity">QTY : <?php echo $value ?></span>
								<?php
								$thanhtien = $row1['gia'] * $value ;
								$tongtien += $thanhtien ;
								?>
                                <span class="shp__price"><?php echo number_format($thanhtien)?> đ</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    <?php } }}?>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Tổng tiền:</li>
                        <li class="total__price"><?php echo number_format($tongtien) ?></li>
                    </ul>
					
                    <ul class="shopping__btn">
                        <li><a href="giohang.php">Đến giỏ hàng</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Đặt hàng</a></li>
                    </ul>
                </div>
            </div>