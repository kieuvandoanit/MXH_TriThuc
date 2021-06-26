<div id="post_page">
    <div id="top_home_page">
      <div id="category" class="col-md-3">
        <ul class="list_category">
          <li class="category_item"><a href="">Tự nhiên</a></li>
          <li class="category_item"><a href="">Xã hội</a></li>
          <li class="category_item"><a href="">Tâm lý</a></li>
          <li class="category_item"><a href="">Sức khỏe</a></li>
          <li class="category_item"><a href="">Tài chính</a></li>
          <li class="category_item"><a href="">Công nghệ</a></li>
          <li class="category_item"><a href="">Khoa học</a></li>
          <li class="category_item"><a href="">Văn học</a></li>
          <li class="category_item"><a href="">Kỹ thuật</a></li>
          <li class="category_item"><a href="">Nghệ thuật</a></li>
          <li class="category_item"><a href="">Luật</a></li>
        </ul>
      </div>
      <div id="seach_slider" class="col-md-9">
        <div id="search">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div id="most_view">
          <div class="most_view_header">
            <div class="title">
              <div class="left_title">Xem nhiều nhất</div>
              <div class="right_title"><a href="">Xem tất cả</a></div>
            </div>
          </div>
          <div class="list_post" >
            <?php
            $n = count($data['post_view']);
            if($n > 6){
              $n = 6;
            }
            for($i = 0; $i < $n; $i++){
              ?>
                <div class="col-md-4">
                  <div class="post">
                    <div class="post_thumb">
                      <img src="<?php echo $data['post_view'][$i]['thumb']; ?>" alt="">
                    </div>
                    <div class="post_title">
                      <a href="<?php echo HEADERLINK.'/post/postDetail/'.$data['post_view'][$i]['Post_id']; ?>" class="post_link"><?php echo $data['post_view'][$i]['Title']; ?></a>
                    </div>
                    <div class="post_describe">
                      <div class="post_datetime">
                      <?php echo $data['post_view'][$i]['CreatedDate']; ?>
                      </div>
                      <div class="post_author">
                        <div class="author_name"><a href="" class="author_link"><?php echo $data['post_view'][$i]['Name']; ?></a></div>
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
                        (<?php echo $data['post_view'][$i]['rateAmount']; ?>)
                      </div>
                    </div>
                    <div class="post_react">
                      <div class="post_like <?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_view'][$i]['Post_id']){
                                echo "post_liked";
                              }
                            }
                          }
                        ?>" id="<?php echo $data['post_view'][$i]['Post_id']; ?>">
                        <i class="fas fa-thumbs-up fa-thumbs-up-<?php echo $data['post_view'][$i]['Post_id']; ?>" style="<?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_view'][$i]['Post_id']){
                                echo "color:black";
                              }
                            }
                          }
                        ?>"></i>
                        <p class="post_like_num postLikeNum_<?php echo $data['post_view'][$i]['Post_id']; ?>"><?php echo $data['post_view'][$i]['LikesAmount']; ?></p>
                      </div>
                      <div class="post_comment">
                        <i class="fas fa-comment"></i>
                        <p class="post_comment_num"><?php echo $data['post_view'][$i]['commentAmount']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
              }
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="new_post">
      <div class="new_post_header">
        <div class="title">
          <div class="left_title">Bài viết mới nhất</div>
          <div class="right_title"><a href="">Xem tất cả</a></div>
        </div>
      </div>
      <div class="list_post">
      <?php 
      $a = count($data['post_new']);
      if($a > 8){
        $a = 8;
      } 
            for($i = 0; $i<$a; $i++){
                ?>
                <div class="col-md-3">
                  <div class="post">
                    <div class="post_thumb">
                      <img src="<?php echo $data['post_new'][$i]['thumb']; ?>" alt="">
                    </div>
                    <div class="post_title">
                      <a href="<?php echo HEADERLINK.'/post/postDetail/'.$data['post_new'][$i]['Post_id']; ?>" class="post_link"><?php echo $data['post_new'][$i]['Title']; ?></a>
                    </div>
                    <div class="post_describe">
                      <div class="post_datetime">
                      <?php echo $data['post_new'][$i]['CreatedDate']; ?>
                      </div>
                      <div class="post_author">
                        <div class="author_name"><a href="" class="author_link"><?php echo $data['post_new'][$i]['Name']; ?></a></div>
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
                        (<?php echo $data['post_new'][$i]['rateAmount']; ?>)
                      </div>
                    </div>
                    <div class="post_react">
                      <div class="post_like <?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_new'][$i]['Post_id']){
                                echo "post_liked";
                              }
                            }
                          }
                        ?>" id="<?php echo $data['post_new'][$i]['Post_id']; ?>">
                        <i class="fas fa-thumbs-up fa-thumbs-up-<?php echo $data['post_new'][$i]['Post_id']; ?>" style="<?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_new'][$i]['Post_id']){
                                echo "color:black";
                              }
                            }
                          }
                        ?>"></i>
                        <p class="post_like_num postLikeNum_<?php echo $data['post_new'][$i]['Post_id']; ?>"><?php echo $data['post_new'][$i]['LikesAmount']; ?></p>
                      </div>
                      <div class="post_comment">
                        <i class="fas fa-comment"></i>
                        <p class="post_comment_num"><?php echo $data['post_new'][$i]['commentAmount']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
              
            }
            ?>
        <div class="clearfix"></div>
      </div>
      
    </div>
</div>