<?php
session_start();
ob_start();
header("Content-type: localhost/ghotra/chat");
date_default_timezone_set('UTC');

$db = mysqli_connect('localhost', 'root','','chat');
if(mysqli_connect_errno()){
	echo '<p>Error: Could not connect to databse.<br/>
	Please try again later.</p>';
	exit;
}
try{
	$currentTime = time();
	$session_id = session_id();

	$lastPoll = isset($_SESSION['last_poll']) ?
				$_SESSION['last_poll'] : $currentTime;

	$action = isset($_SERVER['REQUEST_METHOD']) &&
				($_SERVER['REQUEST_METHOD'] == 'POST')?
				'send' : 'poll';
switch ($action) {
	case 'send':
		
		$message = isset($_POST['message']) ? $_POST['message'] :'';
		$message = strip_tags($message);

		$query = "INSERT INTO chatlog (message, sent_by, date_created)VALUES(?, ?, ?)";

		$stmt = $db->prepare($query);
		$stmt->bind_param('ssi', $message, $session_id, $currentTime);
		$stmt->execute();

		print json_encode(['success' => true]);
		exit;
}
}
 catch(\Exception $e){
	print json_encode([
		'success' => false,
		'error' => $e->getMessage()
	]);
}
?>