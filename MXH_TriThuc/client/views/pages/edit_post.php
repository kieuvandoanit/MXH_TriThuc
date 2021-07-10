<div class="add_post">
    <h2>Chỉnh sửa bài viết</h2>
    <br>
    <form action="<?php echo HEADERLINK.'/post/handleEditPost/'.$data['post'][0]['Post_id']; ?>" class="form_add_post" method="POST">
      <div class="form-group">
        <label for="post_title">Tiêu đề bài viết</label><br>
        <input type="text" name="postTitle" id="post_title" value="<?php echo $data['post'][0]['Title']; ?>" class="form-control" required placeholder="Tiêu đề bài viết">
      </div>
      <div class="form-group">
        <label for="post_thumb">Hình ảnh bài viết</label><br>
        <input type="text" name="postThumb" id="post_thumb" value="<?php echo $data['post'][0]['thumb']; ?>" class="form-control" required placeholder="Hình ảnh bài viết">
      </div>
      <div class="form-group">
        <label for="post_hashtag">HashTag</label><br>
        <input type="text" name="postHashtag" id="post_hashtag" value="<?php echo $data['post'][0]['HashTag']; ?>" class="form-control" required placeholder="Hashtag bài viết">
      </div>
      <div class="form-group">
        <label for="post_content">Nội dung bài viết</label><br>
        <textarea class="form-control" rows="15" name="postContent" value="<?php echo $data['post'][0]['Content']; ?>" id="post_content" required placeholder="Nội dung bài viết"><?php echo $data['post'][0]['Content']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="post_category">Danh mục bài viết</label><br>
        <select name="postCategory" id="post_category" class="form-control" required>
          <option value="">==Chọn danh mục bài viết==</option>
          <?php  
          foreach($data['category'] as $category){
            ?>
            <option value="<?php echo $category['Category_id'] ?>" <?php if($category['Category_id'] == $data['post'][0]['Category_id']){echo 'selected';} ?>><?php echo $category['CategoryName'] ?></option>
            <?php  
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <a href=""><button class="btn btn-warning">Quay lại</button></a>
        <input type="submit" class="btn btn-primary" name ="btn_editPost" value="Sửa bài viết">
      </div>
      
    </form>
  </div>