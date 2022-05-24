<?php
require_once("connection.php");
class Model
{
    var $conn;
    var $table;
    var $contens;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function All()
    {
        $query = "select * from $this->table ORDER BY $this->contens DESC ";

        require("result.php");

        return $data;
        
    }
    function find($id)
    {
        $query = "select * from $this->table where $this->contens = $id";
        return $this->conn->query($query)->fetch_assoc();
    }
    function delete($id)
    {
        $query = "DELETE from $this->table where $this->contens=$id";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Delete successfully', time() + 2);
        } else {
            setcookie('msg', 'Deletion failed', time() + 2);
        }
        header('Location: ?mod=' . $this->table);
    }
    function store($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO $this->table($f) VALUES ($v);";

        $status = $this->conn->query($query);

        if ($status == true) {
            setcookie('msg', 'More success', time() + 2);
            header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg', 'Add failed', time() + 2);
            header('Location: ?mod=' . $this->table . '&act=add');
        }
    }
    function update($data)
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
            header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg', 'Update failed', time() + 2);
            header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data[$this->contens]);
        }
    }
    function updatenhanvien($data)
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
            header('Location: qlnhanvien');
        } else {
            setcookie('msg', 'Update failed', time() + 2);
            header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data[$this->contens]);
        }
    }
}
