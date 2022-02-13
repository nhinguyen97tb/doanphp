<?php
session_start();
//thêm sản phẩm vào giỏ hàng 
	//lấy về mã 
	$id = intval($_REQUEST['ma']);
	$value = 0 ;
	if(isset($_SESSION['cart'][$id])) {
		$value = intval($_SESSION['cart'][$id]) + intval($_POST['txtsoluong']);
	} else {
		
		 $value = $_POST['txtsoluong'] ;
		 
	}
	//gắn số lượng 
	 $_SESSION['cart'][$id]=$value ;

	 
	if(isset($_SESSION['cart'])) {
	//xóa sản phẩm trong giỏ hàng 
  if(isset($_GET['deleteid']) && $_GET['deleteid']>0) {
 	unset($_SESSION['cart'][$_GET['deleteid']]) ;
                                       
                                    }
  //xóa hết sản phẩm trong giỏ 
	if(isset($_GET['xoahet'])&& $_GET['xoahet']==1) {
		unset($_SESSION['cart']);
									
				}
					}
				
				header("location:giohang.php");
 ?>


