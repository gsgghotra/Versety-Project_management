<?php require_once 'aps/init.php';?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Title -->
		<title>VERSETY Policy</title>
	<!-- meta tags -->
		<meta charset="UTF-8">
		<meta name="description" content="Help yourself amd make your life more organised with Versity. Many advanced features to help you remind important events.">
		<meta name="keywords" content="Versety,Calendar,Project Managemnet, Work Reminder, share events, Privacy">
		<meta name="author" content="Gurjeet Singh">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>

<body>
<header>
<div class="lognav">
	 <h3><span><img src="css/versety.png" class="logoimg" onclick="location.href='../index.php'"/></span></h3>

</div>
</header>
<nav>
	<ul>
		<li onclick="location.href='../index.php'"> Home </li>
	</ul>
</nav>

	<div id="container">
<aside class="setpage">
		<h2> Reset your password </h2>
<div class="setpageanswer"></div>
		<div id="emailfield">
		 <label class="setinfo"  for="bday">Email:</label>
		<input type="text" maxlength="20" id="email" name="email" class="stitle" placeholder="Enter your email" required/>
		 <button type="submit" name="formsubmit"  onclick="res_pass()"" class="ssubmit" value="Update">UPDATE</button>
	 </div>
</aside>
	</div>
</body>
</html>
<?php require_once 'aps/footer.php';?>
<script type="text/javascript" src="js/jquery.js"></script><script type="text/javascript" src="js/rpass.js"></script>
