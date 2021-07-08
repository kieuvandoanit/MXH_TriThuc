<?php  
class Import extends Controller{

    protected $importModel;
    public function __construct(){
        $this->importModel = $this->ModelAdmin('ImportModel');
    }

    public function SayHi(){
        $this->ViewAdmin('inc/header');
        $this->ViewAdmin('import_export/import');
        $this->ViewAdmin('inc/footer');
    }

    public function ImportFileCSV($file){
        $this->ViewAdmin('inc/header');
        $this->ViewAdmin('import_export/importFile',$file);
        $this->ViewAdmin('inc/footer');
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
                        $result = $this->importModel->ImportPost($Post_id,$Title,$thumb,$HashTag,$Content,$Status,$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,$CreatedDate,$UpdatedDate,$Member_id,$Category_id);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    } 
                } 
            }
        }
    }

    public function handleImportFileCSVCategory(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $Category_id = $column[0];
                    }
                    if(isset($column[1])){
                        $CategoryName = $column[1];
                    }
                    
                    if(is_numeric($Category_id)){
                        $result = $this->importModel->ImportCategory($Category_id,$CategoryName);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }

    public function handleImportFileCSVComment(){
        if (isset($_POST["import"])) {
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $Comment_id = $column[0];
                    }
                    if(isset($column[1])){
                        $Content = $column[1];
                    }
                    if(isset($column[2])){
                        $CreateDate = $column[2];
                    }
                    if(isset($column[3])){
                        $UpdateDate = $column[3];
                    }
                    if(isset($column[4])){
                        $Status = $column[4];
                    }
                    if(isset($column[5])){
                        $isDelete = $column[5];
                    }
                    if(isset($column[6])){
                        $Member_id = $column[6];
                    }
                    if(isset($column[7])){
                        $Post_id = $column[7];
                    }
                    
                    if(is_numeric($Comment_id)){
                        $result = $this->importModel->ImportComment($Comment_id,$Content, $CreateDate, $UpdateDate, $Status, $isDelete, $Member_id, $Post_id);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    } 
                } 
            }
        }
    }

    public function handleImportFileCSVLevel(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $Level_id = $column[0];
                    }
                    if(isset($column[1])){
                        $level_name = $column[1];
                    }
                    if(isset($column[2])){
                        $Discription = $column[2];
                    }
                    
                    if(is_numeric($Level_id)){
                        $result = $this->importModel->ImportLevel($Level_id,$level_name,$Discription);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }

    public function handleImportFileCSVLiked_post(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $LP_id = $column[0];
                    }
                    if(isset($column[1])){
                        $User_id = $column[1];
                    }
                    if(isset($column[2])){
                        $Post_id = $column[2];
                    }
                    if(isset($column[3])){
                        $time = $column[3];
                    }
                    
                    if(is_numeric($LP_id)){
                        $result = $this->importModel->ImportLiked_Post($LP_id, $User_id, $Post_id, $time);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }

    public function handleImportFileCSVUser(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $User_id = $column[0];
                    }
                    if(isset($column[1])){
                        $UserName = $column[1];
                    }
                    if(isset($column[2])){
                        $email = $column[2];
                    }
                    if(isset($column[3])){
                        $Password = $column[3];
                    }
                    if(isset($column[4])){
                        $token = $column[4];
                    }
                    if(isset($column[5])){
                        $UType_id = $column[5];
                    }
                    
                    if(is_numeric($User_id)){
                        $result = $this->importModel->ImportUser($User_id, $UserName, $email, $Password, $token, $UType_id);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }

    public function handleImportFileCSVUser_profile(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $Profile_id = $column[0];
                    }
                    if(isset($column[1])){
                        $Avatar = $column[1];
                    }
                    if(isset($column[2])){
                        $Name = $column[2];
                    }
                    if(isset($column[3])){
                        $gender = $column[3];
                    }
                    if(isset($column[4])){
                        $Phone = $column[4];
                    }
                    if(isset($column[5])){
                        $Email = $column[5];
                    }
                    if(isset($column[6])){
                        $address = $column[6];
                    }
                    if(isset($column[7])){
                        $PostAmount = $column[7];
                    }
                    if(isset($column[8])){
                        $CommentAmount = $column[8];
                    }
                    if(isset($column[9])){
                        $User_id = $column[9];
                    }
                    if(isset($column[10])){
                        $Level_id = $column[10];
                    }
                    
                    
                    if(is_numeric($Profile_id)){
                        $result = $this->importModel->ImportUser_profile($Profile_id, $Avatar, $Name, $gender, $Phone, $Email, $address, $PostAmount, $CommentAmount, $User_id, $Level_id);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    } 
                } 
            }
        }
    }

    public function handleImportFileCSVUser_type(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $UType_id = $column[0];
                    }
                    if(isset($column[1])){
                        $Type = $column[1];
                    }
                    
                    
                    if(is_numeric($UType_id)){
                        $result = $this->importModel->ImportUser_type($UType_id, $Type);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }

    public function handleImportFileCSVVoting(){
        if (isset($_POST["import"])) {
            
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                    if(isset($column[0])){
                        $votingID = $column[0];
                    }
                    if(isset($column[1])){
                        $PostID = $column[1];
                    }
                    if(isset($column[2])){
                        $Member_id = $column[2];
                    }
                    if(isset($column[3])){
                        $Rate = $column[3];
                    }
                    if(isset($column[4])){
                        $time = $column[4];
                    }
                    
                    
                    if(is_numeric($votingID)){
                        $result = $this->importModel->ImportVoting($votingID, $PostID,$Member_id, $Rate, $time);
                        if($result){
                            $this->redirect('/admin/Import');
                        }
                    }else{
                        $this->redirect('/admin/Import');
                    }
                } 
            }
        }
    }
}

?>