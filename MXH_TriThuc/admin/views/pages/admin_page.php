
<h2>Quản trị viên</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
  <div class="category-filter">
      <div >
          <select name="" id="" class="categoryFilterClass" >
              <option value="" checked>Thêm bộ lọc</option>
              <option value="" checked>Họ tên</option>
              <option value="" checked>Số điện thoại</option>
              <option value="" checked>Email</option>
          </select>
      </div>
  </div>
  <div class="">
      <a href="<?php echo HEADERLINK.'/admin/user/createAdmin';  ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo admin</b>
      </a>
  </div>
</div>
 <br>
<table class="content-table table-sorttable">
  <thead>
      <tr>
          <th>STT <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Username <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Email <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;"></th>
      </tr>
  </thead>
  <tbody>
    <?php 
    foreach($data['userAdmin'] as $key => $user){
        ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $user['UserName']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td class="category-btn">
              <a class="edit-icon" href="<?php echo HEADERLINK.'/admin/user/editUser/'.$user['User_id']; ?>" title="edit post"><i class="fas fa-pencil-alt"></i></a>
              <a class="delete-icon" href="<?php echo HEADERLINK.'/admin/user/deleteUser/'.$user['User_id']; ?>" title="delete post"><i class="far fa-trash-alt"></i></a>
              <a class="info-icon" href="<?php echo HEADERLINK.'/admin/user/profile/'.$user['User_id']; ?>" title="information of post"><i class="fas fa-info-circle"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
      
    </tbody>
</div>