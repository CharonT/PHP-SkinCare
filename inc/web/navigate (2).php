<?php 
	include '../lib/db.php';
	require_once('../classes/CategoryDTO.php');
	$sqlCategory="SELECT * FROM category";
	$resultCategory=mysqli_query($connect,$sqlCategory);
	$categoryArr=array();
	while($rowCategory=mysqli_fetch_assoc($resultCategory)){
			$objCategory=new CategoryDTO();
			$objCategory->setId($rowCategory['id']);
			$objCategory->setName($rowCategory['name']);
			$objCategory->setCode($rowCategory['code']);
			array_push($categoryArr,$objCategory);
		}
?>
<nav id="nav-menu-container">
	<ul class="nav-menu">
		<li class="menu-active"><a href="../web/index.php">Trang chủ</a></li>
	<?php foreach($categoryArr as $category){ ?>
	<li><a href="../web/archive.php?category=<?=$category->getCode();?>&page=1&limit=4"><?=$category->getName();?></a></li>
<?php } ?>
	</ul>
</nav><!-- #nav-menu-container -->