<?php
class UserModel extends DB{
    
    public function getUser($username = '', $password = ''){
        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
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

    

    public function createUser($username, $password, $email){
        $sql = "INSERT INTO `user` VALUES (null,'$username', '$email','$password',null, null)";
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

    public function createUserProfile($userID){
        $sql = "INSERT INTO `user_profile` VALUES (null, null, null, null, null, null, null, null, $userID, null)";

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
}

?>