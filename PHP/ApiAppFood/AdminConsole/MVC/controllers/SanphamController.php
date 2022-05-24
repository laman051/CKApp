<?php
require_once("MVC/Models/sanpham.php");
class SanphamController
{
    var $sanpham_model;
    public function __construct()
    {
        $this->sanpham_model = new sanpham();
    }
    public function list()
    {
        $data = $this->sanpham_model->All();
        require_once("MVC/Views/Admin/index.php");
        // require_once("MVC/Views/posts/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->sanpham_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/detail.php");
    }
    public function add()
    {
        $data_dm = $this->sanpham_model->danhmuc();
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/add.php");
    }
    public function store()
    {
      
        $data = array(
            'madanhmuc' => $_POST['madanhmuc'],
            'tenmon'  =>   $_POST['tenmon'],
            'hinhmon' => $_POST['hinhmon'],
            'gia' => $_POST['gia'],
            'mota' => $_POST['mota']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->sanpham_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->sanpham_model->delete($id);

    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data_dm = $this->sanpham_model->danhmuc();
        $data = $this->sanpham_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/edit.php");
    }
    public function update()
    {

        $data = array(
            'id' => $_POST['id'],
            'madanhmuc' => $_POST['madanhmuc'],
            'tenmon' => $_POST['tenmon'],
            'hinhmon' => $_POST['hinhmon'],
            'gia' => $_POST['gia'],
            'mota' => $_POST['mota']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
       
        $this->sanpham_model->update($data);
    }

}
