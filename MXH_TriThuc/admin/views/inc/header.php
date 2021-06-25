<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo _BASELINK_;?>"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/public/font-awesome/css/all.css">
    <link rel="stylesheet" href="admin/public/admin_style.css">
    <title><?php echo (!empty($data['page_title']))?$data['page_title']:'Mạng xã hội trí thức Việt';?></title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    <!-- post management -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.1/css/fileinput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.1/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.1/themes/fa/theme.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/wafynfll6yk0et81pwlvcwdx6r76d4pl4gy3397p9126dmzm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
</head>
<body>
    <nav class=" navbar navbar-dark bg-dark">
            <div class=""><a class="homebtn" href="<?php echo HEADERLINK.'/admin'; ?>">TEAM UDPT#01</a></div>
            <div class=""></div>
            <div class="row" >
                <a class="btn far fa-bell button_class" href="#"></a>
                <?php if(!empty($_SESSION['isLogin'])){
                    ?>
                    <a class="btn fas fa-sign-out-alt" style="margin-top: 9px;"href="<?php echo HEADERLINK.'/admin/user/logout'; ?>"></a>
                    <?php
                } ?>
                <a id="sign_in button_class" class="btn" href="#" style="font-size: 3vh;"><?php echo !empty($_SESSION['fullname'])?'Hi, '.$_SESSION['fullname']:'Hi, Admin' ?></a>
            </div>
    </nav>
    <div class="body" style="min-height:90vh;display:flex">
        <div class="sidenav">
            <ul class="sidenav">
                <li>
                    <a href="<?php echo HEADERLINK.'/admin'; ?>"><i class="fas fa-chart-bar"></i> Tổng quan</a>
                </li>
                <li>
                    <a href="<?php echo HEADERLINK.'/admin/user/userPage'; ?>"><i class="fas fa-user"></i> Người dùng</a>
                </li>
                <li>
                    <a href="<?php echo HEADERLINK.'/admin/category/categoryPage';?>"><i class="fas fa-store"></i> Danh mục</a>
                </li>
                <li>
                    <a href="#"><i class="far fa-calendar-check"></i> Bài đăng</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-question-circle"></i> Bình luận</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog"></i> Cài đặt</a>
                </li>
                <li>
                    <a href="<?php echo HEADERLINK.'/admin/user/adminPage';  ?>"><i class="fas fa-user-cog"></i> Admins</a>
                </li>
              </ul>
        </div>
        <div class="content" >