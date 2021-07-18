<h2>Quản lí người dùng</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
  <div class="">
      <a href="<?php echo HEADERLINK.'/admin/user/createUser'; ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo người dùng</b>
      </a>
  </div>
</div>
 <br>
 <div style="height: 320px;" id="table">
<table class="content-table table-sorttable" style="width: 100%;">
  <thead>
      <tr>
          <th style="width: 10%;">Số thứ tự <i class="fas fa-sort"></i></th>
          <th style="width: 30%;">Họ tên <i class="fas fa-sort"></i></th>
          <th style="width: 30%;">Email <i class="fas fa-sort"></i></th>
          <th style="width: 10%;">Hạng thành viên <i class="fas fa-sort"></i></th>
          <th style="width: 20%;"></th>
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
            contentHtml+='<tr><td style="width: 10%;">'+(parseInt(key) +1)+'</td>';
            contentHtml+='<td style="width: 30%; overflow: hidden;">'+((data[key]['Name'])?data[key]['Name']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td style="width: 30%; overflow: hidden;">'+((data[key]['Email'])?data[key]['Email']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td style="width: 20%;">'+data[key]['Level_id']+'</td>';
            contentHtml+='<td style="width: 10%;" class="user-btn">';
            contentHtml+= '<a class="edit-icon" href="<?php echo HEADERLINK; ?>/admin/user/editUser/'+data[key]['User_id']+'" title="edit user"><i class="fas fa-pencil-alt"></i></a>';
            contentHtml+= '<a class="delete-icon" href="<?php echo HEADERLINK; ?>/admin/user/deleteUser/'+data[key]['User_id']+'" title="delete user"><i class="fas fa-trash-alt"></i></a>';
            contentHtml+= '<a class="info-icon" href="<?php echo HEADERLINK; ?>/admin/user/profile/'+data[key]['User_id']+'" title="information of user"><i class="fas fa-info-circle"></i></a></td></tr>';
            
        };
        $("#postTable").html(contentHtml);
    };
</script>