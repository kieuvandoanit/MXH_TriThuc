<div class="form">
    <h3 class="text-center">Đổi mật khẩu</h3>
    <form action="<?php echo HEADERLINK.'/user/handleChangePass'; ?>" class="change_pass" method="POST">

      <label for="oldPassword">Mật khẩu cũ:</label><br>
      <input id="oldPassword" type="password" name="oldPassword" placeholder="Nhập mật khẩu cũ"><br>

      <label for="Password">Mật khẩu mới:</label><br>
      <input id="Password" type="password" name="newPassword" placeholder="Nhập mật khẩu mới"><br>

      <label for="rePassword">Nhập lại mật khẩu mới:</label><br>
      <input id="rePassword" type="password" name="reNewPassword" placeholder="Nhập lại mật khẩu mới"><br>

      <input type="submit" value="Đổi mật khẩu" class="btn btn-primary" name="btn_changePass">
      <a href="">Quay lại trang đăng nhập?</a>
    </form>
  </div>