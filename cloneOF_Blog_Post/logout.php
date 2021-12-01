<?php 
	session_start();
	include 'config/conn.php';
	session_destroy();
	header('location:login.php');

 ?>