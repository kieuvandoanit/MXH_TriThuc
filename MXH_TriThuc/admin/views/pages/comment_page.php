
<h2>Quản lí bình luận</h2>
<br>
<div style="justify-content: space-between; display: flex; flex-direction: row; ">
    <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass"  autofocus onChange="window.location.href=this.value">
              <option value="<?php echo HEADERLINK.'/admin/comment/commentPage'; ?>" >Tất cả</option>
              <option value="<?php echo HEADERLINK.'/admin/comment/commentSpam'; ?>" <?php if(isset($data['flag']) && $data['flag'] == 1){echo 'selected';} ?>>Spam</option>
          </select>
      </div>
    </div>  
</div>
<br>
<table id="table" class="content-table table-sorttable">
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

    <tbody id="postTable">
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        var data=<?php echo json_encode($data['cmtList']) ?>;
        // var data=<php echo json_encode($data) ?>;
        pagination(data);
        
    });
    function showData(data){
        console.log('showdata');
        contentHtml='';
        for(const key in data){
            contentHtml+= '<tr><td>'+((data[key]["Name"])?data[key]["Name"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["CreateDate"])?data[key]["CreateDate"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["UpdateDate"])?data[key]["UpdateDate"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["Title"])?data[key]["Title"]:"khong")+'</td>';
            contentHtml+= '<td>'+((data[key]["Content"])?data[key]["Content"]:"khong")+'</td>';
            contentHtml+= '<td class="user-btn">';
            contentHtml+='<a class="delete-icon" href="<?php echo HEADERLINK;?>/admin/comment/deleteComment/'+((data[key]['Comment_id'])?data[key]['Comment_id']:-1)+'" title="delete comment"><i class="far fa-trash-alt"></i></a>';
            contentHtml+='<a class="info-icon" href="<?php echo HEADERLINK;?>/admin/comment/detailComment/'+((data[key]['Comment_id'])?data[key]['Comment_id']:-1)+'" title="information of comment"><i class="fas fa-info-circle"></i></a></td></tr>';
        };
        $("#postTable").html(contentHtml);
    };
</script>