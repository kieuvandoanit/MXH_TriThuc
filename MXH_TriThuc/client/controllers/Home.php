<?php
class Home extends Controller{
    protected $postModel;
    public function __construct(){
        $this->postModel = $this->ModelClient('PostModel');
    }

    public function SayHi(){
        $data['slider'] = $this->postModel->getSlider();
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/first_page', $data);
        $this->ViewClient('inc/footer');
    }

    public function trangchu(){
        $data['slider'] = $this->postModel->getSlider();
        $data['page_title'] = 'Trang chủ';
        $data['post_view'] = $this->postModel->getPostSortView('DESC');
        $data['post_new'] = $this->postModel->getPostSortID('DESC');
        
        $data['liked'] = $this->postModel->getLiked($_SESSION['userID']);

        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/home_page', $data);
        $this->ViewClient('inc/footer');
    }
}

?>