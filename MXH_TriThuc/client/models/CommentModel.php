<?php
class CommentModel extends DB{
    public function addComment($content, $isSpam,$member_id, $post_id){
        $sql = "INSERT INTO `comment`(`Content`, `CreateDate`, `UpdateDate`, `isSpam`, `isDelete`, `Member_id`, `Post_id`) VALUES ('$content', NOW(), NOW(),$isSpam, 0, $member_id,$post_id)";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function getPostByID($id){
        $sql ="SELECT p.* FROM `post` p WHERE `Post_id` = $id";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getCommentSortID($id, $sort){
        $sql = "SELECT c.Comment_id, c.Content, u.Avatar, u.Name FROM `comment` c, `user_profile` u WHERE `Post_id` = $id AND c.Member_id=u.User_id ORDER BY `Comment_id` $sort";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function spamComment($comment_id){
        $sql = "UPDATE `comment` SET `isSpam`=1, `UpdateDate`=NOW() WHERE `Comment_id`=$comment_id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }
}
?>