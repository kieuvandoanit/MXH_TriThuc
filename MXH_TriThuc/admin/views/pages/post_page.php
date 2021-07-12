<h2>Quản lí bài đăng</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
    <div class="post-filter">
        <div >
            <form action="<?php echo HEADERLINK.'/admin/post/postPage'; ?>" method="POST" >
                <select name="selectBox" id="selectBox" class="cmtFilterClass" onchange="this.form.submit()" autofocus>
                    <option value="Tất cả" checked>Tất cả</option>
                    <option value="Chờ duyệt" >Chờ Duyệt</option>
                    <option value="Tự động duyệt" >Tự động duyệt</option>
                    <option value="Đã duyệt" >Đã duyệt</option>
                    <option value="Không được duyệt" >Không được duyệt</option>
                    <option value="Đã xóa" >Đã xóa</option>
                </select>
            </form>
        </div>
    </div>
    <div class="">

        <a href="<?php echo HEADERLINK.'/admin/post/createPost'?>" class="btn btn-primary" style="border-radius: 45px;">
            <i class="fas fa-plus"></i>
            <b>Tạo bài viết</b>
        </a>
    </div>
</div>
<br>
<table id='table'  class="content-table table-sorttable">
    <thead>
        <tr>
            <th>Tiêu đề<i class="fas fa-sort"></i></th>
            <th class="viewHeader" style="max-width:90px" >Like <i class="fas fa-sort"></i></th>
            <th class="viewHeader" style="max-width:90px" >Đánh giá<i class="fas fa-sort"></i></th>
            <th class="viewHeader" style="max-width:90px" >bình luận</th>
            <th class="viewHeader" style="max-width:90px" >Lượt Xem</th>
            <th class="approveHeader" ">Nội dung</th>
            <th class="" >ngày tạo <i class="fas fa-sort"></i></th>
            <th class="" >ngày cập nhật <i class="fas fa-sort"></i></th>
            <th class="approveHeader" >Trạng thái<i class="fas fa-sort"></i></th>
            
        </tr>
    </thead>
    <tbody id="postTable">
</table>

<script>
    $(document).ready(function(){
        data=<?php echo json_encode($data) ?>;
        pagination(data);
    });
    function showData(data){
        contentHtml='';
        console.log(data);
        for(const key in data){
            contentHtml+='<tr><td>'+((data[key]['Title'])?data[key]['Title']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['LikesAmount'])?data[key]['LikesAmount']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['AvgRating'])?data[key]['AvgRating']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['commentAmount'])?data[key]['commentAmount']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['viewed'])?data[key]['viewed']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td class="cut-text">'+((data[key]['Content'])?data[key]['Content']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['CreatedDate'])?data[key]['CreatedDate']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td>'+((data[key]['UpdatedDate'])?data[key]['UpdatedDate']:"Chưa cập nhật")+'</td>';
            contentHtml+='<td class="cmt-btn" style="display: flex; justify-content: flex-end;">';
            if (data[key]["Status"]=="Chờ duyệt") {
                contentHtml+= '<form action="<?php echo HEADERLINK;?>/admin/post/handleAprovePost/'+((data[key]['Post_id'])?data[key]['Post_id']:0)+'" method="POST" style="display:flex">';
                contentHtml+= `<button type="submit" name="btn_aprove" class="approve-icon" href="" title="approve post"><i class="fas fa-check-circle"></i></button>
                <button type="submit" name="btn_inject" class="reject-icon" href="" title="reject post"><i class="far fa-times-circle"></i></button></form>`;
            } else if (data[key]["Status"]=="Không được duyệt"){
                contentHtml+= '<div class="reject-icon" href="" title="reject post"><i class="far fa-times-circle"></i></div>';
            }
            else{
                contentHtml+= '<div class="approve-icon" href="" title="approve post"><i class="fas fa-check-circle"></i></div>';
            };
            contentHtml+= '<a class="delete-icon" href="<?php echo HEADERLINK;?>/admin/post/deletePost/'+((data[key]['Post_id'])?data[key]['Post_id']:-1)+'" title="delete post"><i class="far fa-trash-alt"></i></a>';
            contentHtml+= '<a class="info-icon" href="<?php echo HEADERLINK;?>/admin/post/postDetail/'+((data[key]['Post_id'])?data[key]['Post_id']:-1)+'" title="information of post"><i class="fas fa-info-circle"></i></a></td></tr>';
        };
        $("#postTable").html(contentHtml);
    };
</script>

