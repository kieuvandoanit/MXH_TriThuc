<?php  
function convert_vi_to_en($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
    return $str;
}

function callAPI($method, $url, $data = false){
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"DELETE");
            break;
        default:
            if($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

function uploadFile(){
    global $_FILES;
    //Thư mục chứa file upload
    $upload_dir = 'MXH_TriThuc/uploads/';
    //Đường dẫn của file upload
    $upload_file = $upload_dir . $_FILES['file']['name'];
    //Xử lý upload đúng file ảnh
    $type_allow = array('png', 'jpg', 'gif', 'jpeg');
    $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($type), $type_allow)) {
        $error['type'] = "Chỉ được upload file có đuôi png, jpg, gif, jpeg";
    } else {
        #upload file có kích thước cho phép
        $file_size = $_FILES['file']['size'];
        if ($file_size > 21000000) {
            $error['file_size'] = "Chỉ được upload ảnh bé hơn 20MB";
        }
        #Kiểm tra trùng file trên hệ thống
        if (file_exists($upload_file)) {
            
            #Xử lý đổi tên file tự động
            
            //Tạo file mới
            $file_name = pathinfo($_FILES['file']['name'],PATHINFO_FILENAME);
            $new_file_name = $file_name.' -Copy.';
            $new_upload_file = $upload_dir.$new_file_name.$type;
            $k = 1;
            while(file_exists($new_upload_file)){
                $new_file_name = $file_name." -Copy({$k}).";
                $k++;
                $new_upload_file = $upload_dir.$new_file_name.$type;
            }
            $upload_file = $new_upload_file;
        }
    }
    if (empty($error)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
            echo"upload file thành công";
            return strstr($upload_file,'uploads');
        } else {
            echo "Upload file không thành công";
            return $error['type'];
        }
    } else {
        // echo show_array($error);
        return $error['type'];
    }

}

?>