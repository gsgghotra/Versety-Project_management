<?php require_once 'extras/head.php';?>
<!DOCTYPE html>
<html>
  <head>
  <!-- Title -->
    <title>Auto Save Calendar</title>
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

    </header>
    <nav>
      <ul>
        <li onclick="location.href='index.php'"><span class="icon-home"></span></li>
      </ul>
    </nav>


    <main>
    <div id="container">
    <div class="indexbanner">
      <div class="boxpeve">
        <div class="public_e">
          <!-- Hero Image -->
            <div class="public_el">
                <img src="calendar/img/home.jpg" width="100%" alt="VERSETY banner">
            </div>
        </div>
      </div>
      <div class="boxinfo">
      <div class="inside" id="task_list">
        <!-- -->
      </div> 
      </div>
      <div class="boxfeedback">
      <div class="inside">
        <span style="display: block; color: black;" class="authaction"></span>
        <label for="fname">Template</label>
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
