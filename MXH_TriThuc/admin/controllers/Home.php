<?php 
class Home extends Controller{
    protected $homeModel;
    public function __construct()
    {
        $this->homeModel= $this->ModelAdmin('homeModel');
    }
    public function SayHi(){
        $data['postNumber']=$this->homeModel->countAllByTable('Post');
        $data['commentNumber']=$this->homeModel->countAllByTable('comment');
        $data['userNumber']=$this->homeModel->countAllByTable('user');
        $data['postPerMonth']=$this->homeModel->countPostPerMonth('user');
        // echo '<pre>';
        // print_r($data['postPerMonth']);
        // echo '</pre>';
        $this->ViewAdmin('inc/header');
        $this->ViewAdmin('pages/homePage',$data);
        $this->ViewAdmin('inc/footer');
    }
}
?>