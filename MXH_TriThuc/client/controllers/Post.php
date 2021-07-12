<?php
class Post extends Controller{
    protected $postModel;
    protected $categoryModel;
    protected $settingModel;
    protected $userModel;

    public function __construct(){
        $this->postModel = $this->ModelClient('PostModel');
        $this->categoryModel = $this->ModelClient('CategoryModel');
        $this->settingModel = $this->ModelClient('SettingModel');
        $this->userModel = $this->ModelClient('UserModel');
    }
    public function SayHi(){
        $data['page_title'] = 'Bài viết';
        $data['post_view'] = $this->postModel->getPostSortView('ASC');
        $data['post_new'] = $this->postModel->getPostSortID('DESC');
        $data['category'] = $this->categoryModel->getAllCategory();
        $data['liked'] = $this->postModel->getLiked($_SESSION['userID']);

        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/post_page', $data);
        $this->ViewClient('inc/footer');
    }

    public function addPost(){
        $data['page_title'] = 'Thêm bài viết mới';
        $data['category'] = $this->categoryModel->getAllCategory();
        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/add_post', $data);
        $this->ViewClient('inc/footer');
    }

    public function handleAddPost(){
        require_once('MXH_TriThuc/plugin/helper.php');
        if(isset($_POST['btn_addPost'])){
            $hashtag = $_POST['postHashtag'];
            $title = $_POST['postTitle'];
            // $thumb = $_POST['postThumb'];
            $thumb = uploadFile();
            $content = $_POST['postContent'];
            $member_id = $_SESSION['userID'];
            $category = $_POST['postCategory'];
            

            //Xu li hashtag 
            require_once('MXH_TriThuc/plugin/helper.php');
            
            $hashtag = convert_vi_to_en($hashtag);
            
            
            $setting = $this->settingModel->getSetting();
        
            if($setting[0]['AutoBrowsing'] == 1){
                $data= array(
                    'title' => $title,
                    'description' => $content
                );
                $data = http_build_query($data);
                // echo $data;
                $result = CallAPI("POST", "localhost:3000/browsing", $data);
                if($result == 'true'){
                    $status = 'Duyệt tự động';
                    if($this->postModel->addPost($title, $thumb,$hashtag, $content,$status, $member_id, $category)){
                        
                        //xử lý level
                        //Lấy userprofile
                        $userProfile = $this->userModel->getUserProfile($member_id);
                        
                        $this->userModel->updatePostAmount($member_id, $userProfile[0]['PostAmount'] + 1);
                        $point = $userProfile[0]['point'] +5;
                        $this->userModel->updatePoint($member_id, $point);
                        $level_id = $userProfile[0]['Level_id'];
                        if($level_id == 1){
                            if($point > 50){
                                $this->userModel->updateLevel($member_id, 2);
                            }
                        }else if($level_id == 2){
                            if($point > 100){
                                $this->userModel->updateLevel($member_id, 3);
                            }
                        }else if($level_id == 3){
                            if($point > 200){
                                $this->userModel->updateLevel($member_id, 4);
                            }
                        }else if($level_id == 4){
                            if($point > 400){
                                $this->userModel->updateLevel($member_id, 5);
                            }
                        }else{

                        }



                        $listEmailNotification = [];
                        foreach($setting as $s){
                            if($s['Notification'] == 1){
                                $listEmailNotification[] = $s['email'];
                            }
                        }
                        if(!empty($listEmailNotification)){
                            require_once('MXH_TriThuc/plugin/sendMail.php');
                            $Title = "THÔNG BÁO BÀI VIẾT MỚI";
                            $Body = "Xin chào Admin! <br> Người dùng ".$_SESSION['fullname']." vừa mới thêm 1 bài viết mới";
                            $email = "kieuvandoanit@gmail.com";
                            foreach($listEmailNotification as $email){
                                sendMail($Title, $Body, $email);
                            }    
                        }
                        $this->redirect('/user/profile');
                    }else{
                        $this->redirect('/post/addPost');
                    }
                }else{
                    $status = 'Không được duyệt';
                    if($this->postModel->addPost($title, $thumb,$hashtag, $content,$status, $member_id, $category)){
                        $userProfile = $this->userModel->getUserProfile($member_id);
                        $this->userModel->updatePostAmount($member_id, $userProfile[0]['PostAmount'] + 1);
                        
                        $this->redirect('/user/profile');
                    }else{
                        $this->redirect('/post/addPost');
                    }
                }
            }else{
                // echo "vào đây";
                $status = "Chờ duyệt";
                if($this->postModel->addPost($title, $thumb,$hashtag, $content,$status, $member_id, $category)){
                    $userProfile = $this->userModel->getUserProfile($member_id);    
                    $this->userModel->updatePostAmount($member_id, $userProfile[0]['PostAmount'] + 1);
                        
                    $listEmailNotification = [];
                    foreach($setting as $s){
                        if($s['Notification'] == 1){
                            $listEmailNotification[] = $s['email'];
                        }
                    }
                    if(!empty($listEmailNotification)){
                        require_once('MXH_TriThuc/plugin/sendMail.php');
                        $Title = "THÔNG BÁO BÀI VIẾT MỚI";
                        $Body = "Xin chào Admin! <br> Người dùng ".$_SESSION['fullname']." vừa mới thêm 1 bài viết mới";
                        foreach($listEmailNotification as $email){
                            sendMail($Title, $Body, $email);
                        }    
                    }
                    $this->redirect('/user/profile');
                }else{
                    $this->redirect('/post/addPost');
                }  
            }
        }
    }

