<div class="rank_page">
    <!-- Hình ảnh đại diện rank  -->
    <!-- <div class="rank_thumb">
      <img src="../../public/assets/rank.png" alt="">
    </div> -->
    <!-- Xep hang bai viet  -->
    <div class="rank_post">
      <h3><i>Bài viết nổi bật</i></h3>
      <div class="card-content">

        <div class="sub-card">
          <h2 class="header" >Yêu thích</h2>    
          <div id="body-card">
              <?php
                if(isset($data['likedPost'])){
                    $i=1;
                    foreach($data['likedPost'] as $item){
                            

              ?>

                <div  class="body-card-row">
                      
                    <div><?php echo '#'.$i ?></div>
                    <div class="cut-text"><?php echo (isset($item['Title']))?$item['Title']:'Đang cập nhật'; ?></div>
                    <div> <?php echo (isset($item['LikesAmount']))?$item['LikesAmount']:'Đang cập nhật'; ?></div>
                </div>
              <?php
                    $i++;
                }}
                else{
                  echo '<div class="body-card-empty"> Đang cập nhật</div>';
                }
              ?>
          </div>
        </div>

        <div class="sub-card">
            <h2 class="header" >Bình luận</h2>    
            <div id="body-card">
            <?php
                if(isset($data['cmtdPost'])){
                    $i=1;
                    foreach($data['cmtdPost'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php echo '#'.$i ?></div>
                    <div class="cut-text"><?php echo (isset($item['Title']))?$item['Title']:'Đang cập nhật'; ?></div>
                    <div> <?php echo (isset($item['commentAmount']))?$item['commentAmount']:'Đang cập nhật'; ?></div>
                </div>
            <?php
                    $i++;
                }}
                else{
                  echo '<div class="body-card-empty"> Đang cập nhật</div>';
                }
            ?>
          <!-- <div  class="body-card-row">
                  <div>#1</div>
                  <div class="cut-text"> ákfjhsflksasdfsafasfsdfasfsdfsssssssssssssssssssssssssssssssssssssssssssssssj</div>
                  <div> 20000000</div>
              </div>
              <div  class="body-card-row">
                  <div>#2</div>
                  <div class="cut-text"> ákfjhsflksasdfsafasfsdfasfsdfsssssssssssssssssssssssssssssssssssssssssssssssj</div>
                  <div> 20000000</div>
              </div>
              <div  class="body-card-row">
                  <div>#3</div>
                  <div class="cut-text"> ákfjhsflksasdfsafasfsdfasfsdfsssssssssssssssssssssssssssssssssssssssssssssssj</div>
                  <div> 20000000</div>
              </div>
              <div  class="body-card-row">
                  <div>#4</div>
                  <div class="cut-text"> ákfjhsflksasdfsafasfsdfasfsdfsssssssssssssssssssssssssssssssssssssssssssssssj</div>
                  <div> 20000000</div>
              </div>
              <div  class="body-card-row">
                  <div>#5</div>
                  <div class="cut-text"> ákfjhsflksasdfsafasfsdfasfsdfsssssssssssssssssssssssssssssssssssssssssssssssj</div>
                  <div> 20000000</div>
              </div> -->
          </div>
        </div>
        <div class="sub-card">
            <h2 class="header" >Đánh giá</h2>    
            <div id="body-card">
            <?php
                if(isset($data['ratedPost'])){
                    $i=1;
                    foreach($data['ratedPost'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php echo '#'.$i ?></div>
                    <div class="cut-text"><?php echo (isset($item['Title']))?$item['Title']:'Đang cập nhật'; ?></div>
                    <div> <?php echo (isset($item['AvgRating']))?$item['AvgRating']:'Đang cập nhật'; ?></div>
                </div>
            <?php
                    $i++;
                }}
                else{
                  echo '<div class="body-card-empty"> Đang cập nhật</div>';
                }
            ?>
          </div>
        </div>
      </div>
      <h3><i>Thành viên tiêu biểu</i></h3>
      <div class="card-content" style="justify-content: space-around">

        <div class="sub-card">
          <h2 class="header" >Số bài viết</h2>    
          <div id="body-card">
            <?php
                if(isset($data['PostMostUser'])){
                    $i=1;
                    foreach($data['PostMostUser'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php echo '#'.$i ?></div>
                    <div class="cut-text"><?php echo (isset($item['Name']))?$item['Name']:'Đang cập nhật'; ?></div>
                    <div> <?php echo (isset($item['PostAmount']))?$item['PostAmount']:'Đang cập nhật'; ?></div>
                </div>
            <?php
                    $i++;
                }}
                else{
                  echo '<div class="body-card-empty"> Đang cập nhật</div>';
                }
            ?>
          </div>
        </div>

        <div class="sub-card">
          <h2 class="header" >Bình luận</h2>    
          <div id="body-card">
            <?php
                if(isset($data['cmtdUser'])){
                    $i=1;
                    foreach($data['cmtdUser'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php echo '#'.$i ?></div>
                    <div class="cut-text"><?php echo (isset($item['Name']))?$item['Name']:'Đang cập nhật'; ?></div>
                    <div> <?php echo (isset($item['CommentAmount']))?$item['CommentAmount']:'Đang cập nhật'; ?></div>
                </div>
            <?php
                    $i++;
                }}
                else{
                  echo '<div class="body-card-empty"> Đang cập nhật</div>';
                }
            ?>
          </div>
        </div>
        
      </div>
    </div>
</div>