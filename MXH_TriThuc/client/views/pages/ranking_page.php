<div class="rank_page">
    <!-- Xep hang bai viet  -->
    <div class="rank_post">
      <h3>Bài viết nổi bật</h3>
      <div class="card-content">

        <div class="sub-card">
          <h3 class="header" >Yêu thích</h3>    
          <div id="body-card">
              <?php
                if(isset($data['likedPost'])){
                    $i=1;
                    foreach($data['likedPost'] as $item){
              ?>
                <div  class="body-card-row">
                    <div><?php
                      if($i==1){
                        echo '<i class="fas fa-medal first"></i>';
                      }elseif($i==2){
                        echo '<i class="fas fa-medal second"></i>';
                      }elseif($i==3){
                        echo '<i class="fas fa-medal third"></i>';
                      }else{
                        echo '<i class="fas fa-medal afterthird"></i>';
                      }
                     ?></div>
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
            <h3 class="header" >Bình luận</h3>    
            <div id="body-card">
            <?php
                if(isset($data['cmtdPost'])){
                    $i=1;
                    foreach($data['cmtdPost'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php
                      if($i==1){
                        echo '<i class="fas fa-medal first"></i>';
                      }elseif($i==2){
                        echo '<i class="fas fa-medal second"></i>';
                      }elseif($i==3){
                        echo '<i class="fas fa-medal third"></i>';
                      }else{
                        echo '<i class="fas fa-medal afterthird"></i>';
                      }
                     ?></div>
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
          </div>
        </div>
        <div class="sub-card">
            <h3 class="header" >Đánh giá</h3>    
            <div id="body-card">
            <?php
                if(isset($data['ratedPost'])){
                    $i=1;
                    foreach($data['ratedPost'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php
                      if($i==1){
                        echo '<i class="fas fa-medal first"></i>';
                      }elseif($i==2){
                        echo '<i class="fas fa-medal second"></i>';
                      }elseif($i==3){
                        echo '<i class="fas fa-medal third"></i>';
                      }else{
                        echo '<i class="fas fa-medal afterthird"></i>';
                      }
                     ?></div>
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
      <h3>Thành viên tiêu biểu</h3>
      <!-- <br> -->
      <div class="card-content" style="justify-content: space-around">

        <div class="sub-card">
          <h3 class="header" >Số bài viết</h3>    
          <div id="body-card">
            <?php
                if(isset($data['PostMostUser'])){
                    $i=1;
                    foreach($data['PostMostUser'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php
                      if($i==1){
                        echo '<i class="fas fa-medal first"></i>';
                      }elseif($i==2){
                        echo '<i class="fas fa-medal second"></i>';
                      }elseif($i==3){
                        echo '<i class="fas fa-medal third"></i>';
                      }else{
                        echo '<i class="fas fa-medal afterthird"></i>';
                      }
                     ?></div>
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
          <h3 class="header" >Bình luận</h3>    
          <div id="body-card">
            <?php
                if(isset($data['cmtdUser'])){
                    $i=1;
                    foreach($data['cmtdUser'] as $item){
            ?>
                <div  class="body-card-row">
                    <div><?php
                      if($i==1){
                        echo '<i class="fas fa-medal first"></i>';
                      }elseif($i==2){
                        echo '<i class="fas fa-medal second"></i>';
                      }elseif($i==3){
                        echo '<i class="fas fa-medal third"></i>';
                      }else{
                        echo '<i class="fas fa-medal afterthird"></i>';
                      }
                     ?></div>
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