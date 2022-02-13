<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Quản lý</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include('../conn.php'); 
	$tukhoa = "";
	$timtheloai ="";
	$danhmuc = "";
	$thuonghieu = "";
	$strsql = "select ma,ten,theloai.tentl,danhmuc,makeup.mota,gia,tinhtrang,hinhanh,thuonghieu.tenthuonghieu from makeup INNER JOIN theloai on makeup.matl = theloai.matl INNER JOIN thuonghieu ON makeup.mathuonghieu = thuonghieu.mathuonghieu WHERE 1=1";
	$ketqua = mysqli_query($conn,$strsql);
	$theloai = "select * from theloai" ;
	$ketqua1 = mysqli_query($conn,$theloai);
	$thuonghieu = "select * from thuonghieu";
	$ketqua2 = mysqli_query($conn,$thuonghieu);

	//xử lý tìm kiếm 
	if(isset($_REQUEST['btntimkiem'])) {
		//lấy về giá trị được nhập ở form
		$tukhoa = $_POST['txttukhoa'];
		$timtheloai = $_POST['timtheloai'];
		$danhmuc = $_POST['danhmuc'];
		$thuonghieu = $_POST['thuonghieu'];
		
		//nếu nhập từ khóa
		if(strlen($tukhoa)>0) {
			$strsql .= " And (ten like '%" . $tukhoa . "%' or makeup.mota like '%".$tukhoa."%')";
		}
		if(strlen($timtheloai)>0) {
			$strsql .= " And makeup.matl like '%" . $timtheloai . "%' ";
		}
		if(strlen($danhmuc)>0) {
			$strsql .= " And makeup.danhmuc like '%" . $danhmuc . "%' ";
		}
		if(strlen($thuonghieu)>0){
			$strsql .= " And makeup.mathuonghieu like '%" . $thuonghieu . "%' ";
		}
		$ketqua = mysqli_query($conn,$strsql);
	}
	?>
	<style>
		th{
			text-align: center;
			padding: 10px;
			white-space: nowrap;
		}


	</style>

</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html">Skin Food</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
      
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">Admin</p>
           
        </div>
    </div>
    <ul class="app-menu">
  
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                
                <li><a class="treeview-item active" href="table-data-table.html"><i class="icon fa fa-circle-o"></i>Quản lý sản phẩm</a></li>
            </ul>
        </li>

    </ul>
</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Danh sách sản phẩm</h1>
            
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="../trangchu.php"><li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li></a>
            <li class="breadcrumb-item">Quản trị</li>
            <li class="breadcrumb-item active"><a href="#">Danh sách sản phẩm</a></li>
        </ul>
    </div>
    <p style="margin-left : 1150px"><a href="formthemsua.php">Thêm mới</a></p>
    <form method="post" name="form3">
		<fieldset>
			<legend>Nhập thông tin tìm kiếm</legend>
			<table>
				<tr>
					<td>Từ khóa :</td>
					<td><input type="text" name="txttukhoa" value="<?php echo $tukhoa; ?>" /></td>
					<td style="padding-left: 20px;">Thể loại</td>
					<td><select name="timtheloai">
						<option value=""></option>
						<?php while($row1 = mysqli_fetch_array($ketqua1)) { ?>
							<option <?php if($timtheloai == $row1['matl']) echo "selected='selected'" ?> value="<?php echo $row1['matl'] ?>"><?php echo $row1['tentl'] ?></option>
						<?php } ?>
					</select></td>
					<td style="padding-left: 20px;">Danh mục :</td>
						<td>
							<select name="danhmuc">
								<option value=""></option>
								<option <?php if($danhmuc=="MK"){ echo "selected = 'selected'" ;} ?> value="MK">Makeup</option>
								<option  <?php if($danhmuc=="SK"){ echo "selected = 'selected'" ;} ?> value="SK">Skincare</option>
							</select>
						</td>
						<td style="padding-left: 20px;">Thương hiệu :</td>
						<td>
							<select name="thuonghieu">
								<option value=""></option>
								<?php while($row2 = mysqli_fetch_array($ketqua2)) { ?>
							<option <?php if($thuonghieu == $row2['mathuonghieu']) echo "selected='selected'" ?>  value="<?php echo $row2['mathuonghieu'] ?>"><?php echo $row2['tenthuonghieu'] ?></option>
						<?php } ?>
							</select>
						</td>
						<td><input type="submit" name="btntimkiem" value="Tìm kiếm"/></td>
                        
				</tr>

			</table>
		</fieldset>
	</form>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                        <th>Mã</th>
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Thể loại</th>
			<th>Danh mục</th>
			<th>Mô tả</th>
			<th>Thương hiệu</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th>Sửa</th>
			<th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($ketqua)) { ?>
                        <tr>
                            <td><?php echo $row['ma'] ?></td>
                            <td><img src="../anhsanpham/<?php echo $row['hinhanh'];?>" width="150" height="150"/></td>
                            <td><?php echo $row['ten'] ?></td>
                            <td><?php echo $row['tentl'] ?></td>
                            <td><?php
				if($row['danhmuc']=='MK') {
					echo 'Makeup';
				} 
				if($row['danhmuc']=='SK') {
					echo 'Skincare' ;
				}
			 ?></td>
                            <td><?php echo $row['mota'] ?></td>
			<td><?php echo $row['tenthuonghieu'] ?></td>
			<td><?php echo $row['gia'] ?></td>
            <td><?php
				if($row['tinhtrang']==0){echo "Hết hàng";}
				if($row['tinhtrang']==1){echo "Còn hàng";}
				if($row['tinhtrang']==2){echo "Sắp về";}
			 ?></td>
			<td><a href="formthemsua.php?ma=<?php echo $row['ma']?>">Sửa</a></td>
			<td><a href="xoasanpham.php?ma=<?php echo $row['ma']?>" onClick="return confirm('Bạn có thật sự muốn xóa?');">Xóa</a></td>
                        </tr>
                  <?php } ?>
                  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>
</html>