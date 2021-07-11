<?php  
class Setting extends Controller{
    protected $settingModel;
    public function __construct(){
        $this->settingModel = $this->ModelAdmin('SettingModel');
    }
    public function SayHi(){
        
        $data['setting'] = $this->settingModel->getSettingAdmin($_SESSION['userID']);
        $this->viewAdmin('inc/header');
        $this->viewAdmin('pages/setting_page', $data);
        $this->viewAdmin('inc/footer');
    }

    public function changeNotification(){
        $value = $_POST['value'];
        $result = $this->settingModel->changeNotification($value, $_SESSION['userID']);
        if($result){
            if($value == 1){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo -1;
        }
    }

    public function changeAutoBrowsing(){
        $value = $_POST['value'];
        $result = $this->settingModel->changeAutoBrowsing($value);
        if($result){
            if($value == 1){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo -1;
        }
    }
}


?>