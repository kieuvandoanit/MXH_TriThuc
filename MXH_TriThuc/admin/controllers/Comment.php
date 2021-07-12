<?php
class Comment extends Controller{
    protected $CommentModel;

    public function __construct()
    {
        $this->CommentModel = $this->ModelAdmin('CommentModel');
    }
    public function SayHi(){
        $this->redirect('/admin/comment/commentPage');
    }

    //Chức năng xem toàn bộ comment
    public function commentPage(){
        $data['cmtList']= $this->CommentModel->getAllComment();
        $data['page_title'] = 'Quản lý comment';

        $this->viewAdmin('inc/header', $data);
        $this->viewAdmin('pages/comment_page',$data);
        $this->viewAdmin('inc/footer');
    }

    //Chức năng xem toàn bộ comment bị đánh dấu spam
    public function commentSpam(){
        $data['cmtList'] = $this->CommentModel->getAllCommentSpam();
        $data['page_title'] = 'Quản lý comment';
        $data['flag'] = 1;

        $this->viewAdmin('inc/header', $data);
        $this->viewAdmin('pages/comment_page',$data);
        $this->viewAdmin('inc/footer');
    }

    // //Chức năng tạo comment
    
    // //Get
    // public function createCategory(){
    //     $this->viewAdmin('inc/header');
    //     $this->viewAdmin('pages/addComment_page');
    //     $this->viewAdmin('inc/footer');
    // }
    // //Post
    // public function handleCreateComment()
    // {
    //     # code...
    //     /**
    //      * lấy thông tin từ cmt
    //      * kiểm tra thông tin
    //      * insert vào db
    //      * kiểm tra kết quả trả về
    //      */
    //     if(isset($_POST['btn_create_cmt'])){
    //     $id=$_POST['Comment_id'];
    //     $content=$_POST['content'];
    //     $results= $this->CommentModel->updateComment($id,$content);
    //     $this->redirect('/admin/comment/detailComment/'.$id);
    // }
    // else{
    //     $this->redirect('/admin/comment/commentPage');
    // }

    // }
    
    // Chức năng xem chi tiết bình luận
    //Get
    public function detailComment($id=-1)
    {
        if($id!=-1){
            $data= $this->CommentModel->getCommentDetail($id);
            $this->viewAdmin('inc/header');
            $this->viewAdmin('pages/detailComment_page',$data);
            $this->viewAdmin('inc/footer');
        }
    }

    // Chức năng chỉnh sửa bình luận
    public function updateComment()
    {
        if(isset($_POST['btn_update_cmt'])){
            $id=$_POST['Comment_id'];
            $content=$_POST['content'];
            $results= $this->CommentModel->updateComment($id,$content);
            $this->redirect('/admin/comment/detailComment/'.$id);
        }
        else{
            $this->redirect('/admin/comment/commentPage');
        }
    }

    //Chức năng xóa
    public function deleteComment($id=-1)
    {
        if($id==-1){

        }
        else{
            $results= $this->CommentModel->deleteComment($id);
        }
        header('Location: '.HEADERLINK.'/admin/comment/commentPage');
        $this->commentPage();
    }
    //Chức năng sửa

}
?>