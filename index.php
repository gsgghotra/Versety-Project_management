<?php
// Include the necessary PHP file and check if the user is already logged in
require_once 'extras/head.php';
logged_in_redirect();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Title -->
    <title>Versety Calendar</title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Help yourself and make your life more organized with Versity. Many advanced features to help you remind important events.">
    <meta name="keywords" content="Versety, Calendar, Project Management, Work Reminder, share events">
    <meta name="author" content="Gurjeet Singh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Links -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="css/icon/style.css"/>
</head>
<body>
    <header>
        <div class="lognav">
            <h3><span><img src="css/versety.png" class="logoimg" onclick="location.href='index.php'"/></span></h3>
        </div>
    </header>
    <nav>
        <ul>
            <li onclick="location.href='index.php'"><span class="icon-home"></span></li>
        </ul>
    </nav>
    <main>
        <div id="container">
            <div class="indexcon">
                <?php require_once 'loads/register.php'; ?>
                <?php require_once 'loads/aside.php'; ?>
            </div>
            <div class="indexbanner">
                <div class="boxpeve">
                    <div class="public_e">
                        <div class="public_el">
                            <img src="calendar/img/home.jpg" width="100%" alt="VERSETY banner">
                        </div>
                    </div>
                </div>
                <div class="boxfeedback">
                    <div class="inside">
                        <!-- YOUR FEEDBACK IS IMPORTANT FOR FURTHER IMPROVEMENTS -->
                        VERSETY Forum - Your questions and your views among your friend list.
                    </div>
                    <button onclick="window.location.href='../index.php'">Download</button>
                </div>
                <div class="boxinfo">
                    <div class="inside">
                        <?php
                            // Query to count the number of users and events
                            $countu = "SELECT * FROM users";
                            $resultuser = mysqli_query($connection, $countu);
                            $resultu = $resultuser->num_rows;
                            $countp = "SELECT * FROM posts";
                            $resultposts = mysqli_query($connection, $countp);
                            $resultp = $resultposts->num_rows;
                        ?>
                        <?php echo $resultu; ?> Users<br/>
                        <?php echo $resultp; ?> Events
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<!-- Footer -->
<?php require_once 'extras/footer.php'; ?>
</body>
</html>
