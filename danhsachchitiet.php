<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách chi tiết</title>
<?php
	
	include('./layout/css.php');
	?>
</head>

<body>
	<?php
	include('conn.php');
	include('./layout/header.php'); ?>
	
	<?php 
	

	?>
	      <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('https://dncosmetics.vn/wp-content/uploads/2017/09/banner-dncosmetics-2.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Sản phẩm</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	       <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                    <select class="ht__select">
                                        <option>Show by</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                <div class="ht__pro__qun">
                                    <span>Showing 1-12 of 1033 products</span>
                                </div>
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
										<?php
                                    //khai báo biến 
                                    $ma = 0;
                                    $hinhanh = "" ;
                                    $tensanpham = "" ;
                                    $gia = 0 ;
									$matl = "" ;
                                    if(isset($_REQUEST['mathuonghieu'])) {
                                        $mathuonghieu = $_GET['mathuonghieu'];
                                        $sql = "select * from makeup where mathuonghieu =".$mathuonghieu;
                                    }
									if(isset($_REQUEST['matl'])) {

									$matl = $_GET['matl'];
									
									$sql = "select ma,ten,gia,hinhanh from makeup where matl = '$matl'" ;
                                     }
                                     if(isset($_REQUEST['danhmuc'])){
                                        $dm = $_GET['danhmuc'];
                                        $sql = "Select * from makeup where danhmuc = '".$dm."'  ";
                                     }
									$ketqua = mysqli_query($conn,$sql) ;
									while($row1 = mysqli_fetch_array($ketqua)) {
	
										$hinhanh = $row1['hinhanh'];
										$ten = $row1['ten'];
										$gia = $row1['gia'];
										
										?>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.html">
                                                        <img src="./anhsanpham/<?php echo $hinhanh ?>" alt="product images" width="200px" height="250px">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="themhang1.php"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="chitietsanpham.php?ma=<?php echo $row1['ma'] ?>"><?php echo $ten ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize"></li>
                                                        <li style="color: #F00F13"><?php echo number_format($gia) ?> đ</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
										<?php  }?>
                                        <!-- End Single Product -->
                    
                                
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
												<?php 
										$sql = "select ma,ten,gia,mota,hinhanh from makeup where matl = '$matl'" ;
										$ketqua = mysqli_query($conn,$sql) ;
										while($row1 = mysqli_fetch_array($ketqua)) { ?>
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.html"><img src="./anhsanpham/<?php echo $row1['hinhanh'] ?>" width="200px" height="280px"  alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?php echo $row1['ten'] ?> </a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize">$82.5</li>
                                                            <li><?php echo number_format($row1['gia']) ?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p><?php echo $row1['mota'] ?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="themhang1.php?ma=<?php echo $row1['ma'] ?>">Thêm vào giỏ</a>
                                                        </div>
                                                    </div>
                                                </div>
												<?php } ?>
                                                <!-- End List Product -->
                                             
                                        
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        <!-- Start Pagenation -->
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="htc__pagenation">
                                   <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                                   <li class="active"><a href="#">1</a></li> 
                                   <li><a href="#">2</a></li>  
									<li><a href="#">...</a></li> 
                                   <li><a href="#">9</a></li> 
                                   <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <!-- End Pagenation -->
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                            <!-- Start Prize Range -->
                            <div class="htc-grid-range">
                                <h4 class="title__line--4">Giá</h4>
                                <div class="content-shopby">
                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">
                                                    <div class="price--output">
                                                        <span>Giá :</span><input type="text" id="amount" readonly>
                                                    </div>
                                                    <div class="price--filter">
                                                        <a href="#">Lọc</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Prize Range -->
                            <!-- Start Category Area -->
                            <div class="htc__category">
                                <h4 class="title__line--4">Thể loại</h4>
                                <ul class="ht__cat__list">
									<?php
										$sql = "select tentl,matl from theloai" ;
										$ketqua = mysqli_query($conn,$sql); ?>
									<div id="theloai" style="overflow-y: scroll; height: 500px;">
									<?php while($row = mysqli_fetch_array($ketqua)) {
									?>
                                    <li><a href="danhsachchitiet.php?matl=<?php echo $row['matl'] ?>"><?php echo $row['tentl'] ?></a></li>
                              		<?php } ?>
									</div>
                                </ul>
                            </div>
                            <!-- End Category Area -->
                            
                       
                         
                            <!-- End Pro Size -->
                            <!-- Start Tag Area -->
                            <div class="htc__tag">
                                <h4 class="title__line--4">tags</h4>
                                <ul class="ht__tag__list">
                                    <li><a href="#">Da dầu</a></li>
                                    <li><a href="#">Da khô</a></li>
                                    <li><a href="#">Mụn ẩn</a></li>
                                    <li><a href="#">Mụn viêm</a></li>
                                    <li><a href="#">Mụn bọc</a></li>
                                    <li><a href="#">Dưỡng trắng</a></li>
                                    <li><a href="#">Thâm nám</a></li>
                                    
                                </ul>
                            </div>
                            <!-- End Tag Area -->
                            <!-- Start Compare Area -->
                            <div class="htc__compare__area">
                                <h4 class="title__line--4">compare</h4>
                                <ul class="htc__compare__list">
                                    <li><a href="#">White men’s polo<i class="icon-trash icons"></i></a></li>
                                    <li><a href="#">T-shirt for style girl...<i class="icon-trash icons"></i></a></li>
                                    <li><a href="#">Basic dress for women...<i class="icon-trash icons"></i></a></li>
                                </ul>
                                <ul class="ht__com__btn">
                                    <li><a href="#">clear all</a></li>
                                    <li class="compare"><a href="#">Compare</a></li>
                                </ul>
                            </div>
                            <!-- End Compare Area -->
                            <!-- Start Best Sell Area -->
                            <div class="htc__recent__product">
                                <h2 class="title__line--4">best seller</h2>
                                <div class="htc__recent__product__inner">
                                    <!-- Start Single Product -->
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="product-details.html">
                                                <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="product-details.html">Product Title Here</a></h2>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li class="old__prize">$82.5</li>
                                                <li>$75.2</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="product-details.html">
                                                <img src="images/product-2/sm-smg/2.jpg" alt="small product">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="product-details.html">Product Title Here</a></h2>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li class="old__prize">$82.5</li>
                                                <li>$75.2</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="product-details.html">
                                                <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="product-details.html">Product Title Here</a></h2>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li class="old__prize">$82.5</li>
                                                <li>$75.2</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                            </div>
                            <!-- End Best Sell Area -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php
	include('./layout/brand.php');
	include('./layout/footer.php');
	include('./layout/jquery.php');
	?>
</body>
</html>