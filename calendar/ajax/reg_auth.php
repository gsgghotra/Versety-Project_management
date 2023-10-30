<?php
require_once "../../database/connection.php";
$reguser = $_POST['regname'];
$regpass = $_POST['regpass'];
$regemail = $_POST['regemail'];
$regrepass = $_POST['regrepass'];
if ($reguser != ''){
		if ($regpass != ''){
			if(strlen($regpass) < 5){
				echo "smallpass";
			} else if(strlen($regpass) > 25){
				echo "longpass";
			} else if ($regpass != $regrepass){
				echo 'password';
			}else if(strlen($reguser) < 5){
				echo "smallname";
			} else if(strlen($reguser) > 20){
				echo "longname";
			} else if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $regpass)){
			  echo 'notpass';
			} else if ($regpass != $regrepass){
				echo 'password';
			} else if(!preg_match("/^[a-zA-Z0-9]+$/", $reguser)) {
   // there are spaces
	 			echo 'spacename';
			}else {
			if ($reguser && $regpass){
	$query = mysqli_query($connection, "SELECT * FROM users WHERE username='$reguser'");
	$numrows = mysqli_num_rows($query);
	$emailquery = mysqli_query($connection, "SELECT * FROM users WHERE email='$regemail'");
	$emailnumrows = mysqli_num_rows($emailquery);

				if ($emailnumrows!=0)
				{
					echo "email";
				} else {
									if (filter_var($regemail, FILTER_VALIDATE_EMAIL)) {

										if ($numrows!=0)
										{
											echo "username";
										} else {
											$s_regpass = md5($regpass);
										$regquery = "INSERT INTO `users` (`username`, `password`, `email`,`active`) VALUES ( '$reguser', '$s_regpass', '$regemail','1')";
				            $regresult = mysqli_query($connection, $regquery);
				            if (!$regresult) {
				                echo 'Query Failed ';
				            } else {
											echo "success";
										}
										}
									} else {
									  echo("in_email");
									}
				}
}

}
	}
}

?>
