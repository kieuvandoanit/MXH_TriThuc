<?php  
require_once('MXH_TriThuc/plugin/helper.php');
class CallAPI extends Controller{
    public function SayHi(){
        
        $data = array(
            'title' => "KieuVanDoan đảng yếu dkm",
            'description' => "abc",
        );
        $data = http_build_query($data);
        
        $result = CallAPI("POST", "localhost:3000/browsing", $data);
        
        if(isset($result)){
            echo $result;
        }else{
            echo "khong vao";
        }
    }
}

?>