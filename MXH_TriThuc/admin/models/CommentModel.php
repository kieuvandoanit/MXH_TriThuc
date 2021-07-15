<?php
class CommentModel extends Db{
    public function getAllComment()
    {
        $sql='SELECT c.Comment_id, up.Name, c.CreateDate, c.UpdateDate, c.Post_id, p.Title, c.Content FROM user AS u INNER JOIN comment AS c ON u.User_id = c.Member_id INNER JOIN post AS p ON c.Post_id = p.Post_id INNER JOIN user_profile AS up ON u.User_id = up.User_id WHERE c.isDelete = 0';
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getAllCommentSpam()
    {
        $sql='SELECT c.Comment_id, up.Name, c.CreateDate, c.UpdateDate, c.Post_id, p.Title, c.Content FROM user AS u INNER JOIN comment AS c ON u.User_id = c.Member_id INNER JOIN post AS p ON c.Post_id = p.Post_id INNER JOIN user_profile AS up ON u.User_id = up.User_id WHERE c.isDelete = 0 AND c.isSpam = 1';
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getCommentDetail($expression){
        $sql='SELECT c.Comment_id, up.Name, c.CreateDate, c.UpdateDate, c.Post_id, p.Title, c.Content FROM user AS u INNER JOIN comment AS c ON u.User_id = c.Member_id INNER JOIN post AS p ON c.Post_id = p.Post_id INNER JOIN user_profile AS up ON u.User_id = up.User_id WHERE c.Comment_id='.$expression;
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function updateComment($id,$content)
    {
        $sql='UPDATE `comment` SET `Content` = "'.$content.'", `UpdateDate`= NOW()  WHERE `Comment_id`='.$id;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function deleteComment($id)
    {
        $sql='UPDATE `comment` SET `isDelete` = 1 WHERE `Comment_id`='.$id;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

    public function getCommentByID($id){
        $sql = "SELECT * FROM `comment` WHERE `Comment_id` = $id";
        $rows=mysqli_query($this->conn,$sql);
        $arr = [];
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
}
?>