<h2>Tạo bình luận mới</h2>
<br>
<h3>Thông tin bình luận</h3>
<form action="<?php echo HEADERLINK.'/admin/comment/handleCreateComment' ?>" style="margin: 0 100px 0 15px;" method="POST">
    <div class="form-group">
        <label for="id">Mã bài viết</label>
        <input type="text" id="id" class="form-control" value="12345641" readonly>
    </div>
    <div class="form-group">
        <label for="post">Bài viết</label>
        <select name="" id="post" class="form-control">
            <option value="">Đây là bài viết làm giàu</option>
            <option value="">muốn mua xe sang thì phải nhờ ai</option>
            <option value="">bí kíp bật nóc nhà</option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="comment">BÌNH LUẬN</label>
        <textarea name="" id="comment" class="form-control" cols="" rows="6" placeholder="Viết bình luận ở đây..." maxlength="1000"></textarea>
    </div>
    <div class="button-class" style="float: right;">
        <a class="btn btn-outline-secondary" href="#"><i class="fas fa-ban"></i> Hủy</a>
        <a class="btn btn-primary" href="#"><i class="fas fa-plus"></i> Tạo</a>
    </div>
</form>