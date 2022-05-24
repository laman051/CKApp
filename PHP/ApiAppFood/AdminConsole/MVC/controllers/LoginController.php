<?php 
    require_once("MVC/Models/login.php");
    class LoginController {
        var $login_model;
        public function __construct()
        {
            $this->login_model = new login();
        }
    
        public function admin()
        {
            // $data_tksp1 = $this->login_model->tk_sanpham(1);
            // $data_tksp2 = $this->login_model->tk_sanpham(2);
            // $data_tksp3 = $this->login_model->tk_sanpham(3);
            $data_tong = $this->login_model->count_sanpham();
            $data_hd = $this->login_model->tk_thongbao();

            $m = date("m");

            $data_countM = $this->login_model->tk_dtthang($m);

            // $y = "20".date("y");
            // $sanphamsaphet = $this->login_model->sanphamsaphet();
            $data_countY = $this->login_model->tk_dtnam();
            $data_hoadon =$this->login_model->hoadon();
            $data_nguoidung = $this->login_model->tk_nguoidung(1);

            // $data_nhanvien = $this->login_model->tk_nguoidung(3);
            // $data_sanpham = $this->login_model->list_sanpham();
            // $arr_nguoidung = $this->login_model->list_nguoidung();
            require_once("MVC/Views/Admin/index.php");
        }

    }
?>