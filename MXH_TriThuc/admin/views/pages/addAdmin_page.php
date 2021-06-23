<h2>Tạo admin mới</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin admin</h4>
<br>
<form action="<?php echo HEADERLINK.'/admin/user/handleCreateAdmin'; ?>" style="margin: 0 100px 0 15px;" method="POST">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="adminName">Họ tên</label>
                <input type="text" id="adminName" name="fullname" placeholder="Nhập họ tên tại đây" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Nhập số điện thoại tại đây" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu tại đây" class="form-control" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email tại đây" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập tại đây" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="confirmPasswordA">Xác nhận mật khẩu</label>
                <input type="password" id="confirmPasswordA" name="rePassword" placeholder="Xác nhận lại mật khẩu" class="form-control" required>
            </div>
        </div>
    </div>
    <br>
    <div class="button-class" style="float: right;">
        <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Hủy</button>
        <input type="submit" class="btn btn-primary" value=" + Tạo" name="btn_createAdmin"/>
    </div>
</form>