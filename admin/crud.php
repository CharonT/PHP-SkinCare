<?php 
if(isset($_GET['error'])){
    echo "<script> alert('Chọn tối đa 3 bài viết !');</script>";
}
require_once "../logic/LogicCrud.php";
    
            $current_page=$_GET['page'];
			$limit=$_GET['limit'];	
			$offset=($current_page - 1)* $limit;
			$totalItems=mysqli_query($connect,"SELECT * FROM new");
			$totalItems=$totalItems->num_rows;
			$totalPages=ceil($totalItems/ $limit);
			$sql="SELECT * FROM new LIMIT ".$limit." OFFSET ".$offset;
			$query=mysqli_query($connect,$sql);

?>
  <div class="container">
        <div class="table-wrapper" style="width:1200px;">
            <form action="../logic/LogicCrud.php" method="post">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Thêm sửa xóa bài viết</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="addview.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Thêm bài viết</span></a>	 
                            <input type="submit" class="btn btn-success" value="Thêm bài viết hàng đầu" name="toppost">
                            <input name="attribute" value="1" hidden>	
                            
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-custom">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Tiêu đề</th>
                            <th>Ảnh đại diện</th>
                            <th style="text-align:center;">Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                while($row=mysqli_fetch_assoc($query)){?>
                        <tr>
                        
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="<?=$row['id']?>">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                        
                                    <td><?php echo $row['title'];?></td>
                                    <td><img src="<?php echo"../img/images/thumbnails/".$row['thumbnail'];?>" alt="Girl in a jacket" style="width:100px;height:100px;"></td>
                                    <td><?php echo $row['shortdescription'];?></td>
                                    
                        
            
                            <td>
                                <a href="editview.php?edit=<?php echo $row['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="crud.php?delete= <?php echo $row['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php }
                            ?>
                    
                    </tbody>
                </table>
            </form>
        <?php include "../inc/pagination.php"; ?>
        </div>
    </div>
	
                              		                            