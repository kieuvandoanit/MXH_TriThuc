<?php  
class ImportModel extends DB{
    public function ImportPost($Post_id,$Title,$thumb,$HashTag,$Content,$Status,$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,$CreatedDate,$UpdatedDate,$Member_id,$Category_id){
        $sql = "INSERT INTO `post` VALUES($Post_id, '$Title', '$thumb', '$HashTag', '$Content', '$Status',$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,'$CreatedDate','$UpdatedDate',$Member_id,$Category_id)";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }
}


?>