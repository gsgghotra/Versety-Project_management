<?php
	include_once("../database/connection.php");
    include_once("name_class.php");
    $name = $_POST['name'];   //add name attribute to input tag in HTML
    $myName = new Name();
    $myName->enterName($name); //to save in database/
    $name=$myName->showName(); //to retrieve from database. 
    echo $name;
    $getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$name'") or die(mysqli_error($connection));
	while ($row = mysqli_fetch_assoc($getposts)) {
			$id = $row['id'];
            $title = $row['title'];
            $type = $row['type'];
            echo $title."</br>";
        }
?>