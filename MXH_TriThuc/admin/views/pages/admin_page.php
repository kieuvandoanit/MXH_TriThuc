
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
<table id="table" class="content-table table-sorttable">
  <thead>
      <tr>
          <th>STT <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Username <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Email <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;"></th>
      </tr>
  </thead>
  <tbody id="postTable">
    </tbody>
</div>
<script>
    $(document).ready(function(){
        data=<?php echo json_encode($data) ?>;
        pagination(data['userAdmin']);
    });
    function showData(data){
        contentHtml='';
        for(const key in data){
            contentHtml+='<tr><td>'+(parseInt(key) +1)+'</td>';
            contentHtml+='<td>'+((data[key]['UserName'])?data[key]['UserName']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['email'])?data[key]['email']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td class="category-btn">';
            contentHtml+= '<a class="edit-icon" href="<?php echo HEADERLINK; ?>/admin/user/editUser/'+data[key]['User_id']+'" title="edit admin"><i class="fas fa-pencil-alt"></i></a>';
            contentHtml+= '<a class="delete-icon" href="<?php echo HEADERLINK; ?>/admin/user/deleteUser/'+data[key]['User_id']+'" title="delete admin"><i class="fas fa-trash-alt"></i></a>';
            contentHtml+= '<a class="info-icon" href="<?php echo HEADERLINK; ?>/admin/user/profile/'+data[key]['User_id']+'" title="information of admin"><i class="fas fa-info-circle"></i></a></td></tr>';
                
        };
        $("#postTable").html(contentHtml);
    };
</script>