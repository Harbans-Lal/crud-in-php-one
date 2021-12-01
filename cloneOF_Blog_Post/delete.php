<?php 
	
	session_start();
	include 'config/conn.php';
	
	 $id=$_GET['id'];

	 $selAlinfo = "SELECT `user_attatch` FROM `bloggers-post` WHERE `id`='".$id."'";
	 $selAlinfoRes = $conn->query($selAlinfo);

	 $fetchData  = $selAlinfoRes->fetch_assoc();

	 $theDir=$fetchData['user_attatch'];



	 $del = "DELETE FROM `bloggers-post` WHERE `id`='".$id."'";
	 if($conn->query($del ) ){

	 	if(unlink($theDir)){
	 		header('location:blog-tabble.php');
	 		echo "Deleted successfull!!";

	 	}else{
	 		echo "unable to delete the file";
	 	}
	 	
	 }


?>