<?php
	//session_start();
			include "../lib/db.php";
			// if(isset($_GET['page'] , $_GET['limit'])){
			// $current_page=$_GET['page'];
			// $limit=$_GET['limit'];	
			// $offset=($current_page - 1)* $limit;
			// $totalItems=mysqli_query($connect,"SELECT * FROM new");
			// $totalItems=$totalItems->num_rows;
			// $totalPages=$totalItems/ $limit;
			// $sql="SELECT * FROM new LIMIT '$limit' OFFSET '$offset'";
			// $query=mysqli_query($connect,$sql);

			// }
			
			if(isset($_POST['submit'])){
			session_start();
			$title=mysqli_real_escape_string($connect,$_POST['title']);
			$likenew=0;
			$commentCount=0;
			$viewCount=0;
			$createdBy=$_SESSION['currUser'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$createdDate= date("d/m/Y");
			if(isset($_FILES['thumbnail'])){
			  $errors= array();
			 $thumbnail = $_FILES['thumbnail']['name'];
			  $file_tmp = $_FILES['thumbnail']['tmp_name'];
			   
			   
			  if(empty($errors)==true) {
				 move_uploaded_file($file_tmp,__DIR__."/../img/images/thumbnails/".$thumbnail);
				 echo "Success";
			  }else{
				 print_r($errors);
			  }
		   }
		   $ids=array();
		   		foreach ($_POST['color'] as $select)
				{
					$sqlCategory="SELECT id FROM category WHERE code='$select'";
					$resultCategory=mysqli_query($connect,$sqlCategory);
				
					while($rowCategory=mysqli_fetch_assoc($resultCategory)){
						array_push($ids,$rowCategory['id']);
						
					}
					
				}
			
						$shortdescription=mysqli_real_escape_string($connect,$_POST['shortdescription']);
						$content=mysqli_real_escape_string($connect,$_POST['content']);
						$sql="INSERT INTO new(title,thumbnail,shortdescription,content,createddate,createdby,like_new,comment_count,view_count,attributeid) VALUES(
						'$title','$thumbnail','$shortdescription','$content','$createdDate','$createdBy','$likenew','$commentCount','$viewCount',3)";
						$query=mysqli_query($connect,$sql);
					
						$newId=mysqli_insert_id($connect);
						
						foreach($ids as $id){
							$sqlCategoryNew="INSERT INTO category_new(categoryid,newid) VALUES('$id','$newId')";
							mysqli_query($connect,$sqlCategoryNew);	
						}
						$newURL='../admin/addview.php';
						header('Location: '.$newURL);
						
		}

		if(isset($_GET['delete'])){
			$id=$_GET['delete'];
			$sqlCheckCategoryNew="SELECT * FROM category_new WHERE newid = '$id'";
			$resultCheckCategoryNew=mysqli_query($connect,$sqlCheckCategoryNew);
			while($rowCategoryNew=mysqli_fetch_assoc($resultCheckCategoryNew)){
				mysqli_query($connect,"DELETE FROM category_new WHERE id =".$rowCategoryNew	['id']);

			}
			mysqli_query($connect,"DELETE FROM new WHERE id = '$id'");
			$_SESSION['message'] = "Xóa thành công";
			$_SESSION['msg_type'] = "danger";
			$newURL='../admin/crudview.php?page=1&limit=4';
			header('Location: '.$newURL);
		}

		if(isset($_GET['edit'])){
			$id=$_GET['edit'];
			$result=mysqli_query($connect,"SELECT * FROM new WHERE id = '$id'");
			$row = mysqli_fetch_assoc($result);
			if(isset($_POST['update'])){
			$id=$_GET['edit'];
			$title=mysqli_real_escape_string($connect,$_POST['title']);
			$content=mysqli_real_escape_string($connect,$_POST['content']);
			$shortdescription=mysqli_real_escape_string($connect,$_POST['shortdescription']);
			
			if(isset($_FILES['thumbnail'])){
			  $errors= array();
			$thumbnail = $_FILES['thumbnail']['name'];
			  $file_tmp = $_FILES['thumbnail']['tmp_name'];
			  $file_ext=strtolower(end(explode('.',$_FILES['thumbnail']['name'])));
			  if(empty($errors)==true) {
				 move_uploaded_file($file_tmp,__DIR__."/../img/images/thumbnails/".$thumbnail);
				
			  }else{
				
			  }
		   }
		   if(empty($thumbnail)){
			 $thumbnail=$row['thumbnail'];

		   }
		   		 $sqlUpdate="UPDATE new SET title = '$title',thumbnail ='$thumbnail',shortdescription = '$shortdescription',content ='$content' WHERE id = '$id'";
					mysqli_query($connect,$sqlUpdate);
				 	$_SESSION['message'] = "Cập nhật thành công";
					$_SESSION['msg_type'] = "danger";
		   			$newURL='../admin/crudview.php?page=1&limit=4';
					header('Location: '.$newURL);

			}
			
		}

		if(isset($_POST['toppost'])){
			$arrayIds=$_POST['options'];
			$sqlCheckAttribute="SELECT * FROM new WHERE attributeid = 1 ";
			$resultSqlCheckAttribute=mysqli_query($connect,$sqlCheckAttribute);
			$checkRowAttribute=mysqli_num_rows($resultSqlCheckAttribute);
			if((count($arrayIds)+$checkRowAttribute) > 3 ){
				$newUrl="../admin/crudview.php?page=1&limit=4&error=loi";
			}else{
				$idAttrib=$_POST['attribute'];
				$strIds=implode("','",$arrayIds);
				$sqlAttribute="UPDATE new SET attributeid = '$idAttrib' WHERE id IN ('$strIds')";				
				$resultAttribute=mysqli_query($connect,$sqlAttribute);		
				$newUrl="../admin/crudview.php?page=1&limit=4";
			}
			header("Location:".$newUrl);

		}
		


 ?>