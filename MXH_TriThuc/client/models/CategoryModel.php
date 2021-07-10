<?php  
class CategoryModel extends DB{
    public function getAllCategory(){
        $sql = 'SELECT * FROM `category`';
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
}


?>