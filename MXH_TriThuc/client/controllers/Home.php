<?php
class Home extends Controller{
    

    public function SayHi(){
        // $_SESSION['isLogin'] = false;
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/first_page');
        $this->ViewClient('inc/footer');
    }

    public function trangchu(){
        $data['page_title'] = 'Trang chủ';
        $this->ViewClient('inc/header', $data);
        $this->ViewClient('pages/home_page');
        $this->ViewClient('inc/footer');
    }
}

?>