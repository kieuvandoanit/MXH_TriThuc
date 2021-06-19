<?php
class UserModel extends DB{
    
    public function getUser($username, $password){
        $sql = "SELECT * FROM `user` WHERE `username`=$username AND `password`=$password";
        $rows = mysqli_query($this->conn, $sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function createUser($username, $password, $email){
        $sql = "INSERT INTO `user` VALUES (null,'$username', '$email','$password',null, null)";
        // $sql = "SELECT * FROM `user`";
        echo $sql;
         $result = false;
         if(mysqli_query($this->conn, $sql)){
             $result = true;
         }
         return $result;
    }
}

?>