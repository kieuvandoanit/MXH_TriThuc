<h2>Quản lí danh mục</h2>
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
<table id="table" class="content-table table-sorttable">
    <thead>
        <tr>
            <th>ID <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Danh mục <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Mô tả <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;"></th>
        </tr>
    </thead>
    <tbody id="postTable">
     
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        var data=<?php echo json_encode($data) ?>;
        // var data=<php echo json_encode($data) ?>;
        pagination(data);
        
    });
    function showData(data){
        contentHtml='';
        for(const key in data){
            contentHtml+= '<tr><td>'+((data[key]["Category_id"])?data[key]["Category_id"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["CategoryName"])?data[key]["CategoryName"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["Description"])?data[key]["Description"]:"khong")+'</td>';
            contentHtml+= '<td class="user-btn">';
            contentHtml+='<a class="delete-icon" href="<?php echo HEADERLINK;?>/admin/category/delete/'+((data[key]['Category_id'])?data[key]['Category_id']:-1)+'" title="delete post"><i class="far fa-trash-alt"></i></a>';
            contentHtml+='<a class="info-icon" href="<?php echo HEADERLINK;?>/admin/category/detailCategory/'+((data[key]['Category_id'])?data[key]['Category_id']:-1)+'" title="information of post"><i class="fas fa-info-circle"></i></a></td></tr>';
        };
        $("#postTable").html(contentHtml);
    };
</script>