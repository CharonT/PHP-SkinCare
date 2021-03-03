<?php
    include '../lib/db.php';
    session_start();
    if(isset($_POST['comment'])){
	 $content=$_POST['textcomment'];
     $createdBy=$_SESSION['currUser'];
   
	 $date=date("d/m/Y");
	 $newId=$_POST['newId'];
    $userId=$_POST['userId'];
   	 $sqlComment="INSERT INTO comment(content,createdby,createddate) VALUES ('$content','$createdBy','$date')";
    $result=mysqli_query($connect,$sqlComment);
    $id=mysqli_insert_id($connect);
    $sqlNewComment="INSERT INTO new_comment (userid,newid,commentid) VALUE ('$userId','$newId','$id')";
	mysqli_query($connect,$sqlNewComment);
	$sqlGetCommentCount="SELECT comment_count FROM new WHERE id ='$newId'";
	$resultGetCommentCount=mysqli_query($connect,$sqlGetCommentCount);
	$rowGetCommentCount=mysqli_fetch_assoc($resultGetCommentCount);
	$commentCount=$rowGetCommentCount['comment_count']+1;
	$sqlUpdateNew="UPDATE new SET comment_count = '$commentCount' WHERE id = '$newId'";
    mysqli_query($connect,$sqlUpdateNew);
    $url=$_POST['url'];
    header("location:".$url);
	}

 ?>