<?php 
    include '../lib/db.php';
    $current_page=$_GET['page'];
	$limit=$_GET['limit'];	
    $offset=($current_page - 1)* $limit;
    if(isset($_SESSION['userid'])){
        $id=$_SESSION['userid'];
    }else {
        $id=-1;
    }
    if(isset($_GET['category'])){
    $category=$_GET['category'];
    $sqlCategory="SELECT id FROM category WHERE code = '$category'";
    $resultCategory=mysqli_query($connect,$sqlCategory);
    $rowCategory = mysqli_fetch_assoc($resultCategory);
    $sqlCategoryNew="SELECT newid FROM category_new WHERE categoryid = ". $rowCategory['id'];
	$resultCategoryNew=mysqli_query($connect,$sqlCategoryNew);
	$totalItems=$resultCategoryNew->num_rows;
    $totalPages=ceil($totalItems/ $limit);
    $sqlCategoryNewToWhile="SELECT newid FROM category_new WHERE categoryid = ". $rowCategory['id']." LIMIT $limit OFFSET $offset";
    $resultCategoryNewToWhile=mysqli_query($connect,$sqlCategoryNewToWhile);
    while($rowCategoryNew = mysqli_fetch_assoc($resultCategoryNewToWhile)){
            $sqlNew="SELECT * FROM new WHERE id = ".$rowCategoryNew['newid'];
            $resultNew=mysqli_query($connect,$sqlNew);
             $rowNew=mysqli_fetch_assoc($resultNew);?>
            <div class="single-latest-post row align-items-center">
                <div class="col-lg-5 post-left">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="../img/images/thumbnails/<?=$rowNew['thumbnail'];?>" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="../logic/LogicSave.php?newid=<?=$rowNew['id'];?>">Lưu bài viết</a></li>
                    </ul>
                </div>
                <div class="col-lg-7 post-right">
                    <a href="./detail.php?newid=<?=$rowNew['id']?>&userid=<?=$id?>">
                        <h4><?= $rowNew['title'];?></h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span><?=$rowNew['createdby'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$rowNew['like_new'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span><?=$rowNew['comment_count'];?></a></li>
                    </ul>
                    <p class="excert">
                        <?= $rowNew["shortdescription"]; ?>
                    </p>
                </div>
            </div>
           <?php 
        }
     } else if(isset($_GET['userid'])){
            $userId=$_GET['userid'];
            $sqlNewSave="SELECT newid FROM new_save WHERE userid = '$userId'";
            $resultNewSave=mysqli_query($connect,$sqlNewSave);
            $totalItems= $resultNewSave->num_rows;
            $totalPages=ceil($totalItems/ $limit);
            $sqlNewSaveToWhile="SELECT newid FROM new_save WHERE userid = '$userId'"." LIMIT $limit OFFSET $offset";
            $resultNewSaveToWhile=mysqli_query($connect,$sqlNewSaveToWhile);
            while($rowNewSave = mysqli_fetch_assoc($resultNewSaveToWhile)){
                $sqlNew="SELECT * FROM new WHERE id = ".$rowNewSave['newid'];
                $resultNew=mysqli_query($connect,$sqlNew);
                $rowNew=mysqli_fetch_assoc($resultNew);?>
                 <div class="single-latest-post row align-items-center">
                <div class="col-lg-5 post-left">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="../img/images/thumbnails/<?=$rowNew['thumbnail'];?>" alt="">
                    </div>
                </div>
                <div class="col-lg-7 post-right">
                    <a href="./detail.php?newid=<?=$rowNew['id']?>&userid=<?=$id?>">
                        <h4><?= $rowNew['title'];?></h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span><?=$rowNew['createdby'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$rowNew['createddate'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span><?=$rowNew['comment_count'];?></a></li>
                    </ul>
                    <p class="excert">
                        <?= $rowNew["shortdescription"]; ?>
                    </p>
                </div>
            </div>
<?php
            }
        }
?>
   
	
	
	