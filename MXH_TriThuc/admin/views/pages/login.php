<div class="form">
        <div class="login_form">
          <h3 class="text-center">Đăng nhập</h3>
  
          <form action="<?php echo HEADERLINK.'/admin/user/handleLogin' ?>" class="login" method="POST">
            <label for="username">Tên đăng nhập (<span>*</span>):</label><br>
            <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập">
            <br>
            <label for="password">Mật khẩu (<span>*</span>):</label><br>
            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu"><br>
  
  
            <input type="submit" class="btn btn-primary" name="btn_login" value="Đăng nhập"/>
            <a href="<?php echo HEADERLINK.'/admin/user/findPass'?>">Quên mật khẩu?</a>
          </form>
        </div>
      </div>