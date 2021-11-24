<?php 

session_start();
echo "welcome ".$_SESSION['uname'];
echo  " and the passwd is: ".$_SESSION['passwd']." and the id is: ";
echo $_SESSION['id'];

$conn = new mysqli('localhost','root','','LOGIN');	

if($conn->connect_error){
	die("unable to connect the internet");
}


$dddd = array();
$select = "SELECT * FROM `myUsers`";

$result = $conn->query($select);
while ($data111 = $result->fetch_assoc()) {
  
  $dddd[] = $data111;
}
/*echo "<pre>";
print_r($dddd);
echo "</pre>";*/

?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table of users !!</title>
</head>
<style type="text/css">
  .right{
    position: relative;
    right: 50px;
  }
</style>
<body>
<div class="container-fluid">

<form method="post">
<table class="table table-stripped table-hover ">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">password</th>
      <th colspan="2" scope="col">Action</th>
      <div class="d-flex justify-content-end">


      <a href="/php/Assign/loginTwo/addnew.php"><input class="btn btn-primary right" type="button" name="Add New" value="Add new"></a>

      <a href="logout.php"><input class="btn btn-danger" type="button" name="logout" value="Log out"></a>
      </div>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($dddd as $row){ 
  
      echo '<tr>';
      echo '<td>' . $row['id'].'</td>';
      echo '<td>' . $row['uname'] . '</td>';
      echo '<td>' . $row['passwd'] . '</td>';

      echo '<td >'.'<a href="/php/Assign/loginTwo/edit.php?rid='.$row['id'].'">Edit</a>'.'</td>';
      echo '<td >'.'<a href="/php/Assign/loginTwo/delete.php?id='.$row['id'].'">Delete</a>'.'</td>';
      echo '</tr>';

      }
    ?>
  </tbody>
</table>
</form>
</div>
</body>
</html>