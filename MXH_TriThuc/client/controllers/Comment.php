<?php
class Comment extends Controller{
    protected $commentModel;
    
    public function __construct(){
        $this->commentModel = $this->ModelClient('CommentModel');
    }

    public function handleAddComment(){
        if(isset($_POST['btn_addComment'])){
            $content = $_POST['content'];
            $isSpam = 0;
            $member_id = $_SESSION['userID'];
            $post_id = $_POST['idpost'];

            //echo $content;

            if($this->commentModel->addComment($content,$isSpam,$member_id,$post_id)){
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