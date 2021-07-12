<h2>Cập nhật bình luận </h2>
<br>
<h3>Thông tin bình luận</h3>
<form action="<?php echo HEADERLINK.'/admin/comment/updateComment' ?>" style="margin: 0 100px 0 15px;" method="POST">
    <div class="form-group">
        <label for="id">Mã bài viết</label>
        <?php echo '<input type="text" name="idPost" id="idPost" disabled = "true" value = "'.(isset($data[0]["Post_id"])?$data[0]["Post_id"]:"khong").'" class="form-control" required readonly>' ?>
    </div>
    <div class="form-group">
        <label for="post">Bài viết</label>
        <select name="post" id="post" disabled = "true" class="form-control">
            <?php echo '<option value = "">'.(isset($data[0]["Title"])?$data[0]["Title"]:"khong").'</option>' ?>
        </select>
    </div>
    <div class="form-group">
        <label for="Comment_id">Mã comment</label>
        <?php echo '<input type="text" name="Comment_id" id="Comment_id" value = "'.(isset($data[0]["Comment_id"])?$data[0]["Comment_id"]:"khong").'" class="form-control" required readonly>' ?>
    </div>
    <div class="form-group">
        <label for="content">BÌNH LUẬN</label>
        <?php echo '<textarea name="content" id="content" class="form-control" cols="" rows="6" maxlength="1000">'.(isset($data[0]["Content"])?$data[0]["Content"]:"khong").'</textarea>' ?>
    </div>
    <div class="button-class" style="float: right;">
        <a href="<?php echo HEADERLINK.'/admin/comment/deleteComment/'.(isset($data[0]['Comment_id'])?$data[0]['Comment_id']:-1) ?>" name="btn_delete" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Xóa</a>
        <button type="submit" id="btn_update_cmt" name="btn_update_cmt" class="btn btn-primary"><i class="fas fa-plus"></i> Cập nhật</button>
    </div>
</form>
<script>
    $('#comment').change(function(){
        $('#comment').attr('value',$('#comment').val());
    })
</script>