<?php require_once 'init.php'; 
	$result = $connection->query("SELECT username FROM users");
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo '<div class="reviewboxsize"><span class="username">'.$row['username'].': </span> <span class="review"> feedback</span></div>';

		}
	}
?>
