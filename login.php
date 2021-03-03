<?php if(isset($_GET['message'])){
	echo "<script> alert('Đăng kí thành công'); </script>";

}?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./template/login.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng Nhập</h3>
				<div class="d-flex justify-content-end social_icon">
					
				</div>
			</div>
			<div class="card-body">
				<form action="./logic/LogicLogin.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Tài Khoản" name="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
					</div>
					<div class="row align-items-center remember">

					</div>
					<div class="form-group">
						<input type="submit" value="Đăng Nhập" class="btn float-right login_btn" name="submit">
					</div>
					<?php if(isset($_GET['error'])){?>

				
					<div class="form-group alert alert-danger" role="alert" style="transform:translateY(33px);">
						Sai tài khoản hoặc mật khẩu
					</div>
				<?php		}
					?>
				</form>
				<a href="./web/index.php" style="color:whitesmoke;">Quay lại trang chủ</a>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Chưa Có Tài Khoản?<a href="./register.php">Đăng Ký</a>
				</div>
				<div class="d-flex justify-content-center">
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>