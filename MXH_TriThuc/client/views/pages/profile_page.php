
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
          <li class="job"><?php 
            
            if(isset($data['user'][0]['Level_id'])){
              if($data['user'][0]['Level_id'] == 1){
                echo "Cấp bậc: Học sinh";
              }else if($data['user'][0]['Level_id'] == 2){
                echo "Cấp bậc: Sinh viên";
              }else if($data['user'][0]['Level_id'] == 3){
                echo "Cấp bậc: Thạc sĩ";
              }else if($data['user'][0]['Level_id'] == 4){
                echo "Cấp bậc: Tiến sĩ";
              }else if($data['user'][0]['Level_id'] == 5){
                echo "Cấp bậc: Giáo sư";
              }else{
                echo "Cấp bậc: Chưa cập nhật";
              }
            }
              else{
                'Level chưa cập nhật';} 
            
            ?></li>
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
          <table id="table" class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col" style="width: 5%; overflow: hidden;">#</th>
                <th scope="col" style="width: 55%; overflow: hidden;">Tiều đề</th>
                <th scope="col" style="width: 15%; overflow: hidden;">Trạng thái</th>
                <th scope="col" style="width: 10%; overflow: hidden;">Đánh giá</th>
                <th scope="col" style="width: 22%; overflow: hidden;">Hành động</th>
              </tr>
            </thead>
            <tbody id="postTable">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function(){
      data=<?php echo json_encode($data['postList']) ?>;
      pagination(data);
  });
  function showData(data){
      contentHtml='';
      console.log(data);
      for(const key in data){
          contentHtml+='<tr><th scope="row">'+(parseInt(key)+1)+'</th>';
          contentHtml+='<td>'+((data[key]['Title'])?data[key]['Title']:"Chưa cập nhật")+'</td>';
          contentHtml+='<td>'+((data[key]['Status'])?data[key]['Status']:"Chưa cập nhật")+'</td>';
          contentHtml+='<td>'+((data[key]['AvgRating'])?data[key]['AvgRating']:"Chưa cập nhật")+'</td>';
          contentHtml+='<td>';
          contentHtml+= '<a href="<?php echo HEADERLINK?>/post/editPost/'+data[key]['Post_id']+'">Sửa</a>';
          contentHtml+= '<a href="<?php echo HEADERLINK?>/post/deletePost/'+data[key]['Post_id']+'">Xóa</a></td></tr>';
      };
      $("#postTable").html(contentHtml);
  };
</script>