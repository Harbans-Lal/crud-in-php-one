<?php 
	session_start();

	$conn = new mysqli("localhost","root","","LOGIN");

	/*echo $_GET['rid'];
	echo $_GET['uname'];*/


    $select = "SELECT * FROM `myUsers` WHERE `id`='".$_GET['rid']."'";
	$ddd = $conn->query($select);

	if($ddd->num_rows>0){
		$jjj = $ddd->fetch_assoc();

	}

	$id=$jjj['id'];
	$uname = $jjj['uname'];
	$pass = $jjj['passwd'];
	  


	if(isset($_POST['save'])){
		$newName = $_POST['newName'];
		$newPass = $_POST['newPasswd'];
		$id =$_POST['id'];

		$update = "UPDATE `myUsers` SET `uname`='".$newName."',`passwd`='".$newPass."' WHERE `id`='".$id."'";
		$res = $conn->query($update);
		if($res){
			echo "Updated successfully!!";
			header("location:dashboard.php");
		}else{
			echo "Failed to update the data!!";
		}
	}


/*
	$select ="SELECT `uname`, `passwd` FROM `myUsers`";
	$res  = $conn->query($select);


	$data = array();
	while($npass = $res->fetch_assoc()){
		$data[]=$npass;
	}
	echo "<pre>";
	print_r($data);
	echo "</pre>";*/

	/*foreach ($data as $item) {
		echo "<pre>";
		print_r($item);
		echo "</pre>";
	}*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>My Example</title>

<style>
.container{
	display: flex;
	justify-content: center;
}

.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 20em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}


.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm select,
.myForm textarea {
display: block;
width: 100%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}


.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-top: 1em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}
</style>
</head>
<body>
<div class="container">
    <form class="myForm" method="post" enctype="application/x-www-form-urlencoded" >

    	<input type="hidden" name="id" value="<?php echo "$id" ?>" >

		<p>
		<label>username
		<input type="text" name="newName" value="<?php  echo "$uname"; ?>">
		</label> 
		</p>

		
		<p>
		<label>password 
		<input type="password" name="newPasswd" value="<?php echo "$pass"; ?>">
		</label>
		</p>
		<p>
		
		<p><button name="save">Save changes</button></p>

    </form>
</div>
</body>
</html>