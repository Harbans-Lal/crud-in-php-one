<?php
session_start();
include 'config/conn.php';

$theimage=$_SESSION['image'];
$usermail=$_SESSION['email'];
$theRole=$_SESSION['role'];


$selData = "SELECT * FROM `users` WHERE `email`='".$usermail."'";
$selDataRes  =$conn->query($selData);
$fetchData = $selDataRes->fetch_assoc();
$theImg = $fetchData['img'];
$useName = $fetchData['firstname'];
$uselName = $fetchData['lastname'];

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Welcome users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!--prpfile css-->
		<link rel="stylesheet" type="text/css" href="css/profile.css">

        

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css2/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">



		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo isset($theImg)? $theImg : "images/external-content.duckduckgo.com.jpeg"; ?>)"></a>



	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li>

	          <li>
	              <a href="invenTable.php">Inventory</a>
	          </li>
            <li>




            <?php 
              
                if($theRole == 'admin'){
                    echo '<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">All users</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="allUsers.php">Page 1</a>
                </li>
              </ul>';
                }
            ?>

	        

	          <li>
                <a href="profile.php">Profile</a>
	          </li>

	          <li>
              <a href="logout.php">Log out</a>
	          </li>

	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div>
                <h1 class="ml-3">welcome  <?php echo '<span style="color:#1abc9c;">'.$useName.' '.$uselName.'</span>'; ?></h1>
            </div>

        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
              </ul>
            </div>
          </div>
        
        </nav>

       