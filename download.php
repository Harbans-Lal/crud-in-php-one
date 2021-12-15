<?php 
	session_start();
	include 'config/conn.php';

	$userMail=$_SESSION['email'];

	$selUSerProd = "SELECT * FROM `products`  WHERE `ref_email` ='".$userMail."'";

	$userProd = $conn->query($selUSerProd);

	$nnn = $userProd->fetch_assoc();

	
	$emptTwo = array();

	while($nnn = $userProd->fetch_assoc()){

		$emptTwo[] = $nnn;
	}



    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 

    $fields = array('prod', 'price', 'qnt', 'des', 'sku'); 
    fputcsv($f, $fields, $delimiter); 

    foreach($emptTwo as $key =>$row){
			
		$lineData = array($row['prod'], $row['price'], $row['qnt'], $row['des'], $row['sku'] ); 
        fputcsv($f, $lineData, $delimiter); 

		}


    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 


    exit;

?>