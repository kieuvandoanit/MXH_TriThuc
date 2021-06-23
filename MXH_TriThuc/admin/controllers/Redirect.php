<?php
class Redirect extends Controller{
    public function SayHi(){
        header('Location: '.HOST.'/admin/user');
    }
}

?>