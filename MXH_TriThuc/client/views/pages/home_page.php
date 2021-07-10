<div id="home_page">
  <div id="top_home_page">
    <div id="category" class="col-md-3">
      <ul class="list_category">
      <?php  
      foreach ($data['category'] as $category){
        ?>
        <li class="category_item"><a href=""><?php echo $category['CategoryName'] ?></a></li>
        <?php  
      }
      ?>
        
        
      </ul>
    </div>
    <div id="seach_slider" class="col-md-9">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php
          $key = 0;
          foreach($data['slider'] as $slide){
            ?>
              <div class="item <?php if($key == 0){echo 'active';} ?>" style="height: 370px; width: 560px; overflow: hidden;">
                <img src="<?php echo $slide['thumb']; ?>" alt="" style="hight: 100%; width: auto;">
              </div>
            <?php 
            $key++; 
          }
          ?>
          </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div id="most_view">
    <div class="most_view_header">
      <div class="title">
        <div class="left_title">Xem nhiều nhất</div>
        <div class="right_title"><a href="">Xem tất cả</a></div>
      </div>
    </div>
    <div class="list_post">
      <?php  
      $m = count($data['post_view']);
      if($m > 4){
        $m = 4;
      }
        for($i = 0; $i < $m; $i++){
          ?>
            <div class="col-md-3">
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
                    <div class="post_like<?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_view'][$i]['Post_id']){
                                echo "post_liked";
                              }
                            }
                          }
                        ?>" id="<?php echo $data['post_view'][$i]['Post_id']; ?>">
                      <i class="fas fa-thumbs-up fa-thumbs-up-<?php echo $data['post_view'][$i]['Post_id']; ?>" style=" <?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_view'][$i]['Post_id']){
                                echo "color:black";
                              }
                            }
                          }
                        ?>" id="<?php echo $data['post_view'][$i]['Post_id']; ?>"></i>
                      <p class="post_like_num postLikeNum_<?php echo $data['post_view'][$i]['Post_id']; ?>" id="<?php echo $data['post_view'][$i]['Post_id']; ?>" ><?php echo $data['post_view'][$i]['LikesAmount']; ?></p>
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
  <div id="new_post">
    <div class="new_post_header">
      <div class="title">
        <div class="left_title">Bài viết mới nhất</div>
        <div class="right_title"><a href="">Xem tất cả</a></div>
      </div>
    </div>
    <div class="list_post">
      <?php
      $n = count($data['post_new']);
      if($n > 4){
        $n = 4;
      }
      for($i = 0; $i<$n;$i++){
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
                        <i id="<?php echo $data['post_new'][$i]['Post_id']; ?>" class="fas fa-thumbs-up fa-thumbs-up-<?php echo $data['post_new'][$i]['Post_id']; ?>" style="<?php 
                          if(!empty($data['liked'])){
                            foreach($data['liked'] as $temp){
                              if($temp['Post_id'] == $data['post_new'][$i]['Post_id']){
                                echo "color:black";
                              }
                            }
                          }
                        
                        ?>"></i>
                        <p id="<?php echo $data['post_new'][$i]['Post_id']; ?>" class="post_like_num postLikeNum_<?php echo $data['post_new'][$i]['Post_id']; ?>"><?php echo $data['post_new'][$i]['LikesAmount']; ?></p>
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
