<?php
require_once "../aps/connect_i.php";
$loguser = $_POST['logname'];
$logpass = $_POST['logpass'];
if ($loguser != ''){
		if ($logpass != ''){
			if ($loguser && $logpass)
{
	$query = mysqli_query($connection, "SELECT * FROM users WHERE username='$loguser'");
	$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
		while ($row = mysqli_fetch_assoc($query))
		{
  $username = strtolower($loguser);
	$password = md5($logpass);
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}

		if ($username == $dbusername && $password == $dbpassword)
		{
	session_start();
	$_SESSION['username'] = $username;
	echo 'success';
}
}
	}
}
			
		}

?>