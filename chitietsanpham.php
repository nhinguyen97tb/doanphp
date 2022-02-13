<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông tin sản phẩm</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   
    function xoamau(ma) {
        for(var i=1 ; i<=5;i++) {
            $('#'+ma+'-'+i).css('color','#ccc');
        }
    }
    //di chuột sao chuyển vàng
    $(document).ready(function(){
            $(".danhgiasanpham").mouseenter(function(){
                var index = $(this).data("index");
                var ma = $(this).data("masanpham");
                xoamau(ma);
                for(var i=1 ; i<=index;i++) {
                $('#'+ma+'-'+i).css('color','#e2df1e');
                }
               
            });
        });
    //di lại sẽ mất sao 
     $(document).ready(function(){
            $(".danhgiasanpham").MOUSELEAVE(function(){
                var index = $(this).data("index");
                var ma = $(this).data("masanpham");
                var rating = $(this).data("rating");
                xoamau(ma);
                for(var i=1 ; i<=rating;i++) {
                $('#'+ma+'-'+i).css('color','#e2df1e');
                }
               
            });
        });
     //kích chuột để đánh giá 
     $(document).ready(function(){
        $(".danhgiasanpham").click(function(){
             var ma = $(this).data("masanpham");
             index = $(this).data("index");
             sosao = index;
             alert("Bạn đánh giá "+sosao+" /5 sao !" );
             
        });
     });

</script>
</head>
<?php
	
	include('./layout/css.php');
	
	include('conn.php');
	?>
	 

