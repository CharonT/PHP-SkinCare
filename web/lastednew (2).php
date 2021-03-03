<?php
    include '../lib/db.php';
    $count=0;
    $sqlNew="SELECT * FROM new";
	$resultNew=mysqli_query($connect,$sqlNew);
    $newArr=array();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $mydate=date("d/m/Y");
	while($rowNew=mysqli_fetch_assoc($resultNew)){
           
			// $objNew =new NewDTO();
			// $objNew->setId($rowNew['id']);
			// $objNew->setTitle($rowNew['title']);
			// $objNew->setThumbnail($rowNew['thumbnail']);
			// $objNew->setShortDescription($rowNew['shortdescription']);
            // array_push($newArr,$objNew);
            if(strcmp($rowNew['createddate'],$mydate)==0){      
                 $count++;
                 
                ?>
             <div class="single-latest-post row align-items-center">
                <div class="col-lg-5 post-left">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="../img/images/thumbnails/<?=$rowNew['thumbnail'];?>" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="../logic/LogicSave.php?newid=<?=$rowNew['id']?>">Lưu bài viết</a></li>
                    </ul>
                </div>
                <div class="col-lg-7 post-right">
                    <a href="../web/detail.php?newid=<?=$rowNew['id'];?>&userid=<?=$id;?>">
                        <h4><?= $rowNew['title']; ?></h4>
                    </a>
                    <ul class="meta">
                        	<li><a href="#"><span class="lnr lnr-user"></span><?=$rowNew['createdby'];?></a></li>
							<li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$rowNew['like_new'];?></a></li>
							<li><a href="#"><span class="lnr lnr-bubble"></span><?=$rowNew['comment_count'];?></a></li>
                    </ul>
                    <p class="excert">
                        <?= $rowNew['shortdescription'];?>
                    </p>
                </div>
            </div>
<?php         
            }
            if($count==4){
                ?>
                <div class="load-more">
					<a href="#" class="primary-btn">Xem thêm</a>
				</div>
<?php
                break;
                }
            
        }
?>
                               