<?php
require_once("Models/LoginModel.php");
class LoginContronler
{
    var $login_model;
    function __construct()
    {
        $this->login_model = new login();
    }

    function login_action()
    {
        $gmail_cus = $_POST['gmail_cus'];
        $pass_cus = md5($_POST['pass_cus']);
        if (strpos($gmail_cus, "'") != false) { //Tìm vị trí xuất hiện đầu tiên của một chuỗi con trong một chuỗi
            $gmail_cus = str_replace("'", "\'", $gmail_cus); //Thay thế tất cả các lần xuất hiện của chuỗi tìm kiếm bằng chuỗi thay thế
        }
        $data = array(
            'gmail_cus' => $gmail_cus,
            'pass_cus' => $pass_cus,
        );
        $this->login_model->login_action($data);
    }

    function dangxuat()
    {
        $this->login_model->logout();
    }


}
