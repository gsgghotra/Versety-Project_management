<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
?>
<!DOCTYPE HTML>
<html>
<body>
<main>
	<div id="container">
	<?php
	$getposts = mysqli_query($connection, "SELECT * FROM users WHERE id='$u_id'") or die(mysqli_error($connection));
	while ($row = mysqli_fetch_assoc($getposts)) {
	$u_id = $row["id"];
	$f_name = $row["first_name"];
	$l_name = $row["last_name"];
	$username = $row["username"];
$email =  $row["email"];

}
?>
<aside class="setpage">
<?php
		$post_fname=@$_POST['fname'];
		$post_lname=@$_POST['lname'];

		if($post_fname!="" AND $post_lname!=""){
			mysqli_query($connection, "UPDATE users SET first_name=('$post_fname'),last_name=('$post_lname') WHERE id ='$u_id'");

			echo "<meta http-equiv=\"refresh\" content=\"0; URL=settings.php\">";
			exit();
		}
		?>

<form method="post" action="" autocomplete="off" class="pssdregister">
		<h2> Setting </h2>
		 <label class="setinfo"  for="bday">First Name:</label>
		<input type="text" maxlength="20" name="fname" value="<?php echo $f_name?>" class="stitle" placeholder="First name"/>
		 <label class="setinfo" for="bday">Last Name:</label>
    <input type="text" maxlength="20" name="lname" class="stitle" value="<?php echo $l_name?>" placeholder="Last name"/>
		 <label class="setinfo" for="bday">Email:<a href=""><span class="normal">Change email</span></a></label>
<input type="text" disabled="disabled" maxlength="50" name="email" value="<?php echo $email?>" class="stitle" placeholder="Email"/>
		  <label class="setinfo" for="bday">Password:<a href=""><span class="normal">Change password</span></a></label>
<input type="password" maxlength="80" name="password" disabled="disabled" value="password" class="stitle" placeholder="Password / empty field"/>
		 <button type="submit" name="formsubmit" class="ssubmit" value="Update">UPDATE</button>
		 <a href="addaccessor.php"><span class="normal">Add Accessors</span></a>
		 </form>
</aside>
</div>
</main>
</body>
</html>
<?php require_once 'aps/footer.php';?>
