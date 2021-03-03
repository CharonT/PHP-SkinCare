<?php 
    $sqlSuggest="SELECT * FROM new";
    $resultSuggest=mysqli_query($connect,$sqlSuggest);
    $listSuggest=array();
    $countPost=0;
    $arrayCheck=array();
    while($rowSuggest=mysqli_fetch_assoc($resultSuggest)){
        $objNew1 =new NewDTO();
        $objNew1->setId($rowSuggest['id']);
        $objNew1->setTitle($rowSuggest['title']);
        $objNew1->setThumbnail($rowSuggest['thumbnail']);
        $objNew1->setShortDescription($rowSuggest['shortdescription']);
        $objNew1->setCreatedBy($rowSuggest['createdby']);
        $objNew1->setComment($rowSuggest['comment_count']);
        $objNew1->setLike($rowSuggest['like_new']);
        $objNew1->setCreatedDate($rowSuggest['createddate']);
        array_push($listSuggest,$objNew1);

    }?>
    <div class="single-sidebar-widget most-popular-widget">
        <h6 class="title">Bài viết gợi ý</h6>

<?php
    while(true){     
            $index=rand(0,count($listSuggest)-1);  
            if(in_array($index,$arrayCheck)){
                continue;

            }else{
    ?>
    <div class="single-list flex-row d-flex">
        <div class="thumb">
            <img src="../img/images/thumbnails/<?=$listSuggest[$index]->getThumbnail();?>" alt="" width="150">
        </div>
        <div class="details">
            <a href="../web/detail.php?newid=<?=$listSuggest[$index]->getId();?>&userid=<?=$id;?>">
                <h6><?= $listSuggest[$index]->getTitle();?></h6>
            </a>
            <ul class="meta">
                <li><a href="#"><span class="lnr lnr-calendar-full"></span><?=$listSuggest[$index]->getCreatedDate();?></a></li>
                <li><a href="#"><span class="lnr lnr-bubble"></span><?=$listSuggest[$index]->getComment();?></a></li>
            </ul>
        </div>
    </div>
<?php
        $countPost++;
        array_push($arrayCheck,$index);
        if($countPost == 7){
            $countPost=0;
            break;
        }
    }
}
?>
</div>
    
