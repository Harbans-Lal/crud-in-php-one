<?php 
	session_start();
	include 'config/conn.php';
	
	$msg = '';
	$prodId = $_GET['id'];

	$_SESSION['prodId']=$prodId;

	$selProd = "SELECT * FROM `products` WHERE `id`='".$prodId."'";
	$res = $conn->query($selProd);
	$Alldata  = $res->fetch_assoc();


	if(isset($_POST['addnew'])){
		$prod = $_POST['prod'];
		$price = $_POST['prc'];
		$qnt = $_POST['qnt'];
		$sku = $_POST['sku'];
		$des = $_POST['des'];

		$updProd = "UPDATE `products` SET `prod`='".$prod."',`price`='".$price."',`qnt`='".$qnt."',`des`='".$des."',`sku`='".$sku."' WHERE `id`='".$prodId."'";

		$rrr = $conn->query($updProd);
		//$lastid = $conn->insert_id;
		if($rrr){
			$msg = "<span style='color:green;font-size:23px;'>updated item successfully !!</span>";
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

					$updateProd = "uploaded file successfylly !";
				}else{
					$errorUloadigImg ="error file uploading files";
				}
				$insImages = "INSERT INTO `prod_img`(`ref_id`, `img`) VALUES ('".$prodId."','".$targetDir."')";

				$resss = $conn->query($insImages);

			}
			

		}	



  }
?>

<?php include 'header.php'; ?>



	<div class="wrapper">
		<h2 class="title">Add new <span style="color: #01a3a4;">Product</span></h2>
		<br>
		<button onclick="gbck()" class="btn btn-secondary"><i style="font-size: 30px;margin-right: 20px; font-weight: bold;" class="bi bi-arrow-return-left"></i>Back</button>
		<div>
			<?php

				echo $msg;
			 ?>
		</div>
		<form method="post" class="form" enctype="multipart/form-data">
			<div class="input-field">
				<label for="name" class="input-label">Product</label>
				<input type="text" name="prod" id="name" placeholder="enter product" value="<?php echo $Alldata['prod'];?>" class="input form-control" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">price</label>
				<input type="text" id="email" name="prc" value="<?php echo $Alldata['price']; ?>" placeholder="enter  price" class="input form-control" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">Qnt</label>
				<input type="text" id="email" name="qnt" value="<?php echo $Alldata['qnt']; ?>" placeholder="quty." class="input form-control" required="required">
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">Description</label>
				<textarea class="form-control" style="width: 900px;" rows="10" cols="20" name="des"><?= $Alldata['des']; ?></textarea>
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">SKU</label>
				<input type="text" id="email" name="sku" value="<?php echo $Alldata['sku'];?>"  class="input form-control" readonly>
				
			</div>
			<div class="input-field">
				<label for="email" class="input-label">Add image</label>
				<input type="file" id="email" name="img[]" placeholder="Sku." class="input form-control" multiple>
				
			</div>
			<div class="d-grid mt-2">
					<button type="submit" name="addnew" class="btn btn-primary btn-block">Update</button>
            
			</div>
		</form>
	</div>

<script type="text/javascript">
	function gbck(){
		window.location.href = "invenTable.php";
	}
</script>


<?php include 'footer.php'; ?>