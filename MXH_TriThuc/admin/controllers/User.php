<?php
class User extends Controller{
    protected $userModel;

    public function __construct(){
        $this->userModel = $this->ModelAdmin('UserModel');
    }

    public function SayHi(){
        $this->ViewAdmin('inc/header');
        $this->ViewAdmin('pages/login');
        $this->ViewAdmin('inc/footer');
    }

    public function handleLogin(){
        echo '<pre>'; print_r($_POST); echo '</pre>';

        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUser($username, $password);
            if(!empty($user)){
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = $user[0]['Name'];
                $_SESSION['userID'] = $user[0]['UserID'];
                $_SESSION['isLogin'] = true;

                $this->redirect('/admin');
            }else{
                $this->redirect('/admin/user');
            }
        }
        
    }
}

?>