<?php
	include "connect.php";

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$ThoiGian =  date('Y-m-d H:i:s');

	$tenkhachhang = $_POST['tenkhachhang'];
	$email = $_POST['email'];
	$diachi = $_POST['diachi'];
	$sdt = $_POST['sodienthoai'];
	$tongtien = $_POST['tongtien'];
	$ghichu = $_POST['ghichu'];
	$trangthai = 0;
	$ngaylap= $ThoiGian;

	$query = "INSERT INTO donhang(`tenkhachhang`, `email`, `diachi`, `sodienthoai`, `tongtien`, `ghichu`, `trang_thai`, `NgayLap`) VALUES ('".$tenkhachhang."','".$email."','".$diachi."','".$sdt."','".$tongtien."','".$ghichu."','".$trangthai."','".$ngaylap."') ";
	$data=mysqli_query($conn,$query);
	if($data == true) {
		$id = $conn -> insert_id;
		echo $id;
	}else{
		echo "Đặt hàng thất bại!";
	}

?>