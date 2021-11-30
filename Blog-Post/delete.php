<?php 
	
	session_start();
	include 'config/conn.php';

	 $id=$_GET['id'];

	 $del = "DELETE FROM `bloggers-post` WHERE `id`='".$id."'";
	 if($conn->query($del)){
	 	header('location:blog-tabble.php');
	 	echo "Deleted successfull!!";
	 }


?>