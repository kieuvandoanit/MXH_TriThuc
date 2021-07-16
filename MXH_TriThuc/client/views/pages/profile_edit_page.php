<div class="profile_edit">
        <div id = "top_profile_page" class="background">
          <div class="col-md-6">
            <div class="avatar">
              <img class="avatar_size" src="<?php echo isset($data['user'][0]['Avatar'])?$data['user'][0]['Avatar']:'client/public/assets/avatar.jpg'; ?>" alt="">
            </div>
          </div>
          <div id="your_info" class="col-md-6">
            <ul class="">
              <li class="name">
                <h1><?php echo isset($data['user'][0]['Name'])?$data['user'][0]['Name']:'Chưa nhập họ tên' ?></h1>
              </li>
              <li class="job"><?php echo isset($data['user'][0]['level_id'])?$data['user'][0]['level_id']:'Chưa có level';  ?></li>
            </ul>
            <div class="posts_react col-md-6 col-md-offset-3">
              <div class="posts_like">
                <i class="fas fa-file-alt"></i>
                <p class="posts_num">25</p>
              </div>
              <div class="posts_comment">
                <i class="fas fa-comment"></i>
                <p class="posts_comment_num">99</p>
              </div>
            </div>
          </div>
        </div>
          <div id="pf_posts" class="background_pf_posts">
            <div class="list_your_post">
              <div class="title">
                <div class="left_titles">Thông tin cá nhân</div>
              </div>
              <form enctype="multipart/form-data" id="info" method="POST" action="<?php echo HEADERLINK.'/user/handleEditProfile' ?>">
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Ảnh đại diện</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="fas fa-camera"></i>
                        </button>
                      </div>
                      <input type="hidden" class="form-control" name="user_thumb" value="<?php if(isset($data['user'][0]['Avatar'])){echo $data['user'][0]['Avatar'];};?>">
                      <input type="file" name="file" id="upload_file" class="form-control"/>
                      <br><br>
                      <img src="<?php if(isset($data['user'][0]['Avatar'])){echo $data['user'][0]['Avatar'];};?>" alt="" width="200">
                    </div>
                 <!-- </form> -->
                </div>
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Họ và tên</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="glyphicon glyphicon-user"></i>
                        </button>
                      </div>
                      <input type="text" class="form-control" value="<?php if(isset($data['user'][0]['Name'])){echo $data['user'][0]['Name'];};?>" name="fullname" placeholder="Nhập họ và tên">
                    </div>
                 <!-- </form> -->
                </div>
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Giới tính</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="glyphicon glyphicon-user"></i>
                        </button>
                      </div>
                      <!-- <input type="text" class="form-control" value="<?php if(isset($data['user'][0]['gender'])){echo $data['user'][0]['gender'];};?>" name="gender"> -->
                      <select name="gender" id="" class="form-control">
                        <option value="">===Giới tính===</option>
                        <option value="Nam" <?php echo (isset($data['user'][0]['gender']) && $data['user'][0]['gender'] == 'Nam')?'selected':''; ?>>Nam</option>
                        <option value="Nữ" <?php echo (isset($data['user'][0]['gender']) && $data['user'][0]['gender'] == 'Nữ')?'selected':''; ?>>Nữ</option>
                      </select>
                    </div>
                 <!-- </form> -->
                </div>
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Số điện thoại</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="glyphicon glyphicon-phone"></i>
                        </button>
                      </div>
                      <input type="text" class="form-control" value="<?php if(isset($data['user'][0]['Phone'])){echo $data['user'][0]['Phone'];};?>" placeholder="Nhập số điện thoại" name="phoneNumber">
                    </div>
                 <!-- </form> -->
                </div>
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Email</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="glyphicon glyphicon-envelope"></i>
                        </button>
                      </div>
                      <input type="text" class="form-control" value="<?php if(isset($data['user'][0]['Email'])){echo $data['user'][0]['Email'];};?>" placeholder="Nhập email" name="email">
                    </div>
                 <!-- </form> -->
                </div>
                <div class="info">
                  <!-- <form> -->
                    <h5><b>Địa chỉ</b></h5>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-default" disabled>
                          <i class="glyphicon glyphicon-home"></i>
                        </button>
                      </div>
                      <input type="text" class="form-control" value="<?php if(isset($data['user'][0]['address'])){echo $data['user'][0]['address'];};?>" placeholder="Nhập địa chỉ" name="address">
                    </div>
                 <!-- </form> -->
                </div>
                
                <input type="submit" class="btn btn-primary" value="Cập nhật" name="btn_update" style="margin:10px 0px 10px 100px; width: 85%;">
              </form>
            </div>
          </div>
      </div>
