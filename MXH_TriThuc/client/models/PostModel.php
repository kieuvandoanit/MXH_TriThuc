<?php  
class PostModel extends DB{
    public function addPost($title,$thumb, $hashtag, $content,$status, $member_id, $category){
        $sql ="INSERT INTO `post`(`Title`,`thumb`,`HashTag`,`Content`,`Status`,`CreatedDate`, `Member_id`, `Category_id`) VALUES ('$title','$thumb', '$hashtag','$content','$status',NOW(),$member_id,$category)";
        // echo $sql;
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function getPostAll(){
        $sql ="SELECT * FROM `post`";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
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

    public function getSlider(){
        $sql = "SELECT `thumb` FROM `post` ORDER BY `viewed` ASC LIMIT 5";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function like($id, $value){
        $sql = "UPDATE `post` SET `LikesAmount`=$value WHERE `Post_id` = $id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function disLike($id, $like){
        $sql = "UPDATE `post` SET `LikesAmount`=$like WHERE `Post_id` = $id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function disLikeHistory($postID, $userID){
        $sql = "DELETE FROM `liked_post` WHERE `User_id`=$userID AND `Post_id`=$postID";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function rating($id,$avgrating, $rateAmount){
        $sql = "UPDATE `post` SET `AvgRating`=$avgrating, `rateAmount`=$rateAmount WHERE `Post_id` = $id";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function ratingHistory($post, $user, $value){
        $sql = "INSERT INTO `voting` VALUES(null, $post, $user, '$value', NOW())";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;
    }

    public function getRatingHistory($postID, $value){
        $sql = "SELECT COUNT(*) as `count` FROM `voting` WHERE `PostID` = $postID AND `Rate` = '$value'";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getRatingHistoryByPostIDUserID($postID, $userID){
        $sql = "SELECT * FROM `voting` WHERE `PostID` = $postID AND `Member_id` = $userID";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function likeHistory($postID, $userID){
        $sql = "INSERT INTO `liked_post` VALUES(null, $userID, $postID, NOW())";
        $result = false;
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return $result;

    }

    public function getLikeHistory($postID, $userID){
        $sql = "SELECT * FROM `liked_post` WHERE `Post_id` = $postID AND `User_id` = $userID";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getLiked($userID){
        $sql = "SELECT * FROM `liked_post` WHERE `User_id` = $userID";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    //full-text seach
    public function getPostByContent($content)
    {
        $sql='SELECT  p.*,u.Name FROM POST p, user_profile u WHERE MATCH (Title) AGAINST ("'.$content.'" WITH QUERY EXPANSION) AND U.User_id=P.Member_id UNION SELECT  p.*,u.Name FROM POST p, user_profile u WHERE MATCH (Content) AGAINST ("'.$content.'" WITH QUERY EXPANSION) AND U.User_id=P.Member_id';
        echo $sql;
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
    public function getPostByHashTag($hashTagList)
    {
        $countHashTag= count($hashTagList);
        $sql='';
        foreach($hashTagList as $key=>$item){
            $sql=$sql.'SELECT  p.*,u.Name FROM POST p, user_profile u WHERE MATCH (hashtag) AGAINST ("'.substr($item, 1).'" WITH QUERY EXPANSION) AND U.User_id=P.Member_id';
            if(++$key!=$countHashTag){
                $sql=$sql.' INTERSECT ';
            }
        };
        // echo '\n'.$sql.'\n';
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }


    public function updateViewed($postID, $value){
        $sql = "UPDATE `post` SET `viewed`= $value WHERE `Post_id` = $postID";
        if(mysqli_query($this->conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

    public function getTop5HighestFromTable($table,$selectOption,$orderby)
    {
        $sql='SELECT  '.$selectOption.' FROM '.$table.' p ORDER BY '.$orderby.' DESC LIMIT 5';
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return $arr;
    }


?>