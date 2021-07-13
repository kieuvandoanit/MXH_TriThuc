<div class="add_post">
    <h2>Thêm bài viết mới</h2>
    <br>
    
    <form enctype="multipart/form-data" action="<?php echo HEADERLINK.'/post/handleAddPost'; ?>" class="form_add_post" method="POST">
      <div class="form-group">
        <label for="post_title">Tiêu đề bài viết</label><br>
        <input type="text" name="postTitle" id="post_title" class="form-control" required placeholder="Tiêu đề bài viết">
      </div>
      <div class="form-group">
        <label for="post_thumb">Hình ảnh bài viết</label><br>
        <!-- <input type="text" name="postThumb" id="post_thumb" class="form-control" required placeholder="Hình ảnh bài viết"> -->
        <input type="file" name="file" id="upload_file" class="form-control"/>
      </div>
      <div class="form-group">
        <label for="post_hashtag">HashTag</label><br>
        <input type="text" name="postHashtag" id="post_hashtag" class="form-control" required placeholder="Hashtag bài viết">
      </div>
      <div class="form-group">
        <label for="post_content">Nội dung bài viết</label><br>
        <textarea class="form-control" rows="15" name="postContent" id="post_content"  placeholder="Nội dung bài viết" ></textarea>
      </div>
      <div class="form-group">
        <label for="post_category">Danh mục bài viết</label><br>
        <select name="postCategory" id="post_category" class="form-control" required>
          <option value="">==Chọn danh mục bài viết==</option>
          <?php  
          foreach($data['category'] as $category){
            ?>
            <option value="<?php echo $category['Category_id'] ?>"><?php echo $category['CategoryName'] ?></option>
            <?php  
          }
          ?>
          
          
        </select>
      </div>
      <div class="form-group">
        <a href=""><button class="btn btn-warning">Quay lại</button></a>
        <!-- <input type="submit" class="btn btn-primary" name ="btn_addPost" value="Thêm bài viết"> -->
        <button name="btn_addPost" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm bài viết</button>
      </div>
      
    </form>
  </div>
  <script>
    tinymce.init({
    selector: 'textarea',
    height: 300,
    plugins:'paste image link autolink lists table media',
    menubar: false,
    toolbar: [
    'undo redo | fontselect fontsizeselect | bold italic underline strikethrough | numlist bullist alignleft aligncenter alignright | forecolor  backcolor | table link image media'
    ],
    fontsize_formats: '10pt 12pt 14pt 16pt 18pt 24pt 36pt',
    // elementpath: false,
    placeholder: 'writing description here...',
    });
</script>