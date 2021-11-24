<?php 

session_start();


$conn =new mysqli("localhost","root","","LOGIN");
if($conn->connect_error){
	die();
}
$del=$_GET['id'];
//echo "$del";

$del = "DELETE FROM `myUsers` WHERE `id`='".$del."'";

 $res = $conn->query($del);
if($res){

	echo "DELETED successfully!!";
	header("location:dashboard.php");



}


?>