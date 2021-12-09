<?php 

session_start();

include 'config/conn.php';
$userId=$_GET['id'];
$updated = '';
$sellAll = "SELECT * FROM `users` WHERE `id`='".$userId."'";
$selRss = $conn->query($sellAll);
$fetch = $selRss->fetch_assoc();



if(isset($_POST['profile'])){
    $fname  = $_POST['fname'];
    $lname=$_POST['lname'];
    $phn=$_POST['phn'];
    $address=$_POST['address'];
    $country=$_POST['country'];

    $updUsr = "UPDATE `users` SET `firstname`='[value-2]',`lastname`='[value-3]',`phn`='[value-8]',`address`='[value-9]',`country`='[value-10]' WHERE `id`='".$userId."'";
    $updRes = $conn->query($updUsr);
    if($updRes){
        $updated= "updated successfully";
    }else{
        echo "error while uploading the data ";
    }


}
?>

<?php include 'header.php'; ?>

<div class="container rounded bg-white mt-5">
        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo $fetch['img']; ?>" width="90"><span class="font-weight-bold"><?php echo $fetch['firstname'].' '.$fetch['lastname']; ?></span><span class="text-black-50"><?php echo $fetch['email']; ?></span><span><?php echo $fetch['country']; ?></span></div>
                   
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
                            <h6><a href="allUsers.php"><i style="font-size: 30px;" class="bi bi-house-door"></i>Back to home</a></h6>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">First name: <input type="text" class="form-control" placeholder="first name" value="<?php echo $fetch['firstname']; ?>" name="fname"></div>
                        <div class="col-md-6">Last name: <input type="text" class="form-control" value="<?php echo $fetch['lastname']; ?>" placeholder="Doe" name="lname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Email: <input type="text" class="form-control" placeholder="Email" value="<?php echo $fetch['email']; ?>" disabled></div>
                        <div class="col-md-6"> Phn no: <input type="text" class="form-control" value="<?php echo $fetch['phn']; ?>" placeholder="Phone number" name="phn"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Address: <input type="text" class="form-control" placeholder="address" value="<?php echo $fetch['address']; ?>" name="address"></div>
                        <div class="col-md-6">Country: <input type="text" class="form-control" value="<?php echo $fetch['country'] ?>" placeholder="Country" name="country"></div>
                    </div>
                    <div class="mt-5 text-right">
                         <button type="submit" class="btn btn-primary profile-button" name="profile">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>



<?php include 'footer.php';?>