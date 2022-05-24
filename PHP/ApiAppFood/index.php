<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("Views/index.php");
        break;
    case 'login':
        require_once('Controlers/LoginControler.php');
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "dangnhap";
        $controller_obj = new LoginContronler();
            switch ($act) {
                case 'dangnhap':
                    $controller_obj->login_action();
                    break;
                default:
                    header('location:?act=home');
                    break;
            }
        break;
    default:
        require_once("Views/index.php");
        break;
}
