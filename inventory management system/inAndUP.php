<?php

  session_start();

  include 'config/conn.php';


  $fnameErr = '';
  $lnameErr = '';
  $passErr = '';
  $confirmErr ='';
  $passErr= '';
  $emailErr='';

  $mailexist='';
  $dataRecorded='';
  $errormsg = array();

  $saa = '';

  if(isset($_POST['signup'])){

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $hashPassword = md5($password);

    $confirmpassword = $_POST['confirm_password'];
     $hashConfirmPassword = md5($confirmpassword);

    $role = "user";


          //first name validation...........

    $nameShoulCharOnly = preg_match('@[a-zA-Z]@', $firstname);
    if(!$nameShoulCharOnly){
      $fnameErr = '<span style="color:red;"> first name must have characters only</span>';
    }

        //lastname vlaidation....................

    $nameShoulCharOnlyll = preg_match('@[a-zA-Z]@', $lastname);
    if(!$nameShoulCharOnlyll){
      $lnameErr = '<span style="color:red;"> last name must have characters only</span>';
    }


        //password validation...................

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $passErr='<span style="color:red;">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>';
              
    }
            


        //confirm password validation........................

    if($password !== $confirmpassword){
      $confirmErr = '<span style="color:red;">password not match</span>';
    }

        //emial validation........................................

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "<span>Invalid email formate </span>";
    }

    


    if($fnameErr || $lnameErr || $passErr || $confirmErr || $emailErr!=''){

          $errormsg[] = $fnameErr ;
          $errormsg[] = $lnameErr ;
          $errormsg[] = $passErr ;
          $errormsg[] = $confirmErr ;
          $errormsg[] = $emailErr ;
      }else{ 
         
          $emailfind = "SELECT * FROM `users` WHERE `email`='".$email."'";
          $selRes = $conn->query($emailfind);

              if($selRes->num_rows > 0){

                 $mailexist = '<span style="color:red;">this mail is already taken ...</span>';
              }else{
                $insert = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `confirm_password`, `role`) VALUES ('".$firstname."','".$lastname."','".$email."','".$hashPassword."','".$hashConfirmPassword."','".$role."')";

                $insRes = $conn->query($insert);
                if($insRes){
                  $dataRecorded='<p style="color:green; font-size:26px;">data has been recorded successfully !</p>';
                }else{
                  echo "error while uploading data";
                }

                
              }

    }

    $saa = 'active';

  }

//sign Up end...............................



      //sign IN start...........................................
  $loginError = " ";
  $loginActive = '';
  if(isset($_POST['login'])){

     $loginemail = $_POST['loginemail'];
    $loginpassword = $_POST['loginpassword'];

    $selLoginUser = "SELECT * FROM `users` WHERE `email`='".$loginemail."' AND `password`='".md5($loginpassword)."'";

    $loginUserMailResult = $conn->query($selLoginUser);
  
    if($loginUserMailResult->num_rows >0){
      $loginres = $loginUserMailResult->fetch_assoc();
      $_SESSION['email']=$loginres['email'];
      $_SESSION['role']=$loginres['role'];

      header('location:welcome.php');
    }else{
       $loginError='<p style="color:red">data not match please try again ...</p>';
    }    
    $loginActive = 'active';
  }

      //sign In end...............................................................
?>
<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com )-->
<html lang="en" >
<head>
  <style type="text/css">
    *, *:before, *:after {
  box-sizing: border-box;
}
html {
  overflow-y: scroll;
}
body {
  background: #f3f3f3;
  font-family: 'Manjari', sans-serif;
}
a {
  text-decoration: none;
  color: #1da1f2;
  transition: .5s ease;
}
a:hover {
  color: #0080ff;
}
.form {
  background: rgb(22,19,54, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}
.top-area {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.top-area:after {
  content: "";
  display: table;
  clear: both;
}
.top-area li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: .5s ease;
}
.top-area li a:hover {
  background: #0080ff;
  color: #ffffff;
}
.top-area .active a {
  background: #1da1f2;
  color: #ffffff;
}
 
.tab-content > div:last-child {
  display: none;
}
 
h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}
label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1da1f2;
}
label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}
label.highlight {
  color: #ffffff;
}
input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1da1f2;
}
textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}
.label-field {
  position: relative;
  margin-bottom: 40px;
}
.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}
.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1da1f2;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #0080ff;
}
.button-block {
  display: block;
  width: 100%;
}
.forgot {
  margin-top: -20px;
  text-align: right;
}
@media (max-width: 765px) {
    label {
      left: 0;
    }    }
}
  </style>
 
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>

  <link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
  

</head>
<body>
 
  <div class="form" method="post" >
      
      <ul class="top-area">
        <li class="tab <?php echo $saa; ?>"><a href="#signup">Sign Up</a></li>
        <li class="tab <?php echo $loginActive; ?>"><a href="#login">Log In</a></li>
      </ul>
      <div class="tab-content">
        <div id="signup" >   
          <h1>Sign Up for Free</h1>
          <div>
            <?php 
             echo $dataRecorded;
            ?>
          </div>
   
          <form  method="post">
          
          <div class="top-row">
            <div class="label-field">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first_name" value="<?php echo $firstname; ?>" required autocomplete="off" />
              <span><?php echo $errormsg[0];?></span>
            </div>
        
            <div class="label-field">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last_name" value="<?php echo $lastname; ?>" required autocomplete="off"/>
              <span><?php echo $errormsg[1];?></span>
            </div>
          </div>
 
          <div class="label-field">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off"/>
            <span><?php echo $mailexist; ?></span>
          </div>

          
          <div class="label-field">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" value="<?php echo $password; ?>" required autocomplete="off"/>
          </div>
          <div class="label-field">
            <label>
              Confirm A Password<span class="req">*</span>
            </label>
            <input type="password" name="confirm_password" value="<?php echo $confirmpassword; ?>" required autocomplete="off"/>
            <span><?php echo $errormsg[3]."<br>";?></span>
            <span><?php echo $errormsg[2];?></span>
          </div>
          
          
          <button type="submit" name="signup" class="button button-block"/>Get Started</button>
          
          </form>
 
        </div>







        
        <div id="login" >   
          <h1>Welcome Back!</h1>
          
          <form action="#"  method="post">
          
            <div class="label-field">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="loginemail" required autocomplete="off"/>
          </div>
          
          <div class="label-field">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="loginpassword" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          <span><?php  echo $loginError; ?></span>
    
          <button type="submit" name="login" class="button button-block" >Log In</button>
          
          </form>
 
        </div>
        
      </div>  
</div>
 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/signUpAndIn.js"></script>
 
</body>
</html>