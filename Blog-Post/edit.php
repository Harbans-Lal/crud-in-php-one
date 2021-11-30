<?php 
	session_start();
	include 'config/conn.php';



    $id=$_GET['id'];
   
    $selData =  "SELECT * FROM `bloggers-post` WHERE `id`='".$id."'";
    $resjdf  = $conn->query($selData);
    $resulttwo  =$resjdf->fetch_assoc();

     $title = $resulttwo['title'];
     $mess = $resulttwo['mess'];
     
    if(isset($_POST['uppost'])){
    	$titl = $_POST['titleee'];
    	$details = $_POST['details'];

    	$updNew  = "UPDATE `bloggers-post` SET `title`='".$titl."',`mess`='".$details."' WHERE `id`='".$id."'";
    	$updNewRes = $conn->query($updNew);
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/blogStyle.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bloging !!</title>
</head>
<body>
	<div class="contaienr">

		<form class="form" method="Post">
		<?php 
			if($updNewRes && isset($_POST['uppost']) ){
			echo '<p style="color:green; font-size:16px;font-weight:bold;"> <span style="color:green; font-size:42px;font-weight:bold;"> updated..</span> data has been updated  successfull  !!</p>';
		}		
		?>
				
			<div class="card mt-2">

				<div class="card-heading"><h4>Title</h4></div>
				<input class="wid" type="text" name="titleee" placeholder="enter title.." value="<?php echo $title ?>">
				
			</div>
			<div class="mt-2">
				<textarea name="details" id="okay" type="text" rows="10" cols="50" ><?php echo $mess; ?></textarea>
			</div>
			<div class="mt-2 text-end">
				<button  type="button" onclick="goback()" class="btn btn-success">go back </button>
				<button name="uppost" type="submit" class="btn btn-primary">Post</button>
			</div>
		</form>
       
	</div>

	<script type="text/javascript">
		function goback(){
			window.location.href = "blog-tabble.php";
		}
		
	</script>
</body>
</html>