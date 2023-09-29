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

 
</div>
<div class="indexbanner">
<div class="boxpeve">
<div class="public_e">
    <div class="public_el">
        <img src="calendar/img/home.jpg" width="100%" alt="VERSETY banner">
    </div>

</div>
</div>
<div class="boxinfo">
<div class="inside" id="task_list">
  <?php
    $countp = mysqli_query($connection, "SELECT * FROM saves WHERE id = 1");
    while ($row = mysqli_fetch_assoc($countp)) 
{
  $db_text = $row['text_field'];
}
  ?>
  <?php echo $db_text; ?>
</div> 
</div>
<div class="boxfeedback">
<div class="inside">
  <span style="display: block; color: black;" class="authaction"></span>
  <label for="fname">First Name</label>
  <textarea style="width: 100%; height: 200px;" id="fname">
    <?php echo $db_text; ?>
  </textarea>
</div>
</div>


</div>
<!-- heading of the body -->

<!-- Nav of the body -->

</main>

</div>
<!-- Footer -->
<?php require_once 'extras/footer.php';?>
<script type="text/javascript">
  set_task();
  function set_task(){
    $("#task_list").load(location.href + " #task_list");
    $.post('autosave/save.php',
          {fname: $('#fname').val()},
           function(data){
            $('.authaction').text('Saving...');
          if (data == 'success'){
           $('.authaction').text('All changes Saved.');
          } else if (data == "fail"){
           $('.authaction').text('An error occured while saving the text');
          }

          });
    setTimeout(set_task, 1000);

  }



</script>
</body>
</html>
