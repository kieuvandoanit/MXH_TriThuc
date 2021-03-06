<?php
class App{
    protected $controller = "Home";
    protected $action = "SayHi";
    protected $params = [];

    function __construct(){
        $arr = $this->UrlProcess();
        //Case 1: arr[0] = admin
        if(isset($arr[0]) && $arr[0] == "admin"){
            unset($arr[0]);
            //Xu ly controller
            if(isset($arr[1])){
                if(file_exists("./MXH_TriThuc/admin/controllers/".$arr[1].".php")){
                    $this->controller = $arr[1];
                    unset($arr[1]);
                }
            } 
            require_once("./MXH_TriThuc/admin/controllers/".$this->controller.".php");
            $this->controller = new $this->controller;
            //Xu ly Action
            if(isset($arr[2])){
                if(method_exists($this->controller, $arr[2])){
                    $this->action = $arr[2];
                }
                unset($arr[2]);
            }
                //Xu ly params
                $this->params = $arr?array_values($arr):[];
                //print_r($this->params);
                call_user_func_array([$this->controller, $this->action],$this->params);

        }else{  //Case 2: arr[0] != admin
            //Xu ly controller
            if(isset($arr[0])){
                if(file_exists("./MXH_TriThuc/client/controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }
            }
            require_once ("./MXH_TriThuc/client/controllers/".$this->controller.".php");
            $this->controller = new $this->controller;
            //Xu ly Action
            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1])){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
                //Xu ly params
                $this->params = $arr?array_values($arr):[];
                call_user_func_array([$this->controller, $this->action],$this->params);
        }
    }
    function Middleware($url){
        $arr = explode("/",filter_var(trim($url,"/")));
        $routeAdmin = [
            'user',
            'user/findPass',
            'user/handleLogin',
            'user/handleFindPass',
            'user/confirmHandleFindPass'
        ];
        $routeUser = [
            'user/profile',
            'user/editProfile',
            'post/create',
            'post/edit',
            'post/handleAddPost',
            'post/handleLike',
            'user/history',
            'post/rating'
        ];
        if($arr[0] == 'admin'){
            if(isset($_SESSION['isLogin']) && $_SESSION['auth'] == 'user'){
                session_destroy();
                header('Location: '.HOST.'/'.$url);
            }
            if(isset($arr[2])){
                $temp[0] = $arr[1];
                $temp[1] = $arr[2];
                $url = implode("/",$temp);
            }else{
                if(isset($arr[1])){
                    $url = $arr[1];
                }else{
                    $url = '/';
                }
            }
            // echo $url;
            foreach($routeAdmin as $item){
                if($url == $item){
                    // echo "davao";
                    return true;
                }else{
                    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true && $_SESSION['auth'] == 'admin'){
                        return true;
                    }
                }
            }
            return false;
        }else{
            if(isset($_SESSION['isLogin']) && $_SESSION['auth'] == 'admin'){
                session_destroy();
                header('Location: '.HOST.'/'.$url);
            }
            if(isset($arr[1])){
                $temp[0] = $arr[0];
                $temp[1] = $arr[1];
                $url = implode("/",$temp);
            }else{
                if(isset($arr[0])){
                    $url = $arr[0];
                }else{
                    $url = '/';
                }
            }
            foreach($routeUser as $item){
                if($url == $item){
                    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true && $_SESSION['auth']=='user'){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
            return true;
        }
    }
    function UrlProcess(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $checkRoute = $this->Middleware($url);
            $temp = explode("/",filter_var(trim($url,"/")));
            if(!$checkRoute){
                if($temp[0] == 'admin'){
                    $url = 'admin/redirect';
                }else{
                    $url = '/redirect';
                }
            }
            return explode("/",filter_var(trim($url,"/")));
        }
    }
    
}

?>