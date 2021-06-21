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
        
        // echo '<pre>'; print_r($error); echo '</pre>'; 
        if(empty($error)){
            if($this->userModel->createUser($username, $password, $email)){
                $this->redirect('/user');
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
        echo "Davao";
    }

    public function profile(){
        $this->ViewClient('inc/header');
        $this->ViewClient('pages/profile_page');
        $this->ViewClient('inc/footer');
    }
}

?>