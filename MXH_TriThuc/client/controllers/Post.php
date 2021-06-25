<?php
class Post extends Controller{
    protected $postModel;

    public function __construct(){
        $this->postModel = $this->ModelClient('PostModel');
    }
    public function SayHi(){
        $data['page_title'] = 'Bài viết';
        $data['post_view'] = $this->postModel->getPostSortView('ASC');
        $data['post_new'] = $this->postModel->getPostSortID('DESC');
        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/post_page', $data);
        $this->ViewClient('inc/footer');
    }

    public function addPost(){
        $data['page_title'] = 'Thêm bài viết mới';

        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/add_post');
        $this->ViewClient('inc/footer');
    }

    public function handleAddPost(){
        // echo '<pre>'; print_r($_POST); echo '</pre>'; 

        if(isset($_POST['btn_addPost'])){
            $hashtag = $_POST['postHashtag'];
            $title = $_POST['postTitle'];
            $thumb = $_POST['postThumb'];
            $content = $_POST['postContent'];
            $member_id = $_SESSION['userID'];
            // $category = $_POST['postCategory'];
            $category=1;

            //Xu li hashtag 
            require_once('MXH_TriThuc/plugin/helper.php');
            $hashtag = convert_vi_to_en($hashtag);
            // echo $hashtag;
            if($this->postModel->addPost($title, $thumb,$hashtag, $content, $member_id, $category)){
                $this->redirect('/user/profile');
            }else{
                $this->redirect('/post/addPost');
            }
        }
    }

    public function editPost($id){
        $data['page_title'] = 'Chỉnh sửa bài viết';
        $data['post'] = $this->postModel->getPostByID($id);
        if(!empty($data['post'])){
            $this->ViewClient('inc/header',$data);
            $this->ViewClient('pages/edit_post', $data);
            $this->ViewClient('inc/footer');
        }else{
            $this->redirect('/post');
        }
    }

    public function handleEditPost($id){
        // echo '<pre>'; print_r($_POST); echo '</pre>'; 
        if(isset($_POST['btn_editPost'])){
            $hashtag = $_POST['postHashtag'];
            $title = $_POST['postTitle'];
            $thumb = $_POST['postThumb'];
            $content = $_POST['postContent'];
            // $category = $_POST['postCategory'];
            $category=1;

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
        $this->viewClient('inc/header', $data);
        $this->viewClient('pages/post_detail', $data);
        $this->viewClient('inc/footer');
    }
}

?>