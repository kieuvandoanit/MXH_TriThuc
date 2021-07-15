<?php
class Comment extends Controller{
    protected $commentModel;
    protected $postModel;
    protected $userModel;
    
    public function __construct(){
        $this->commentModel = $this->ModelClient('CommentModel');
        $this->postModel = $this->ModelClient('PostModel');
        $this->userModel = $this->ModelClient('UserModel');
    }

    public function handleAddComment(){
        if(isset($_POST['btn_addComment'])){
            $content = $_POST['content'];
            $isSpam = 0;
            $member_id = $_SESSION['userID'];
            $post_id = $_POST['idpost'];

            //echo $content;

            if($this->commentModel->addComment($content,$isSpam,$member_id,$post_id)){
                // increase CommentAmount in post table
                $post = $this->postModel->getPostByID($post_id);
                if(!empty($post)){
                    $this->postModel->updateCommentAmount($post_id, $post[0]['commentAmount'] + 1);
                    // increase CommentAmount in user_profile table
                    $user = $this->userModel->getUserProfile($member_id);
                    if(!empty($user)){
                        $this->userModel->updateCommentAmount($member_id, $user[0]['CommentAmount'] + 1);
                        $this->userModel->updatePoint($member_id, $user[0]['point'] + 2);
                    }
                }
                
                $this->redirect('/post/postDetail/'.$post_id);
            }else{
                $this->redirect('/post');
            }
        }
    }

    public function handleIsSpam(){ 
        
        if(isset($_POST['btn_isSpam'])){
            $comment_id = $_POST['commentID'];
            $post_id =  $_POST['idpost'];
            if($this->commentModel->spamComment($comment_id)){
                $this->redirect('/post/postDetail/'.$post_id);
            }else{
                $this->redirect('/post');
            }
        }
    }
}
?>