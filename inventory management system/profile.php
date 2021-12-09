<?php 

session_start();

include 'config/conn.php';


 $usermail=$_SESSION['email'];
 $selUser = "SELECT * FROM `users` WHERE`email`='".$usermail."'";

 $result  = $conn->query($selUser);
 $userinfo = $result->fetch_assoc();

 $usermailll =$userinfo['email'];
 
 $userimg  = $userinfo['img'];

 $_SESSION['image']=$userimg;

 




 if(isset($_POST['profile'])){
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $phn=$_POST['phn'];
    $address=$_POST['address'];
    $country= $_POST['country'];

    $upd = "UPDATE `users` SET `firstname`='".$fname."',`lastname`='".$lname."',`phn`='".$phn."',`address`='".$address."',`country`='".$country."' WHERE `email`='".$usermail."'";

    $updResult =$conn->query($upd);
  
    if($updResult){
         echo '<p style="color:green;"> updated data successfully!!</p>';

    }else{
            echo '<p style="color:red;"> some error</p>';
    }
   }


   //upload profile picture....................
   
   if(isset($_FILES['image'])){


        $imgName = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];


        $tar_dir = 'images/';
        $destination = $tar_dir.basename($imgName);
        $fielext = strtolower(pathinfo($destination ,PATHINFO_EXTENSION));



        if(move_uploaded_file($tmp_name, $destination)){
            $updProfiel = "UPDATE `users` SET `img`='".$destination."' WHERE `email` = '".$usermail."'";

            $profileRes = $conn->query($updProfiel);
            
            if($profileRes){
                echo "successfully uploaded image";
            }else{
                echo "error to download file";
            }
        }
        
    }

?>

<?php 

//header file

include 'header.php'; 
?>


<div class="container rounded bg-white mt-5">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo '#'? 'images/external-content.duckduckgo.com.jpeg' :$userimg; ?>" width="90"><span class="font-weight-bold"><?php echo $userinfo['firstname']." ".$userinfo['lastname']; ?></span><span class="text-black-50"><?php echo $userinfo['email']; ?></span><span><?php echo $userinfo['country']; ?></span></div>
                   
                   <div class="d-geid">
                       <input type="file" name="image">
                       <hr>
                      <button type="submit" class="btn btn-primary btn-block">upload</button>

                   </div>
         
            </div> 


            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <h6><a href="welcome.php"><i style="font-size: 30px;" class="bi bi-house-door"></i>Back to home</a></h6>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">First name: <input type="text" class="form-control" placeholder="first name" value="<?php echo $userinfo['firstname']; ?>" name="fname"></div>
                        <div class="col-md-6">Last name: <input type="text" class="form-control" value="<?php echo $userinfo['lastname']; ?>" placeholder="Doe" name="lname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Email: <input type="text" class="form-control" placeholder="Email" value="<?php echo $userinfo['email']; ?>" disabled></div>
                        <div class="col-md-6"> Phn no: <input type="text" class="form-control" value="<?php echo $userinfo['phn']; ?>" placeholder="Phone number" name="phn"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Address: <input type="text" class="form-control" placeholder="address" value="<?php echo $userinfo['address']; ?>" name="address"></div>
                        <div class="col-md-6">Country: <input type="text" class="form-control" value="<?php echo $userinfo['country']; ?>" placeholder="Country" name="country"></div>
                    </div>
                    <div class="mt-5 text-right">
                         <button type="submit" class="btn btn-primary profile-button" name="profile">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>


<!--footer file-->

<?php include 'footer.php'; ?>