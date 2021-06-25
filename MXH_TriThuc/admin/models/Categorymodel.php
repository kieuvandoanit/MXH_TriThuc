<?php
class CategoryModel extends DB{
    public function getAllCategory($sort){
        $sql="SELECT * FROM `category` ORDER BY  CATEGORY_ID ".$sort;
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function getCategoryById($id)
    {
        $sql="SELECT * FROM `category` WHERE  CATEGORY_ID= ".$id;
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function setNewCategory($cateName,$description)
    {
        # code...
        $sql='INSERT INTO `CATEGORY`(`categoryName`,`Description`) VALUES("'.$cateName.'","'.$description.'")';
        $result=mysqli_query($this->conn,$sql);
        return $result;      
    }
    public function deleteCategory($id)
    {
        # code...
        $sql='DELETE FROM `CATEGORY` WHERE CATEGORY_ID= '.$id;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function updateCategory($id,$cateName,$description)
    {
        # code...
        $sql='UPDATE `CATEGORY` SET   `CategoryName` = "'.$cateName.'", `Description` ="'.$description.'" WHERE `Category_id`='.$id;
        // ECHO $sql.'<br>';
        $result=mysqli_query($this->conn,$sql);
        // ECHO $result;
        return $result; 
    }
}
?>