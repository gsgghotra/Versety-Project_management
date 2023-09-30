<?php require_once 'init.php'; ?>
<html>
<body>
	<div id="tablehomeset">
  <form action="home.php" method="post">
    <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['calender'] == 'calender30') { echo "view_btn_active_left"; } else {echo "view_btn_left";}?>
     name="submitmonth">Month</button></td>
  </form>
  <form action="home.php" method="post">
    <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['calender'] == 'calender07') { echo "view_btn_active_right"; } else {echo "view_btn_right";}?>
     name="submitweek">Week</button></td>
  </form>

</div></body></html>