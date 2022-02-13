<?php 
	
	foreach($_POST['txtsoluong'] as $k=> $value) {
		$_SESSION['cart'][$k] = $value ;
		echo $k. ':' .$value. '<br>' ;
	}
	
header("location:giohang.php");

