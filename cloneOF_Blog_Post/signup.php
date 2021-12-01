<?php 
 session_start();
 include "config/conn.php";
 	if(isset($_POST['register'])){
	 	$name  = $_POST['name'];
	 	$email = $_POST['email'];
	 	$password = $_POST['Password'];
	 	$dob = $_POST['dob'];
	 	$gender = $_POST['gender'];

	 	$selEmail ="SELECT  `email` FROM `bloggers` WHERE `email`='".$email."'";
	 	$res  = $conn->query($selEmail);

	 	if($res->fetch_assoc()<1){
	 		$ins = "INSERT INTO `bloggers`( `name`, `email`, `password`, `dob`, `gender`) VALUES ('".$name."','".$email."','".$password."','".$dob."','".$gender."')";
	 		$resIns = $conn->query($ins);	

	 	}else{
	 		echo '<p style="color:red;font-weight:bold;"><span style="color:red;font-weight:bold;font-size:25px;">erroe !</span> email already exits..</p>';
	 	} 
 	 
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/signupStyle.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
</head>
<body>
	<div class="container mt-2">
		
		<form class="form" method="post">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4>Sign up</h4>
				</div>
			</div>
				<?php 
				if($resIns){
					echo '<span style="color:green;font-size:25px;">data hase been recorded succussfully!!</span>';
				}

			?>

			<div>
			
				<label class="form-label mt-2">Name: </label>
				<input type="text" name="name" class="mt-2 left " required></input>
			</div>
			<div>
				<label class="form-label mt-2">Email: </label>
				<input type="email" name="email" class="mt-2 left " required>
			</div>
			<div>
				<label class="form-label mt-2">Password: </label>
				<input type="Password" name="Password" class="mt-2 " required>
			</div>
			<div>
				<label class="form-label mt-2">DOB :</label>
				<input type="date" name="dob" class="mt-2 left " required>
			</div>
			<div>
				<label class="form-label mt-2">Gender: </label>
				<select name="gender">
					<option value="choose">choose</option>
					<option value="male">male</option>
					<option value="female">female</option>
					<option value="other">other</option>
				</select>
			</div>
			
			<div class=" text-end mb-2 mr-3">
 				<input type="submit" name="register" name="submit" value="Register">
 				<button type="button" onclick="home()" class="btn btn-primary">Log in</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function home(){
			window.location.href = "login.php";
		}
	</script>

</body>
</html>