<?php
	include '../inc/web/header.php';
	include '../lib/db.php';
	include '../classes/NewDTO.php';
?>
		
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">Danh mục</h1>
								<p class="text-white link-nav"><a href="index.php">Trang Chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="#">Danh mục </a></p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<?php if(isset($_GET['search'])){ ?>
								<h6><span>Kết quả tìm kiếm</span> <a href="#"></a></h6>


							<?php }else{?>
								<h6><span>Bài viết mới</span>   <a href="#"></a></h6>
							<?php		
								}?>
							
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<?php if(isset($_GET['search'])){?>
								<h4 class="cat-title">Các bài viết được tìm thấy</h4>	

								<?php
									include '../web/search.php';
							}else{?>

									<h4 class="cat-title">Bản tin mới nhất</h4>	
										
								<?php include '../web/archivepost.php';
								}?>
													
								<?php 
								
								include '../inc/pagination.php';?>
								
							</div>
							<!-- End latest-post Area -->
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								<div class="single-sidebar-widget ads-widget">
									<img class="img-fluid" src="../img/sidebar/unnamed.jpg" alt="">
								</div>
								<?php include ('./suggestpost.php');?>
								<div class="single-sidebar-widget social-network-widget">
									<h6 class="title">Social Networks</h6>
									<ul class="social-list">
										<li class="d-flex justify-content-between align-items-center fb">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-facebook" aria-hidden="true"></i>
												<p>983 Likes</p>
											</div>
											<a href="#">Like our page</a>
										</li>
										<li class="d-flex justify-content-between align-items-center tw">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-twitter" aria-hidden="true"></i>
												<p>983 Followers</p>
											</div>
											<a href="#">Follow Us</a>
										</li>
										<li class="d-flex justify-content-between align-items-center yt">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-youtube-play" aria-hidden="true"></i>
												<p>983 Subscriber</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
										<li class="d-flex justify-content-between align-items-center rs">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-rss" aria-hidden="true"></i>
												<p>983 Subscribe</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>
			<?php 
		include '../inc/web/footer.php';
	?>