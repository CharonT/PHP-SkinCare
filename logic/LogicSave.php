<?php 
    include '../lib/db.php';
    session_start();
    $username=$_SESSION['currUser'];
    $newid=$_GET['newid'];
    $sqlUser="SELECT id FROM user WHERE username = '$username'";
    $result=mysqli_query($connect,$sqlUser);
    $checkRow=mysqli_num_rows($result);
    if($checkRow==0){
    $newUr="../web/index.php?message=save";

    }else{
    $row=mysqli_fetch_assoc($result);
    $userid=$row['id'];
    $sqlSaveNew="INSERT INTO new_save(userid,newid) VALUES ('$userid','$newid')";
    $resultSaveNew=mysqli_query($connect,$sqlSaveNew);
    $newUr="../web/index.php";

    }
    
    header("Location:".$newUr);



?>