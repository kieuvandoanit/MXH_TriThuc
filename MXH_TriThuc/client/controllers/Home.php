<?php
class Home extends Controller{
    protected $postModel;
    protected $categoryModel;
    public function __construct(){
        $this->postModel = $this->ModelClient('PostModel');
        $this->categoryModel = $this->ModelClient('CategoryModel');
    }

    public function SayHi(){
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'admin'){
            session_destroy();
            $this->redirect('/');
        }
        $data['slider'] = $this->postModel->getSlider();
        $data['page_title'] = 'Trang chủ';
        $data['post_view'] = $this->postModel->getPostSortView('DESC');
        $data['post_new'] = $this->postModel->getPostSortID('DESC');
        $data['category'] = $this->categoryModel->getAllCategory();
        if(!empty($_SESSION) && $_SESSION['isLogin'] == true){
            $data['liked'] = $this->postModel->getLiked($_SESSION['userID']);
        }
        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/home_page', $data);
        $this->ViewClient('inc/footer');
    }

    public function trangchu(){
        $data['slider'] = $this->postModel->getSlider();
        $data['page_title'] = 'Trang chủ';
        $data['post_view'] = $this->postModel->getPostSortView('DESC');
        $data['post_new'] = $this->postModel->getPostSortID('DESC');
        
        if(!empty($_SESSION) && $_SESSION['isLogin'] == true){
            $data['liked'] = $this->postModel->getLiked($_SESSION['userID']);
        }

        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/home_page', $data);
        $this->ViewClient('inc/footer');
    }
}

?>