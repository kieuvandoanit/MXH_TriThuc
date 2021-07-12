<?php
class User extends Controller{
    protected $userModel;

    public function __construct(){
        $this->userModel = $this->ModelAdmin('UserModel');
    }

    public function SayHi(){
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'user'){
            session_destroy();
            $this->redirect('/admin');
        }
        $data['page_title'] = 'Đăng nhập';
        $this->ViewAdmin('inc/header',$data);
        $this->ViewAdmin('pages/login');
        $this->ViewAdmin('inc/footer');
    }

    public function handleLogin(){
        // echo '<pre>'; print_r($_POST); echo '</pre>';

        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUser($username, $password,1);
            if(!empty($user)){
                $userInfo = $this->userModel->getUserProfile($user[0]['User_id']);
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = $userInfo[0]['Name'];
                $_SESSION['avatar'] = $userInfo[0]['Avatar'];
                $_SESSION['userID'] = $user[0]['User_id'];
                $_SESSION['isLogin'] = true;
                $_SESSION['auth']= 'admin';

                $this->redirect('/admin');
            }else{
                $this->redirect('/admin/user');
            }
        }
    }

    public function logout(){
        session_destroy();
        $this->redirect('/admin/user');
    }

    public function findPass(){
        $data['page_title'] = 'Quên mật khẩu';
        $this->ViewAdmin('inc/header',$data);
        $this->ViewAdmin('pages/find_password');
        $this->ViewAdmin('inc/footer');
    }

    public function handleFindPass(){
        if(isset($_POST['btn_findPass'])){
            require_once('MXH_TriThuc/plugin/sendMail.php');
            $email = $_POST['email'];
            $user = $this->userModel->getUserByEmail($email);
            if(!empty($user)){
                $userID = $user[0]['User_id'];
                $newPass = rand(10000,99999);
                $title="XÁC NHẬN TÌM MẬT KHẨU!";
                $body='Nếu đúng là bạn, xin hãy click vào đường link dưới đây:<br/>'.HOST.'/admin/user/confirmHandleFindPass/'.$userID.'/'.$newPass.'<br/> Mật khẩu sau khi kích hoạt là: '.$newPass;
                sendMail($title, $body, $email);
                $this->redirect('/user');
            }else{
                $this->redirect('/user');
            }
        }else{
            $this->redirect('/user');
        }
    }

    public function confirmHandleFindPass($id,$newPassword){
        // $newPassword = '12345';
        $result = $this->userModel->changePassword($id,$newPassword);
        if($result){
            $this->redirect('/admin/user');
        }else{
            $this->redirect('/admin/user/findPass');
        }
    }

    public function adminPage(){
        $data['page_title'] = 'Quản lý admin';

        $userAdmin = $this->userModel->getUser(null, null, 1);
        $data['userAdmin']=$userAdmin;
        $this->ViewAdmin('inc/header',$data);
        $this->ViewAdmin('pages/admin_page',$data);
        $this->ViewAdmin('inc/footer');
    }

    public function createAdmin(){
        $data['page_title'] = 'Tạo admin';

        $this->ViewAdmin('inc/header',$data);
        $this->ViewAdmin('pages/addAdmin_page');
        $this->ViewAdmin('inc/footer');
    }

    public function handleCreateAdmin(){ 
        if(isset($_POST['btn_createAdmin'])){
            if(!empty($_POST['username'] && $_POST['password'] && $_POST['rePassword'])){
                if($_POST['password'] == $_POST['rePassword']){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $email = $_POST['email'];
                    $gender = 'Nam';

                    $result = $this->userModel->createUser(1, $username, $password, $email);
                    if($result){
                        $newAdmin = $this->userModel->getUser($username, $password, 1);
                        if(!empty($newAdmin)){
                            $resultCreateProfile = $this->userModel->createUserProfile('',$fullname,$gender, $phoneNumber, $email, '', $newAdmin[0]['User_id']);
                            $resultCreateSetting = $this->userModel->createSetting($newAdmin[0]['User_id'],$email);
                            if($resultCreateProfile && $resultCreateSetting){
                                $this->redirect('/admin/user/adminPage');
                            }else{
                                $this->redirect('/admin/user/createAdmin');
                            }
                        }else{
                            $this->redirect('/admin/user/createAdmin');
                        }
                    }else{
                        $this->redirect('/admin/user/createAdmin');
                    }
                }else{
                    $this->redirect('/admin/user/createAdmin');
                }
            }else{
                $this->redirect('/admin/user/createAdmin');
            }
        }else{
            $this->redirect('/admin/user/createAdmin');
        } 
    }

    public function editUser(){

    }
    public function profile($id){
        $data['page_title'] = 'Thông tin user';
        $data['userProfile']=$this->userModel->getProfile($id);
        if(!empty($data['userProfile'])){
            $this->viewAdmin('inc/header', $data);
            $this->viewAdmin('pages/profile',$data);
            $this->viewAdmin('inc/footer');
        }
    }
    public function deleteUser($id, $type=1){
        $this->userModel->deleteUser($id);
        if($type==1){
            $this->redirect('/admin/user/adminPage');
        }else{
            $this->redirect('/admin/user/userPage');
        }
        
    }

    public function userPage(){
        $data['page_title'] = 'Quản lý user';
        $data['listUser'] = $this->userModel->getListUser(2);
        if(!empty($data['listUser'])){

            $this->viewAdmin('inc/header', $data);
            $this->viewAdmin('pages/user_page', $data);
            $this->viewAdmin('inc/footer');
        }

        
    }

    public function createUser(){
        $data['page_title'] = 'Tạo người dùng';
        $this->viewAdmin('inc/header',$data);
        $this->viewAdmin('pages/addUser_page');
        $this->viewAdmin('inc/footer');
    }
    

    public function handleCreateUser(){
        // echo '<pre>'; print_r($_POST); echo '</pre>'; 

        if(isset($_POST['btn_createUser'])){
            $fullname = $_POST['fullname'];
            $phoneNumber = $_POST['phoneNumber'];
            $gender = $_POST['gender'];
            $avatar = $_POST['avatar'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $postNumber = $_POST['postNumber'];
            $email = $_POST['email'];

            if($_POST['password'] == $_POST['rePassword']){
                $addUserSuccess = $this->userModel->createUser(2,$username, $password, $email);
                if($addUserSuccess){
                    $userNew = $this->userModel->getUser($username, $password);
                    $addUserProfileSuccess = $this->userModel->createUserProfile($avatar,$fullname,$gender,$phoneNumber, $email, $address, $userNew[0]['User_id']);
                    if($addUserProfileSuccess){
                        $this->redirect('/admin/user/userPage');
                    }
                }else{
                    $this->redirect('/admin/user/createUser');
                }
            }else{
                $this->redirect('/admin/user/createUser');
            }
        }
    }

}

?>