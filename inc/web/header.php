<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Tạp chí làm đẹp</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="../template/web/css/linearicons.css">
		<link rel="stylesheet" href="../template/web/css/font-awesome.min.css">
		<link rel="stylesheet" href="../template/web/css/bootstrap.css">
		<link rel="stylesheet" href="../template/web/css/magnific-popup.css">
		<link rel="stylesheet" href="../template/web/css/nice-select.css">
		<link rel="stylesheet" href="../template/web/css/animate.min.css">
		<link rel="stylesheet" href="../template/web/css/owl.carousel.css">
		<link rel="stylesheet" href="../template/web/css/jquery-ui.css">
		<link rel="stylesheet" href="../template/web/css/main.css">
		<link rel="stylesheet" href="../template/web/css/crud.css">
	</head>
	<body>
		<header>
			
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
							<a href="../web/index.php"><h2  style="color:whitesmoke;font-size:80px; font-family:'Amatic SC', cursive;">SKIN CARE</h2></a>
						<ul>
								
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
							<ul>
                            <?php 
							session_start();
							if(isset($_SESSION['userid'])){
								$id=$_SESSION['userid'];

							}else{
								$id=-1;
							}
							if(!isset($_SESSION['currUser']))
							{ ?>
								<li><a href="../login.php"><p style="font-size:30px">Đăng Nhập</p></a></li>   
                                
							<?php }else {
									?>
									<div class="dropdown">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									   <?php echo "Xin Chào : " . $_SESSION["currUser"];
									   ?>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Xem thông tin chi tiết</a>
                                        <a class="dropdown-item" href="../web/savenew.php?userid=<?=$_SESSION['userid']?>&page=1&limit=4">Bài viết đã lưu</a>
                                        <a class="dropdown-item" href="../logic/logout.php">Thoát</a>
                                      </div>
                                    </div>
                                    <?php 
 									}
							?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="logo-wrap">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
							<a href="../web/index.php">
								<img class="img-fluid" src="" alt="">
							</a>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
							<img class="img-fluid" src="" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="container main-menu" id="main-menu">
				<div class="row align-items-center justify-content-between">
					<!-- <nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="menu-active"><a href="../web/index.php">Trang chủ</a></li>
							<li><a href="../web/archive.php">Làm Trắng Da</a></li>
							<li><a href="../web/archive.php">Làm Trắng da toàn thân</a></li>
							<li class="menu-has-children"><a href="../web/category.php">Làm Trắng da toàn thân</a>
							<ul>
								<li><a href="../web/standard-post.php"></a></li>
								<li><a href="../web/image-post.php"></a></li>
								<li><a href="../web/gallery-post.php"></a></li>
								<li><a href="../web/video-post.php"></a></li>
								<li><a href="../web/audio-post.php"></a></li>
							</ul> 
						</li>
						<li><a href="../web/archive.php">Tấm trắng</a></li>
						<li><a href="../web/archive.php">Kinh Nghiệm Làm Đẹp</a></li>
					</ul>
					</nav> --> 
					<!-- #nav-menu-container -->
					<?php include 'navigate.php';?>
					<!-- <div class="navbar-right">
						<form class="Search">
							<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
							<label for="Search-box" class="Search-box-label">
								<span class="lnr lnr-magnifier"></span>
							</label>
							<span class="Search-close">
								<span class="lnr lnr-cross"></span>
							</span>
						</form>
					</div> -->
					<form class="Search Search-custom" method="post">
							<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
							<label for="Search-box" class="Search-box-label">
								<span class="lnr lnr-magnifier"></span>
							</label>
							<span class="Search-close">
								<span class="lnr lnr-cross"></span>
							</span>
							<input type="submit" name="search" class="search-submit" value="Search">	 

						</form>
				</div>
			</div>
		</header>
<?php if(isset($_POST['search'])) {
		$search=$_POST['Search-box'];
		if(strpos($search,' ')){
			$search = str_replace(' ', '+', $search);
			

		}
	 	$url="../web/archive.php?search=".$search."&page=1&limit=4";
	// $url='../web/archive.php';
	//	header('Location: '.$url);
	echo("<script>location.href = '".$url."'</script>");
		
	
}?>