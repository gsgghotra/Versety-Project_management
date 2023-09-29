<?php require_once '../aps/init.php';
logged_in_redirect();
require_once '../aps/loginpost.php'; ?>
<!doctype html>
<html>
  <head>
    <title>G4agenda</title>
	<meta name="google-site-verification" content="4ea__HSOAAerw6glccfHFsmnReiM50dOr2M_xthyYCs" />
<link rel="stylesheet" type="text/css" href="style.css">
    <script src="popup.js"></script>
  </head>
  <body>
  <div id="container">
  <header>
    <h1>G4AGENDA</h1>
		</header>
		  <div id="bcontainer">
	<form method="post" action="index.php" class="pssd">
		<h2><p>Login</p></h2>
	<label for=""></label>
		<input type="text" name="username" id="rwrong" placeholder="Username" maxlength="40" class="email" value="">
	<label for=""></label>
		<input type="password" name="password" id="rwrong" maxlength="20" placeholder="Password" class="pass" value="">
		<button type="submit" class="submit" name="submit" value="Login">Login</button>
	<label for=""></label><br>
	<a href="../aps/forgetpass.php" target="_blank">Forgotten Details?</a>
</form>
</div>
	</div>
  </body>
</html>
