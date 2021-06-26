<h2>Quản lí bài đăng</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
    <div class="post-filter">
        <div >
            <select name="selectBox" id="selectBox" class="cmtFilterClass" autofocus>
                <option value="Tất cả" checked>Tất cả</option>
                <option value="Chờ Duyệt" checked>Chờ Duyệt</option>
                <option value="Tự động duyệt" checked>Tự động duyệt</option>
                <option value="Đã duyệt" checked>Đã duyệt</option>
                <option value="Không được duyệt" checked>Không được duyệt</option>
                <option value="Đã xóa" checked>Đã xóa</option>
            </select>
            
        </div>
        <div style="padding-left: 15px;">
            <select name="" id="aprovePost" class="cmtFilterClass">
                <option value="1">Xem bài viết</option>
                <option value="2">Duyệt bài viết</option>
            </select>
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
<table id="postTable" class="content-table table-sorttable">
</table>

<script>
    $(document).ready(function(){
        showData();
    });
    $('#aprovePost').change(function(){
        showData();

        
    }); 
    function showData(){
        if ($('#aprovePost').val()==1) {
            $("#postTable").html(`
            <thead>
            <tr>
            <th>Tiêu đề<i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Like <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Đánh giá<i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">bình luận</th>
            <th style="min-width: 10px;">Lượt Xem</th>
            <th style="min-width: 10px;">ngày tạo <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">ngày cập nhật <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;"></th>
            </tr>
            </thead>
            <tbody id="tbody">
            <?php
        foreach($data as $item){
            echo ' <tr>
            <td>'.(isset($item['Title'])?$item['Title']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['LikesAmount'])?$item['LikesAmount']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['AvgRating'])?$item['AvgRating']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['commentAmount'])?$item['commentAmount']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['viewed'])?$item['viewed']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['CreatedDate'])?$item['CreatedDate']:"Chưa cập nhật").'</td>
            <td>'.(isset($item['UpdatedDate'])?$item['UpdatedDate']:"Chưa cập nhật").'</td>
            <td class="cmt-btn" style="display: flex; justify-content: flex-end;">
            <a class="delete-icon" href="'.HEADERLINK.'/admin/post/deletePost/'.(isset($item['Post_id'])?$item['Post_id']:-1).'" title="delete post"><i class="far fa-trash-alt"></i></a>
            <a class="info-icon" href="'.HEADERLINK.'/admin/post/postDetail/'.(isset($item['Post_id'])?$item['Post_id']:-1).'" title="information of post"><i class="fas fa-info-circle"></i></a>
            </td>
            </tr>';
        }
        ?>
        </tbody>';`);
        } else {
            $("#postTable").html(`
            <thead>
                <tr>
                <th>Tiêu đề<i class="fas fa-sort"></i></th>
                <th style="min-width: 10px;"">Nội dung</th>
                <th style="min-width: 10px;">ngày tạo <i class="fas fa-sort"></i></th>
                <th style="min-width: 10px;">ngày cập nhật <i class="fas fa-sort"></i></th>
                <th style="min-width: 10px;">Trạng thái<i class="fas fa-sort"></i></th>
                <th style="min-width: 10px;"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $item){
                echo '<tr>
                <td>'.(isset($item['Title'])?$item['Title']:"Chưa cập nhật").'</td>
                <td>'.(isset($item['HashTag'])?$item['HashTag']:"Chưa cập nhật").'</td>
                <td>'.(isset($item['CreatedDate'])?$item['CreatedDate']:"Chưa cập nhật").'</td>
                <td>'.(isset($item['UpdatedDate'])?$item['UpdatedDate']:"Chưa cập nhật").'</td>
                <td class="cmt-btn" style="display: flex; justify-content: flex-end;">';
                if ($item["Status"]=="Chờ duyệt") {
                    echo '<a class="approve-icon" href="" title="approve post"><i class="fas fa-check-circle"></i></a>
                    <a class="reject-icon" href="" title="reject post"><i class="far fa-times-circle"></i></a>';
                } elseif ($item["Status"]=="Không được duyệt"){
                    echo '<a class="reject-icon" href="" title="reject post"><i class="far fa-times-circle"></i></a>';
                }
                else{
                    echo '<a class="approve-icon" href="" title="approve post"><i class="fas fa-check-circle"></i></a>';
                }
                echo '<a class="info-icon" href="'.HEADERLINK.'/admin/post/postDetail/'.(isset($item['Post_id'])?$item['Post_id']:-1).'" title="information of post"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>';
            }
            ?>
            </tbody>';`
            );
        }
    }
</script>
