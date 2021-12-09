<?php
session_start();
include 'config/conn.php';

$emty = array();
$sellAll = "SELECT * FROM `users` WHERE `role`='user'";
$selRes =$conn->query($sellAll);

while($theusers = $selRes->fetch_assoc()){
	$emty[]=$theusers;
}

?>



<?php include 'header.php'; ?>




<div class="container mt-5">
	
			<h1 class="text-center"><span style="color: #4b7bec;">All users</span></h1>
			<button type="button" class="btn btn-primary" onclick="goback()">Go back</button>
	
		
	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>First_Name</th>
					<th>Last_Name</th>
					<th>Email</th>
					<!-- <th>password</th> -->
					<th>phn no</th>
					<th>address</th>
					<th>country</th>
					<th>role</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach ($emty as $key) {
					echo "<tr>";
					echo "<td>".$key['firstname']."</td>";
					echo "<td>".$key['lastname']."</td>";
					echo "<td>".$key['email']."</td>";
					//echo "<td>".$key['password']."</td>";
					echo "<td>".$key['phn']."</td>";
					echo "<td>".$key['address']."</td>";
					echo "<td>".$key['country']."</td>";
					echo "<td>".$key['role']."</td>";
                    
                    echo '<td><button type="button" class="btn btn-danger" onclick="del('.$key['id'].')">Delete</button></td>';
                    echo '<td><button type="button" class="btn btn-primary" onclick="edit('.$key['id'].')">Edit</button></td>';
					
					echo "</tr>";
					 
				}
			?>
			</tbody>
			
		</table>
</div>


<script type="text/javascript">
	function goback(){
		window.location.href = "welcome.php";
	}
	function del(id){
		window.location.href = "delete.php?id="+id;
	}
	function edit(id) {
		window.location.href="adminEdit.php?id="+id;
	}
</script>


<?php include 'footer.php'; ?>