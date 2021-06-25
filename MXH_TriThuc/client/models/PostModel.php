<?php  
class PostModel extends DB{
    public function addPost($title,$thumb, $hashtag, $content, $member_id, $category){
        $sql ="INSERT INTO `post`(`Title`,`thumb`,`HashTag`,`Content`,`Status`,`CreatedDate`, `Member_id`, `Category_id`) VALUES ('$title','$thumb', '$hashtag','$content','Chờ duyệt',NOW(),$member_id,$category)";
        // echo $sql;
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function getPostByUser($userID){
        $sql ="SELECT * FROM `post` WHERE `member_id` = $userID";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getPostByID($id){
        $sql ="SELECT p.*, u.Name FROM `post` p, `user_profile` u WHERE u.User_id = p.Member_id AND `Post_id` = $id";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getPostSortView($sort){
        $sql = "SELECT p.*, u.Name FROM `post` p, `user_profile` u WHERE u.User_id = p.Member_id ORDER BY `viewed` $sort";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getPostSortID($sort){
        $sql = "SELECT p.*, u.Name FROM `post` p, `user_profile` u WHERE u.User_id = p.Member_id ORDER BY `Post_id` $sort";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function editPost($id,$title, $thumb,$hashtag, $content, $category){
        $sql = "UPDATE `post` SET `Title`='$title', `thumb`='$thumb',`HashTag`='$hashtag',`Content`='$content',`Category_id`='$category' WHERE `Post_id`=$id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function deletePost($id){
        $sql = "DELETE FROM `post` WHERE `Post_id` = $id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }
}

?>