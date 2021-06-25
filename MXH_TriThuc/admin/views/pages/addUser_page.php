<h2>Tạo người dùng mới</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin người dùng</h4>
<br>
<form action="<?php echo HEADERLINK.'/admin/user/handleCreateUser';?>" method="POST" style="margin: 0 100px 0 15px;">
    <div class="row">
        <div class= "col-3">
            <img src="client/public/assets/avatar.jpg" width="150px" height="150px" alt="...">
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberName">Họ tên</label>
                <input type="text"  name="fullname" id="memberName" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberPhone">Số điện thoại</label>
                <input type="text" name="phoneNumber" id="memberPhone" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group" style="margin: 0px 0px 5px 0px;">
                <label for="gender">Giới tính</label>
                <br>
                <div class="user-filter">
                    <div >
                        <select name="gender" id="gender" class="userFilterClass" >
                            <option value="" checked>Chọn giới tính</option>
                            <option value="Nữ" checked>Nữ</option>
                            <option value="Nam" checked>Nam</option>
                            <option value="Khác" checked>Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="text" id="avatar" name="avatar" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class= "col-3">
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberUsername">Tên đăng nhập</label>
                <input type="text" id="memberUsername" name="username" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberPassword">Mật khẩu</label>
                <input type="text" id="memberPassword" name="password" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="confirmPassword">Xác nhận mật khẩu</label>
                <input type="text" id="confirmPassword" name="rePassword" class="form-control" required>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class= "col-3">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="postNumber">Số bài viết</label>
                    </div>
                    <div class="form-group">
                        <label for="cmtNumber">Số bình luận</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" id="postNumber" name="postNumber" value ="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cmtNumber" name="postNumber" value ="0" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
        </div>
    </div>
    <br>
    <div class="button-class" style="float: right;">
        <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Hủy</button>
        <input type="submit" class="btn btn-primary" name="btn_createUser" value="+ Tạo">
    </div>
</form>