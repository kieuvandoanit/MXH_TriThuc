<?php 
class Test extends Controller{
    public function SayHi(){
        $this->ViewClient("inc/header");
        $this->ViewClient("pages/test");
        $this->ViewClient("inc/footer");
    }
    public function upload(){
        require_once('MXH_TriThuc/plugin/helper.php');
        $data['url'] = uploadFile();
        $this->ViewClient("inc/header");
        $this->ViewClient("pages/test_1", $data);
        $this->ViewClient("inc/footer");
    }
}

?>