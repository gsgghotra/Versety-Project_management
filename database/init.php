<?php session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
require_once "connection.php";
$sqlCommand = "SELECT * FROM users WHERE username='$username'";
$query = mysqli_query($connection, $sqlCommand) or die (mysqli_error());
while ($row = mysqli_fetch_array($query)) {
$username = $row["username"];
}
function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int)$timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;

    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );

    //now we just find the difference
    if ($diff == 0)
    {
        return 'Just now';
    }

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}

mysqli_free_result($query);
function logged_in() {
	return (isset($_SESSION['username'])) ? true : false;
}

function logged_in_redirect() {
	if (logged_in() === true) {
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=home.php\">";
		exit();
	}
}
function protect_page() {
	if (logged_in() === false) {
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
		exit();
	}
}
function output_errors($errors) {
	return '<ul><li>' . implode('</li><li>', $errors). '</li></ul>';
}
?>
