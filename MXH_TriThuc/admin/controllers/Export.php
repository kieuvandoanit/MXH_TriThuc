<?php  
class Export extends Controller{
    protected $postModel;
    protected $categoryModel;
    protected $exportModel;


    public function __construct(){
        $this->postModel = $this->ModelAdmin('PostModel');
        $this->categoryModel = $this->ModelAdmin('Categorymodel');
        $this->exportModel = $this->ModelAdmin('ExportModel');
    }
    public function SayHi(){
        $this->viewAdmin('inc/header');
        $this->viewAdmin('import_export/export');
        $this->viewAdmin('inc/footer');
    }

    public function ExportFileCSVPost(){
        $post = $this->postModel->getAllPost();
        
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=post.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Post_id', 'Title', 'thumb', 'HashTag','Content','Status', 'LikesAmount','commentAmount','AvgRating','rateAmount','viewed','isDelete','isValid','CreatedDate','UpdatedDate','Member_id','Category_id'));

        if (count($post) > 0) {
            foreach ($post as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVCategory(){
        $category = $this->categoryModel->getAllCategory('DESC');

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=category.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Category_id', 'CategoryName'));

        if (count($category) > 0) {
            foreach ($category as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVComment(){
        $comment = $this->exportModel->getAllComment();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=comment.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Comment_id', 'Content','CreateDate','UpdateDate','Status','isDelete','Member_id','Post_id'));

        if (count($comment) > 0) {
            foreach ($comment as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVLevel(){
        $level = $this->exportModel->getAllLevel();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=level.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Level_id', 'level_name','Discription'));

        if (count($level) > 0) {
            foreach ($level as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVLiked_post(){
        $liked_post = $this->exportModel->getAllLiked_post();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=liked_post.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('LP_id', 'User_id','Post_id','time'));

        if (count($liked_post) > 0) {
            foreach ($liked_post as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVUser(){
        $user = $this->exportModel->getAllUser();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=user.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('User_id', 'UserName','email','Password','token','UType_id'));

        if (count($user) > 0) {
            foreach ($user as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVUser_profile(){
        $user_profile = $this->exportModel->getAllUser_profile();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=user_profile.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Profile_id', 'Avatar','Name','gender','Phone','Email','address','PostAmount','CommentAmount','User_id','Level_id'));

        if (count($user_profile) > 0) {
            foreach ($user_profile as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVUser_type(){
        $user_type = $this->exportModel->getAllUser_type();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=user_type.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('UType_id', 'Type'));

        if (count($user_type) > 0) {
            foreach ($user_type as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }

    public function ExportFileCSVVoting(){
        $voting = $this->exportModel->getAllVoting();

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=voting.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('votingID', 'PostID','Member_id','Rate','time'));

        if (count($voting) > 0) {
            foreach ($voting as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }


}


?>