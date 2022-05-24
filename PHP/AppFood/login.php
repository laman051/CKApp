<?php 
include "connect.php";

$gmail_cus =$_POST['gmail_cus'];
$pass_cus=md5($_POST['pass_cus']);
$query='SELECT * FROM customer WHERE gmail_cus="'.$gmail_cus.'" AND pass_cus="'.$pass_cus.'"';
$data=mysqli_query($conn,$query);
$rs_login=array();
while ($row =mysqli_fetch_assoc($data)) {
	$rs_login[]=($row);
}
if (!empty($rs_login)) {
           $arr=[
                'success'=>true,
                'message'=>"thanh cong",
                'rs_login'=>  $rs_login
           ];

}else{
        $arr=[
                'success'=>false,
                'message'=>"ko thanh cong",
                'rs_login'=> $rs_login
           ];  
}
print_r(json_encode($arr));

?>