
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
<div id="table" style="height: 350px;">
<table  class="content-table table-sorttable" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 17%;">Người bình luận <i class="fas fa-sort"></i></th>
            <th style="width: 15%;">Ngày tạo <i class="fas fa-sort"></i></th>
            <th style="width: 19%;">Cập nhật gần nhất <i class="fas fa-sort"></i></th>
            <th style="width: 18%;">Bài viết <i class="fas fa-sort"></i></th>
            <th style="width: 20%;">Nội dung <i class="fas fa-sort"></i></th>
            <th style="width: 11%">Hành động</th>
        </tr>
    </thead>

    <tbody id="postTable">
    </tbody>
</table>
</div>

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
            contentHtml+= '<tr><td style="width: 17%;" class="">'+((data[key]["Name"])?data[key]["Name"]:"khong")+'</td>';
            contentHtml+= '<td style="width: 15%;">'+((data[key]["CreateDate"])?data[key]["CreateDate"]:"khong")+'</td>';
            contentHtml+= '<td style="width: 19%;">'+((data[key]["UpdateDate"])?data[key]["UpdateDate"]:"khong")+'</td>';
            contentHtml+= '<td style="width: 18%;" class="show-text">'+((data[key]["Title"])?data[key]["Title"]:"khong")+'</td>';
            contentHtml+= '<td style="width: 20%;" class="show-text">'+((data[key]["Content"])?data[key]["Content"]:"khong")+'</td>';
            contentHtml+= '<td class="user-btn" style="width: 11%;">';
            contentHtml+='<a class="delete-icon" href="<?php echo HEADERLINK;?>/admin/comment/deleteComment/'+((data[key]['Comment_id'])?data[key]['Comment_id']:-1)+'" title="delete comment"><i class="far fa-trash-alt"></i></a>';
            contentHtml+='<a class="info-icon" href="<?php echo HEADERLINK;?>/admin/comment/detailComment/'+((data[key]['Comment_id'])?data[key]['Comment_id']:-1)+'" title="information of comment"><i class="fas fa-info-circle"></i></a></td></tr>';
        };
        $("#postTable").html(contentHtml);
    };
</script>