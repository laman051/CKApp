<?php
require_once("model.php");
class Hoadon extends Model
{
    var $table = "donhang";
    var $contens = "id";
    function trangthai($id)
    {
        $query = "select * from donhang where trang_thai = $id  ORDER BY id DESC";

        require("result.php");

        return $data;
    }
    function All_hoadon(){
        $query = "select * from donhang where trang_thai = 1 OR trang_thai = 0 ORDER BY id DESC";

        require("result.php");

        return $data;
    }
    function donhangchuavanchuyen($id)
    {
        $query = "select * from donhang where trang_thai = $id  ORDER BY id DESC";

        require("result.php");

        return $data;
    }
    function chitiethoadon($id)
    {
        $query = "select ct.*, s.tenmon as ten from chitietdonhang as ct, mon as s where ct.mamon = s.id and ct.madonhang = $id";

        require("result.php");

        return $data;
    }
    function update_hoadon($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");


        $query = "UPDATE $this->table SET  $v   WHERE $this->contens = " . $data[$this->contens];
        $result = $this->conn->query($query);

        if ($result == true) {
            setcookie('msg', 'Browse successfully', time() + 2);
            header('Location: ?mod=donhang&act=chitiet&id=' . $data['id']);
        } else {
            setcookie('msg', 'Update failed', time() + 2);
            header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data[$this->contens]);
        }
    }


}
