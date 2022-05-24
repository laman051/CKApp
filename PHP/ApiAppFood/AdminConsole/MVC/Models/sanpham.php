<?php
require("model.php");
class sanpham extends model
{
    var $table = "mon";
    var $contens = "id";
    function find($id)
    {
        $query = "select * from mon where $this->contens = $id";
        return $this->conn->query($query)->fetch_assoc();
    }
    function danhmuc()
    {
        $query = "select * from danhmuc ";
        require("result.php");
        return $data;
    }
  
  
}
