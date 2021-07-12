<h2>Quản lí bình luận</h2>
<br>
<div style="justify-content: space-between; display: flex; flex-direction: row; ">
    <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass"  autofocus onChange="window.location.href=this.value">
              <option value="<?php echo HEADERLINK.'/admin/comment/commentPage'; ?>" >Tất cả</option>
              <option value="<?php echo HEADERLINK.'/admin/comment/commentSpam'; ?>" >Spam</option>
          </select>
      </div>
    </div>  
    <!-- <div class="">
      <a href="<?php echo HEADERLINK.'/admin/category/createCategory'; ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo bình luận</b>
      </a>
  </div> -->
</div>
<br>
<table class="content-table table-sorttable">
    <thead>
        <tr>
            <th>Người bình luận <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Ngày tạo <i class="fas fa-sort"></i></th>
            <th>Cập nhật gần nhật <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Bài viết <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Nội dung <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($data as $item){
            echo '<tr>
                    <td>'.(isset($item['Name'])?$item['Name']:"khong").'</td>
                    <td>'.(isset($item['CreateDate'])?$item['CreateDate']:"khong").'</td>
                    <td>'.(isset($item['UpdateDate'])?$item['UpdateDate']:"khong").'</td>
                    <td>'.(isset($item['Title'])?$item['Title']:"khong").'</td>
                    <td>'.(isset($item['Content'])?$item['Content']:"khong").'</td>
                    <td class="user-btn">
                        <a class="delete-icon" href="'.HEADERLINK.'/admin/comment/deleteComment/'.(isset($item['Comment_id'])?$item['Comment_id']:-1).'" title="delete comment"><i class="far fa-trash-alt"></i></a>
                        <a class="info-icon" href="'.HEADERLINK.'/admin/comment/detailComment/'.(isset($item['Comment_id'])?$item['Comment_id']:-1).'" title="information of comment"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>';
        };
      ?>
      <!-- <a class="edit-icon" href="'.HEADERLINK.'/admin/category/createCategory" title="edit post"><i class="fas fa-pencil-alt"></i></a> -->
    </tbody>
</table>