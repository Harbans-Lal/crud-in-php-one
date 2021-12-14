<?php 

	session_start();
	include 'config/conn.php';

	$userid=$_GET['id'];

	$delUser = "DELETE FROM `users` WHERE `id`='".$userid."'";
	$delRes = $conn->query($delUser);


	$selImg = "SELECT * FROM `users` WHERE `id`='".$userid."'";
	$selRsss = $conn->query($selImg);
	
	$imgRes = $selRsss->fetch_assoc();
	$img = $imgRes['img'];

	if(unlink($img) || $delRes){

		header('location:allUsers.php');

		echo "deleted successfully!!";
	}else{
		echo "unable to delete the data!!";
	}
	



?>
