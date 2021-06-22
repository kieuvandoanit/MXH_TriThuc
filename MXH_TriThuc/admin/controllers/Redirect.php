<?php
class Redirect extends Controller{
    public function SayHi(){
        $this->redirect('/admin/user');
    }
}

?>