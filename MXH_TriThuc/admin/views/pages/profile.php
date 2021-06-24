<!-- <?php echo '<pre>'; print_r($data['userProfile']); echo '</pre>';  ?> -->
<h2>Thông tin chi tiết</h2>
<br><br>
<h4 style="margin: 0 100px 0 15px;">Thông tin người dùng</h4>
<br>
<form action="<?php echo HEADERLINK.'/admin/user/handleCreateUser';?>" method="POST" style="margin: 0 100px 0 15px;">
    <div class="row">
        <div class= "col-3" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden;">
            <img src="<?php echo isset($data['userProfile'][0]['Avatar'])?$data['userProfile'][0]['Avatar']:'client/public/assets/avatar.jpg'; ?>" width="100%" >
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberName">Họ tên</label>
                <input type="text" value="<?php echo isset($data['userProfile'][0]['Name'])?$data['userProfile'][0]['Name']:''; ?>" name="fullname" id="memberName" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberPhone">Số điện thoại</label>
                <input type="text" value="<?php echo isset($data['userProfile'][0]['Phone'])?$data['userProfile'][0]['Phone']:''; ?>" name="phoneNumber" id="memberPhone" class="form-control" required>
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
                            <option value="Nữ" <?php echo (isset($data['userProfile'][0]['gender'])&&$data['userProfile'][0]['gender'] == 'Nữ')?'selected':''; ?> checked>Nữ</option>
                            <option value="Nam" <?php echo (isset($data['userProfile'][0]['gender'])&&$data['userProfile'][0]['gender'] == 'Nam')?'selected':''; ?> checked>Nam</option>
                            <option value="Khác" <?php echo (isset($data['userProfile'][0]['gender'])&&$data['userProfile'][0]['gender'] == 'Khác')?'selected':''; ?> checked>Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo isset($data['userProfile'][0]['address'])?$data['userProfile'][0]['address']:''; ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="memberUsername">Tên đăng nhập</label>
                <input type="text" id="memberUsername" value="<?php echo isset($data['userProfile'][0]['UserName'])?$data['userProfile'][0]['UserName']:''; ?>" name="username" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="<?php echo isset($data['userProfile'][0]['email'])?$data['userProfile'][0]['email']:''; ?>" name="email" class="form-control" required>
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
                        <input type="text" id="postNumber" name="postNumber" value ="<?php echo isset($data['userProfile'][0]['PostAmount'])?$data['userProfile'][0]['PostAmount']:''; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cmtNumber" name="postNumber" value ="<?php echo isset($data['userProfile'][0]['CommentAmount'])?$data['userProfile'][0]['CommentAmount']:''; ?>" class="form-control">
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-9">
        
                    <div class="button-class" style="float: right;">
                        <a href="<?php echo HEADERLINK.'/admin/user/userPage'; ?>" class="btn btn-success">Quay lại</a>
                    </div>
                
        </div>
        
    </div>
    <br>
    
</form>