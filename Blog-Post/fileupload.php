<?php  
	if(isset($_FILES['image'])){
	
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";

		$file_name = $_FILES['image']['name'];
	    $file_type = $_FILES['image']['type'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_size =$_FILES['image']['size'];
		$file_error = $_FILES['image']['error'];

		$target_dir = "/opt/lampp/htdocs/php/Blog-Post/upload/";
		$target_file = $target_dir . basename($file_name);



		//move_uploaded_file($file_tmp, "update_profile/".$file_name);
		
		if(move_uploaded_file($file_tmp , "upload/".$file_name)){
			echo "uploaded successfully!!";



		}else{
			echo "error while uploading image";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File upload in php</title>
</head>
<body>
<div class="container mt-5">
	<form class="form" method="post" enctype="multipart/form-data">
		<input type="file" name="image" class="form-control">
		<br>
		<input type="submit" class="form-control" >
		
	</form>
</div>	


</body>
</html>