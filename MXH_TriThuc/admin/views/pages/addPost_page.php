<h2>Tạo bài đăng mới</h2>
<br>
<h3>Thông tin bài đăng</h3>
<form  action="<?php echo HEADERLINK.'/admin/post/handleCreatePost'?>" method="POST" style="margin: 0 50px 0 15px;" enctype="multipart/form-data">
    <!-- <div class="form-group">
        <label for="id">tiêu đề <span style="color: red;">*</span></label>
        <input type="text" id="id" class="form-control" value="12345641" readonly>
    </div> -->
    <div class="form-group">
        <label for="title">tiêu đề <span style="color: red;">*</span></label>
        <input name="title" id="title" class="form-control" placeholder="hãy điền tiêu đề bài viết">
    </div>
    <div class="form-group">
        <label for="Image">Ảnh<i style="color: grey; font-size:10px"> (link)</i></label>
        <!-- <input id="Image" name="image" class="form-control"> -->
        <input type="file" name="file" id="upload_file" class="form-control"/>
        <!-- <input id="postImage" name="input-b2" type="file" class="file" data-show-preview="false" style="display:block;"> -->
    </div>
    <div class="form-group">
        <label for="hashTag">Hashtag</label>
        <input id="hashTag" name="hashTag" class="form-control">
        <!-- <input id="postImage" name="input-b2" type="file" class="file" data-show-preview="false" style="display:block;"> -->
    </div>
    <div class="form-group">
        <label for="txtDescription">Nội dung</label>
        <textarea name="txtDescription" id="txtDescription" class="form-control" cols="" rows="3" placeholder="Viết bình luận ở đây..." maxlength="1000"></textarea>
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
    <div class="button-class" style="float: right;">
        <a class="btn btn-outline-secondary" href="#"><i class="fas fa-ban"></i> Hủy</a>
        <button name="btn_create" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tạo</button>
    </div>
</form>
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
        elementpath: false,
        placeholder: 'writing description here...',
    });
</script>