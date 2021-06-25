<div id="post_detail">
    <!-- form search -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-9">
        <form class="search" action="">
          <input type="text" placeholder="Tìm kiếm" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
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
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i> (100)
        </div>
        <div class="post_react">
          <div class="post_like">
            <i class="fas fa-thumbs-up"></i>
            <p class="post_like_num"><?php echo $data['post'][0]['LikesAmount']; ?></p>
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
    <form action="" class="comment">
      <div class="form-group">
        <label for="comment">Nội dung bình luận:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <input type="submit" value="Bình luận" class="btn btn-primary">
    </form>
    <!-- Tất cả bình luận  -->
    <ul class="list_comment">
      <li class="comment_item">
        <div class="user_comment_thumb">
          <img
            src="https://scr.vn/wp-content/uploads/2020/07/%E1%BA%A2nh-%C4%91%E1%BA%A1i-di%E1%BB%87n-FB-m%E1%BA%B7c-%C4%91%E1%BB%8Bnh-n%E1%BB%AF.jpg"
            alt="">
        </div>
        <div class="comment_detail">
          <div class="user_comment">Thương Hoài</div>
          <div class="user_comment_desription"> Bài viết hay, hấp dẫn lắm.</div>
        </div>
      </li>
      <li class="comment_item">
        <div class="user_comment_thumb">
          <img
            src="https://scr.vn/wp-content/uploads/2020/07/%E1%BA%A2nh-%C4%91%E1%BA%A1i-di%E1%BB%87n-FB-m%E1%BA%B7c-%C4%91%E1%BB%8Bnh-n%E1%BB%AF.jpg"
            alt="">
        </div>
        <div class="comment_detail">
          <div class="user_comment">Thương Hoài</div>
          <div class="user_comment_desription"> Bài viết hay, hấp dẫn lắm.</div>
        </div>
      </li>
      <li class="comment_item">
        <div class="user_comment_thumb">
          <img
            src="https://scr.vn/wp-content/uploads/2020/07/%E1%BA%A2nh-%C4%91%E1%BA%A1i-di%E1%BB%87n-FB-m%E1%BA%B7c-%C4%91%E1%BB%8Bnh-n%E1%BB%AF.jpg"
            alt="">
        </div>
        <div class="comment_detail">
          <div class="user_comment">Thương Hoài</div>
          <div class="user_comment_desription"> Bài viết hay, hấp dẫn lắm.</div>
        </div>
      </li>
    </ul>
    <!-- Thông tin đánh giá  -->
    <h3>Đánh giá</h3>
    <div class="row rating">
      <div class="rating_score">
        <p class="rating_score_info">5</p>
        <div class="post_rank text-center">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i> 
        </div>
        <div class="number_ranked text-center">
          (100 đánh giá)
        </div>
      </div>
      <div class="rating_score_detail">
        <div class="name_star">
          <p>5 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:70%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>4 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:70%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>3 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:70%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>2 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:70%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
        <div class="name_star">
          <p>1 <i class="fas fa-star"></i></p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              style="width:70%">
              <!-- <span class="sr-only">70% Complete</span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>