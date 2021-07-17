<?php
    class Post extends Controller{
        protected $PostModel;
        protected $categoryModel;
        protected $UserModel;

        public function __construct()
        {
            $this->PostModel= $this->ModelAdmin('PostModel');
            $this->categoryModel= $this->ModelAdmin('CategoryModel');
            $this->UserModel= $this->ModelAdmin('UserModel');
        }
        public function SayHi(){
            $this->redirect('/admin/Post/postPage');
        }
        //Xem danh sách
        public function postPage()
        {
            /**
             * Kiểm tra xem yêu cầu lấy dữ liệu là gi: 'ALL',0->5
             * Lấy dữ liệu truy vấn
             * Kiểm tra dữ liệu lấy ra
             * hiển thị view.
             */
            $expression='1';
            $results=[];
            if(isset($_POST['selectBox'])){
                $results['selectoption']=$_POST['selectBox'];
                $expression=$_POST['selectBox'];
                if($expression=='Đã xóa'){
                    $expression='isDelete=1';
                }elseif($expression=='Tất cả' ){
                    $expression='1';
                }
                else{
                    $expression='Status="'.$expression.'"';
                }
            }
            $results['post']=$this->PostModel->getAllPost($expression);

            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/post_page',$results);
            $this->viewAdmin('inc/footer');
            
        }
        //Xem chi tiết
        public function postDetail($id=[])
        {
            # code...
            $isInt=settype($id,'integer');
            
            if($id!=[] and $isInt and $id>0){
                $results=$this->PostModel->getPostDetail($id);
                $this->viewAdmin('inc/header');
                $this->viewAdmin('pages/PostDetail_page',$results);
                $this->viewAdmin('inc/footer');
            }
            else{
                $this->redirect('/admin/post/postPage');
                
            }
        }
        public function handleAprovePost($id)
        {
            
            if(isset($_POST['btn_aprove'])){
                if(isset($_POST['id'])){
                    $idPost=$_POST['id'];
                    $title=$_POST['title'];
                    $content=$_POST['txtDescription'];
                    $results= $this->PostModel->updatePost($idPost,$title,$content,'Đã duyệt');
                    if($results){
                        $post = $this->PostModel->getPostDetail($idPost);
                        $user=$this->UserModel->getProfile($post[0]['Member_id']);
                        $this->UserModel->updatePoint($post[0]['Member_id'],$user[0]['point'] +5);
                    }
                    $this->redirect('/admin/post/postPage/');
                }
                else{
                    $results= $this->PostModel->updatePost($id,'','','Đã duyệt');
                    if($results){
                        $post = $this->PostModel->getPostDetail($id);
                        $user=$this->UserModel->getProfile($post[0]['Member_id']);
                        // echo '<pre>'; print_r($post); echo '</pre>'; 
                        $this->UserModel->updatePoint($post[0]['Member_id'],$user[0]['point'] +5);
                    }
                    $this->redirect('/admin/post/postPage/');

                }
            }
            elseif (isset($_POST['btn_inject'])){
                $post = $this->PostModel->getPostDetail($id);
                if(isset($_POST['id'])){
                    $idPost=$_POST['id'];
                    $title=$_POST['title'];
                    $content=$_POST['txtDescription'];
                    if(!empty($post) && $post[0]['Status'] == "Duyệt tự động" || $post[0]['Status'] == "Đã duyệt"){
                        $user=$this->UserModel->getProfile($post[0]['Member_id']);
                        $this->UserModel->updatePoint($post[0]['Member_id'],$user[0]['point'] -5);
                    }
                    $results= $this->PostModel->updatePost($idPost,$title,$content,'Không được duyệt');
                    $this->redirect('/admin/post/postDetail/'.$idPost);
                }
                else{
                    if(!empty($post) && $post[0]['Status'] == "Duyệt tự động" || $post[0]['Status'] == "Đã duyệt"){
                        $user=$this->UserModel->getProfile($post[0]['Member_id']);
                        $this->UserModel->updatePoint($post[0]['Member_id'],$user[0]['point'] -5);
                    }
                    $results= $this->PostModel->updatePost($id,'','','Không được duyệt');
                    $this->redirect('/admin/post/postPage/');
                }
            }
            else
            {
                $this->redirect('/admin/category/categoryPage');
            }
        }
        //Tạo bài viết
        //Get
        public function createPost()
        {
            # code...
            $data['category'] = $this->categoryModel->getAllCategory('ASC');
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/addPost_page',$data);
            $this->viewAdmin('inc/footer');
            
        }
        //Post
        public function handleCreatePost()
        {
            // global $_FILES;
            require_once('MXH_TriThuc/plugin/helper.php');
            if(isset($_POST['btn_create'])){
                $title=$_POST['title'];
                $thumb = uploadFile();
                $hashTag=$_POST['hashTag']; 
                $member_id = $_SESSION['userID'];
                $category = $_POST['postCategory'];
                $content=$_POST['txtDescription'];
                //Xu li hashtag 
                require_once('MXH_TriThuc/plugin/helper.php');
                $hashTag = convert_vi_to_en($hashTag);
                $results= $this->PostModel->createPost($title,$thumb,$hashTag,$content,$category,$member_id);
                $this->redirect('/admin/post/postPage');
            }
        }
        //Xóa
        //get
        public function deletePost($id)
        {
            $isInt=settype($id,'integer');
            
            if($id!=[] and $isInt and $id>0){
                $results=$this->PostModel->deletePost($id);
                $this->redirect('/admin/post/postDetail');
            }
            else{
                $this->redirect('/admin/post/postPage');
            }
        }
    }
?>