<?php
class UserModel extends DB{
    
    public function getUser($username = '', $password = ''){
        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `UType_id`=2";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            $sql = "SELECT * FROM `user`";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `UType_id` = 2";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
    }

    public function getUserByID($id){
        $sql = "SELECT * FROM `user` WHERE `User_id`=$id";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
    }

    

    public function createUser($username, $password, $email){
        $sql = "INSERT INTO `user` VALUES (null,'$username', '$email','$password', 2)";
         $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;
    }

    public function getUserProfile($userID){
        
        $sql = "SELECT * from `user_profile` WHERE `User_id` = $userID"; 

        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }

    public function createUserProfile($userID, $email){
        $sql = "INSERT INTO `user_profile` VALUES (null, null, null,null, null, '$email', null, 0, 0, $userID, 1,0)";
        echo $sql;
        $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;


    }

    public function updateProfile($fullname, $phoneNumber, $email, $address, $userThumb){
        $userID = $_SESSION['userID'];

        $sql = "UPDATE `user_profile` SET `avatar`='$userThumb',`name`='$fullname',`phone`='$phoneNumber',`email`='$email',`address` = '$address' WHERE `user_id` = $userID";
        $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;
    }

    public function changePassword($id, $newPassword){
        $sql = "UPDATE `user` SET `Password` = '$newPassword' WHERE `User_id` = $id";
        $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;
    }

    public function getRateHistory($userID){
        $sql = "SELECT * from `voting` WHERE `Member_id` = $userID ORDER BY `votingID` DESC LIMIT 10"; 

        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }

    public function getLikeHistory($userID){
        $sql = "SELECT * from `liked_post` WHERE `User_id` = $userID ORDER BY `LP_id` DESC LIMIT 10"; 
        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }
    public function updateLevel($userID, $value){
        $sql = "UPDATE `user_profile` SET `Level_id` = $value WHERE `User_id` = $userID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

    public function updatePostAmount($userID, $value){
        $sql = "UPDATE `user_profile` SET `PostAmount` = $value WHERE `User_id` = $userID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        } 
    }

    public function updatePoint($userID, $value){
        $sql = "UPDATE `user_profile` SET `point` = $value WHERE `User_id` = $userID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        } 
    }

    public function updateCommentAmount($userID, $value){
        $sql = "UPDATE `user_profile` SET `CommentAmount` = $value WHERE `User_id` = $userID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        } 
    }

    public function getTop5HighestFromTable($table,$selectOption,$orderby)
    {
        $sql='SELECT '.$selectOption.' FROM '.$table.' u ORDER BY '.$orderby.' DESC LIMIT 5';
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
}

?>