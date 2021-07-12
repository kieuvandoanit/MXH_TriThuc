<?php  
class SettingModel extends DB{

    public function getSettingAdmin($userID){
        $sql = "SELECT * FROM `setting` WHERE `userID` = $userID";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function changeNotification($value, $userID){
        $sql = "UPDATE `setting` SET `Notification` = $value WHERE `userID` = $userID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

    public function changeAutoBrowsing($value){
        $sql = "UPDATE `setting` SET `AutoBrowsing` = $value";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        }
    }
}


?>