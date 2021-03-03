<?php 
include '../lib/db.php';
if($_GET['delete']){
   
    $idDelte=$_GET['delete'];
    $sqlAttribute="UPDATE new SET attributeid = 3 WHERE id = '$idDelte' ";
      $test=mysqli_query($connect,$sqlAttribute);
    
    $newUrl="../admin/toppostview.php";
    header("Location:".$newUrl);

}


?>