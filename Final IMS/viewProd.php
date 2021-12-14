<?php 

session_start();
include 'config/conn.php';
 $id = $_GET['id'];


//images of the product.........................................

$selImg  = "SELECT * FROM `prod_img` WHERE `ref_id`='".$id."'";
$res = $conn->query($selImg);

$emt = array();
//$coverImg = $emt[0]['img'];
$empLen = count($emt);

while($data  = $res->fetch_assoc()){
	$emt[]=$data;
}




//select product details name and everything................

$selProd = "SELECT * FROM `products` WHERE `id`='".$id."'";
$prress = $conn->query($selProd);
$prodDetails = $prress->fetch_assoc();

?>

<?php include 'header.php'; ?>



	<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4"><?php echo $prodDetails['prod']; ?>
      <small ><?php echo $prodDetails['sku']; ?></small>
    </h1>
  
    <!-- Portfolio Item Row -->
    <div class="row">
  
      <div class="col-md-8">
        <img class="img-fluid" src="<?php

              if(empty($emt)){
                echo $emt[0]['img'] = 'images/pexels-photo-3411134.jpeg';
              }else{
                echo $emt[0]['img'];
              }
            ?>">
      </div>
  
      <div class="col-md-4">
      	<button type="button" onclick="bck()" class="btn btn-warning">Back</button>
        <h3 class="my-3">Product Description</h3>
        <p style="word-wrap: break-word;min-width: 220px;max-width: 220px;"><?php echo $prodDetails['des']; ?></p>
        <h3 class="my-3">Product Details</h3>
        <ul>
	         <li><b> Name: </b><?php echo $prodDetails['prod'];?></li>
	         <li><b> Price: </b><?php echo $prodDetails['price'] ?></li>
	          <li><b>Qnt: </b><?php echo $prodDetails['qnt'] ?></li>
          
        </ul>
      </div>
  
    </div>
    <!-- /.row -->
  
    <!-- Related Projects Row -->
    <h3 class="my-4">Related Products</h3>
  
    <div class="row">


    	<?php

    		foreach($emt as $row){?>

    			<div class="col-md-3 col-sm-6 mb-4">
			        <a href="#">
		              <img class="img-fluid" src="<?php echo $row['img']; ?>" alt="">
		            </a>
		      </div>

    		<?php }
    	 ?>
  
      
  
    </div>
    <!-- /.row -->
  
  </div>
  <!-- /.container -->



  <script type="text/javascript">
  	function bck(){
  		window.location.href = "invenTable.php";
  	}
  </script>


<?php include 'footer.php'; ?>