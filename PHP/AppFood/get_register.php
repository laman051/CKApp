<?php 
include "connect.php";
$name_cus = $_POST['name_cus'];
$age_cus = $_POST['age_cus'];
$phone_cus =$_POST['phone_cus'];
$addr_cus =$_POST['addr_cus'];
$gmail_cus = $_POST['gmail_cus'];
$pass_cus = md5($_POST['pass_cus']);
$re_pass = md5($_POST['re_pass']);
$id_phanquyen = 1;

	//check data
$query='Select * from customer where gmail_cus ="'.$gmail_cus.'"';
$data=mysqli_query($conn,$query);
$numrow = mysqli_num_rows($data);
if ($numrow > 0) {
	$arr= [
		'success' => false,
		'message' => "Email đã tồn tại"
	];
}else {
	//insert
	 $query = "INSERT INTO `customer`(`name_cus`, `age_cus`, `phone_cus`,`address_cus`, `gmail_cus`, `pass_cus`, `re_pass`, `id_phanquyen`) VALUES ('" . $name_cus . "','" . $age_cus . "','" . $phone_cus . "','" . $addr_cus . "','" . $gmail_cus . "','" . $pass_cus . "','" . $re_pass . "','".$id_phanquyen."')";
	$data=mysqli_query($conn,$query);
	if ($data==true) {
		$arr= [
			'success' => true,
			'message' => "victory"];
	}else{
		$arr= [
			'success'=>false,
            'message'=>"Không thành công",];
	}
}
print_r(json_encode($arr))
 ?>