<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đặt hàng</title>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('./layout/css.php');?>
      <script type="text/javascript">
        function checkform(){
            var tinhthanh = document.forms['form1'].txttinhthanh.value;
            if(tinhthanh==""){
                alert("Bạn phải nhập tình thành !");
                document.forms['form1'].txttinhthanh.focus();
                return;
            }
            var hoten = document.forms['form1'].txthoten.value;
            if(hoten==""){
                alert("Bạn phải nhập họ tên !");
                document.forms['form1'].txthoten.focus();
                return;
            }
            var tencongty = document.forms['form1'].txttencongty.value;
            if(tencongty==""){
                alert("Bạn phải nhập tên công ty !");
                document.forms['form1'].txttencongty.focus();
                return;
            }
            var tenduong = document.forms['form1'].txttenduong.value;
            if(tenduong==""){
                alert("Bạn phải nhập tên đường !");
                document.forms['form1'].txttenduong.focus();
                return;
            }
            var mabuudien = document.forms['form1'].txtmabuudien.value;
            if(mabuudien==""){
                alert("Bạn phải nhập mã bưu điện !");
                document.forms['form1'].txtmabuudien.focus();
                return;
            }
            if(isNaN(mabuudien)){
                alert("Mã bưu điện phải là số !");
                document.forms['form1'].txtmabuudien.focus();
                return;
            }
            var sodienthoai = document.forms['form1'].txtsodienthoai.value;
            if(sodienthoai==""){
                alert("Bạn phải nhập số điện thoại !");
                document.forms['form1'].txtsodienthoai.focus();
                return;
            }
            if(isNaN(sodienthoai)){
                alert("Số điện thoại phải là số !");
                document.forms['form1'].txtsodienthoai.focus();
                return;
            }
            var email = document.forms['form1'].txtemail.value;
            if(email==""){
                alert("Bạn phải nhập email!");
                document.forms['form1'].txtemail.focus();
                return;
            }
            document.forms['form1'].action = "./xuly/themdonhang.php" ;
            document.forms['form1'].submit() ;
      
        }
    </script>
</head>

<body style="font-family: cursive;">
	<?php
	include('./layout/header.php'); ?>
	       <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('./images/bg/bannergiohang.jpg') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="trangchu.php">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Đặt hàng</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row"> 

                    <form method="post" name ="form1">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                  
                                   
                                    <div class="accordion__title">
                                        Thông tin khách hàng
                                    </div>
                                    <div style="font-family: times new roman;" class="accordion__body">
                                        <div class="bilinfo">
                                           
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input mt-0">
                                                            <input type="text" name = "txttinhthanh" placeholder="Tỉnh/Thành phố"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name = "txthoten" placeholder="Họ tên"/>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="txttencongty" placeholder="Tên công ty"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name = txttenduong placeholder="Tên đường"/>
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name ="txtmabuudien" placeholder="Mã bưu điện"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="email" name = "txtemail" placeholder="Email"/>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name = "txtsodienthoai" placeholder="Số điện thoại"/>
                                                        </div>
                                                    </div>
                                                </div>
                                         
                                        </div>
                                    </div>
                                    
                                    
                                  
                                    <div class="accordion__title">
                                        Thông tin thanh toán
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Nhận hàng thanh toán</a>
                                            </div>
                                            <div class="single-method">
                                                <a href="#" class="paymentinfo-credit-trigger" name="thenganhang"><i class="zmdi zmdi-long-arrow-right"></i>Thẻ ngân hàng</a>
                                            </div>
                                            <div class="paymentinfo-credit-content">
                                               
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input mt-0">
                                                                <input type="text" placeholder="Tên thẻ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <select name="bil-country" id="payment-info-type">
                                                                    <option value="select">Loại thẻ</option>
                                                                    <option value="card-1">Thẻ tín dụng</option>
                                                                    <option value="card-2">Thẻ Visa</option>
                                                                    <option value="card-3">Master card</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" placeholder="Số thẻ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <select>
                                                                    <option>Chọn tháng</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <select>
                                                                    <option>Chọn năm</option>
                                                                    <option>2015</option>
                                                                    <option>2016</option>
                                                                    <option>2017</option>
                                                                    <option>2018</option>
                                                                    <option>2019</option>
                                                                    <option>2020</option>
                                                                    <option>2021</option>
                                                                    <option>2022</option>
                                                                    <option>2023</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" placeholder="Số xác minh thẻ">
                                                            </div>
                                                        </div>
                                                    </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Sản phẩm</h5>
                            <div class="order-details__item">
                                <?php
                                $tongtien =0 ; $thanhtien = 0 ;
                                if(isset($_SESSION['cart'])) {
                                    foreach($_SESSION['cart'] as $k=>$value) {
                                        //Khai báo câu lệnh truy vấn
                    $strsql = "Select ma, hinhanh , ten, gia from makeup where ma = " . $k;


                    //Lấy thông tin sản phẩm
                    $ketqua = mysqli_query($conn, $strsql);
                    while($row = mysqli_fetch_array($ketqua)) {

                                    
                                 ?>
                                
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="./anhsanpham/<?php echo $row['hinhanh']?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $row['ten'] ?></a>
                                        <span class="quantity">QTY : <?php echo $value ?></span>
                                        <?php
                                $thanhtien = $row['gia'] * $value ;
                                $tongtien += $thanhtien ;
                                ?>
                                        <span class="price"><?php echo number_format($thanhtien)?> đ</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                               <?php } } }?>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>Tổng tiền</h5>
                                    <span class="price"><?php echo number_format($tongtien) ?> đ</span>
                                </div>
                               
                                <div class="order-details__count__single">
                                    <h5>Shipping</h5>
                                    <span class="price">15,000đ</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Tổng hóa đơn</h5>
                                <span class="price"><?php echo number_format($tongtien +15000) ?> đ</span>
                            </div>
                        </div>
                       <input type="button" value="Đặt hàng" class="btn btn-block btn-primary" onClick="checkform();">
                    </div>
                </form>
                </div>
            </div>
        
	 <?php 
	include('./layout/brand.php');
	include('./layout/footer.php');
	include('./layout/jquery.php');
	?>
  
</body>
</html>