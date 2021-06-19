<?php
class User extends Controller{
    public function SayHi(){
        $data['page_title'] = 'Đăng nhập';
        $this->ViewClient('inc/header',$data);
        $this->ViewClient('pages/login');
        $this->ViewClient('inc/footer');
    }
}

?>