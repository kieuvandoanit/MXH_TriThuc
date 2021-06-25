<h2>Quản lí danh mục</h2>
<br>
<div style="justify-content: space-between; display: flex; flex-direction: row; ">
  <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass"  autofocus onChange="window.location.href=this.value">
              <option value="" checked>Order by</option>
              <option value="<?php echo HEADERLINK.'/admin/category/categoryPage/1'; ?>" ><a href="<?php ?>"></a>ASC</option>
              <option value="<?php echo HEADERLINK.'/admin/category/categoryPage/2'; ?>" >DESC</option>


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
          <th>ID <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Danh mục <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Mô tả <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;"></th>
      </tr>
  </thead>
  <tbody>
      <?php
        foreach($data as $item){
            echo '<tr>
                    <td>'.(isset($item['Category_id'])?$item['Category_id']:"khong").'</td>
                    <td>'.(isset($item['CategoryName'])?$item['CategoryName']:"khong").'</td>
                    <td>'.(isset($item['Description'])?$item['Description']:"khong").'</td>
                    <td class="user-btn">
                        
                        <a class="delete-icon" href="'.HEADERLINK.'/admin/category/delete/'.(isset($item['Category_id'])?$item['Category_id']:-1).'" title="delete post"><i class="far fa-trash-alt"></i></a>
                        <a class="info-icon" href="'.HEADERLINK.'/admin/category/detailCategory/'.(isset($item['Category_id'])?$item['Category_id']:-1).'" title="information of post"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>';
        };
      ?>
      <!-- <a class="edit-icon" href="'.HEADERLINK.'/admin/category/createCategory" title="edit post"><i class="fas fa-pencil-alt"></i></a> -->
    </tbody>
</table>