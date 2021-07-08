<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo _BASELINK_;?>"/>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo (!empty($data['page_title']))?$data['page_title']:'Mạng xã hội trí thức Việt';?></title>
  <link rel="stylesheet" href="client/public/reset.css">
  <!-- <link rel="stylesheet" href="../../public/bootstrap/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="../../public/bootstrap/bootstrap-theme.min.css"> -->
  <link rel="stylesheet" href="client/public/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="client/public/font-awesome/css/all.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="client/public/js/main.js"></script>

</head>

<body>
  <div id="site">
    <div class="container">
      <div id="header" >
        <div style="display: flex; justify-content: space-between; min-width: 450px;">
          <div id="logo"><a href="<?php echo HEADERLINK.'/'; ?>">TEAM UDPT#01</a></div>
          <div class="header_menu" style="display: flex;align-items: center;">
              <a href="<?php echo HEADERLINK.'/home/trangchu'; ?>" style="min-width: 100px;"><button class="btn">Trang chủ</button></a>
              <a href="<?php echo HEADERLINK.'/post'; ?>"><button class="btn">Bài viết</button></a>
              <a href=""><button class="btn">BXH</button></a>
          </div>
        </div>
        <div id="search" style="display: flex;align-items: flex-end;">
            <form action="<?php echo HEADERLINK.'/search';?>" method="POST" >
              <div class="input-group">
                <input type="text" class="form-control" name='searchInput' placeholder="Nhập nội dung tìm kiếm" style="min-width: 350px;">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
            </form>
        </div>
        <div id="sign_in_up">
          <?php 
            if(isset($_SESSION['username'])){
              ?>
              <div class="author_login">
              <div class="img_user_thumb">
                <img src="<?php echo isset($_SESSION['avatar'])?$_SESSION['avatar']:'client/public/assets/avatar.jpg'; ?>" alt="">
              </div>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown username_login">
                  <a class="nav-link dropdown-toggle " href="#" data-toggle="dropdown"><?php echo isset($_SESSION['fullname'])?$_SESSION['fullname']:$_SESSION['username']; ?><i class="fas fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li class="nav-link dropdown">
                      <a class="dropdown-item" href="<?php echo HEADERLINK.'/user/profile'; ?>">Profile</a>
                    </li>
                    <li class="nav-link dropdown">
                      <a class="dropdown-item" href="<?php echo HEADERLINK.'/user/history'; ?>">Lịch sử hoạt động</a>
                    </li>
                    <li class="nav-link dropdown">
                      <a class="dropdown-item" href="<?php echo HEADERLINK.'/user/changePassword'; ?>">Đổi mật khẩu</a>
                    </li>
                    <li class="nav-link dropdown">
                      <a class="dropdown-item" href="<?php echo HEADERLINK.'/post/addPost'; ?>">Thêm bài viết</a>
                    </li>
                    <li class="nav-link dropdown">
                      <a class="dropdown-item" href="<?php echo HEADERLINK.'/user/logout'; ?>">Đăng xuất</a>
                    </li>
                  </ul>
                </li>
              </ul>
          </div>
              <?php
            }
          ?>

          <?php 
            if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == false || empty($_SESSION['isLogin'])){
              ?>
                <button id="sign_in" class="btn" style="background:#203ace; margin-right: 3px; height: 40px; margin-top: 10px;"><a href="<?php echo HEADERLINK."/user";?>" style="color: white;">Đăng nhập</a></button>
                <button id="sign_in" class="btn" style="background:#203ace; height: 40px; margin-top: 10px;"><a href="<?php echo HEADERLINK."/user/register";?>" style="color: white;">Đăng ký</a></button>
              <?php
            }
          ?>
          
        </div>
      </div>