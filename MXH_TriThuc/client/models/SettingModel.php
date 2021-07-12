<?php  
class SettingModel extends DB{

    public function getSetting(){
        $sql = "SELECT * FROM `setting`";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
}


?>