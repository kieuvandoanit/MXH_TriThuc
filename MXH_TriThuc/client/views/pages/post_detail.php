<div id="post_detail">
    <!-- form search -->
    <!-- <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-9">
        <form class="search" action="">
          <input type="text" placeholder="Tìm kiếm" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div> -->
    <!-- header post  -->
    <div class="row header_post">
      <div class="post_thumb" style="width:500px; height: 280px; overflow:hidden;">
        <img src="<?php echo $data['post'][0]['thumb']; ?>" alt="" style="width: 100%;">
      </div>
      <div class="post_info">
        <div class="post_title">
        <?php echo $data['post'][0]['Title']; ?>
        </div>
        <div class="post_time">
        <?php echo $data['post'][0]['CreatedDate']; ?>
        </div>
        <div class="post_username"><i class="fas fa-user" style="margin-right: 5px;"></i><?php echo $data['post'][0]['Name']; ?></div>
        <div class="post_rank">
        <?php  
          $count = 1;
          for($i = 0; $i <5; $i++){
            if($count < $data['post'][0]['AvgRating'] + 0.5){
              ?>
              <i class="fas fa-star"></i>
              <?php
              $count= $count + 1;
            }else{
              ?>
              <i class="far fa-star"></i> 
              <?php  
            }
          }
          ?>
        </div>
        <div class="post_react">
          <div class="post_like" id="<?php echo $data['post'][0]['Post_id']; ?>">
            <i class="fas fa-thumbs-up" id="<?php echo $data['post'][0]['Post_id']; ?>"></i>
            <p id="<?php echo $data['post'][0]['Post_id']; ?>" class="post_like_num postLikeNum_<?php echo $data['post'][0]['Post_id']; ?>"><?php echo $data['post'][0]['LikesAmount']; ?></p>
          </div>
          <div class="post_comment">
            <i class="fas fa-comment"></i>
            <p class="post_comment_num"><?php echo $data['post'][0]['commentAmount']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Post description  -->
    <h3>Nội dung bài viết</h3>
    <div class="post_description">
    <?php echo $data['post'][0]['Content']; ?>
    </div>
    <!-- Bình luận  -->
    <h3>Bình luận</h3>
    <!-- form bình luận  -->
    <form action="<?php echo HEADERLINK.'/comment/handleAddComment'; ?>" class="comment" method="POST">
      <div class="form-group">
        <label for="comment">Nội dung bình luận:</label>
        <textarea class="form-control" name="content" rows="5" id="content"></textarea><br>
        <input type="hidden" name="idpost" id="post_id" class="form-control" value="<?php echo $data['post'][0]['Post_id']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="btn_addComment" value="Bình luận" >
      </div>
    </form>
    <!-- Tất cả bình luận  -->
    <div id="table">
      <ul id="postTable" class="list_comment">
        
      </ul>
    </div>
    <!-- Thông tin đánh giá  -->
    <form action="<?php echo HEADERLINK.'/post/rating/'.$data['post'][0]['Post_id']; ?>" id="form_rating_post" method="POST">
      <div class="form-group col-md-3">
        <select name="rating" class="form-control">
          <option value="0">==Đánh giá==</option>
          <option value="1">1 sao</option>
          <option value="2">2 sao</option>
          <option value="3">3 sao</option>
          <option value="4">4 sao</option>
          <option value="5">5 sao</option>
        </select>
      </div>
      <div class="col-md-2"><input class="btn btn-primary" type="submit" name="btn_rating_post" id="btn_rating_post" value="Đánh giá"/></div>
      <div class="col-md-7"></div>
    </form><br><br><br>
    <h3>Đánh giá</h3>
    <div class="row rating">
      <div class="rating_score">
        <p class="rating_score_info" id="post_rating_score_number"><?php echo $data['post'][0]['AvgRating']; ?></p>
        <div class="post_rank text-center" id="post_rating_score_start">
          <?php  
          $count = 1;
          for($i = 0; $i <5; $i++){
            if($count < $data['post'][0]['AvgRating'] + 0.5){
              ?>
              <i class="fas fa-star"></i>
              <?php
              $count= $count + 1;
            }else{
              ?>
              <i class="far fa-star"></i> 
              <?php  
            }
          }
          ?>
        </div>
        <div class="number_ranked text-center" id="post_count_rating">
          (<?php echo $data['post'][0]['rateAmount']; ?> đánh giá)
        </div>
      </div>
      <div class="rating_score_detail">
        <div class="name_star">
          <p>5 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" id="5star" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:<?php echo $data['sao5']; ?>%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>4 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" id="4star" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:<?php echo $data['sao4']; ?>%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>3 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" id="3star" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:<?php echo $data['sao3']; ?>%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>2 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" id="2star" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:<?php echo $data['sao2']; ?>%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>1 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" id="1star" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:<?php echo $data['sao1']; ?>%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
    data=<?php echo json_encode($data['comment']) ?>;
    pagination(data);
});
function showData(data){
    contentHtml='';
    console.log(data);
    for(const key in data){
        contentHtml+=`<li class="comment_item">
          <div class="user_comment_thumb">
            <img
              src="${((data[key]['Avatar'])?data[key]['Avatar']:'client/public/assets/avatar.jpg')}"
              alt="">
          </div>
                          
          <div class="comment_detail">
            <div class="user_comment">${data[key]['Name']}</div>
            <div class="user_comment_desription"> ${data[key]['Content']}</div>
          </div>
          <div>
            <form action="<?php echo HEADERLINK.'/comment/handleIsSpam'; ?>" method="POST">
              <button type="submit" class="btn btn-light" name="btn_isSpam" title="Spam"><i class="fas fa-info-circle"></i></button>
              <input type="hidden" name="idpost" id="post_id" class="form-control" value="<?php echo $data['post'][0]['Post_id']; ?>">
              <input type="hidden" name="commentID" id="cmt_id" class="form-control" value="${data[key]['Comment_id']}">
            </form>
          </div>
        </li>`;
    };
    $("#postTable").html(contentHtml);
};
</script>
