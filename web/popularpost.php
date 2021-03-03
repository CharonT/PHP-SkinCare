<?php 
    $sqlPopular="SELECT * FROM new ORDER BY view_count DESC LIMIT 3";
    $resultPopular=mysqli_query($connect,$sqlPopular);
    $listPost=array();
    while($rowPopular=mysqli_fetch_assoc($resultPopular)){
        $objNew1 =new NewDTO();
        $objNew1->setId($rowPopular['id']);
        $objNew1->setTitle($rowPopular['title']);
        $objNew1->setThumbnail($rowPopular['thumbnail']);
        $objNew1->setShortDescription($rowPopular['shortdescription']);
        $objNew1->setCreatedBy($rowPopular['createdby']);
        $objNew1->setComment($rowPopular['comment_count']);
        $objNew1->setLike($rowPopular['like_new']);
        array_push($listPost,$objNew1);

    }
?>
<div class="popular-post-wrap">
    <h4 class="title">Bài viết phổ biến</h4>
    <div class="feature-post relative">
        <div class="feature-img relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="../img/images/thumbnails/<?=$listPost[0]->getThumbnail();?>" alt="">
        </div>
        <div class="details">
            <ul class="tags">
                <li><a href="../logic/LogicSave.php?newid=<?=$listPost[0]->getId();?>">Lưu bài viết</a></li>
            </ul>
            <a href="../web/detail.php?newid=<?=$listPost[0]->getId();?>&userid=<?=$id;?>">
                <h3><?= $listPost[0]->getTitle();?></h3>
            </a>
            <ul class="meta">
               <li><a href="#"><span class="lnr lnr-user"></span><?=$listPost[0]->getCreatedBy();?></a></li>
                <li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$listPost[0]->getLike();?></a></li>
                <li><a href="#"><span class="lnr lnr-bubble"></span><?=$listPost[0]->getComment();?></a></li>
            </ul>
        </div>
    </div>
    <div class="row mt-20 medium-gutters">
    <?php for ($i = 1; $i < 3; $i++) { ?>
        <div class="col-lg-6 single-popular-post">
            <div class="feature-img-wrap relative">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="../img/images/thumbnails/<?=$listPost[$i]->getThumbnail();?>" alt="">
                </div>
                 <ul class="tags">
                    <li><a href="../logic/LogicSave.php?newid=<?=$listPost[$i]->getId();?>">Lưu bài viết</a></li>
                </ul>
            </div>
            <div class="details">
                <a href="../web/detail.php?newid=<?=$listPost[$i]->getId();?>&userid=<?=$id;?>">
                    <h4><?= $listPost[$i]->getTitle();?></h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span><?=$listPost[$i]->getCreatedBy();?></a></li>
                    <li><a href="#"><span class="lnr lnr-thumbs-up"></span><?=$listPost[$i]->getLike();?></a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span><?=$listPost[$i]->getComment();?></a></li>
                 </ul>
                <p class="excert">
                    <?= $listPost[$i]->getShortDes();?>
                </p>
            </div>
        </div>
    <?php }?>
    </div>
</div>