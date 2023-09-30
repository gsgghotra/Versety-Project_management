<?php
session_start();
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "chat";

$connection = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die ("Could not connect to mysql");
$session_id = session_id();
$getchat = mysqli_query($connection, "SELECT * FROM chatlog ORDER BY date_created DESC ") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getchat)) {
            $id = $row['id'];
            $message = $row['message'];
            $date_created= $row['date_created'];
            $sent_by = $row['sent_by'];

            if ($sent_by == $session_id) {
            	
            	echo "<div class='row bubble-sent pull-right'>".$message ."</div>";
            } else {
            	# code...
            	echo "<div class='row bubble-recv'>". $message."</div>";
            }
            }
            
?>
