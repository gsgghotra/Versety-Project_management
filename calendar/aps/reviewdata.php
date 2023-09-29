<?php require_once 'init.php'; ?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Title -->
    <title>Forar</title>
  <!-- meta tags -->
    <meta charset="utf-8" />
    <meta name="description" content="For Assignments Reminder. Keep your assignments list in one place. Update the list regularly to see your PROGRESS and Get emails for the assignments.">
      <meta name="keywords" content="Assignments, reminder, homework, calendar, GsG Ghotra, Gurjeet Singh, Planner">
    <meta name="author" content="Gurjeet Singh, GsG Ghotra">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>
<?php
$result = $connection->query("SELECT username FROM users");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo '<div class="reviewboxsize"><span class="username">'.$row['username'].': </span> <span class="review"> feedback</span></div>';

	}
}
?>
