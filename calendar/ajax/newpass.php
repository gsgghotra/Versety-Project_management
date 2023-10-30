<?php
require_once "../../database/connection.php";
$new_pass = $_POST['newpass'];
$con_pass = $_POST['conpass'];
$user_email = $_POST['uemail'];
$pcode = $_POST['pcode'];

// get data from database with given email
//if code matches with given email
// change password with md5 encryption
// delete the passcode
$check = mysqli_query($connection, "SELECT * FROM users WHERE email='$user_email'");
if (mysqli_num_rows($check)===1) {
$get = mysqli_fetch_assoc($check);
$dbemail = $get['email'];
$dbuserid = $get['id'];
$dbusername = $get['username'];
$dbcode = $get['ch_passcode'];
}
$rn_code = substr(md5(uniqid(mt_rand(), true)) , 0, 4);
if ($new_pass !=''){
  if ($con_pass != ""){
    if ($new_pass == $con_pass){
      	$con_pass = md5($con_pass);
      if ($user_email == $dbemail){
        if ($pcode == $dbcode){
          mysqli_query($connection, "UPDATE users SET password=('$con_pass'), ch_passcode=('$rn_code') WHERE email ='$user_email'");
          echo "success";
        }
      }
    }
  }
}
?>
