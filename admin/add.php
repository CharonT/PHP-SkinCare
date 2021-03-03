<?php include "../lib/db.php" ;
$sql ="SELECT * FROM category";
$result=mysqli_query($connect,$sql);
?>
<div class="container form-custom">
<form action="../logic/LogicCrud.php" method="post" enctype = "multipart/form-data">
  <div class="form-group">
    <label for="exampleInputTitle"><h3>Title</h3></label>
    <input name="title" type="text" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp" placeholder="Tiêu đề">
  </div>
  <div class="form-group">
    <label for="exampleInputImage"><h3>Thumbnail</h3></label>
    <input name="thumbnail" type="file" class="form-control" id="exampleInputImage" placeholder="Hình ảnh đại diện">
   
  </div>
  <div class="form-group">
   <label for="sel1">Chọn thể loại bài viết (Giữ nút shift để chọn)</label>
  <select name="color[]" multiple class="form-control" id="sel2">
        <?php while($row=mysqli_fetch_assoc($result)){?>
        <option value="<?= $row['code'];?>"><?= $row['name']?></option>
        <?php }?>
      </select>
  </div>
   <div class="form-group .boostrap">
    <label for="exampleInputShort"><h3>Short Description</h3></label>
    <textarea name="shortdescription" id="shortdescription" class="form-control" placeholder="Mô tả ngắn"></textarea>
  </>
   <div class="form-group">
    <label for="exampleInputContent"><h3>Content</h3></label>
    <textarea name="content" id="content" class="form-control" ></textarea>
    <script language="javascript">
      CKEDITOR.replace("content");


    </script>
  </div>
  
 <button type="submit" class="btn btn-primary" name="submit">Thêm bài viết</button>
</form> 
</div>
