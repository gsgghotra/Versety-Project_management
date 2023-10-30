<?php
require_once "../../database/connection.php";
  $email= $_POST['email'];
  if($email!=""){
    $chkemail = "SELECT * FROM users WHERE email = '$email'";
    $vresult = mysqli_query($connection, $chkemail);
    $usercount = $vresult->num_rows;

$rn_pass = substr(md5(uniqid(mt_rand(), true)) , 0, 6);
$query = "UPDATE users SET ch_passcode=('$rn_pass') WHERE email ='$email'";
$result = mysqli_query($connection, $query);
if (mysqli_affected_rows($connection) == 1) { //If the Insert Query was successfull.
      echo 'success';
    // Send an email
$to = $email;
$getposts = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$username = $row['username'];
						$f_name = $row['first_name'];
            $ch_passcode = $row['ch_passcode'];
}
$subject = "Change your password";
$message = "
<!DOCTYPE>
<html>
<head>
<title>G4AGENDA</title>
<style>
h2{
color:white;
padding:5px;
background-color:#009999;
margin:0px;
}
p{
color:white;
padding:5px;
background-color:#484f4f;
margin:0px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th{
padding:5px;
text-align:center;
}
td{
text-align:center;
padding:5px;
}
table{
width:100%;
}
</style>
</head>
<body>
<h2>Reset your password</h2>
<p>Hello $f_name, You told us you forgot your details. If you really did, Click on the link to change password.</p>
<table>
<tr>
<th>username</th>
<th>$username</th>
</tr>
<tr>
<th>Password link</th>
<th>http://www.g4a.esy.es/resetpasspage.php?u=$username&email=$email&com=g4a&code=$ch_passcode</th>
</tr>
</table>
<p>If you didn't mean to reset your password, then you just ignore this email;<br/> Your password will not change.</p>
<p><br/>Thanks,<br/>G4AGENDA Team</p>

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: G4AGENDA <g4agenda@g4a.esy.es>' . "\r\n";

mail($to,$subject,$message,$headers);


    // Finish the page:
} else {
  echo "Invalid email";
} 

} else {
  echo "Please enter your email.";
}
?>
