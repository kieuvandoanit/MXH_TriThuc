<?php
class PostModel extends Db{
    public function getAllPost()
    {
        $sql='SELECT * FROM `Post`';
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function getAllPostByStatus($expression)
    {
        $sql='SELECT * FROM `Post` WHERE status="'.$expression.'"';
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function getPostDetail($expression){
        $sql='SELECT * FROM `Post` WHERE Post_id='.$expression;
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function updatePost($id,$title,$content,$status)
    {
        $sql='UPDATE `Post` SET   `Title` = "'.$title.'", `Content` ="'.$content.'",status="'.$status.'" WHERE `Post_id`='.$id;
        $result=mysqli_query($this->conn,$sql);
        return $result; 
        # code...
    }
    public function createPost($title,$image,$hashTag,$content)
    {
        $sql='INSERT INTO `POST`(title,thumb,HashTag,Content,Status) VALUES("'.$title.'","'.$image.'","'.$hashTag.'","'.$content.'","Chờ duyệt")';
        $result=mysqli_query($this->conn,$sql);
        return $result; 
    }
    public function deletePost($id)
    {
        $sql='UPDATE `Post` SET   `isDelete` = 1, `Status` ="Không được duyệt" WHERE `Post_id`='.$id;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
}
?>