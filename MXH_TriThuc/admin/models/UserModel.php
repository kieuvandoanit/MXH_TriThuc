<?php 
class UserModel extends DB{

    public function getUser($username = '', $password = '', $UType_id=2){
        // echo $username, $password, $UType_id;
        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `UType_id`=$UType_id";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            $sql = "SELECT * FROM `user` WHERE `UType_id` = $UType_id";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }
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

    public function getUserProfile($userID){
        
        $sql = "SELECT * from `user_profile` WHERE `User_id` = $userID"; 

        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }

    public function getListUser($type){
        
        $sql = "SELECT * FROM `user` as u, `user_profile` as p WHERE u.User_id=p.User_id AND u.UType_id=$type"; 

        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `UType_id` = 1";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
    }

    public function getProfile($userID){
        
        $sql = "SELECT * FROM `user` as u, `user_profile` as p WHERE u.User_id=p.User_id AND u.User_id=$userID"; 

        $rows = mysqli_query($this->conn, $sql);
        $arr=[];
        while($row=mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return $arr;
    }

    public function createUser($UType_id, $username, $password, $email){
        $sql = "INSERT INTO `user` VALUES(null, '$username', '$email','$password',null,$UType_id)";

        if(mysqli_query($this->conn, $sql)){
            return true;
        }
        return false;
    }

    public function createUserProfile($avatar='',$fullname='',$gender='',$phoneNumber='', $email='', $address='', $userID){
        if($avatar==''){
            $sql = "INSERT INTO `user_profile` VALUES(null, null, '$fullname','$gender', '$phoneNumber', '$email', '$address', 0, 0,$userID, 0)";
        }else{
            $sql = "INSERT INTO `user_profile` VALUES(null, '$avatar', '$fullname','$gender', '$phoneNumber', '$email', '$address', 0, 0,$userID, 0)";
        }
        
        if(mysqli_query($this->conn, $sql)){
            return true;
        }
        return false;
    }

    public function createSetting($userID, $email){
        $sql = "INSERT INTO `setting` VALUES (null, $userID, '$email', 1, 1)";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }
        return false;
    }

    public function deleteUser($id){
        $sql = "DELETE FROM `user_profile` WHERE `User_id` = $id";
        if(mysqli_query($this->conn, $sql)){
            $sql2 = "DELETE FROM `user` WHERE `User_id` = $id";
            if(mysqli_query($this->conn, $sql2)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function changePassword($id, $newPassword){
        $sql = "UPDATE `user` SET `Password` = '$newPassword' WHERE `User_id` = $id";
        $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;
    }

    
}

?> 