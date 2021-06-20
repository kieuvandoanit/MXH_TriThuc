<?php
class Home extends Controller{
    

    public function SayHi(){
        // $_SESSION['isLogin'] = false;
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/first_page');
        $this->ViewClient('inc/footer');
    }
}

?>