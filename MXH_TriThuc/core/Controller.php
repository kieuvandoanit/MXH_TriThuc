<?php
class Controller{

    public function ModelAdmin($model){
        require_once "./MXH_TriThuc/admin/models/".$model.".php";
        return new $model;
    }
    
    public function ModelClient($model){
        require_once "./MXH_TriThuc/client/models/".$model.".php";
        return new $model;
    }

    public function ViewAdmin($view, $data=[]){
        require_once "./MXH_TriThuc/admin/views/".$view.".php";
    }

    public function ViewClient($view, $data=[]){
        require_once "./MXH_TriThuc/client/views/".$view.".php";
    }

    public function redirect($url){
        header('Location: '.HOST.$url);
    }
}

?>