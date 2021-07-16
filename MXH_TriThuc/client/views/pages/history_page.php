<div class="history">
        <h2>Lịch sử đánh giá</h2>           
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ID bài post</th>
              <th>Đánh giá</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tbody>
              <?php  
              $count = 1;
              if(!empty($data['rate'])){
                  foreach($data['rate'] as $rate){
                    ?> 
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><a href="<?php echo HEADERLINK.'/post/postDetail/'.$rate['PostID']; ?>"><?php echo $rate['PostID']; ?></a></td>
                        <td><?php echo $rate['Rate']; ?></td>
                        <td><?php echo $rate['CreatedDate']; ?></td>
                    </tr>
                    <?php
                    $count=$count+1;   
                  }
              }
              ?>
          </tbody>
        </table>
        <br>
        <hr>
        <h2>Lịch sử like bài viết</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ID bài post</th>
              <th>Hành động</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tbody>
              <?php 
              $count2 = 0;
              if(!empty($data['like'])){
                foreach($data['like'] as $like){
                    ?>
                    <tr>
                    <td><?php echo $count2; ?></td>
                    <td><a href="<?php echo HEADERLINK.'/post/postDetail/'.$like['Post_id']; ?>"><?php echo $like['Post_id']; ?></a></td>
                    <td>Like</td>
                    <td><?php echo $like['CreatedDate']; ?></td>
                    </tr>
                    <?php 
                    $count2 = $count2 +1; 
                }
            
              }
              ?>
            
          </tbody>
        </table>
      </div>