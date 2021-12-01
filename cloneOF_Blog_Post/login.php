<?php 
	session_start();

	include 'config/conn.php';

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['Password'];

		$select = "SELECT * FROM `bloggers` WHERE `email`='".$email."' AND `password`='".$password."'";
		$res = $conn->query($select);


		if($res->num_rows>0){	
			$resss = $res->fetch_assoc();		
			$_SESSION['user_id'] = $resss['id'];
			$_SESSION['user_name'] = $resss['name'];
			$_SESSION['user_email'] = $resss['email'];
			
			$_SESSION['user_dob'] = $resss['dob'];
			$_SESSION['user_gender']=$resss['gender'];
		  	header('location: blog-tabble.php');
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In </title>
</head>
<body>
	<div class="container mt-3">
		<form class="form small" method="post">

			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="text-center">Sign in</h4>
				</div>
				
			</div>
			<?php 

				if($res->num_rows <1 && isset($_POST['submit'])){
					echo '<span style ="color:red;">data not match !!</span>';
				}

			?>
			
			<div>
				<label class="form-label">Email: </label>
				<input type="email" name="email" class="form-control" placeholder="example@gmail.com"></input>
			</div>
			<div>
				<label class="form-label">Password: </label>
				<input type="Password" name="Password" class="form-control"></input>
			</div>
			<div>

			</div>
			<div class="text-end">
				
				<button type="submit" class="btn btn-primary mt-3 " name="submit">Sign in</button>
				
				<button type="button" onclick="red()" class="btn btn-success mt-3 ">Sign Up</button>
			</div>
		</form>
		
	</div>

	<script type="text/javascript">
		function red(){
			window.location.href ="/php/Blog-Post/signup.php";
		}
	</script>

</body>
</html>