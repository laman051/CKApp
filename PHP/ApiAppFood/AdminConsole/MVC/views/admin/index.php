<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản trị Meta</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="shortcut icon" href="../public/assets/images/logo-footer.png" type="image/x-icon">
    <link rel="icon" href="../public/assets/images/logo-footer.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <?php require_once("MVC/views/admin/menu.php"); ?>

    <?php
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "admin";
    $act = isset($_GET['act']) ? $_GET['act'] : "";
    switch ($mod) {
        case 'admin':
            require_once("MVC/views/login/admin.php");
            break;
        case 'customer':
            switch ($act) {
                case 'list':
                    require_once("MVC/views/nguoidung/list.php");
                    break;
                case 'add':
                    require_once("MVC/views/nguoidung/add.php");
                    break;
                case 'edit':
                    require_once("MVC/views/nguoidung/edit.php");
                    break;
               
                case 'detail':
                    require_once("MVC/views/nguoidung/detail.php");
                    break;

                default:
                    require_once("MVC/views/nguoidung/list.php");
                    break;
            }
            break;

        case 'mon':
            switch ($act) {
                case 'list':
                    require_once("MVC/views/sanpham/list.php");
                    break;
                case 'add':
                    require_once("MVC/views/sanpham/add.php");
                    break;
                case 'edit':
                    require_once("MVC/views/sanpham/edit.php");
                    break;
                default:
                    require_once("MVC/views/sanpham/list.php");
                    break;
            }
            break;

        case 'donhang':
            switch ($act) {
                case 'list':
                    require_once("MVC/views/hoadon/list.php");
                    break;
                case 'chitiet':
                    require_once("MVC/views/hoadon/detail.php");
                    break;
                case 'nhanviengh':
                    require_once("MVC/views/hoadon/nhanviengh.php");
                    break;
                default:
                    require_once("MVC/views/hoadon/list.php");
                    break;
            }
            break;
        case 'danhmuc':
            switch ($act) {
                case 'list':
                    require_once("MVC/views/danhmuc/list.php");
                    break;
                case 'add':
                    require_once("MVC/views/danhmuc/add.php");
                    break;
                case 'edit':
                    require_once("MVC/views/danhmuc/edit.php");
                    break;
                case 'detail':
                    require_once("MVC/views/danhmuc/detail.php");
                    break;

                default:
                    require_once("MVC/views/danhmuc/list.php");
                    break;
            }
            break;
          
        default:
            require_once("../index.php");
            break;
    }
    ?>
    <script src="public/ckeditor/ckeditor.js"></script>
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/js/popper.min.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!--===============================================================================================-->
    <script src="public/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/js/main.js"></script>
    <!--===============================================================================================-->
    <script src="public/js/plugins/pace.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/js/plugins/chart.js"></script>
    <!--===============================================================================================-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="public/src/jquery.table2excel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="public/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="public/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>

    <script src="src/jquery.table2excel.js"></script>

    <script type="text/javascript">
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
</body>

</html>