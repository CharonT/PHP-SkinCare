<?php
	if(isset($_GET['message'])){?>
	<script>
		var confirm=confirm("Bạn chưa đăng nhập.Bạn muốn đăng nhập không ? ");
		if(confirm){
			window.location.href = "../login.php";
		}else {
				window.location.href = "index.php";
		}

	</script>
<?php		
	}
	include '../inc/web/header.php';
	include '../lib/db.php';
	
	include '../classes/NewDTO.php';
	$sqlNew="SELECT * FROM new WHERE attributeid = 1";
	$resultNew=mysqli_query($connect,$sqlNew);
	$newArr=array();	
	while($rowNew=mysqli_fetch_assoc($resultNew)){
			$objNew =new NewDTO();
			$objNew->setId($rowNew['id']);
			$objNew->setTitle($rowNew['title']);	
			$objNew->setThumbnail($rowNew['thumbnail']);
			$objNew->setShortDescription($rowNew['shortdescription']);
			$objNew->setCreatedBy($rowNew['createdby']);
			$objNew->setComment($rowNew['comment_count']);
			$objNew->setLike($rowNew['like_new']);
			array_push($newArr,$objNew);
		}

?>
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row small-gutters">
						<div class="col-lg-8 top-post-left">
							<div class="feature-image-thumb relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="../img/images/thumbnails/<?=$newArr[0]->getThumbnail();?>" alt="">
								
							</div>
							<div class="top-post-details">	
								<a href="../web/detail.php?newid=<?=$newArr[0]->getId();?>&userid=<?=$id;?>">
									<h3><?=$newArr[0]->getTitle();?></h3>
								</a>
								<ul class="tags">
									<li><a href="../logic/LogicSave.php?newid=<?=$newArr[0]->getId();?>">Lưu bài viết</a></li>
								</ul>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span><?=$newArr[0]->getCreatedBy();?></a></li>
									<li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$newArr[0]->getLike();?></a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span><?=$newArr[0]->getComment();?></a></li>
								</ul>
							</div>
						</div>		
						<div class="col-lg-4 top-post-right">
							<div class="single-top-post">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="../img/images/thumbnails/<?=$newArr[1]->getThumbnail();?>" alt="">
								</div>
								<div class="top-post-details">
									
									<a href="../web/detail.php?newid=<?=$newArr[1]->getId();?>&userid=<?=$id;?>">
										<h4><?= $newArr[1]->getTitle();?></h4>
									</a>
									<ul class="tags">
										<li><a href="../logic/LogicSave.php?newid=<?=$newArr[1]->getId();?>">Lưu bài viết</a></li>
									</ul>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span><?=$newArr[1]->getCreatedBy();?></a></li>
										<li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$newArr[1]->getLike();?></a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span><?=$newArr[1]->getComment();?></a></li>
									</ul>
								</div>
							</div>
							<div class="single-top-post mt-10">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="../img/images/thumbnails/<?=$newArr[2]->getThumbnail();?>" alt="">
								</div>
								<div class="top-post-details">
									
									<a href="../web/detail.php?newid=<?=$newArr[2]->getId();?>&userid=<?=$id;?>">
										<h4><?= $newArr[2]->getTitle();?></h4>
									</a>
									<ul class="tags">
										<li><a href="../logic/LogicSave.php?newid=<?=$newArr[2]->getId();?>">Lưu bài viết</a></li>
									</ul>
									<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span><?=$newArr[2]->getCreatedBy();?></a></li>
									<li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$newArr[2]->getLike();?></a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span><?=$newArr[2]->getComment();?></a></li>
									</ul>
								</div>
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
								<h4 class="cat-title">Bài Viết Hôm Nay</h4>
								<?php include 'lastednew.php' ;?>
							</div>
							<!-- End latest-post Area -->
							
							<!-- Start banner-ads Area -->
							<div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
								
							</div>
							<!-- End banner-ads Area -->
							<!-- Start popular-post Area -->
							<?php include './popularpost.php';?>
							<!-- End popular-post Area -->
				
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">		
								<div class="single-sidebar-widget ads-widget">
									<img class="img-fluid" src="../img/sidebar/unnamed.jpg" alt="">
								</div>
								
								<?php include './suggestpost.php';?>
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