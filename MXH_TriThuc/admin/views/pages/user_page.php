<h2>Quản lí người dùng</h2>
<br>
<div class="" style="justify-content: space-between; display: flex; flex-direction: row; ">
  <div class="user-filter">
      <div >
          <select name="" id="" class="userFilterClass" >
              <option value="" checked>Thêm bộ lọc</option>
              <option value="" checked>Họ tên</option>
              <option value="" checked>Số điện thoại</option>
              <option value="" checked>Email</option>
              <option value="" checked>Hạng thành viên</option>
          </select>
      </div>
  </div>
  <div class="">
      <a href="<?php echo HEADERLINK.'/admin/user/createUser'; ?>" class="btn btn-primary" style="border-radius: 45px;">
          <i class="fas fa-plus"></i>
          <b>Tạo người dùng</b>
      </a>
  </div>
</div>
 <br>
<table class="content-table table-sorttable">
  <thead>
      <tr>
          <th>Họ tên <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Số điện thoại <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Email <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;">Hạng thành viên <i class="fas fa-sort"></i></th>
          <th style="min-width: 10px;"></th>
      </tr>
  </thead>
  <tbody>
      <tr>
        <td>Thương Hoài</td>
        <td>+84123456789</td>
        <td>hoai.le@gmail.com</td>
        <td>Newbie</td>
          <td class="user-btn">
              <a class="edit-icon" href="" title="edit post"><i class="fas fa-pencil-alt"></i></a>
              <a class="delete-icon" href="" title="delete post"><i class="far fa-trash-alt"></i></a>
              <a class="info-icon" href="" title="information of post"><i class="fas fa-info-circle"></i></a>
          </td>
      </tr>
      <tr>
          <td>Thương Hoài</td>
          <td>+84123456789</td>
          <td>hoai.le@gmail.com</td>
          <td>Học sinh</td>
          <td class="user-btn">
              <a class="edit-icon" href="" title="edit post"><i class="fas fa-pencil-alt"></i></a>
              <a class="delete-icon" href="" title="delete post"><i class="far fa-trash-alt"></i></a>
              <a class="info-icon" href="" title="information of post"><i class="fas fa-info-circle"></i></a>
          </td>
      </tr>
      <tr>
          <td>Thương Hoài</td>
          <td>+84123456789</td>
          <td>hoai.le@gmail.com</td>
          <td>Giáo viên</td>
          <td class="user-btn">
              <a class="edit-icon" href="" title="edit post"><i class="fas fa-pencil-alt"></i></a>
              <a class="delete-icon" href="" title="delete post"><i class="far fa-trash-alt"></i></a>
              <a class="info-icon" href="" title="information of post"><i class="fas fa-info-circle"></i></a>
          </td>
      </tr>
    </tbody>
</div>