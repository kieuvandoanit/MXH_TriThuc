<div class="form">
        <form action="<?php echo HEADERLINK."/user/handleRegister"?>" class="form_register" method="POST">
          <h3 class="text-center">Đăng kí</h3>

          <label for="username">Tên đăng nhập (<span>*</span>):</label><br>
          <input type="text" class="validate" name="username" id="username" placeholder="Nhập tên đăng nhập">
          <br>
          <label for="password">Mật khẩu (<span>*</span>):</label><br>
          <input type="password" name="password" id="password" placeholder="Nhập mật khẩu"><br>

          <label for="re_password">Nhập lại mật khẩu (<span>*</span>):</label><br>
          <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu"><br>

          <label for="email">Email (<span>*</span>):</label><br>
          <input type="email" name="email" id="email" placeholder="Nhập email đăng ký"><br>

          <input type="submit" class="btn btn-primary" name = 'btn_register' id="btn_register" value="Đăng ký">
        </form>
      </div>