    public function editPost($id){
        $data['page_title'] = 'Chỉnh sửa bài viết';
        $data['post'] = $this->postModel->getPostByID($id);
        $data['category'] = $this->categoryModel->getAllCategory();
        if(!empty($data['post'])){
            $this->ViewClient('inc/header',$data);
            $this->ViewClient('pages/edit_post', $data);
            $this->ViewClient('inc/footer');
        }else{
            $this->redirect('/post');
        }
    }

    public function handleEditPost($id){ 
        // echo '<pre>'; print_r($_FILES); echo '</pre>'; 

        if(isset($_POST['btn_editPost'])){
            if(!empty($_FILES['file']['name'])){
                require_once('MXH_TriThuc/plugin/helper.php');
                $thumb = uploadFile();
            }else{
                $thumb = $_POST['postThumb'];
            }
            $hashtag = $_POST['postHashtag'];
            $title = $_POST['postTitle'];
            $content = $_POST['postContent'];
            $category = $_POST['postCategory'];
            

            //Xu li hashtag 
            require_once('MXH_TriThuc/plugin/helper.php');
            $hashtag = convert_vi_to_en($hashtag);
            // echo $hashtag;
            if($this->postModel->editPost($id,$title, $thumb,$hashtag, $content, $category)){
                $this->redirect('/user/profile');
            }else{
                $this->redirect('/post/editPost/'.$id);
            }
        }
    }

    public function deletePost($id){
        if($this->postModel->deletePost($id)){
            $this->redirect('/user/profile');
        }else{
            $this->redirect('/user/profile');
        }
    }

    public function postDetail($id){
        $data['page_title'] = "Chi tiết bài viết";
        $data['post'] = $this->postModel->getPostByID($id);

        $this->postModel->updateViewed($id, $data['post'][0]['viewed'] + 1);
        $sao1 = $this->postModel->getRatingHistory($id, '1 sao');
        $sao2 = $this->postModel->getRatingHistory($id, '2 sao');
        $sao3 = $this->postModel->getRatingHistory($id, '3 sao');
        $sao4 = $this->postModel->getRatingHistory($id, '4 sao');
        $sao5 = $this->postModel->getRatingHistory($id, '5 sao');

        $sum = $sao1[0]['count'] + $sao2[0]['count'] +$sao3[0]['count'] +$sao4[0]['count'] +$sao5[0]['count'];
        if($sum != 0){
            $data['sao1'] = ($sao1[0]['count']/$sum)*100;
            $data['sao2'] = ($sao2[0]['count']/$sum)*100;
            $data['sao3'] = ($sao3[0]['count']/$sum)*100;
            $data['sao4'] = ($sao4[0]['count']/$sum)*100;
            $data['sao5'] = ($sao5[0]['count']/$sum)*100;
        }else{
            $data['sao1']=0;
            $data['sao2']=0;
            $data['sao3']=0;
            $data['sao4']=0;
            $data['sao5']=0;
        }
        

        $this->viewClient('inc/header', $data);
        $this->viewClient('pages/post_detail', $data);
        $this->viewClient('inc/footer');
    }

    public function handleLike(){
        $id = $_POST['id'];
        $post= $this->postModel->getPostByID($id);
        $history = $this->postModel->getLikeHistory($id, $_SESSION['userID']);
        if(empty($history)){
            $like= $post[0]['LikesAmount'] + 1;
            if($this->postModel->like($id, $like)){
                if($this->postModel->likeHistory($id, $_SESSION['userID'])){
                    echo $like;
                }
            }else{
                echo 0;
            }
        }else{
            echo $post[0]['LikesAmount'];
        }
    }

    public function handleDisLike(){
        $id = $_POST['id'];
        $post= $this->postModel->getPostByID($id);
        $history = $this->postModel->getLikeHistory($id, $_SESSION['userID']);
        if(!empty($history)){
            $like= $post[0]['LikesAmount'] - 1;
            if($this->postModel->disLike($id, $like)){
                if($this->postModel->disLikeHistory($id, $_SESSION['userID'])){
                    echo $like;
                }
            }else{
                echo 0;
            }
        }else{
            echo $post[0]['LikesAmount'];
        }
    }

    public function rating($id){
        $rate = $_POST['rating'];
        $history = $this->postModel->getRatingHistoryByPostIDUserID($id, $_SESSION['userID']);
        
        $post= $this->postModel->getPostByID($id);
        
        
        if(empty($history)){
            $avgrating = ($post[0]['AvgRating']*$post[0]['rateAmount'] + $rate) / ($post[0]['rateAmount'] + 1);
            $rateAmount = $post[0]['rateAmount'] + 1;
            $updatePost = $this->postModel->rating($id,$avgrating, $rateAmount);
            if($updatePost){
                $this->postModel->ratingHistory($post[0]['Post_id'], $_SESSION['userID'], $rate);
            }
        }else{
            $avgrating = ($post[0]['AvgRating']*$post[0]['rateAmount']) / ($post[0]['rateAmount']);
            $rateAmount = $post[0]['rateAmount'];
        }
        $avgrating = round($avgrating, 1);
        
        $sao1 = $this->postModel->getRatingHistory($id, '1 sao');
        $sao2 = $this->postModel->getRatingHistory($id, '2 sao');
        $sao3 = $this->postModel->getRatingHistory($id, '3 sao');
        $sao4 = $this->postModel->getRatingHistory($id, '4 sao');
        $sao5 = $this->postModel->getRatingHistory($id, '5 sao');

        $result=$avgrating.'/'.$rateAmount.'/'.$sao1[0]['count'].'/'.$sao2[0]['count'].'/'.$sao3[0]['count'].'/'.$sao4[0]['count'].'/'.$sao5[0]['count'];

        echo $result;
            
        
    }
}

?>