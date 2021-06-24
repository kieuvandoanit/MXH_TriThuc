<?php
class User extends Controller{
    protected $userModel;
    public function __construct(){
        $this->userModel = $this->ModelClient("UserModel");
    }
    // [GET] /user
    public function SayHi(){
        $data['page_title'] = 'Đăng nhập';
        $this->ViewClient('inc/header',$data);
        $this->ViewClient('pages/login');
        $this->ViewClient('inc/footer');
    }
    // [GET] /user/register
    public function register($error=[]){
        // $this->ModelClient('UserModel')->getUser('abc','abc');
        $data['page_title'] = 'Đăng ký';
        $this->ViewClient('inc/header',$data);
        $this->ViewClient('pages/register',$error);
        $this->ViewClient('inc/footer');
    }

    //[POST] /user/register
    public function handleRegister(){
        // echo '<pre>'; print_r($_POST); echo '</pre>';
        $error = [];
        if(isset($_POST['btn_register'])){
            if(!empty($_POST)){
                if(!empty($_POST['username'])){
                    $username = $_POST['username'];
                }else{
                    $error['username'] = 'Username không được để trống!';
                }
            }
            
            if(!empty($_POST)){
                if(!empty($_POST['password']) && !empty($_POST['re_password']) && $_POST['password']==$_POST['re_password']){
                    $password = $_POST['password'];
                }else{
                    $error['password'] = 'Password không được để trống hoặc không giống nhau!';
                }
            }
    
            if(!empty($_POST)){
                if(!empty($_POST['email'])){
                    $email = $_POST['email'];
                }else{
                    $error['email'] = 'Email không được để trống!';
                }
            }
        }
        
        if(empty($error)){
            if($this->userModel->createUser($username, $password, $email)){
                $user = $this->userModel->getUser($username, $password);
                $userID = $user[0]['User_id'];
                if($this -> userModel->createUserProfile($userID)){
                    $this->redirect('/user');
                }else{
                    $this->redirect('/user/register');
                }
            };
        }else{
            $this->redirect('/user/register');
        }
    }

    public function handleLogin(){ 
        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->getUser($username, $password);
            $userInfo = $this->userModel->getUserProfile($user[0]['User_id']);
            if(!empty($user)){
                // echo '<pre>'; print_r($user); echo '</pre>';
                $_SESSION['fullname']=$userInfo[0]['Name'];
                $_SESSION['avatar']=$userInfo[0]['Avatar'];
                $_SESSION['userID'] = $user[0]['User_id'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['username'] = $username;
                $_SESSION['isLogin'] = true;
                $this->redirect('/');
            }else{
                $this->redirect('/user');
            }
        }
    }

    public function logout(){
        
        session_destroy();
        $this->redirect('/user');
        // echo "Davao";
    }

    public function profile(){
        $data['user'] = $this-> userModel-> getUserProfile($_SESSION['userID']);

        $this->ViewClient('inc/header');
        $this->ViewClient('pages/profile_page',$data);
        $this->ViewClient('inc/footer');
    }

    public function editProfile(){
        $data['user'] = $this-> userModel-> getUserProfile($_SESSION['userID']);
        
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/profile_edit_page', $data);
        $this->ViewClient('inc/footer');
    }

    public function handleEditProfile(){
        // echo '<pre>'; print_r($_POST); echo '</pre>';
        if(isset($_POST['btn_update'])){
            $fullname = $_POST['fullname'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $userThumb = $_POST['user_thumb'];

            $result = $this->userModel-> updateProfile($fullname, $phoneNumber, $email, $address, $userThumb);
            if($result){
                $this->redirect('/user/profile');
            }else{
                $this->redirect('/user/editProfile');
            }
        } 
    }

    public function findPass(){
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/find_password');
        $this->ViewClient('inc/footer');
    }

    public function handleFindPass(){
        if(isset($_POST['btn_findPass'])){
            require_once('MXH_TriThuc/plugin/sendMail.php');
            $email = $_POST['email'];
            $user = $this->userModel->getUserByEmail($email);
            if(!empty($user)){
                $userID = $user[0]['User_id'];
                $title="XÁC NHẬN TÌM MẬT KHẨU!";
                $body='Nếu đúng là bạn, xin hãy click vào đường link dưới đây:<br/>'.HOST.'/user/confirmHandleFindPass/'.$userID.'<br/> Mật khẩu sau khi kích hoạt là: 12345';
                sendMail($title, $body, $email);
                $this->redirect('/user');
            }else{
                $this->redirect('/user');
            }
            
        }else{
            $this->redirect('/user');
        }
        
    }

    public function confirmHandleFindPass($id){
        $newPassword = '12345';
        $result = $this->userModel->changePassword($id,$newPassword);
        if($result){
            $this->redirect('/user');
        }else{
            $this->redirect('/user/findPass');
        }
    }

    public function changePassword(){
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/change_password');
        $this->ViewClient('inc/footer');
    }

    public function handleChangePass(){
        echo '<pre>'; print_r($_POST); echo '</pre>';
        if(isset($_POST['btn_changePass'])){
            $userID = $_SESSION['userID'];
            $oldPass = $_POST['oldPassword'];
            $newPass=$_POST['newPassword'];
            $reNewPass =$_POST['reNewPassword'];
            if($newPass != $reNewPass){
                $this->redirect('/user/changePassword');
            }else{
                $user = $this->userModel->getUserByID($userID);
                if($oldPass == $user[0]['Password']){
                    $result = $this->userModel->changePassword($userID, $newPass);
                    if($result){
                        $this->redirect('/user/profile');
                    }else{
                        $this->redirect('/user/changePassword');
                    }
                }else{
                    $this->redirect('/user/changePassword');
                }
            }
        } 
    }
}

?>