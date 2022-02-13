 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SkinFood</title>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('./layout/css.php');?>
	
</head>

<body>
	<?php 
	  if (!isset ($_GET['page']) ) {

		$page = 1;
		
		} else {
		
		$page = $_GET['page'];
		
		}
	include('./layout/header.php'); 
	include('./layout/slider.php');
	include('./layout/content.php');
	include('./layout/toprate.php');
	include('./layout/brand.php');
	include('./layout/footer.php');
	include('./layout/jquery.php');
	?>
</body>
</html>