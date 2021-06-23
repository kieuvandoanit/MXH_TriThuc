<div class="form">
    <h3 class="text-center">Tìm kiếm mật khẩu</h3>
    <form action="<?php echo HEADERLINK.'/admin/user/handleFindPass';  ?>" class="forgot_pass" method="POST">

      <label for="email">Email đăng ký:</label><br>
      <input id="email" type="email" name="email" placeholder="Nhập email đăng ký"><br>

      <input type="submit" value="Tìm mật khẩu" class="btn btn-primary" name="btn_findPass">
      <a href="<?php echo HEADERLINK.'/admin/user'; ?>">Quay lại trang đăng nhập?</a>
    </form>
    
  </div>