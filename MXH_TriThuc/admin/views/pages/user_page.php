<h2>Quản lí người dùng</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
  <!-- <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass" >
              <option value="" checked>Thêm bộ lọc</option>
              <option value="" checked>Họ tên</option>
              <option value="" checked>Số điện thoại</option>
              <option value="" checked>Email</option>
              <option value="" checked>Hạng thành viên</option>
          </select>
      </div>
  </div> -->
  <div class="">
      <a href="<?php echo HEADERLINK.'/admin/user/createUser'; ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo người dùng</b>
      </a>
  </div>
</div>
 <br>
<table id="table" class="content-table table-sorttable">
  <thead>
      <tr>
          <th>Họ tên <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Số điện thoại <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Email <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Hạng thành viên <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;"></th>
      </tr>
  </thead>
  <tbody id="postTable">
        
    </tbody>
</div>
<script>
    $(document).ready(function(){
        data=<?php echo json_encode($data['listUser']) ?>;
        pagination(data);
    });
    function showData(data){
        contentHtml='';
        for(const key in data){
            contentHtml+='<tr><td>'+(parseInt(key) +1)+'</td>';
            contentHtml+='<td>'+((data[key]['Name'])?data[key]['Name']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['Email'])?data[key]['Email']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+data[key]['Level_id']+'</td>';
            contentHtml+='<td class="user-btn">';
            contentHtml+= '<a class="edit-icon" href="<?php echo HEADERLINK; ?>/admin/user/editUser/'+data[key]['User_id']+'" title="edit post"><i class="fas fa-pencil-alt"></i></a>';
            contentHtml+= '<a class="delete-icon" href="<?php echo HEADERLINK; ?>/admin/user/deleteUser/'+data[key]['User_id']+'" title="delete post"><i class="fas fa-trash-alt"></i></a>';
            contentHtml+= '<a class="info-icon" href="<?php echo HEADERLINK; ?>/admin/user/profile/'+data[key]['User_id']+'" title="information of post"><i class="fas fa-info-circle"></i></a></td></tr>';
            
        };
        $("#postTable").html(contentHtml);
    };
</script>