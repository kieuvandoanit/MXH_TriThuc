<h2>Thông tin bài đăng</h2>
<br>
<br>
<form action="<?php echo HEADERLINK.'/admin/post/handleAprovePost/'.(isset($data[0]['Post_id'])?$data[0]['Post_id']:0)?>" style="margin: 0 50px 0 15px;" method="POST">
    <div class="form-group">
        <label for="id">ID <span style="color: red;">*</span></label>
        <input type="text" id="id" name="id" class="form-control" value="<?php echo (isset($data[0]['Post_id'])?$data[0]['Post_id']:"Chưa cập nhật");?>" readonly>
    </div>
    <div class="form-group">
        <label for="title">Tiêu đề<span style="color: red;">*</span></label>
        <input id="title" name="title" class="form-control" placeholder="hãy điền tiêu đề bài viết" value="<?php echo (isset($data[0]['Title'])?$data[0]['Title']:"Chưa cập nhật");?>">
    </div>
    <div class="form-group">
        <label for="Status">Trạng thái</label>
        <input type="text" id="Status" name="Status" class="form-control" value="<?php echo (isset($data[0]['Status'])?$data[0]['Status']:"Chưa cập nhật");?>" disabled>
    </div>
    <div class="form-group">
        <label for="">Ảnh:</span></label>
        <img src="<?php echo (isset($data[0]['thumb'])?$data[0]['thumb']:"Chưa cập nhật");?>" alt="no image" style="width: 120px;height:120px"></img>
    </div>
    <div class="form-group">
        <label for="txtDescription">Nội dung <span style="color: red;">*</span></label>
        <textarea name="txtDescription" id="txtDescription" class="form-control" placeholder="Viết bình luận ở đây..." maxlength="1000"><?php echo (isset($data[0]['Content'])?$data[0]['Content']:"Chưa cập nhật");?></textarea>
    </div>
    <div class="button-class" style="float: right;">
        <button type="submit" class="btn btn-outline-secondary" name="btn_inject"><i class="fas fa-ban"></i> Từ chối</button>
        <button type="submit" class="btn btn-primary" name="btn_aprove"><i class="fas fa-check"></i> Duyệt</button>
    </div>
</form>
<script>
    tinymce.init({
    selector: '#txtDescription',
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