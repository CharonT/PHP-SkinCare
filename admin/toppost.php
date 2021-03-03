<?php 
include '../lib/db.php';
			$sql="SELECT * FROM new WHERE attributeid = 1";
			$query=mysqli_query($connect,$sql);

?>
  <div class="container">
        <div class="table-wrapper" style="width:1200px;">
           
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Các bài viết hàng đầu</b></h2>
                        </div>
                        <div class="col-sm-6">
                             <a href="crudview.php?page=1&limit=4" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Thêm bài viết hàng đầu</span></a>	 
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
                                <a href="../logic/LogicTopPost.php?delete=<?php echo $row['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php }
                            ?>
                    
                    </tbody>
                </table>
        </div>
    </div>
	
                              		                            