<body>
	<?php
		include('./layout/header.php');	
	?>
	        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0)url('https://dncosmetics.vn/wp-content/uploads/2017/09/banner-dncosmetics-2.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.html">Skincare</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Makeup</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
								<?php 
								
								//xử lí hiển thị chi tiết 
								if(isset($_REQUEST['ma'])) {
								//Khai báo biến
								$ma = 0;
								$tensanpham="";
								$matheloai="";
								$mota="";
								$thuonghieu="";
								$gia=0;
								$tinhtrang=1;
								$anh="anh1.jpg";
								$noidung="" ;
									//lấy mã đưa về dạng số 
									$ma = intval($_REQUEST['ma']);
									
									//khai báo câu lệnh truy vấn 
									$sql = "select ma,theloai.tentl,thuonghieu.tenthuonghieu,gia,tinhtrang,hinhanh,noidung,ten,makeup.mota from makeup  inner join theloai on makeup.matl = theloai.matl 
									inner join thuonghieu on makeup.mathuonghieu = thuonghieu.mathuonghieu
									where ma = $ma" ;
									$ketqua = mysqli_query($conn,$sql);
									
									
								}
							
								
								?>
								
                                <div class="product__big__images">
									<?php while($row = mysqli_fetch_array($ketqua)){
											$ma = $row['ma'];
											$tensanpham = $row['ten'];
											$hinhanh = $row['hinhanh'];
											$gia = $row['gia'];
											$tentl = $row['tentl'];
											$gia = $row['gia'];
											$mota = $row['mota'];
											$tinhtrang = $row['tinhtrang'];
											$tenthuonghieu = $row['tenthuonghieu'];
											$noidung = $row['noidung'];
	
										}

				                    $sqlanh = "select * from albumanh where ma=".$ma ;
                                    $ketqua = mysqli_query($conn,$sqlanh);
                                    while($row= mysqli_fetch_array($ketqua)) {
                                        $anh2 = $row['anh2'];
                                        $anh3 = $row['anh3'];
                                    }
									?>
									
									<form method="post" action="xulygiohang.php?ma=<?php echo $ma ?>" >
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="./anhsanpham/<?php echo $hinhanh ?>" width="510" height="610" alt="full-image">
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-2">
                                            <img src="./anhsanpham/<?php echo $anh2 ?>" width="510" height="610" alt="full-image">
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-3">
                                            <img src="./anhsanpham/<?php echo $anh3 ?>" width="510" height="610" alt="full-image">
                                        </div>
                                    </div>
									
                                </div>
                                <!-- End Product Big Images -->
                                <!-- Start Small images -->
                                <ul class="product__small__images" role="tablist">
                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-1" role="tab" data-toggle="tab">
                                            <img src="./anhsanpham/<?php echo $hinhanh ?>"  width="80" height="80" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-2" role="tab" data-toggle="tab">
                                            <img src="./anhsanpham/<?php echo $anh2 ?>" width="80" height="80" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-3" role="tab" data-toggle="tab">
                                            <img src="./anhsanpham/<?php echo $anh3 ?>" width="80" height="80" alt="small-image">
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
						  <?php
                          $rating = 0 ;
                            $sql = "SELECT AVG(sosao) from danhgia WHERE masanpham = ".$ma ;
                            $ketqua = mysqli_query($conn,$sql) ;
                            while($row = mysqli_fetch_array($ketqua)) {
                                $rating = $row['AVG(sosao)'];
                            }
                             ?>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $tensanpham ?></h2>
                                <h6>Thể loại: <span><?php echo $tentl ?></span></h6>
                            
                                    <ul>
                                        <?php 
                                            for($i = 1;$i<=5;$i++) {
                                                 if($i<$rating) {
                                            $color = 'color : #e2df1e';
                                        } else {
                                            $color = 'color : #ccc';
                                        }
                                             ?>
                                                <li  style="display: inline; cursor:pointer; <?php echo $color ?>; font-size: 30px;">&#9733;</li>
                                                <?php
                                            }
                                        ?>
                                    </ul>

                                <ul  class="pro__prize">
                                    <li class="old__prize" style="text-decoration: line-through">$82.5</li>
                                    <li style="text-decoration: underline; color: red"><?php echo number_format($gia) ?> đ</li>
                                </ul>
                                <p class="pro__info"><?php echo $mota ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Tình trạng :</span> <?php 
											if($tinhtrang==0) {
												echo "Hết hàng" ;
											} else if($tinhtrang==1) {
												echo "Còn hàng" ;
											} else if($tinhtrang==2) {
												echo "Hàng sắp về" ;
											}
											
											?></p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Màu :</span></p>
                                        <ul class="pro__color">
                                            <li class="red"><a href="#">red</a></li>
                                            <li class="green"><a href="#">green</a></li>
                                            <li class="balck"><a href="#">balck</a></li>
                                        </ul>
                                       
                                    </div>
                                
                                    <div class="sin__desc align--left">
                                        <p><span>Thương hiệu :</span></p>
                                        <ul class="pro__cat__list">
                                            <li><?php echo $tenthuonghieu ?></li>
                                        
                                        </ul>
                                    </div>
									  <div class="sin__desc align--left">
                                        <p><span>Số lượng :</span> <input type="number" name="txtsoluong" value="1" size="3"/></p>
                                       
                                    </div>
									</div>
									  <div class="sin__desc align--left">
                                        <p> <input type="submit"  name="btnthemvaogio" value="Thêm vào giỏ" class="btn btn-primary"/></p>
                                       
                                    </div>		
                                     
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Product tags:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#">Son,</a></li>
                                            <li><a href="#">Phấn phủ,</a></li>
                                            <li><a href="#">Tẩy trang,</a></li>
                                            <li><a href="#">Sữa dưỡng,</a></li>
                                            <li><a href="#">Kẻ mắt,</a></li>
                                        </ul>
                                    </div>

                                    <div class="sin__desc product__share__link">
                                        <p><span>Share this:</span></p>
                                        <ul class="pro__share">
                                            <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
							</form>
		
			
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
	 <section class="htc__produc__decription bg__white">
            <div class="container">
             
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                  
                                    <h4 class="ht__pro__title" style="font-family: Times New Roman">Mô tả</h4>
                                    <p><?php echo $noidung ?></p>
                                    
                                </div>
                            </div>
							
										
												
                            <!-- End Single Content -->
                             <div style="background-color: black; height: 40px; padding-left: 10px;" class="dcm">
                                <p style="color: white; line-height: 40px;"><b>ĐÁNH GIÁ SẢN PHẨM</b></p>
                            </div>
                          
                        
                            <form method="post" name="form3" action="#">
                            <div style="padding-top: 15px;">
                                <br>
                                <ul class="danhgia">
                                    <?php
                                    
                                     for($i=1;$i<=5;$i++) { 
                                        if($i<$rating) {
                                            $color = 'color : #e2df1e';
                                        } else {
                                            $color = 'color : #ccc';
                                        }
                                        ?> 

                                    <a href="./xuly/xulydanhgia.php?sosao=<?php echo $i ?>&masanpham=<?php echo $ma ?>"><li
                                      
                                      class="danhgiasanpham" 
                                      id = "<?php echo $ma ?>-<?php echo $i ?>"
                                      data-index="<?php echo $i ?>" 
                                      data-masanpham="<?php echo $ma ?>"
                                      
                                      data-rating="<?php echo $rating ?>"
                                     style="display: inline; cursor:pointer; <?php echo $color ?>; font-size: 30px;">&#9733;</li></a>
                                <?php } ?>
                                </ul>
                                <br>
                                
                            </div>
                        </form>
							</section>


	<?php
						include('./layout/brand.php');
						include('./layout/footer.php');
						include('./layout/jquery.php');
						?>
						
</body>
</html>