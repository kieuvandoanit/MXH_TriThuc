<?php
    class Comment extends Controller{
        protected $CommentModel;

        public function __construct()
        {
            $this->CommentModel= $this->ModelAdmin('CommentModel');
        }
        public function SayHi(){
            $this->redirect('/admin/Comment/commentPage');
        }
        //Xem danh sách
        public function commentPage()
        {
            /**
             * Kiểm tra xem yêu cầu lấy dữ liệu là gi: 'ALL',0->5
             * Lấy dữ liệu truy vấn
             * Kiểm tra dữ liệu lấy ra
             * hiển thị view.
             */
            $results=$this->CommentModel->getAllComment();
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/comment_page',$results);
            $this->viewAdmin('inc/footer');
            
        }
        // //Xem chi tiết
        // public function postDetail($id=[])
        // {
        //     # code...
        //     $isInt=settype($id,'integer');
            
        //     if($id!=[] and $isInt and $id>0){
        //         $results=$this->PostModel->getPostDetail($id);
        //         $this->viewAdmin('inc/header');
        //         $this->viewAdmin('pages/PostDetail_page',$results);
        //         $this->viewAdmin('inc/footer');
        //     }
        //     else{
        //         $this->redirect('/admin/post/postPage');
                
        //     }
        // }
        // public function handleAprovePost($id)
        // {
            
        //     if(isset($_POST['btn_aprove'])){
        //         $idPost=$_POST['id'];
        //         $title=$_POST['title'];
        //         $content=$_POST['txtDescription'];
        //         $results= $this->PostModel->updatePost($idPost,$title,$content,'Đã Duyệt');
        //         header('Location: '.HEADERLINK.'/admin/post/postDetail/'.$id);
        //         $this->viewAdmin('inc/header');
        //         $this->viewAdmin('pages/addCategory_page');
        //         $this->viewAdmin('inc/footer');
        //     }
        //     elseif (isset($_POST['btn_inject'])){
        //         $idPost=$_POST['id'];
        //         $title=$_POST['title'];
        //         $content=$_POST['txtDescription'];
        //         $results= $this->PostModel->updatePost($idPost,$title,$content,'Không được duyệt');
        //         header('Location: '.HEADERLINK.'/admin/post/postDetail/'.$id);
        //         $this->viewAdmin('inc/header');
        //         $this->viewAdmin('pages/addCategory_page');
        //         $this->viewAdmin('inc/footer');
        //     }
        //     else
        //     {
        //         $this->redirect('/admin/category/categoryPage');
        //     }
        // }
        // //Tạo bài viết
        // //Get
        // public function createPost()
        // {
        //     # code...
        //     $this->viewAdmin('inc/header');
        //     $this->viewAdmin('pages/addPost_page');
        //     $this->viewAdmin('inc/footer');
            
        // }
        // //Post
        // public function handleCreatePost()
        // {
        //     if(isset($_POST['btn_create'])){
        //         $title=$_POST['title'];
        //         $image=$_POST['image'];
        //         $hashTag=$_POST['hashTag']; 
        //         $content=$_POST['txtDescription'];
        //         // echo $title.'||'.$image.'||'.$hashTag.'||'.$content;
        //         $results= $this->PostModel->createPost($title,$image,$hashTag,$content);
        //         echo $results?'ok':'khong dc';
        //     }
        // }
        // //Xóa
        // //get
        // public function deletePost($id)
        // {
        //     $isInt=settype($id,'integer');
            
        //     if($id!=[] and $isInt and $id>0){
        //         $results=$this->PostModel->deletePost($id);
        //         $this->redirect('/admin/post/postDetail');
        //     }
        //     else{
        //         $this->redirect('/admin/post/postPage');
        //     }
        // }
    }
?>