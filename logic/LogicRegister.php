<?php
                	include("../lib/db.php");
					if(isset($_POST['submit'])){
						$username=mysqli_real_escape_string($connect,$_POST['username']);
						$password=mysqli_real_escape_string($connect,$_POST['password']);
						$password=md5($password);
						$email=	mysqli_real_escape_string($connect,$_POST['email']);
						$sqlCheckRegister = "SELECT * FROM user u INNER JOIN user_role ur ON u.id=ur.userid INNER JOIN role r ON r.id=ur.roleid WHERE r.id = 2 AND (u.username= '$username' OR u.email='$email')";
						$resultCheck=mysqli_query($connect,$sqlCheckRegister);
						
						$checkNumRow=mysqli_num_rows($resultCheck);
					
						if($checkNumRow > 0 ){
							$newURL='../register.php?message=error';

						}else{
						$sql="INSERT INTO user(username,password,email) VALUES(
						'$username','$password','$email')";
						
						$query=mysqli_query($connect,$sql);
						$newURL='../login.php?message=success';
						if($query)
							{
							echo "Success";
							$selectSql= "select id from user where username = '$username'";
							$result=mysqli_query($connect,$selectSql);
							if (mysqli_num_rows($result) > 0) {
 							 while($row = mysqli_fetch_assoc($result)) {
								 $idUser=$row["id"];
								 $sqlUserRole="INSERT INTO user_role(userid,roleid) VALUES(
									 $idUser,2)";
								 $query=mysqli_query($connect,$sqlUserRole);
 								 }
							
							
							} else {
 								 echo "0 results";
							}
								
							}else{
								echo "Error";
							
							}

						}
						header('Location: '.$newURL);
						
					}
?>      