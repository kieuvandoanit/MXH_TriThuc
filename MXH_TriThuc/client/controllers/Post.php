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

        $sao1 = $this->postModel->getRatingHistory($id, '1 sao');
        $sao2 = $this->postModel->getRatingHistory($id, '2 sao');
        $sao3 = $this->postModel->getRatingHistory($id, '3 sao');
        $sao4 = $this->postModel->getRatingHistory($id, '4 sao');
        $sao5 = $this->postModel->getRatingHistory($id, '5 sao');

        $sum = $sao1[0]['count'] + $sao2[0]['count'] +$sao3[0]['count'] +$sao4[0]['count'] +$sao5[0]['count'];
        $data['sao1'] = ($sao1[0]['count']/$sum)*100;
        $data['sao2'] = ($sao2[0]['count']/$sum)*100;
        $data['sao3'] = ($sao3[0]['count']/$sum)*100;
        $data['sao4'] = ($sao4[0]['count']/$sum)*100;
        $data['sao5'] = ($sao5[0]['count']/$sum)*100;

        $this->viewClient('inc/header', $data);
        $this->viewClient('pages/post_detail', $data);
        $this->viewClient('inc/footer');
    }

    public function handleLike(){
        $id = $_POST['id'];
        $post= $this->postModel->getPostByID($id);
        $like= $post[0]['LikesAmount'] + 1;
        if($this->postModel->like($id, $like)){
            echo $like;
        }else{
            echo 0;
        }
    }

    public function rating($id){
        $rate = $_POST['rating'];
        $post= $this->postModel->getPostByID($id);
        $avgrating = ($post[0]['AvgRating']*$post[0]['rateAmount'] + $rate) / ($post[0]['rateAmount'] + 1);
        $avgrating = round($avgrating, 1);
        
        $rateAmount = $post[0]['rateAmount'] + 1;
        
        
        
        if($this->postModel->rating($id,$avgrating, $rateAmount)){
            if($this->postModel->ratingHistory($post[0]['Post_id'], $_SESSION['userID'], $rate)){
                $sao1 = $this->postModel->getRatingHistory($id, '1 sao');
                $sao2 = $this->postModel->getRatingHistory($id, '2 sao');
                $sao3 = $this->postModel->getRatingHistory($id, '3 sao');
                $sao4 = $this->postModel->getRatingHistory($id, '4 sao');
                $sao5 = $this->postModel->getRatingHistory($id, '5 sao');

                $result=$avgrating.'/'.$rateAmount.'/'.$sao1[0]['count'].'/'.$sao2[0]['count'].'/'.$sao3[0]['count'].'/'.$sao4[0]['count'].'/'.$sao5[0]['count'];

                echo $result;
            }
        }
    }
}

?>