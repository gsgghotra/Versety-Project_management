<?php require_once 'aps/init.php';?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Title -->
    <title>Forar</title>
  <!-- meta tags -->
    <meta charset="utf-8" />
    <?php include_once("analyticstracking.php") ?>
    <meta name="description" content="For Assignments Reminder. Keep your assignments list in one place. Update the list regularly to see your PROGRESS and Get emails for the assignments.">
      <meta name="keywords" content="Assignments, reminder, homework, calendar, GsG Ghotra, Gurjeet Singh, Planner">
    <meta name="author" content="Gurjeet Singh, GsG Ghotra">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>

<body>

<header>
<!-- Nav of the body -->
<div class="lognav">
	 <h3><span><img src="css/versety.png" alt="logo" class="logoimg" onclick="location.href='../index.php'"/></span></h3>
	<!---<ul>
		<!---<li class="nav_first" onclick="location.href='index.php'"><span class="text_red"><i>VERSETY</i></span></li>
		<li class="nav_normal" onclick="location.href='../index.php'"><span class="icon-home"></span> Home</li>
		<li class="nav_normal" onclick="location.href='index.php'"><span class="icon-home"></span> Profile</li>
		<li class="nav_last" onclick="location.href='logout.php'"> <span class="icon-home"></span> Logout</li>
	</ul>
</div>-->
</div>
</header>

<main>
<div id="container">
<div class="indexcon">

		<?php  require_once 'aps/review.php';  ?>
</div>

<!-- heading of the body -->

<!-- Nav of the body -->
<nav>
	<ul>
		<li onclick="location.href='home.php'"> Home </li>
	</ul>
</nav>

</main>
</div>
<!-- Footer -->
<?php require_once 'aps/footer.php';?>

</body>
</html>
