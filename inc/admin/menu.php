<?php 
		include("../../lib/db.php");
	$sql="select name from category";
	$query=mysqli_query($connect,$sql);
	while($row=mysqli_fetch_assoc($query)){
		echo '<i class="menu-icon fa fa-caret-right"></i>'.$row['name'];
	}


?>