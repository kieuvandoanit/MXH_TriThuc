<?php
class User extends Controller{
    protected $userModel;
    protected $postModel;
    public function __construct(){
        $this->userModel = $this->ModelClient("UserModel");
        $this->postModel = $this->ModelClient("PostModel");
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
                if($this -> userModel->createUserProfile($userID, $email)){
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
            if(!empty($user)){
                $userInfo = $this->userModel->getUserProfile($user[0]['User_id']);
                $_SESSION['fullname']=$userInfo[0]['Name'];
                $_SESSION['avatar']=$userInfo[0]['Avatar'];
                $_SESSION['userID'] = $user[0]['User_id'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['username'] = $username;
                $_SESSION['isLogin'] = true;
                $_SESSION['auth'] = 'user';
                $this->redirect('/');
            }else{
                $this->redirect('/user');
            }
        }
    }

    public function logout(){
        
        session_destroy();
        $this->redirect('/user');
    }

    public function profile(){
        $data['user'] = $this-> userModel-> getUserProfile($_SESSION['userID']);
        $data['postList'] = $this->postModel->getPostByUser($_SESSION['userID']);

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
            if(!empty($_FILES['file']['name'])){
                require_once('MXH_TriThuc/plugin/helper.php');
                $userThumb = uploadFile();
            }else{
                $userThumb = $_POST['user_thumb'];
            }
            $fullname = $_POST['fullname'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $result = $this->userModel-> updateProfile($fullname, $gender, $phoneNumber, $email, $address, $userThumb);
            if($result){
                $_SESSION['avatar']=$userThumb;
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
                $newPass = rand(10000,99999);
                $title="XÁC NHẬN TÌM MẬT KHẨU!";
                $body='Nếu đúng là bạn, xin hãy click vào đường link dưới đây:<br/>'.HOST.'/user/confirmHandleFindPass/'.$userID.'/'.$newPass.'<br/> Mật khẩu sau khi kích hoạt là: '.$newPass;
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

    public function history(){
        $data['title_page'] = 'Lịch sử';
        $data['rate'] = $this->userModel->getRateHistory($_SESSION['userID']);
        $data['like'] = $this->userModel->getLikeHistory($_SESSION['userID']);

        $this->viewClient('inc/header',$data);
        $this->viewClient('pages/history_page', $data);
        $this->viewClient('inc/footer');
    }

    public function ViewProfile($userID){
        $data['title_page'] = 'Xem profile';
        $data['user'] = $this-> userModel-> getUserProfile($userID);
        $data['postList'] = $this->postModel->getPostByUser($userID);

        $this->viewClient('inc/header', $data);
        $this->viewClient('pages/profile_page_view', $data);
        $this->viewClient('inc/footer');
    }
}

?>