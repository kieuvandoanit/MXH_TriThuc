<?php
class Rank extends Controller{
    protected $postModel;
    protected $userModel;
    
    public function __construct(){
        $this->postModel = $this->ModelClient('PostModel');
        $this->userModel = $this->ModelClient('UserModel');
    }
    public function SayHi()
    {
        # code...
        /**
         * Lấy danh sách bài viết theo like,cmt,avgrate top 5
         * Lấy danh sách thành viên có số bài viết,số bình luận nhiều nhât top5
         * lấy danh sách thành viên có hạng cao nhất
         */
        $data['likedPost']=$this->postModel->getTop5HighestFromTable('Post','p.Title,p.LikesAmount','p.LikesAmount');
        $data['cmtdPost']=$this->postModel->getTop5HighestFromTable('Post','p.Title,p.commentAmount','p.commentAmount');
        $data['ratedPost']=$this->postModel->getTop5HighestFromTable('Post','p.Title,p.AvgRating','p.AvgRating');
        $data['PostMostUser']=$this->userModel->getTop5HighestFromTable('user_profile','u.Name,u.PostAmount',' u.PostAmount');
        $data['cmtdUser']=$this->userModel->getTop5HighestFromTable('user_profile','u.Name,u.CommentAmount',' u.CommentAmount');
        // $data['rankingUser']=$this->userModel->getTop5HighestFromTable('user_profile','p.Title,p.AvgRating','p.AvgRating');
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/ranking_page',$data);
        $this->ViewClient('inc/footer');
    }
}

?>