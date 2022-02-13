<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css1/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css1/style.css">

    <title>Đăng nhập</title>
	  <script>
	  function checkform(){
		  var tendangnhap = document.forms[0].txttendangnhap.value;
		  if(tendangnhap==''){
			  alert('Bạn phải nhập tên đăng nhập !');
			  document.forms[0].txttendangnhap.focus();
			  return; 
		  }
		  var matkhau = document.forms[0].txtmatkhau.value;
		  if(matkhau==''){
			  alert('Bạn phải nhập mật khẩu !');
			  document.forms[0].txtmatkhau.focus();
			  return;
		  }
		  document.forms[0].action ='xulydangnhap.php' ;
		  document.forms[0].submit();
	  }
	  </script>
	
	  </style>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Đăng nhập <strong>SkinFood</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username">Tên đăng nhập</label>
                  <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" id="txttendangnhap" name="txttendangnhap">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="txtmatkhau" name="txtmatkhau">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Lưu mật khẩu</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Quên mật khẩu</a></span>
					
                </div>

                <input type="Button" value="Đăng nhập" class="btn btn-block btn-primary" onClick="checkform()">
				  <br>
				<p align="center">Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js1/jquery-3.3.1.min.js"></script>
    <script src="js1/popper.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/main.js"></script>
  </body>
</html>