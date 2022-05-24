<?php
require_once("MVC/Models/nguoidung.php");
class NguoiDungController
{
    var $nguoidung_model;
    public function __construct()
    {
        $this->nguoidung_model = new nguoidung();
    }
    public function list()
    {
        $data = $this->nguoidung_model->All();
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->nguoidung_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/detail.php");
    }
    public function add()
    {
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/add.php");
    }
    public function store()
    {
        $data = array(
            'name_cus' => $_POST['name_cus'],
            'age_cus' => $_POST['age_cus'],
            'phone_cus' => $_POST['phone_cus'],
            'address_cus' => $_POST['address_cus'],
            'gmail_cus' => $_POST['gmail_cus'],
            'pass_cus' => md5($_POST['pass_cus']),
            're_pass' => $_POST['pass_cus'],
            'id_phanquyen' =>  $_POST['id_phanquyen']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->nguoidung_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->nguoidung_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->nguoidung_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/edit.php");
    }
    public function update()
    {
        $data = array(
            'id_cus' => $_POST['id_cus'],
            'name_cus' => $_POST['name_cus'],
            'age_cus' => $_POST['age_cus'],
            'phone_cus' => $_POST['phone_cus'],
            'address_cus' => $_POST['address_cus'],
            'gmail_cus' => $_POST['gmail_cus'],
            'pass_cus' => md5($_POST['pass_cus']),
            're_pass' => md5($_POST['pass_cus']),
            'id_phanquyen' =>  $_POST['id_phanquyen']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->nguoidung_model->update($data);
    }
}
