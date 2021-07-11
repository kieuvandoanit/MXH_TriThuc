<h2>Quản lí bình luận</h2>
<br>
<div style="justify-content: space-between; display: flex; flex-direction: row; ">
    <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass"  autofocus onChange="window.location.href=this.value">
              <option value="" checked>Sắp xếp</option>
              <option value="<?php echo HEADERLINK.'/admin/category/categoryPage/1'; ?>" >Cũ nhât</option>
              <option value="<?php echo HEADERLINK.'/admin/category/categoryPage/2'; ?>" >Mới nhất</option>


          </select>
      </div>
    </div> 
    <div class="">
      <a href="<?php echo HEADERLINK.'/admin/category/createCategory'; ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo danh mục</b>
      </a>
  </div>
</div>
<br>  
<table class="content-table table-sorttable">
    <thead>
        <tr>
            <th>Người bình luận <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Ngày tạo</th>
            <th>Cập nhật gần nhật</th>
            <th style="min-width: 10px;">Bài viết</th>
            <th style="min-width: 10px;">Nội dung</th>
            <th style="min-width: 10px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($data as $item){
            echo '<tr>
                    <td>'.(isset($item['UserName'])?$item['UserName']:"khong").'</td>
                    <td>'.(isset($item['CreateDate'])?$item['CreateDate']:"khong").'</td>
                    <td>'.(isset($item['UpdateDate'])?$item['UpdateDate']:"khong").'</td>
                    <td>'.(isset($item['Title'])?$item['Title']:"khong").'</td>
                    <td>'.(isset($item['Content'])?$item['Content']:"khong").'</td>
                </tr>';
        };
      ?>
      <!-- <a class="edit-icon" href="'.HEADERLINK.'/admin/category/createCategory" title="edit post"><i class="fas fa-pencil-alt"></i></a> -->
    </tbody>
</table>