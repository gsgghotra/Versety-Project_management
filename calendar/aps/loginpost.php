//This file is not in use anymore as all the code is replaced with ajax.
<div id="eron">
<?php
if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['last_time'] = time();
if ($username && $password)
{
	require_once 'connect_i.php';
	$query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
	$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
		while ($row = mysqli_fetch_assoc($query))
		{
  $username = strtolower($username);
	$password = md5($password);
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}

		if ($username == $dbusername && $password == $dbpassword)
		{

echo "<meta http-equiv=\"refresh\" content=\"0; URL=home.php\">";
//if login with username
if ($username == $dbusername)	{
	$_SESSION['username'] = $username;
}
}
		else
		{
			$er = "Incorrect Password!";
		}
	}
	else
	$er = "Account does not exist!" ;
}
else
$er = "Please fill in both fields!!!";
}
?>
</div>
