<h2>Chỉnh sửa thông tin người dùng</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin người dùng</h4>
<br>
<form enctype="multipart/form-data" action="<?php echo HEADERLINK.'/admin/user/handleEditUser/'.$data['userInfo'][0]['User_id'];?>" method="POST" style="margin: 0 100px 0 15px;">
    <div class="row">
        <div class= "col-3">
            <img src="<?php echo isset($data['userInfo'][0]['Avatar'])?$data['userInfo'][0]['Avatar']:'client/public/assets/avatar.jpg'; ?>" width="150px" height="150px" alt="...">
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberName">Họ tên</label>
                <input type="text" value="<?php echo isset($data['userInfo'][0]['Name'])?$data['userInfo'][0]['Name']:'Chưa cập nhật'; ?>" name="fullname" id="memberName" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberPhone">Số điện thoại</label>
                <input type="text" value="<?php echo isset($data['userInfo'][0]['Phone'])?$data['userInfo'][0]['Phone']:'Chưa cập nhật'; ?>" name="phoneNumber" id="memberPhone" class="form-control" required>
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
                            <option value="Nữ" <?php echo (isset($data['userInfo'][0]['gender']) && $data['userInfo'][0]['gender'] == 'Nữ')?'selected':''; ?>>Nữ</option>
                            <option value="Nam" <?php echo (isset($data['userInfo'][0]['gender']) && $data['userInfo'][0]['gender'] == 'Nam')?'selected':''; ?>>Nam</option>
                            <option value="Khác" >Khác</option>
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
                <input type="hidden" value="<?php echo isset($data['userInfo'][0]['Avatar'])?$data['userInfo'][0]['Avatar']:'Chưa cập nhật'; ?>" id="avatar" name="avatar" class="form-control">
                <input type="file" name="file" id="upload_file" class="form-control"/>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" value="<?php echo isset($data['userInfo'][0]['address'])?$data['userInfo'][0]['address']:'Chưa cập nhật'; ?>" id="address" name="address" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class= "col-3">
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberUsername">Tên đăng nhập</label>
                <input type="text" value="<?php echo isset($data['userInfo'][0]['UserName'])?$data['userInfo'][0]['UserName']:'Chưa cập nhật'; ?>" id="memberUsername" name="username" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberPassword">Mật khẩu</label>
                <input type="text" id="memberPassword" value="<?php echo isset($data['userInfo'][0]['Password'])?$data['userInfo'][0]['Password']:'Chưa cập nhật'; ?>" name="password" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="confirmPassword">Xác nhận mật khẩu</label>
                <input type="text" id="confirmPassword" value="<?php echo isset($data['userInfo'][0]['Password'])?$data['userInfo'][0]['Password']:'Chưa cập nhật'; ?>" name="rePassword" class="form-control" required>
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
                        <input type="text" id="postNumber" name="postNumber" value ="<?php echo isset($data['userInfo'][0]['PostAmount'])?$data['userInfo'][0]['PostAmount']:'Chưa cập nhật'; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cmtNumber" name="postNumber" value ="<?php echo isset($data['userInfo'][0]['CommentAmount'])?$data['userInfo'][0]['CommentAmount']:'Chưa cập nhật'; ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="<?php echo isset($data['userInfo'][0]['Email'])?$data['userInfo'][0]['Email']:'Chưa cập nhật'; ?>" name="email" class="form-control" required>
            </div>
        </div>
    </div>
    <br>
    <div class="button-class" style="float: right;">
        <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Hủy</button>
        <input type="submit" class="btn btn-primary" name="btn_updateUser" value="+ Sửa">
    </div>
</form>