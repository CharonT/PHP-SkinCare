<?php 
	include '../lib/db.php';
    $newId=$_GET['newid'];
	$sqlNew="SELECT * FROM new WHERE id =".$_GET['newid'];
	$resultNew=mysqli_query($connect,$sqlNew);
	$row=mysqli_fetch_assoc($resultNew);
	$newView=$row['view_count']+1;
	$sqlUpdate="UPDATE new SET view_count = '$newView' WHERE id = '$newId'";
	$resultUpdateNew=mysqli_query($connect,$sqlUpdate);
    $sqlCategoryNew="SELECT categoryid FROM category_new WHERE newid ='$newId'";
	$resultCategoryNew=mysqli_query($connect,$sqlCategoryNew);
	$userId=$_GET['userid'];
	?>
	
   <div class="single-post-wrap">
        <div class="feature-img-thumb relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="../img/images/thumbnails/<?=$row['thumbnail'];?>" alt="">
        </div> 
        <div class="content-wrap">
            <ul class="tags mt-10">
<?php
    while($rowCategoryNew=mysqli_fetch_assoc($resultCategoryNew)){
         $sqlCategory="SELECT * FROM category WHERE id = ".$rowCategoryNew['categoryid'];
         $resultCategory=mysqli_query($connect,$sqlCategory);
         $rowCategory=mysqli_fetch_assoc($resultCategory);?>
         <li><a href="../web/archive.php?category=<?=$rowCategory['code']?>&page=1&limit=4"><?=$rowCategory['name']?></a></li>

<?php        
    }
?>
             </ul>
                <a href="#">
                    <h3><?= $row['title'];?></h3>
                </a>
                <ul class="meta pb-20">
                    <li><a href="#"><span class="lnr lnr-user"></span><?= $row['createdby'];?></a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= $row['createddate'];?></a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span><?= $row['comment_count']; ?> comments</a></li>
                </ul>
    <?= $row['content'];?>
    </div>
    	<div class="navigation-wrap justify-content-between d-flex">
									<!-- <a class="prev" href="#" disabled><span class="lnr lnr-arrow-left"></span>Trước</a> -->
									<button class="prev" disabled><span class="lnr lnr-arrow-left"></span>Trước</button>
									<?php if($userId == -1) 
									{?>
										<button class="prev btn btn-secondary" type="button" disabled><span class="lnr lnr-thumbs-up"></span>Thích bài viết</button>

									<?php 	
									}else{
										$sqlNewLike="SELECT * FROM new_like WHERE newid = ' $newId' AND userid = '$userId'";
										$resultNewLike=mysqli_query($connect,$sqlNewLike);
										$rowCheck=mysqli_num_rows($resultNewLike);
										if($rowCheck > 0){?>
										<button class="prev btn btn-success" type="button"><span class="lnr lnr-checkmark-circle"></span>Đã thích</button>
									<?php
										}else {?>
										<button class="prev btn btn-primary" type="button" name="like" onclick="handleClick()"><span class="lnr lnr-thumbs-up"></span>Thích bài viết</button>

									<?php
										}
									}
									?>
									<!-- <a  href="#" disabled>Sau<span class="lnr lnr-arrow-right"></span></a> -->
									<button class="next" disabled>Sau<span class="lnr lnr-arrow-right"></span></button>
								</div>
								<div class="comment-form">
								<h4>Bình Luận</h4>
								<form action="../logic/LogicComment.php" method="post">
									<div class="form-group">
										<textarea name="textcomment" class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
									</div>
									<?php
									 $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    								$req_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
									?>
									<input type="hidden" id="custId" name="newId" value="<?=$newId?>">
									<input type="hidden" id="custNew" name="userId" value="<?=$_GET['userid']?>">
									<input type="hidden" id="custUrl" name="url" value="<?=$req_url?>">
									<?php 
										if($userId !=-1){
											?>
											<input class="primary-btn text-uppercase" type="submit" value="Bình Luận" name="comment" >

											<?php
										}else{?>
											<input  type="submit" value="Bình Luận" name="comment" disabled>
											<?php
										}
									?>
								</form>
							</div>
							<?php include './commentshow.php';?>

<script>
	function handleClick(){
		var htmlString="<?php 
							$sqlCheckLikeNew="SELECT * FROM new_like WHERE newid = '$newId' AND userid = '$userId'";
							$resultCheckLikeNew=mysqli_query($connect,$sqlCheckLikeNew);
							$checkRowNumber=mysqli_num_rows($resultCheckLikeNew);
							echo "";
							if($checkRowNumber == 0){					
								$sqlInsertNewLike="INSERT INTO new_like(newid,userid) VALUES ('$newId','$userId')";
								$sqlLikeCount="SELECT like_new FROM new WHERE id = '$newId'";
								$resultLikeCount =mysqli_query($connect,$sqlLikeCount);
								$row=mysqli_fetch_assoc($resultLikeCount);
								$likeCount=$row['like_new'] + 1;
								$sqlUpdateProduct="UPDATE new SET like_new = '$likeCount' WHERE id = '$newId'";
								mysqli_query($connect,$sqlUpdateProduct);
								mysqli_query($connect,$sqlInsertNewLike);
								echo "Bạn đã thích bài viết";
							}else{
								echo "  ";
							}
						?>";
	alert(htmlString);
	delete htmlString;	
}

</script>
