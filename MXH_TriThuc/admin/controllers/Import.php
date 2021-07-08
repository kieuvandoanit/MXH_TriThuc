<?php  
class Import extends Controller{
    public function ImportFileCSVPost(){
        // $data['post'] = $this->postModel->getPostAll();

        $this->ViewClient('inc/header');
        $this->ViewClient('pages/ImportPost');
    }

    public function handleImportFileCSVPost(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $Post_id = $column[0];
                    }
                    if(isset($column[1])){
                        $Title = $column[1];
                    }
                    if(isset($column[2])){
                        $thumb = $column[2];
                    }
                    if(isset($column[3])){
                        $HashTag = $column[3];
                    }
                    if(isset($column[4])){
                        $Content = $column[4];
                    }
                    if(isset($column[5])){
                        $Status = $column[5];
                    }
                    if(isset($column[6])){
                        $LikeAmount = $column[6];
                    }
                    if(isset($column[7])){
                        $commentAmount = $column[7];
                    }
                    if(isset($column[8])){
                        $AvgRating = $column[8];
                    }
                    if(isset($column[9])){
                        $rateAmount = $column[9];
                    }
                    if(isset($column[10])){
                        $viewed = $column[10];
                    }
                    if(isset($column[11])){
                        $isDelete = $column[11];
                    }
                    if(isset($column[12])){
                        $isValid = $column[12];
                    }
                    if(isset($column[13])){
                        $CreatedDate = $column[13];
                    }
                    if(isset($column[14])){
                        $UpdatedDate = $column[14];
                    }
                    if(isset($column[15])){
                        $Member_id = $column[15];
                    }
                    if(isset($column[16])){
                        $Category_id = $column[16];
                    }
                    
                    if(is_numeric($Post_id)){
                        $this->importModel->ImportPost($Post_id,$Title,$thumb,$HashTag,$Content,$Status,$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,$CreatedDate,$UpdatedDate,$Member_id,$Category_id);
                    }  
                } 
            }
        }
    }
}

?>