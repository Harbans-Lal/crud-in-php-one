<?php 

session_start();
$conn = new mysqli('localhost','root','','LOGIN');
if($conn->connect_error){
	die("connection failed !!");
}

if(isset($_POST['signup'])){
	$name = $_POST['name'];
	$passwd=$_POST['password'];

	$insert ="INSERT INTO `myUsers`(`uname`, `passwd`) VALUES ('".$name."','".$passwd."')";

		if($conn->query($insert)==true){
			echo "Inserted successfully!!";
			header("location:dashboard.php");
		}else{
			die();
		}
}

?>


<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.hello{
			display: flex;
			justify-content: center;
			align-items: center;

		}
	</style>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/signUp.css">
	<link rel="stylesheet" type="text/css" href="js/signUpJs.js">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add new user !!</title>
</head>
<body>

<div class="hello">
	<form  method="post">
		<h1>Sign up</h1><br/>
		<div class="row">
			<div class="col-md-6">
				 
				<input class="form-control" type="text" name="name" placeholder=" username" /><br>
				 
			</div>
			<div class="col-md-6">
				  <input class="form-control" type="password" name="password" id="password" placeholder="Password"/><br>
			</div>
		</div>
		    <button type="submit" name="signup" value="Sign Up"  class="btn btn-dark text-white">Sign up</button>
	</form>
		
</div>

		
</body>
</html>