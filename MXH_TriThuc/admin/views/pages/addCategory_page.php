<h2>Tạo danh mục mới</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin danh mục</h4>
<br>
<form action="<?php echo HEADERLINK.'/admin/category/handleCreateCategory' ?>" style="margin: 0 100px 0 15px;" method="POST">
    <div class="form-group">
        <label for="categoryName">Tên danh mục</label>
        <input type="text" name="categoryName" id="categoryName" placeholder = "Nhập tên danh mục ở đây" class="form-control" required value="duong">
    </div>
    <div class="form-group">
        <label for="Description">Mô tả</label>
        <textarea name="Description" id="Description" class="form-control" placeholder = "Nhập mô tả ở đây" cols="" rows="3" maxlength="1000" value="duong"></textarea>
    </div>
    <br>
    <div class="button-class" style="float: right;">
        <a href="<?php echo HEADERLINK.'/admin/category/categoryPage' ?>" name="btn_delete" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Hủy bỏ</a>
        <button type="submit" name="btn_create" class="btn btn-primary"><i class="fas fa-plus"></i> Tạo</button>
    </div>
</form>