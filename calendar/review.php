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
<script type="text/javascript" src="js/loginauth.js"></script>
	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>

<body>

<header>
<img src="css/forar.jpg" class="logoimg1"/>
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
		<li onclick="location.href='index.php'"> Home </li>
	</ul>
</nav>

</main>
</div>
<!-- Footer -->
<?php require_once 'aps/footer.php';?>

</body>
</html>
