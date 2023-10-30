<?php require_once 'aps/init.php';
logged_in_redirect() ?>
<!DOCTYPE HTML>
<html>
	<head>
	<!-- Title -->
		<title>FORAR</title>
	<!-- meta tags -->
		<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>

<body>

<header>
<img src="css/forar.jpg" class="logoimg1"/>
</header>
<nav>
	<ul>
		<li onclick="location.href='index.php'"> Home </li>
	</ul>
</nav>
<div id="container">

<?php
if (isset($_GET['u'])) {
	$username= mysqli_real_escape_string($connection, $_GET['u']);
	$code = mysqli_real_escape_string($connection, $_GET['code']);
	$email = mysqli_real_escape_string($connection, $_GET['email']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($check)===1) {
$get = mysqli_fetch_assoc($check);
$dbuserid = $get['id'];
$dbusername = $get['username'];
$dbcode = $get['ch_passcode'];
if ($username == $dbusername){
		if ($code == $dbcode){
?>

<aside class="setpage">

	<h2> Change your password </h2>
	<p id="emailans">	 </p>
     <div class="setpageanswer"></div>
	<div id="emailfield">
    	<input type="hidden" name="useremail" id="user_email" value="<?php echo $email ?>"/>
      <input type="hidden" name="pass" id="passcode" value="<?php echo $code ?>"/>
	 <label class="setinfo"  for="bday">New password:</label>
	<input type="password" maxlength="20" id="new_pass" name="npass" class="stitle" placeholder="New password"/>
	<label class="setinfo"  for="bday">Confirm password:</label>
 <input type="password" maxlength="20" id="con_pass" name="cpass" class="stitle" placeholder="Confirm password"/>
	 <button type="submit" name="formsubmit"  onclick='new_pass()' class="ssubmit" value="Update">UPDATE</button>
 </div>
</aside>


<?php
} else {
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
  exit();
}
} else {
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
  exit();
}
} else {
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
  exit();
}

}
}
?>


</div>
</body>
</html>
<?php require_once 'aps/footer.php';?>
<script type="text/javascript" src="js/jquery.js"></script><script type="text/javascript" src="js/newpass.js"></script>
