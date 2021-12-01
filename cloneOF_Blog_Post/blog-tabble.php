<?php 
	session_start();
	include 'config/conn.php';
	

	$user_name =  $_SESSION['user_name'];
	$user_id = $_SESSION['user_id'];
	
	$ff = array();
	if(isset($user_id)){
		$sel = "SELECT  * FROM `bloggers-post` WHERE `user_id`='".$user_id."'";

		$res = $conn->query($sel);
		if($res->num_rows > 0){
			while($dd = $res->fetch_assoc()){
				$ff[] = $dd;
			}
		}


	}




	//getting profile from the database .......................


	$getprofiel = "SELECT `user_profile` FROM `bloggers` WHERE `id`='".$user_id."'";

	$profileres = $conn->query($getprofiel);

	$prfilevalue = $profileres->fetch_assoc();

	$finalvalue = $prfilevalue['user_profile'];



?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

		.red{
		color:#706fd3 ;

		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bloggers table !!</title>
</head>
<body>
<div class="container mt-5 ">	
	<?php 
	
	echo "<h1 class='text-end'>Welcome <span class='red'>$user_name</span>  <img src='".$finalvalue."' class='rounded-pill' style='width:60px;height:50px;'> </h1>  ";

	/*echo '<img src="upload/external-content.duckduckgo.com.jpeg" class="rounded-pill" style="width:60px;height:50px;"> </img>';*/
	
    ?>
	<div class="d-flex justify-content-end mt-5">

		<button type="button" onclick="profile()"  class="btn btn-succe" style="position: relative; left: -62px;background: #B53471; color: white;">Profile</button>

		<button type="button" onclick="post()" class="btn btn-succe" style="position: relative; left: -42px;background: darkblue; color: white;">create new</button>


		<button type="button" onclick="logout()" class="btn btn-dark text-white">Log out</button>

	</div>
	<form method="post">	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th >Description</th>
					<th>Download</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			</tbody>
				<?php
					foreach($ff as $row){
						$user_attatch=$row['user_attatch'];

						echo "<tr>";
						echo "<td>" .$row['title']. "</td>";
						echo "<td>" .$row['mess']. "</td> ";
						echo "<td><a href='".$user_attatch."'>".$user_attatch."</a></td>";

						echo '<td> <button type="button" onclick="red('.$row['id'].')" class="btn btn-primary"> Edit</button></td>';

						echo '<td> <button type="button" onclick="redDel('.$row['id'].')" class="btn btn-danger"> Delete</button></td>';
						
						echo "</tr>";
					} 
				?>	
				
			</tbody>
	
	    </table>
	</form>
</div>



<script type="text/javascript">
	function post(){
		window.location.href = "/php/Blog-Post/blog.php";
	}
	function logout(){
		window.location.href = "logout.php";
	}
	function profile(){
		window.location.href = "/php/Blog-Post/update.php";
	}
	function redDel(id){

		window.location.href = 'delete.php?id='+id;
	}
	function red(id){
		window.location.href = 'edit.php?id='+id;

	}
</script>	

</body>
</html>