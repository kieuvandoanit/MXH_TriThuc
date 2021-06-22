
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
            <p class="posts_num">25</p>
          </div>
          <div class="posts_comment">
            <i class="fas fa-comment"></i>
            <p class="posts_comment_num">99</p>
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
          <div class="title">
            <div class="left_titles">Bài viết</div>
          </div>
          <div class="posts_detail">
            <div class="posts_title_detail">
              <div class="col-md-1">
                <img class="image1" src="../../assets/avatar.png" alt="">
              </div>
              <div class="post_name">Làm sao để dậy sớm?</div>
              <div class="post_datetime">
                20/04/2021 10:57
              </div>
            </div>
            <div class="content">
              <p>Ben Franklin đã đúng khi nói 'Ngủ sớm và dậy sớm, sẽ giúp một người đàn ông khỏe mạnh, giàu có và khôn ngoan'. Có lẽ ông được truyền cảm hứng từ các nhà triết học Aristotle, người đã nói 'Sẽ rất tốt khi thức dậy trước bình minh, đây là thói quen giúp rất nhiều cho sức khỏe, thịnh vượng và trí tuệ'.<br>
                Ngay cả trong nhiều câu tục ngữ xưa cũng đề cao tinh thần dậy sớm mang lại cho bạn nhiều điều hơn. Đúng hơn, những thói quen tốt vào buổi sáng hàng ngày sẽ mang đến sự khác biệt. Dưới đây là một vài mẹo để khởi động năm mới và đem đến sự khởi đầu mới tuyệt vời.</p>
            </div>
            <div class="item">
              <img class="post_images" src="../../assets/slider.PNG" alt="">
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="posts_react">
                  <div class="posts_like">
                    <i class="fas fa-thumbs-up"></i>
                    <p class="posts_like_num">999</p>
                  </div>
                  <div class="posts_comment">
                    <i class="fas fa-comment"></i>
                    <p class="posts_comment_num">99</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-md-offset-6">
                <div class="post_rating">
                  <div class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="rate_num">
                    (100 Đánh giá)
                  </div>
                </div>
              </div>
  
            </div>
            <div id="comment">
              <div class="col-md-1">
                <img class="image1" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Thêm bình luận">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-plus"></i>
                      </button>
                    </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="left_t">
                <a href="">Xem tất cả các bình luận</a>
              </div>
            </div>
            
          </div>
          <div class="posts_detail">
            <div class="posts_title_detail">
              <div class="col-md-1">
                <img class="image1" src="../../assets/avatar.png" alt="">
              </div>
              <div class="post_name">Làm sao để dậy sớm?</div>
              <div class="post_datetime">
                20/04/2021 10:57
              </div>
            </div>
            <div class="content">
              <p>Ben Franklin đã đúng khi nói 'Ngủ sớm và dậy sớm, sẽ giúp một người đàn ông khỏe mạnh, giàu có và khôn ngoan'. Có lẽ ông được truyền cảm hứng từ các nhà triết học Aristotle, người đã nói 'Sẽ rất tốt khi thức dậy trước bình minh, đây là thói quen giúp rất nhiều cho sức khỏe, thịnh vượng và trí tuệ'.<br>
                Ngay cả trong nhiều câu tục ngữ xưa cũng đề cao tinh thần dậy sớm mang lại cho bạn nhiều điều hơn. Đúng hơn, những thói quen tốt vào buổi sáng hàng ngày sẽ mang đến sự khác biệt. Dưới đây là một vài mẹo để khởi động năm mới và đem đến sự khởi đầu mới tuyệt vời.</p>
            </div>
            <div class="item">
              <img class="post_images" src="../../assets/slider.PNG" alt="">
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="posts_react">
                  <div class="posts_like">
                    <i class="fas fa-thumbs-up"></i>
                    <p class="posts_like_num">999</p>
                  </div>
                  <div class="posts_comment">
                    <i class="fas fa-comment"></i>
                    <p class="posts_comment_num">99</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-md-offset-6">
                <div class="post_rating">
                  <div class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="rate_num">
                    (100 Đánh giá)
                  </div>
                </div>
              </div>
            </div>
            <div id="comment">
              <div class="col-md-1">
                <img class="image1" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Thêm bình luận">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-plus"></i>
                      </button>
                    </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="col-md-1">
                <img class="image2" src="../../assets/avatar.png" alt="">
              </div>
              <div class="comment">
                <form>
                  <h5><b>Thương Hoài</b></h5>
                  <div class="input-group">
                    <input type="text" class="form-control" value="Bài viết hay">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-option-horizontal"></i>
                      </button>
                  </div>
                  </div>
               </form>
              </div>
              <div class="left_t">
                <a href="">Xem tất cả các bình luận</a>
              </div>
            </div>                
          </div>
        </div>
      </div>
    </div>
  </div>