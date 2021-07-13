<h2>Tạo danh mục mới</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin danh mục</h4>
<br>
<form action="<?php echo HEADERLINK.'/admin/category/handleUpdateCategory' ?>" style="margin: 0 100px 0 15px;" method="POST">
    
    <div class="form-group">
        <label for="Id">ID</label>
        <?php echo '<input type="text" name="idCategory" id="Id" value = "'.(isset($data[0]["Category_id"])?$data[0]["Category_id"]:"khong").'" class="form-control" required readonly>' ?>
        
    </div>
    <div class="form-group">
        <label for="categoryName">Tên danh mục</label>
        <?php echo '<input type="text" name="categoryName" id="categoryName" value = "'.(isset($data[0]["CategoryName"])?$data[0]["CategoryName"]:"khong").'" class="form-control" required value="duong">' ?>
    </div>
    <div class="form-group">
        <label for="Description">Mô tả</label>
        <?php echo '<textarea name="Description" id="Description" class="form-control"  cols="" rows="3" maxlength="1000">'.(isset($data[0]["Description"])?$data[0]["Description"]:"khong").'</textarea>' ?>
    </div>
    <br>
    <div class="button-class" style="float: right;">
        <a href="<?php echo HEADERLINK.'/admin/category/delete/'.(isset($data[0]['Category_id'])?$data[0]['Category_id']:-1) ?>" name="btn_delete" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Xóa</a>
        <button type="submit" name="btn_update" class="btn btn-primary"><i class="fas fa-plus"></i> Cập nhật</button>
    </div>
</form>
<script>
    $('#categoryName').change(function(){
        $('#categoryName').attr('value',$('#categoryName').val());
    })
    // $('#Description').change(function(){
    //     console.log($('#Description').val());
    // })
</script>