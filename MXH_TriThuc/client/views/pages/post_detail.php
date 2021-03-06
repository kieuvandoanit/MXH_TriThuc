<?php  
if(!empty($data['post'])){ 
  ?>
  
<div id="post_detail">
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
        <div class="post_username"><a href="<?php echo HEADERLINK.'/user/ViewProfile/'.$data['post'][0]["User_id"];?>" style="text-decoration: none;color:white"><i class="fas fa-user" style="margin-right: 5px;"></i><?php echo $data['post'][0]['Name']; ?></a></div>
        <div class="post_rank post_rating_score_start">
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
          <div class="post_like <?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post'][0]['Post_id']){
                                echo "post_liked";
                              }
                            }
                          }
                        ?>
          " id="<?php echo $data['post'][0]['Post_id']; ?>">
            <i class="fas fa-thumbs-up fa-thumbs-up-<?php echo $data['post'][0]['Post_id']; ?>" id="<?php echo $data['post'][0]['Post_id']; ?>" style="<?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post'][0]['Post_id']){
                                echo "color:black";
                              }
                            }
                          }
                        ?>"></i>
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
    <h3>N???i dung b??i vi???t</h3>
    <div class="post_description">
    <?php echo $data['post'][0]['Content']; ?>
    </div>
    <!-- B??nh lu???n  -->
    <h3>B??nh lu???n</h3>
    <!-- form b??nh lu???n  -->
    <?php if(isset($_SESSION['userID'])){
      ?>
      <form action="<?php echo HEADERLINK.'/comment/handleAddComment'; ?>" class="comment" method="POST">
      <div class="form-group">
        <label for="comment">N???i dung b??nh lu???n:</label>
        <textarea class="form-control" name="content" rows="5" id="content"></textarea><br>
        <input type="hidden" name="idpost" id="post_id" class="form-control" value="<?php echo $data['post'][0]['Post_id']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="btn_addComment" value="B??nh lu???n" >
      </div>
    </form>
      <?php  
    } ?>
    
    <!-- T???t c??? b??nh lu???n  -->
    <div id="table">
      <ul id="postTable" class="list_comment">
        
      </ul>
    </div>
    <!-- Th??ng tin ????nh gi??  -->
    <?php if(isset($_SESSION['userID'])){
      ?>
      <form data-action="<?php echo HEADERLINK.'/post/rating/'.$data['post'][0]['Post_id']; ?>" id="form_rating_post" method="POST">
      <div class="form-group col-md-3">
        <select name="rating" class="form-control">
          <option value="0">==????nh gi??==</option>
          <option value="1" <?php echo (!empty($data['historyRating'][0]) && $data['historyRating'][0]['Rate'] == '1 sao')?'selected':''; ?>>1 sao</option>
          <option value="2" <?php echo (!empty($data['historyRating'][0]) && $data['historyRating'][0]['Rate'] == '2 sao')?'selected':''; ?>>2 sao</option>
          <option value="3" <?php echo (!empty($data['historyRating'][0]) && $data['historyRating'][0]['Rate'] == '3 sao')?'selected':''; ?>>3 sao</option>
          <option value="4" <?php echo (!empty($data['historyRating'][0]) && $data['historyRating'][0]['Rate'] == '4 sao')?'selected':''; ?>>4 sao</option>
          <option value="5" <?php echo (!empty($data['historyRating'][0]) && $data['historyRating'][0]['Rate'] == '5 sao')?'selected':''; ?>>5 sao</option>
        </select>
      </div>
      <div class="col-md-2"><input class="btn btn-primary" type="submit" name="btn_rating_post" id="btn_rating_post" value="????nh gi??" <?php echo !isset($_SESSION['userID'])?'disabled':''; ?>/></div>
      <div class="col-md-7"></div>
    </form>
      <?php  
    } ?>
    <br><br><br>
    <h3>????nh gi??</h3>
    <div class="row rating">
      <div class="rating_score">
        <p class="rating_score_info" id="post_rating_score_number"><?php echo round($data['post'][0]['AvgRating'],1); ?></p>
        <div class="post_rank text-center post_rating_score_start">
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
          (<?php echo $data['post'][0]['rateAmount']; ?> ????nh gi??)
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
  <?php  
}

?>
<script>
$(document).ready(function(){
    data=<?php echo json_encode($data['comment']) ?>;
    pagination(data);
});
function showData(data){
    contentHtml='';
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
              <button type="submit" class="btn btn-light" name="btn_isSpam" title="Spam" <button type="submit" class="btn btn-light" name="btn_isSpam" title="Spam" style="color:red;height: 50px;display: flex;justify-content: center;align-items: center;/* border: 1px solid transparent; */background-color: #6db8bb2b;"><i class="fas fa-exclamation-triangle" style="color:red; height:30px"></i></button>
              <input type="hidden" name="idpost" id="post_id" class="form-control" value="<?php echo $data['post'][0]['Post_id']; ?>">
              <input type="hidden" name="commentID" id="cmt_id" class="form-control" value="${data[key]['Comment_id']}">
            </form>

              <input type="hidden" name="idpost" id="post_id" class="form-control" value="<?php echo $data['post'][0]['Post_id']; ?>">
              <input type="hidden" name="commentID" id="cmt_id" class="form-control" value="${data[key]['Comment_id']}">
            </form>
          </div>
        </li>`;
    };
    $("#postTable").html(contentHtml);
};
</script>
