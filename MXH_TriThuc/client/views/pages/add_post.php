<div class="add_post">
    <h2>Thêm bài viết mới</h2>
    <br>
    <form action="<?php echo HEADERLINK.'/post/handleAddPost'; ?>" class="form_add_post" method="POST">
      <div class="form-group">
        <label for="post_title">Tiêu đề bài viết</label><br>
        <input type="text" name="postTitle" id="post_title" class="form-control" required placeholder="Tiêu đề bài viết">
      </div>
      <div class="form-group">
        <label for="post_thumb">Hình ảnh bài viết</label><br>
        <input type="text" name="postThumb" id="post_thumb" class="form-control" required placeholder="Hình ảnh bài viết">
      </div>
      <div class="form-group">
        <label for="post_hashtag">HashTag</label><br>
        <input type="text" name="postHashtag" id="post_hashtag" class="form-control" required placeholder="Hashtag bài viết">
      </div>
      <div class="form-group">
        <label for="post_content">Nội dung bài viết</label><br>
        <textarea class="form-control" rows="15" name="postContent" id="post_content" required placeholder="Nội dung bài viết"></textarea>
      </div>
      <div class="form-group">
        <label for="post_category">Danh mục bài viết</label><br>
        <select name="postCategory" id="post_category" class="form-control" required>
          <option value="">==Chọn danh mục bài viết==</option>
          <option value="Tự nhiên">Tự nhiên</option>
          <option value="Xã hội">Xã hội</option>
        </select>
      </div>
      <div class="form-group">
        <a href=""><button class="btn btn-warning">Quay lại</button></a>
        <input type="submit" class="btn btn-primary" name ="btn_addPost" value="Thêm bài viết">
      </div>
      
    </form>
  </div>