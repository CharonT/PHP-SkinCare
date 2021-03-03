<?php 
    include '../lib/db.php';
    $current_page=$_GET['page'];
	$limit=$_GET['limit'];	
    $offset=($current_page - 1)* $limit;
    $search=$_GET['search'];
    if(strpos($search,'+')){
        $search=str_replace('+',' ',$search);
    }
    $sqlSearch="SELECT * FROM new WHERE title like '%$search%'";
	$resultSearch=mysqli_query($connect,$sqlSearch);
	$totalItems=$resultSearch->num_rows;
    $totalPages=ceil($totalItems/ $limit);
    $sqlSearchToWhile="SELECT * FROM new WHERE title like '%$search%'"." LIMIT $limit OFFSET $offset";
    $resultSearchToWhile=mysqli_query($connect, $sqlSearchToWhile);
    while($rowSearch = mysqli_fetch_assoc($resultSearchToWhile)){?>
            <div class="single-latest-post row align-items-center">
                <div class="col-lg-5 post-left">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="../img/images/thumbnails/<?=$rowSearch['thumbnail'];?>" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="../logic/LogicSave.php?newid=<?=$rowSearch['id'];?>">Lưu bài viết</a></li>
                    </ul>
                </div>
                <div class="col-lg-7 post-right">
                    <a href="./detail.php?newid=<?=$rowSearch['id']?>&userid=<?=$id?>">
                        <h4><?= $rowSearch['title'];?></h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span><?=$rowSearch['createdby'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$rowSearch['like_new'];?></a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span><?=$rowSearch['comment_count'];?></a></li>
                    </ul>
                    <p class="excert">
                        <?= $rowSearch["shortdescription"]; ?>
                    </p>
                </div>
            </div>
           <?php 
        }
      ?>