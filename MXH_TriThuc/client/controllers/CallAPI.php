<?php  
require_once('MXH_TriThuc/plugin/helper.php');
class CallAPI extends Controller{
    protected $postModel;
    public function __construct(){
        $this->postModel = $this->ModelClient("PostModel");
    }
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

    public function ExportFileCSVPost(){
        $data['post'] = $this->postModel->getPostAll();

        $this->ViewClient('inc/header');
        $this->ViewClient('pages/ExportPost',$data);
    }

    public function handleExportFileCSVPost(){
        $post = $this->postModel->getPostAll();
        

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Transfer-Encoding: ASCII");
        header('Content-Disposition: attachment; filename=Post.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Post_id', 'Title', 'thumb', 'HashTag','Content','Status', 'LikesAmount','commentAmount','AvgRating','rateAmount','viewed','isDelete','isValid','CreatedDate','UpdatedDate','Member_id','Category_id'));

        if (count($post) > 0) {
            foreach ($post as $row) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
    }
}

?>