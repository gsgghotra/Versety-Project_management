<?php require_once 'extras/head.php';
 logged_in_redirect() ?>
<!DOCTYPE html>
<html>
  <head>
  <!-- Title -->
    <title>Versety Calendar</title>
  <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Help yourself amd make your life more organised with Versity. Many advanced features to help you remind important events.">
    <meta name="keywords" content="Versety,Calendar,Project Managemnet, Work Reminder, share events">
    <meta name="author" content="Gurjeet Singh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/loginauth.js"></script>
  <!-- Specific meta tags -->

    <!-- CSS LINKS -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="css/icon/style.css"/>
  </head>
  <body>
    <header>
    <div class="lognav">
       <h3><span><img src="css/versety.png" class="logoimg" onclick="location.href='index.php'"/></span></h3>
  
    </div>
      <!--- <form action="extras/checking.php" method="post" class="nav_search">
              <input class="search_bar" type="text" name="name" placeholder="Search here...">
              <button class="search_go">Go</button>
          </form>
    <div class="menu">

      <ul>
        <li class="nav_first" onclick="location.href='index.php'">Tidings</li>
        <li class="nav_normal" onclick="location.href='index.php'">Pictures</li>
        <li class="nav_normal" onclick="location.href='index.php'">Forum</li>
        <li class="nav_last" onclick="location.href='Calendar'">Calendar</li>
      </ul>
    </div>
    -->

    </header>
    <nav>
      <ul>
        <li onclick="location.href='index.php'"><span class="icon-home"></span></li>
      </ul>
    </nav>
<main>
<div id="container">
<div class="indexcon">

    <?php  require_once 'loads/register.php';  ?>
    <?php  require_once 'loads/aside.php';  ?>
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

<!--YOUR FEEDBACK IS IMPORTENT FOR THE FURTHER IMPROVEMENTS -->
VERSETY Forum - Your questions and your views between your friend list.
</div>
<button onclick="window.location.href='../index.php'">
Download
</button>
</div>
<div class="boxinfo">
<div class="inside">
  <?php
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
<!-- heading of the body -->

<!-- Nav of the body -->

</main>
</div>
<!-- Footer -->
<?php require_once 'extras/footer.php';?>

</body>
</html>
