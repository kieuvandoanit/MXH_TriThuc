
<div id = "profile_page">
    <div id = "top_profile_page" class="background">
      <div class="col-md-6">
        <div class="avatar">
          <img class="avatar_size" src="<?php echo isset($data['user'][0]['Avatar'])?$data['user'][0]['Avatar']:'client/public/assets/avatar.jpg';?>" alt="">
        </div>
      </div>
      <div id="your_info" class="col-md-6">
        <ul class="">
          <li class="name">
            <h1><?php echo isset($data['user'][0]['Name'])?$data['user'][0]['Name']:'Họ tên chưa cập nhật'; ?></h1>
          </li>
          <li class="job"><?php echo isset($data['user'][0]['Level_id'])?$data['user'][0]['Level_id']:'Level chưa cập nhật'; ?></li>
          <li class="phone"><?php echo isset($data['user'][0]['Phone'])?$data['user'][0]['Phone']:'Số điện thoại chưa cập nhật';?></li>
          <li class="mail"><?php echo isset($data['user'][0]['Email'])?$data['user'][0]['Email']:'Email chưa cập nhật';?></li>
          <li class="address"><?php echo isset($data['user'][0]['address'])?$data['user'][0]['address']:'Địa chỉ chưa cập nhật';?></li>
        </ul>
        <div class="posts_react col-md-6 col-md-offset-3">
          <div class="posts_like">
            <i class="fas fa-file-alt"></i>
            <p class="posts_num"><?php if(isset($data['user'][0])){ echo $data['user'][0]['PostAmount'];} ?></p>
          </div>
          <div class="posts_comment">
            <i class="fas fa-comment"></i>
            <p class="posts_comment_num"><?php if(isset($data['user'][0])){ echo $data['user'][0]['CommentAmount'];} ?></p>
          </div> 
        </div>
      </div>
      <div class="replace">
        <div class="input-group-btn">
          <button class="btn btn-default">
            <a href="<?php echo HEADERLINK.'/user/editProfile/'?>"><i class="glyphicon glyphicon-pencil"></i></a>
          </button>
        </div>
      </div>
    </div>
    <div id="pf_posts" class="background_pf_posts">
      <div class="list_your_post">
        <div class="posts">
          <div class="row">
            <div class="title col-md-3">
              <div class="left_titles">Bài viết</div>
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-2" style="margin-top: 30px;"><a href="<?php echo HEADERLINK.'/post/addPost'; ?>" class="btn btn-success">Thêm bài viết</a></div>
          </div>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col" style="width: 5%; overflow: hidden;">#</th>
                <th scope="col" style="width: 55%; overflow: hidden;">Tiều đề</th>
                <th scope="col" style="width: 15%; overflow: hidden;">Trạng thái</th>
                <th scope="col" style="width: 10%; overflow: hidden;">Đánh giá</th>
                <th scope="col" style="width: 22%; overflow: hidden;">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;  
                foreach($data['postList'] as $post){
                  $count++;
                  ?>
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><a href=""><?php echo $post['Title']; ?></a></td>
                      <td><?php echo $post['Status']; ?></td>
                      <td><?php echo $post['AvgRating']; ?></td>
                      <td>
                        <a href="<?php echo HEADERLINK.'/post/editPost/'.$post['Post_id']; ?>">Sửa</a>
                        <a href="<?php echo HEADERLINK.'/post/deletePost/'.$post['Post_id']; ?>">Xóa</a>
                      </td>
                    </tr>
                  <?php  
                }
              ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>