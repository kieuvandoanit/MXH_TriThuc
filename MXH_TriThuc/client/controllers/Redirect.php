<?php
class Redirect{
    public function SayHi(){
        header('Location: '.HOST.'/user');
    }
}

?>