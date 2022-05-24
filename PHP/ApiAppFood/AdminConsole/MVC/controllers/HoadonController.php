<?php
require_once("MVC/models/hoadon.php");
class HoaDonController
{
    var $hoadon_model;
    public function __construct()
    {
        $this->hoadon_model = new Hoadon();
    }
    function list()
    {
        $data = array();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 1) {
                $id = 0;
            }
            $data = $this->hoadon_model->trangthai($id);
        } else {
            $data = $this->hoadon_model->All_hoadon();
        }
        require_once("MVC/Views/Admin/index.php");
    }

    //nhân viên giao hàng
    function list_daduyet()
    {
        $data = array();
        $id = 1;
        $data = $this->hoadon_model->donhangchuavanchuyen($id);
        require_once("MVC/Views/Admin/index.php");
    }
    
    function xetduyet()
    {
        $data = array(
            'id' => $_GET['id'],
            'trang_thai' => 1,
        );
        $this->hoadon_model->update_hoadon($data);
    }
    function delete()
    {
        if (isset($_GET['id'])) {
            $this->hoadon_model->delete_transportstall($_GET['id']);
        }
    }
    function chitiet()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->hoadon_model->chitiethoadon($id);
        require_once("MVC/Views/Admin/index.php");
    }


}
