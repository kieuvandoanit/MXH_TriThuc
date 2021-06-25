<div id="first_page">
  <div id="title">Mạng xã hội trí thức Việt</div>
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
  <div id="take_part_in">
    <a href="<?php echo HEADERLINK.'/home/trangchu'; ?>"><button class="btn take_part_in">Tham gia ngay</button></a>
  </div>
</div>