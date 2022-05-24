<?php require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $ob_login = new connection();
        $this->conn = $ob_login->conn;
    }
    function login_action($data)
    {
        $query = "SELECT * FROM `customer` WHERE gmail_cus = '" . $data['gmail_cus'] . "' AND pass_cus = '" . $data['pass_cus'] . "'";
        $login = $this->conn->query($query)->fetch_assoc();
        if ($login !== NULL) {
            if ($login['id_phanquyen'] == 2) {
                $_SESSION['isLogin_Admin'] = true;
                $_SESSION['login'] = $login;
                header('Location: AdminConsole');
            } else {
                if ($login['id_phanquyen'] == 3) {
                    $_SESSION['isLogin_Nhanvien'] = true;
                    $_SESSION['login'] = $login;
                    header('Location: AdminConsole');
                } elseif ($login['id_phanquyen'] == 4) {
                    $_SESSION['isLogin_TransportStaff'] = true;
                    $_SESSION['login'] = $login;
                    header('Location: AdminConsole/hoadon');
                } elseif ($login['id_phanquyen'] == 5) {
                    $_SESSION['isLogin_Editor'] = true;
                    $_SESSION['login'] = $login;
                    header('Location: AdminConsole/blog');
                } else {
                    $_SESSION['isLogin'] = true;
                    $_SESSION['login'] = $login;
                    header('Location: /');
                }
            }
           
        } else {
            setcookie('msg1', 'Sign in failed', time() + 5);
            header('Location: account');
        }
    }
    function logout()
    {
        if (isset($_SESSION['isLogin_Admin'])) {
            unset($_SESSION['isLogin_Admin']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin_Nhanvien'])) {
            unset($_SESSION['isLogin_Nhanvien']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin_TransportStaff'])) {
            unset($_SESSION['isLogin_TransportStaff']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin_Editor'])) {
            unset($_SESSION['isLogin_Editor']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin'])) {
            unset($_SESSION['isLogin']);
            unset($_SESSION['login']);
        }
        header('location: .');
    }
    function check_account()
    {
        $query =  "SELECT * from NguoiDung";

        require("result.php");

        return $data;
    }
    function dangky_action($data, $check1, $check2)
    {
        if ($check1 == 0) {
            if ($check2 == 0) {
                $f = "";
                $v = "";
                foreach ($data as $key => $value) {
                    $f .= $key . ",";
                    $v .= "'" . $value . "',";
                }
                $f = trim($f, ",");
                $v = trim($v, ",");
                $query = "INSERT INTO NguoiDung($f) VALUES ($v);";

                $status = $this->conn->query($query);
                if ($status == true) {
                    setcookie('msg', 'You have successfully registered', time() + 2);
                } else {
                    setcookie('msg', 'You are registered unsuccessful', time() + 2);
                }
            } else {
                setcookie('msg', 'Do not duplicate passwords', time() + 2);
            }
        } else {
            setcookie('msg', 'Account name or Email already exists', time() + 2);
        }
        session_reset();
        echo '<script> alert("You have successfully registered");window.location.href="account";</script>';
    }
    function account()
    {

        $id = $_SESSION['login']['MaND'];
        return $this->conn->query("SELECT * from NguoiDung where MaND = $id")->fetch_assoc();
    }
    function update_account($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE NguoiDung SET $v WHERE MaND = " . $_SESSION['login']['MaND'];

        $result = $this->conn->query($query);

        if ($result == true) {

            setcookie('doimk', 'Account update successful', time() + 2);

            header('Location: personal');
        } else {
            setcookie('doimk', 'Confirmation password is not correct', time() + 2);
            header('Location: personal');
        }
    }
    function my_pruchase($id)
    {
        return $this->conn->query("SELECT * FROM hoadon WHERE MaND = $id LIMIT 1")->fetch_assoc();
    }
    function chitiethoadon($id)
    {
        $query = "select ct.*, s.TenSP as Ten from chitiethoadon as ct, sanpham as s where ct.MaSP = s.MaSP and ct.MaHD = $id ";

        require("result.php");

        return $data;
    }
    function huydonhang($idHD,$id)
    {
        $query = "DELETE FROM `hoadon` WHERE MaHD = $idHD AND MaND = $id";
        $status = $this->conn->query($query);

        if($status == true){
            setcookie('msg','Cancel successfully' , time()+ 5);
        }else{
            setcookie('msg','Cancellation failed' , time()+ 5);
        }
        header('Location: personal#tab-orders');
    }
    function error()
    {
        header('location: ?act=error');
    }
}
