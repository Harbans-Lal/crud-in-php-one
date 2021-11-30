<?php  
	session_start();
	$_SESSION['data'] = $_POST['submitt'];


?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.container{
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inserted post successfully!!</title>
</head>
<body>
	<div class="container">
		<form method="post">
			<div class="alert alert-success">
			<p><b>inserted</b>..you data has been posted successfully!!</p>
			<button name="submitt" type="submit" onclick="back()" class="btn btn-primary">Okay</button>
			
		</div>
		</form>
		
		
	</div>
  <script type="text/javascript">
  	function back(){
  		window.location.href = "blog-tabble.php";
  	}
  </script>
</body>
</html>