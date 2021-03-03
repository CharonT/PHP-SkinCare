<?php
                	include("../lib/db.php");
					session_start();
					if(isset($_POST['submit'])){
						
						$username=mysqli_real_escape_string($connect,$_POST['username']);
						$password=mysqli_real_escape_string($connect,$_POST['password']);
						if($username!="admin"){
							$password=md5($password);
							}
						$sql="select * from user where username = '$username' and password='$password'";
						$query=mysqli_query($connect,$sql);
						$num_row=mysqli_num_rows($query);	
						if($num_row>0){
								while($row=mysqli_fetch_assoc($query)){
									$_SESSION['currUser']= $row["username"];
									$_SESSION['userid']= $row["id"];
									$userid=$row["id"];
									$sqlUserRole="select * from user_role where userid= '$userid'";
									$result=mysqli_query($connect,$sqlUserRole);
									break;
									}	
								while($rowUserRole=mysqli_fetch_assoc($result)){
									if($rowUserRole['roleid']==1){
										$_SESSION['currAdmin']=$rowUserRole["roleid"];
										$newURL='../admin/index.php';
									
									}else{
										$newURL='../web/index.php';
										
										
										
									}
									
									}
								
							}else {
								$newURL='../login.php?error=loi';

							}
							header('Location: '.$newURL);
						
					}
					
?>      