<?php 

session_start();

include 'config/conn.php';


$countries_list = array(
    "AF" => "Afghanistan",
    "AX" => "Aland Islands",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BQ" => "Bonaire, Sint Eustatius and Saba",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "IO" => "British Indian Ocean Territory",
    "BN" => "Brunei Darussalam",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos (Keeling) Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo",
    "CD" => "Congo, the Democratic Republic of the",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "CI" => "Cote D'Ivoire",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CW" => "Curacao",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands (Malvinas)",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and Mcdonald Islands",
    "VA" => "Holy See (Vatican City State)",
    "HN" => "Honduras",
    "HK" => "Hong Kong",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran, Islamic Republic of",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "XK" => "Kosovo",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Lao People's Democratic Republic",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libyan Arab Jamahiriya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macao",
    "MK" => "Macedonia, the Former Yugoslav Republic of",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "MX" => "Mexico",
    "FM" => "Micronesia, Federated States of",
    "MD" => "Moldova, Republic of",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territory, Occupied",
    "PA" => "Panama",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RE" => "Reunion",
    "RO" => "Romania",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "BL" => "Saint Barthelemy",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "MF" => "Saint Martin",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and the Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "ST" => "Sao Tome and Principe",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "CS" => "Serbia and Montenegro",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SX" => "Sint Maarten",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and the South Sandwich Islands",
    "SS" => "South Sudan",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syrian Arab Republic",
    "TW" => "Taiwan, Province of China",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania, United Republic of",
    "TH" => "Thailand",
    "TL" => "Timor-Leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "UM" => "United States Minor Outlying Islands",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VE" => "Venezuela",
    "VN" => "Viet Nam",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.s.",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe"
);


//form validate.......

$nm = '';
$phnLeng ='';
$namee = '';
$lnamm = '';
$addr = '';

$valid = array();


//form validate end.............



$sucImgUpl = '';
$updDataSucc = '';

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

    //phone number ................
    if(!preg_match('@[0-9]@' ,$phn)){
        $nm = '<p style="color:red;">only numbers are allowed</p>';
    }
    if (strlen($phn) > 10) {
        $phnLeng = '<p style="color:red"> eneter valid number</p>';
     } 

     //firstname................
    if(!preg_match("@[a-zZ-a]@", $fname)){
       $namee = '<p style="color:red;">only characters are allowed</p>';
    }

    //lastname.................
    if(!preg_match("@[a-zZ-a]@", $lname)){
       $lnamm = '<p style="color:red;">only characters are allowed</p>';
    }

    //address................
    if(!preg_match("@[a-zZ-a0-9]@", $address)){
       $addr = '<p style="color:red;">only characters and digits are allowed </p>';
    }

    
    if($nm || $phnLeng || $namee || $lnamm || $addr !=''){

        $valid[] = $nm;
        $valid[] = $phnLeng;
        $valid[] = $namee;
        $valid[] = $lnamm;
        $valid[] = $addr;
    }else{   
            $upd = "UPDATE `users` SET `firstname`='".$fname."',`lastname`='".$lname."',`phn`='".$phn."',`address`='".$address."',`country`='".$country."' WHERE `email`='".$usermail."'";

            $updResult =$conn->query($upd);
          
            if($updResult){
                 $updDataSucc =  '<p style="color:green;"> Updated data successfully!!</p>';

            }else{
                echo '<p style="color:red;"> Some error</p>';
            }

    }   
    
}


   //upload profile picture....................

    $fieltype = '';
   
   if(isset($_FILES['image'])){


        $imgName = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];


        $tar_dir = 'images/';
        $destination = $tar_dir.basename($imgName);



        //image validation........................
        $fielext = strtolower(pathinfo($destination ,PATHINFO_EXTENSION));

        if($fielext != "jpg" && $fielext != "png" && $fielext != "jpeg"&& $fielext != "gif" ) {
              $fieltype =  '<p style="color:red;">Sorry, only JPG, JPEG, PNG & GIF files are allowed..</p>';
             
            }else{
                if(move_uploaded_file($tmp_name, $destination)){
                    $updProfiel = "UPDATE `users` SET `img`='".$destination."' WHERE `email` = '".$usermail."'";

                    $profileRes = $conn->query($updProfiel);
                    
                    if($profileRes){
                        $sucImgUpl = '<p style="color:green;text-size:26px;">successfully uploaded image<p>';
                    }else{
                        echo "error to download file";
                    }
                }
            } 

        
        
    }

?>

<?php 

//header file

include 'header.php'; 
?>


<div class="container rounded bg-white mt-5">
      <?= $sucImgUpl; ?>
    <form method="post" enctype="multipart/form-data">
        <?= isset($_POST['profile'])? '': $fieltype; ?>
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">



                    <img <?= 'style = "width:50%;height:115px;border-radius:50%;"'?>  src="<?php echo isset($theImg)? $theImg : "images/external-content.duckduckgo.com.jpeg"; ?>">


                    <span class="font-weight-bold"><?php echo $userinfo['firstname']." ".$userinfo['lastname']; ?></span><span class="text-black-50"><?php echo $userinfo['email']; ?></span><span><?php echo $userinfo['country']; ?></span></div>
                   
                   <div class="d-geid">
                       <input type="file" name="image">
                       <hr>
                      <button type="submit" class="btn btn-primary btn-block">upload</button>

                   </div>
         
            </div> 


            <div class="col-md-8">
                <div class="p-3 py-5">
                    <?= $updDataSucc ; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back">
                            <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <h6><a href="welcome.php"><i style="font-size: 30px;" class="bi bi-house-door"></i>Back to home</a></h6>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">First name:
                         <input type="text" class="form-control" placeholder="first name" value="<?php echo $userinfo['firstname']; ?>" name="fname">
                         <spna><?php  echo $valid[2];?></spna>
                     </div>

                        <div class="col-md-6">Last name:
                         <input type="text" class="form-control" value="<?php echo $userinfo['lastname']; ?>" placeholder="Doe" name="lname">
                            <spna><?php  echo $valid[3];?></spna>
                     </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Email: <input type="text" class="form-control" placeholder="Email" value="<?php echo $userinfo['email']; ?>" disabled></div>
                        <div class="col-md-6"> Phn no:
                         <input type="text" class="form-control" value="<?php echo $userinfo['phn']; ?>" placeholder="Phone number" name="phn">
                         <spna><?php  echo $valid[0];?></spna>
                         <spna><?php  echo $valid[1];?></spna>
                     </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">Address: 
                            <input type="text" class="form-control" placeholder="address" value="<?php echo $userinfo['address']; ?>" name="address"><spna><?php  echo $valid[4];?></spna></div>
                        <div class="col-md-4">

                            <select name="country" class="select" style="width: 100%; position: relative; top: 33px;">
                               <?php foreach ($countries_list as $key => $value) {?>

                                <option><?= $value ; ?></option>


                               <?php } ?>
                            </select>
                            
                        </div>


                       <!--  <div class="col-md-6">Country: <input type="text" class="form-control" value="#" placeholder="Country" name="country"></div> -->


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