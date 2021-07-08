<?php  
class ImportModel extends DB{
    public function ImportCategory($Category_id,$CategoryName){
        $sql = "INSERT INTO `category` VALUES ($Category_id, '$CategoryName')";
        $result=mysqli_query($this->conn,$sql);
        return $result; 
    }

    public function ImportPost($Post_id,$Title,$thumb,$HashTag,$Content,$Status,$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,$CreatedDate,$UpdatedDate,$Member_id,$Category_id){
        $sql = "INSERT INTO `post` VALUES($Post_id, '$Title', '$thumb', '$HashTag', '$Content', '$Status',$LikeAmount,$commentAmount,$AvgRating,$rateAmount,$viewed,$isDelete,$isValid,'$CreatedDate','$UpdatedDate',$Member_id,$Category_id)";
        $result=mysqli_query($this->conn,$sql);
        return $result; 
    }

    public function ImportComment($Comment_id,$Content, $CreateDate, $UpdateDate, $Status, $isDelete, $Member_id, $Post_id){
        $sql = "INSERT INTO `comment` VALUES($Comment_id,'$Content', '$CreateDate', '$UpdateDate', '$Status', '$isDelete', $Member_id, $Post_id)";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportLevel($Level_id,$level_name,$Discription){
        $sql = "INSERT INTO `level` VALUES($Level_id,'$level_name', '$Discription')";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportLiked_Post($LP_id, $User_id, $Post_id, $time){
        $sql = "INSERT INTO `liked_post` VALUES($LP_id,$User_id, $Post_id, '$time')";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportUser($User_id, $UserName, $email, $Password, $token, $UType_id){
        $sql = "INSERT INTO `user` VALUES($User_id,'$UserName', '$email', '$Password', '$token', $UType_id)";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportUser_profile($Profile_id, $Avatar, $Name, $gender, $Phone, $Email, $address, $PostAmount, $CommentAmount, $User_id, $Level_id){
        $sql = "INSERT INTO `user_profile` VALUES($Profile_id, '$Avatar', '$Name', '$gender', '$Phone', '$Email', '$address', $PostAmount, $CommentAmount, $User_id, $Level_id)";
        
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportUser_type($UType_id, $Type){
        $sql = "INSERT INTO `user_type` VALUES($UType_id, '$Type')";
        
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function ImportVoting($votingID, $PostID,$Member_id, $Rate, $time){
        $sql = "INSERT INTO `voting` VALUES($votingID, $PostID, $Member_id, '$Rate', '$time')";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
}


?>