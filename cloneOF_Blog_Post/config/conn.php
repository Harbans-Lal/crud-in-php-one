<?php 
	session_start();

	$conn = new mysqli("localhost","root","","blog-post");
	if($conn->connect_error){
		die("connection failed !");
	}
	
	
?>