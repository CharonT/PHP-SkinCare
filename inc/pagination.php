        
  <?php 
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
    $arrString= explode("&",$escaped_url);
    if(strpos($escaped_url,"category")==false && strpos($escaped_url,"userid")==false&& strpos($escaped_url,"search")==false){?>
 <div class="clearfix">
                <div class="hint-text">Hiển thị trang <b><?= $current_page ?></b> trên tổng số trang <b><?= $totalPages?></b></div>
                <ul class="pagination">
    <?php 
        if($current_page > 3){
            $first_page=1;
    ?>
    <li class="page-item"><a href="?limit= <?= $limit ?>&page=<?=$first_page?>" class="page-link">First</a></li>
<?php
    }
    if($current_page >1){
        $prev_page=$current_page-1;
?>
<li class="page-item"><a href="?limit= <?= $limit ?>&page=<?=$prev_page?>" class="page-link">Previous</a></li>
<?php
    }
?>
<?php for($num=1;$num<=$totalPages;$num++){ ?>
    <?php if($num!=$current_page){ ?>
    <?php if($num >= $current_page-3 && $num <= $current_page +3){ ?>
    <li class="page-item"><a href="?limit= <?= $limit ?>&page=<?=$num?>" class="page-link"><?=$num ?></a></li>
    <?php } ?>
    <?php } else { ?>
        <li class="page-item active"><a href="?limit= <?= $limit ?>&page=<?=$num?>" class="page-link"><?=$num ?></a></li>
    <?php } ?>
<?php } ?>
<?php 
    if($current_page<$totalPages-1){
        $next_page=$current_page + 1 ; ?>
        <li class="page-item"><a href="?limit= <?= $limit ?>&page=<?= $next_page?>" class="page-link">Next</a></li>

  <?php  } ?>
<?php 
    if($current_page < $totalPages -3 ){
        $endPage=$totalPages;
        ?>
         <li class="page-item"><a href="?limit= <?= $limit ?>&page=<?=$endPage?>" class="page-link">Last</a></li>   
   <?php }
?>
    </ul>
            </div>



<?php
    }else {
         $queryString= explode("?",$arrString[0]);

        ?>
 <div class="clearfix">
                <div class="hint-text">Hiển thị trang <b><?= $current_page ?></b> trên tổng số trang <b><?= $totalPages?></b></div>
                <ul class="pagination">
    <?php 
        if($current_page > 3){
            $first_page=1;
    ?>
    <li class="page-item"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?=$first_page?>" class="page-link">First</a></li>
<?php
    }
    if($current_page >1){
        $prev_page=$current_page-1;
?>
<li class="page-item"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?=$prev_page?>" class="page-link">Previous</a></li>
<?php
    }
?>
<?php for($num=1;$num<=$totalPages;$num++){ ?>
    <?php if($num!=$current_page){ ?>
    <?php if($num >= $current_page-3 && $num <= $current_page +3){ ?>
    <li class="page-item"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?=$num?>" class="page-link"><?=$num ?></a></li>
    <?php } ?>
    <?php } else { ?>
        <li class="page-item active"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?=$num?>" class="page-link"><?=$num ?></a></li>
    <?php } ?>
<?php } ?>
<?php 
    if($current_page<$totalPages-1){
        $next_page=$current_page + 1 ; ?>
        <li class="page-item"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?= $next_page?>" class="page-link">Next</a></li>

  <?php  } ?>
<?php 
    if($current_page < $totalPages -3 ){
        $endPage=$totalPages;
        ?>
         <li class="page-item"><a href="?<?=$queryString[1]?>&limit= <?= $limit ?>&page=<?=$endPage?>" class="page-link">Last</a></li>   
   <?php }
?>
    </ul>
            </div>



<?php
    }
  ?>    
       

