<?php 
class Home extends Controller{
    public function SayHi(){
        $this->ViewAdmin('inc/header');
        $this->ViewAdmin('pages/homePage');
        $this->ViewAdmin('inc/footer');
    }
}
?>