<?php 
    require_once "../logic/LogicCrud.php";
?>
<div class="container form-custom">
<form action="../logic/LogicCrud.php?edit=<?php echo $id;?>" method="post" enctype = "multipart/form-data">
  <div class="form-group">
    <label for="exampleInputTitle"><h3>Title</h3></label>
    <input name="title" type="text" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp" value="<?php echo $row["title"]?>">
  </div>
  <div class="form-group">
    <label for="exampleInputImage"><h3>Thumbnail</h3></label>
    <input name="thumbnail" type="file" class="form-control" id="exampleInputImage" value="test">
  </input>
     
  </div>
   <div class="form-group">
    <label for="exampleInputShort"><h3>Short Description</h3></label>
    <textarea name="shortdescription" id="shortdescription" class="form-control" ><?php echo $row["shortdescription"] ?></textarea>
  </div>
   <div class="form-group">
    <label for="exampleInputContent"><h3>Content</h3></label>
    <textarea name="content" id="content" class="form-control" ><?php echo $row["content"] ?></textarea>
    <script language="javascript">
      CKEDITOR.replace("content");


    </script>
  </div>
  
 <button type="submit" class="btn btn-primary" name="update">Cập nhật</button>
</form> 
</div>