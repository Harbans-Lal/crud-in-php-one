<?php 
	session_start();
	include 'config/conn.php';

	$time_now=mktime(date('h')+4,date('i')+30,date('s'));
    $date = date('dmYHis', $time_now );
	




	$onlyNum ='';
	if(isset($_POST['addnew'])){
		$prod = $_POST['prod'];
		$price = $_POST['prc'];
		$qnt = $_POST['qnt'];
		$des = $_POST['des'];
		$sku = $_POST['sku'];

		$insProd = "INSERT INTO `products`(`prod`, `price`, `qnt`,`des`,`sku`) VALUES ('".$prod."','".$price."','".$qnt."', '".$des."','".$sku."')";

		$insRes = $conn->query($insProd);

		$lastid = $conn->insert_id;

		$_SESSION['lastid'] = $lastid;

		if($insRes){
			$onlyNum = '<span style="color:green;font-size:17px;">Added new item successfylly !!</span>';
		}else{
			echo '<span style="color:red;font-size:17px;">error while uploading the item</span>';
		}

		//multiple files uploading...............

		if(isset($_POST['addnew'])){

			//count files 

			$countFile = count($_FILES['img']['name']);

			//loop through multiple files...

			for($i=0;$i<$countFile;$i++){

				$fieleName = $_FILES['img']['name'][$i];

				//move to files database.......

				$fielTmp = $_FILES['img']['tmp_name'][$i];
				$targetDir = 'images/'.$fieleName ;

				if(move_uploaded_file($fielTmp,$targetDir)){

					$InserFiles = "uploaded file successfylly !";
				}else{
					echo "error file uploading files";
				}
				$insImages = "INSERT INTO `prod_img`(`ref_id`, `img`) VALUES ('".$lastid."','".$targetDir."')";

				$resss = $conn->query($insImages);

			}
			

		}	

	}

?>
<!DOCTYPE html>
<html>
<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">


	<link rel="stylesheet" type="text/css" href="css/prod.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adding new product</title>
</head>
<body>
	<div class="wrapper">
		<h2 class="title">Add new <span style="color: #01a3a4;">Product</span></h2>
		<br>
		<button onclick="gbck()" class="btn btn-secondary"><i style="font-size: 30px;margin-right: 20px; font-weight: bold;" class="bi bi-arrow-return-left"></i>Back</button>
		<div>
			<?php 

				echo $onlyNum;
			?>
		</div>
		<form method="post" class="form" enctype="multipart/form-data">
			<div class="input-field">
				<label for="name" class="input-label">Product</label>
				<input type="text" name="prod" id="name" placeholder="enter product" class="input" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">price</label>
				<input type="text" id="email" name="prc" placeholder="enter  price" class="input" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">Qnt</label>
				<input type="text" id="email" name="qnt" placeholder="quty." class="input" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">Description</label>
				<textarea style="width: 691px;" rows="10" cols="20" name="des"></textarea>
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">SKU</label>
				<input type="text" id="email" name="sku" placeholder="Sku." class="input" required="required" value="<?php echo date("$date");?>">
				
			</div>


			<div class="input-field">
				<label for="email" class="input-label">Add image</label>
				<input type="file" id="email" name="img[]" placeholder="Sku." class="input" multiple>
				
			</div>
			<button type="submit" name="addnew" class="btn">Add new</button>
		</form>
	</div>

<script type="text/javascript">
	function gbck(){
		window.location.href = "invenTable.php";
	}
</script>
</body>
</html>