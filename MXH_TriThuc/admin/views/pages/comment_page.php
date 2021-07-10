<h2>Quản lí bình luận</h2>
<br>
<div class="row">
    <div class="col-2">
        <select name="" id="" class="cmtFilterClass" >
            <option value="" checked>Bài viết</option>
        </select>
    </div>
    <div class="col-2">

        <select name="" id="" class="cmtFilterClass">
            <option>Người bình luận</option>
        </select>
    </div>
    <div class="col-6"></div>
    <div class="col-2">
        <a href="#" class="btn btn-primary" style="border-radius: 45px;">
            <i class="fas fa-plus"></i>
            <b>Bình luận mới</b>
        </a>
    </div>
</div>
<br>
<table class="content-table table-sorttable">
    <thead>
        <tr>
            <th>Người bình luận <i class="fas fa-sort"></i></th>
            <th style="min-width: 10px;">Ngày tạo</th>
            <th>Cập nhật gần nhật</th>
            <th style="min-width: 10px;">Bài viết</th>
            <th style="min-width: 10px;">Nội dung</th>
            <th style="min-width: 10px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($data as $item){
            echo '<tr>
                    <td>'.(isset($item['Member_id'])?$item['Member_id']:"khong").'</td>
                    <td>'.(isset($item['CreateDate'])?$item['CreateDate']:"khong").'</td>
                    <td>'.(isset($item['UpdateDate'])?$item['UpdateDate']:"khong").'</td>
                    <td>'.(isset($item['Post_id'])?$item['Post_id']:"khong").'</td>
                    <td>'.(isset($item['Content'])?$item['Content']:"khong").'</td>
                </tr>';
        };
      ?>
      <!-- <a class="edit-icon" href="'.HEADERLINK.'/admin/category/createCategory" title="edit post"><i class="fas fa-pencil-alt"></i></a> -->
    </tbody>
</table>