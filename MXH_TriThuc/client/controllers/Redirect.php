<?php
class Redirect{
    public function SayHi(){
        header('Location: '._LINK_ROOT.'/user');
    }
}

?>