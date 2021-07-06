<div id="post_page" style="min-height: calc(100vh - 235px);">
    <div id="top_home_page">
      <div id="seach_slider">
          <div class="list_post" >
            <?php
            if(isset($data) and count($data)>0){
              if($data['resultType']=='HashTag'){
                echo '<div><h3><i> Kết quả tìm kiếm theo HashTag</h3></i></div><br>';
              }
              elseif ($data['resultType']=='Nội dung'){
                echo '<div><b>Kết quả tìm kiếm theo tên bài viết hoặc nội dung</b></div>';
              }
              foreach($data['resultValue'] as $item){
            ?>
            <div class="col-md-3">
              <div class="post">
                <div class="post_thumb">
                  <img src="<?php echo $item['thumb']; ?>" alt="">
                </div>
                <div class="post_title">
                  <a href="<?php echo HEADERLINK.'/post/postDetail/'.$item['Post_id']; ?>" class="post_link"><?php echo $item['Title']; ?></a>
                </div>
                <div class="post_describe">
                  <div class="post_datetime">
                  <?php echo $item['CreatedDate']; ?>
                  </div>
                  <div class="post_author">
                    <div class="author_name"><a href="" class="author_link"><?php echo $item['Name']; ?></a></div>
                    <div class="author_icon"><i class="far fa-user-circle"></i></div>
                  </div>
                </div>
                <div class="post_rating">
                  <div class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="rate_num">
                    (<?php echo $item['rateAmount']; ?>)
                  </div>
                </div>
                <div class="post_react">
                  <div class="post_like <?php 
                      if(!empty($data['liked'])){
                        foreach($data['liked'] as $temp){
                          if($temp['Post_id'] == $item['Post_id']){
                            echo "post_liked";
                          }
                        }
                      }
                    ?>" id="<?php echo $item['Post_id']; ?>">
                    <i class="fas fa-thumbs-up fa-thumbs-up-<?php echo $item['Post_id']; ?>" style="<?php 
                      if(!empty($data['liked'])){
                        foreach($data['liked'] as $temp){
                          if($temp['Post_id'] == $item['Post_id']){
                            echo "color:black";
                          }
                        }
                      }
                    
                    ?>"></i>
                    <p class="post_like_num postLikeNum_<?php echo $item['Post_id']; ?>"><?php echo $item['LikesAmount']; ?></p>
                  </div>
                  <div class="post_comment">
                    <i class="fas fa-comment"></i>
                    <p class="post_comment_num"><?php echo $item['commentAmount']; ?></p>
                  </div>
                </div>
                </div>
            </div>
            <?php
              }
            }else{
            ?>
            <div>
              <h2>Không có thông tin tìm kiếm</h2>
            </div>
            <?php
            }
            ?>
            <div class="clearfix"></div>
          </div>
      </div>
    </div>
</div>