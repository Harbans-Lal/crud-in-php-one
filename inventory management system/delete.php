<?php 

	session_start();
	include 'config/conn.php';

	$userid=$_GET['id'];

	$delUser = "DELETE FROM `users` WHERE `id`='".$userid."'";
	$delRes = $conn->query($delUser);

	$imgRes = $delRes->fetch_assoc();
	$img = $imgRes['img'];
	if(unlink($img)){
		header('location:allUsers.php');
		echo "deleted successfully!!";
	}else{
		echo "unable to delete the data!!";
	}
	



?>
