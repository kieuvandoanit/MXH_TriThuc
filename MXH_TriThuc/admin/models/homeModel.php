<?php
class homeModel extends DB{
    public function countAllByTable($table)
    {
        $sql="SELECT count(*)as number FROM `$table` ";
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function countPostPerMonth()
    {
        $sql='select * from chartCountPost;';
        $rows=mysqli_query($this->conn,$sql);
        $arr = [['Time', 'Number']];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = [$row['monthyear'],intval($row['soluong'])];

        }
        
        return $arr;
    }
}
?>