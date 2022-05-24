<?php
require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    // function tk_sanpham($id)
    // {
    //     $query = "SELECT count(id) as Count FROM sanpham WHERE MaDM = $id";

    //     return $this->conn->query($query)->fetch_assoc();
    // }
    function count_sanpham()
    {
        $query = "SELECT count(id) as Count FROM mon";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_thongbao()
    {
        $query = "SELECT count(id) as Count FROM donhang WHERE trang_thai = 0";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtthang($m)
    {
        $query = "SELECT SUM(tongtien) as Count FROM donhang WHERE MONTH(NgayLap) = $m";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtnam()
    {
        $query = "SELECT SUM(tongtien) as Count FROM donhang";

        return $this->conn->query($query)->fetch_assoc();
    }
    function hoadon()
    {
        $query = "select * from donhang where trang_thai = 1 OR trang_thai= 0 ORDER BY id DESC ";

        require("result.php");

        return $data;
    }
    // function sanphamsaphet()
    // {
    //     $query = "SELECT COUNT(MaSP) as count FROM `SanPham` WHERE SoLuong < 5";
    //     return $this->conn->query($query)->fetch_assoc();
    // }

    function tk_nguoidung($id)
    {
        $query = "SELECT count(id_cus) as Count FROM customer WHERE id_phanquyen = $id";

        return $this->conn->query($query)->fetch_assoc();
    }
    // function list_sanpham()
    // {
    //     $query = "select * from sanpham ORDER BY MaSP DESC";

    //     require("result.php");

    //     return $data;
    // }
    // function list_nguoidung()
    // {
    //     $query = "select * from nguoidung WHERE MaQuyen = 1 ORDER BY MaND DESC LIMIT 5";

    //     require("result.php");

    //     return $data;
    // }
}
