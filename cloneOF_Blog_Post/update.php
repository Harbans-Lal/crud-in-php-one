<?php  
	
	include 'config/conn.php';

	session_start();
	$user_name = $_SESSION['user_name'];
	$user_email = $_SESSION['user_email'] ;
	$user_id=$_SESSION['user_id'];

	$selall = "SELECT * FROM `bloggers` WHERE `id`='".$user_id."'";
	$res  = $conn->query($selall);
	$anotherRes = $res->fetch_assoc();
	$dob=$anotherRes['dob'];
    $gender= $anotherRes['gender'];
    $name= $anotherRes['name'];
    $profile= $anotherRes['user_profile'];



    $_SESSION['profile_pick'] = $profile;

    
    if(isset($_POST['update'])){
    	$name  = $_POST['name'];
    	$dob  = $_POST['dob'];
    	$gender  = $_POST['gender'];

    	$upd = "UPDATE `bloggers` SET `name`='".$name."',`dob`='".$dob."',`gender`='".$gender."' WHERE `email`='".$user_email."'";
    	$res = $conn->query($upd);
    }


    if(isset($_FILES['profile'])){
    	/*echo "<pre>";
    	print_r($_FILES);
    	echo "</pre>";*/

    	$file_name = $_FILES['profile']['name'];
    	$file_type = $_FILES['profile']['type'];
    	$file_tmp = $_FILES['profile']['tmp_name'];
    	$file_size = $_FILES['profile']['size'];




        $target_dir = "upload/";
		$target_file = $target_dir . basename($file_name);

		$file_type_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION ));

    		if($file_type_ext!="jpg" && $file_type_ext!="png" && $file_type_ext !="gif" && $file_type_ext !="jpeg" && $file_type_ext !="webp"){
    			echo "only jpg png gif jpeg and webp files are allowed";
    			die();
    		}



    		if($file_size > 500000){
    			echo "file is too large !";
    			die();
    		}
    		if(file_exists($file_name)){
    			echo "file already exits ";
    			die();
    		}


    	if(move_uploaded_file($file_tmp, $target_file)){


    	/*	echo "uploaded successfylly !!";*/
    		$updProfile = "UPDATE `bloggers` SET `user_profile`='".$target_file."' WHERE `id`='".$user_id."'";
    		$profileRes = $conn->query($updProfile);
    		if($profileRes){
    			echo "uloaded image  successfylly!!";

    		}
    	}else{
    		echo "error while uploading image !";
    	}

    	$selimage  = "SELECT `user_profile` FROM `bloggers` WHERE `id`='".$user_id."'";


    	
    }

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		/*.container{
			display: flex;
			justify-content: center;
			align-items: center;
		}*/
	</style>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>update data !</title>
</head>
<body>
	<div class="container">
		<?php 

			if($res && isset($_POST['update'])){
				echo '<p style ="color:green;font-size:26px;">Updated successfylly....</p>';
			}


		?>

		<div class="row">
			<div class="col-sm-3">
				<form method="post" enctype="multipart/form-data">
					<div class="mt-5 text-center mb-3">
						<img src="<?php echo $profile ?>" class="rounded-pill w-50">


	                    <input class="form-control" name="profile" type="file" id="formFile">

						<div class="mt-3">
							<button type="submit" class="btn btn-info">Update profile</button>
						</div>
					</div>
				</form>
				
			</div>
			<div class="col-sm-9">
				<form class="form" method="post">
					<div class="card">
						<div class="card-header bg-success text-dark">
							<h1 class="text-center">PROFILE</h1>
						</div>
						
					</div>
					<div>
						<label class="form-label">Name: </label>
						<input type="text" name="name" class="form-control" value="<?php echo $name ?>">
					</div>	
					<div>
						<label class="form-label">Email</label>
						<input type="text" name="emaill"  class="form-control " value="<?php echo $user_email ?>"disabled>
					</div>	
					<div>
						<label class="form-label">D.O.B. </label>
						<input type="data" name="dob" class="form-control" value="<?php echo $dob;?>">
					</div>
					<div>
						<label class="form-label">Gender: </label>
						<select class="form-select" name="gender" >
							<option value="Choose"><?php echo $gender; ?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					</div>	
					<div class="mt-2 d-grid">
						<button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
					</div>		
				</form>
				
			</div>
			
		</div>

		<div class="d-flex justify-content-end  mt-3 mb-3">
			<button type="button" onclick="bck()" class="btn btn-secondary">Go back</button>
		</div>

		
	</div>


<script type="text/javascript">
	function bck(){
		window.location.href="/php/Blog-Post/blog-tabble.php";
	}
</script>
</body>
</html>