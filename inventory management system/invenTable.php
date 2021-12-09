<?php 
	
	session_start();
	include 'config/conn.php';

	$selProd = "SELECT * FROM `products`";
	$prodRes = $conn->query($selProd);

	$emt = array();
	$empTwo = array();
	while($data = $prodRes->fetch_assoc()){
		$emt[]=$data;
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

					foreach ($emt as $key) {
					
					echo "<tr>";

					echo '<td>'.$key['prod'].'</td>';
					echo '<td>'.$key['price'].'</td>';
					echo '<td>'.$key['qnt'].'</td>';
					echo '<td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">'.$key['des'].'</td>';
					echo '<td>'.$key['sku'].'</td>';
					echo '<td><button onclick="edit('.$key['id'].')" type="button" class="btn btn-primary">Edit</button></td>';
		            echo '<td><button onclick="view('.$key['id'].')" type="button" class="btn btn-success">view</button></td>';
				    echo '<td><button type="button" onclick="rem('.$key['id'].')" class="btn btn-danger">remove</button></td>';
					echo "</tr>";

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