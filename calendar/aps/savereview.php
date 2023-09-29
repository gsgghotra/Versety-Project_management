<?php
//File is not required 
if (isset($_POST['reviewsubmit'])) {
    $error = array();
    if (empty($_POST['re_name'])) {
        $error[] = 'Please Enter a your name. ';
    } else {
        $rename = $_POST['re_name'];
    }
    if (empty($_POST['re_email'])) {

        $error[] = 'Please Enter a Valid email ';
    } else {
        $reemail = $_POST['re_email'];
        $reviewtime ="001";
    }

    if (empty($error)){

            $query = "INSERT INTO `reviews` ( `userid`, `reviewtime`, `review`, `email`, `name`) VALUES ( '$userid', '$re_time', '$review','$email','$name')";

            $result = mysqli_query($connection, $query);
            echo "<script>window.location.assign(\"review.php\")</script>";
            if (!$result) {
                echo 'Query Failed ';
            }


 }
} // End of the main Submit conditional.
?>
