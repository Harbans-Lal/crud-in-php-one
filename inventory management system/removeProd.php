<?php 

session_start();
include 'config/conn.php';

$prodID = $_GET['id'];

//deleting product details...............

$delProd = "DELETE FROM `products` WHERE `id`='".$prodID."'";
$rs = $conn->query($delProd);


//deleting prod images............................
$selImg = "SELECT * FROM `prod_img` WHERE `ref_id`='".$prodID."'";
$selImgRes = $conn->query($selImg);

$empty = array();
while ($fetch = $selImgRes->fetch_assoc()) {
	$empty[] = $fetch;
}


foreach($empty as $key) {
	if(unlink($key['img'])){
		$delll = "DELETE FROM `prod_img` WHERE `ref_id`='".$prodID."'";
		$delllRss = $conn->query($delll);
	}else{
		echo "unabke to delete multiple images.......";
	}
}

header('location:invenTable.php');


?>