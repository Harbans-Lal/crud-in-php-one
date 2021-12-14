<?php 
	
	session_start();
	include 'config/conn.php';
	$role = $_SESSION['role'];

	$userMail=$_SESSION['email'];

	$selProd = "SELECT * FROM `products` ORDER BY `id` DESC";
	$prodRes = $conn->query($selProd);

	$emt = array();
	//rsort($emt);

	while($data = $prodRes->fetch_assoc()){
		$emt[]=$data;
	}


	 $selUSerProd = "SELECT * FROM `products`  WHERE `ref_email` ='".$userMail."'";

	$userProd = $conn->query($selUSerProd);

	$emptTwo = array();

	while($nnn = $userProd->fetch_assoc()){

		$emptTwo[] = $nnn;
	}



?>
<?php include 'header.php'; ?>


	<div class="container">
		
			<button type="button" onclick="gobck()" class="btn btn-primary mt-5">Back</button>
		<button type="button" onclick="additem()" class="btn btn-secondary mt-5">Create new</button>
		
		

		<table class=" container mt-5 table table-striped table-hover">
			<thead class="text-center">
				<tr>
					<th>Product</th>
					<th>Price</th>
					<th>Qnt.</th>
					<th>Description</th>
					<th>SKU</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php 

					if($role === 'admin'){
						echo '<h1 style="color:#00cec9;"> All User Product</h1>';
						foreach ($emt as $key) {
						
							echo "<tr>";

							echo '<td>'.$key['prod'].'</td>';
							echo '<td>'.$key['price'].'</td>';
							echo '<td>'.$key['qnt'].'</td>';
							echo '<td style="word-wrap: break-word;max-width: 160px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">'.$key['des'].'</td>';
							echo '<td>'.$key['sku'].'</td>';
							echo '<td><button onclick="edit('.$key['id'].')" type="button" class="btn btn-primary">Edit</button></td>';
				            echo '<td><button onclick="view('.$key['id'].')" type="button" class="btn btn-success">view</button></td>';
						    echo '<td><button type="button" onclick="rem('.$key['id'].')" class="btn btn-danger">remove</button></td>';
							echo "</tr>";

						}

					}else{
						echo '<h1 style="color:#00cec9;"> My Product</h1>';
						foreach ($emptTwo as $val) {
						
							echo "<tr>";

							echo '<td>'.$val['prod'].'</td>';
							echo '<td>'.$val['price'].'</td>';
							echo '<td>'.$val['qnt'].'</td>';
							echo '<td style="word-wrap: break-word;max-width: 160px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">'.$val['des'].'</td>';
							echo '<td>'.$val['sku'].'</td>';
							echo '<td><button onclick="edit('.$val['id'].')" type="button" class="btn btn-primary">Edit</button></td>';
				            echo '<td><button onclick="view('.$val['id'].')" type="button" class="btn btn-success">view</button></td>';
						    echo '<td><button type="button" onclick="rem('.$val['id'].')" class="btn btn-danger">remove</button></td>';
							echo "</tr>";

						}
					}

				 ?>
			</tbody>
		</table>		
	</div>




	<script type="text/javascript">
		function gobck(){
			window.location.href = "welcome.php";
		}
		function additem(){
			window.location.href = "newProd.php";
		}
		function edit(id){
			window.location.href = "editProd.php?id="+id;
		}
		function rem(id){
			window.location.href = "removeProd.php?id="+id;
		}
		function view(id){
			window.location.href = "viewProd.php?id="+id;
		}
	</script>



<?php include 'footer.php'; ?>