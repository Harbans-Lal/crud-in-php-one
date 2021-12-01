<?php 

	session_start();
	include 'config/conn.php';



	$user_name =  $_SESSION['user_name'];
	$user_id = $_SESSION['user_id'];

	$errormsg = " ";

	if(isset($_POST['post']) || isset($_FILES['link']) ){
		$title = $_POST['title'];
		$des = $_POST['des'];


		$name = $_FILES['link']['name'];
		$type = $_FILES['link']['type'];
		$tmpName = $_FILES['link']['tmp_name'];
		$size = $_FILES['link']['size'];


		$tar_dir = "download_file/";
		$targetfile = $tar_dir . basename($name);

		



		$FileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));

		if($FileType !="doc" && $FileType !="docx" && $FileType !="html" && $FileType != "htm" && $FileType != "odt" && $FileType !="pdf" && $FileType !="xls" && $FileType!="xlsx" && $FileType != "ods" && $FileType !="ppt" && $FileType != "pptx" && $FileType != "txt"){

			$errormsg= "Only doc , docx , html , htm , odt, pdf , xls , xlsx ,ods , ppt,pptx and txt files are allowed";

			//echo $errormsg;

		}else{
			if(move_uploaded_file($tmpName, $targetfile)){

			$ins = "INSERT INTO `bloggers-post`(`title`, `mess`, `user_attatch`,`user_id`) VALUES ('".$title."','".$des."','".$targetfile."','".$user_id."')";
	    	$res= $conn->query($ins);	
	    	echo "uploaded successfully !!";
		}
		}
		


		
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
		<form class="form" method="Post" enctype="multipart/form-data">

		<?php 

			if($res){
			echo '<p style="color:green; font-size:16px;font-weight:bold;"> <span style="color:green; font-size:42px;font-weight:bold;"> inserted</span> data has been successfully  recorded  !!</p>';
		}	
		?>
			<div>
				<?php 

					if($errormsg !=""){
	  					echo "<span class='text-danger' > ".$errormsg." </span>";
					}	
				?>
			</div>	
			<div class="card mt-2">

				<div class="card-heading"><h4>Title</h4></div>
				<input class="wid" type="text" name="title" placeholder="enter title.." value="<?php echo $title11 ?>">
				
			</div>
			<div class="mt-2">
				<textarea name="des" id="okay" type="text" rows="10" cols="50" ><?php echo $mess11; ?></textarea>
			</div>
			<div>
				<input type="file" name="link">
			</div>
			<div class="mt-2 text-end">
				<button  type="button" onclick="goback()" class="btn btn-success">go back </button>
				<button name="post" type="submit" class="btn btn-primary">Post</button>
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