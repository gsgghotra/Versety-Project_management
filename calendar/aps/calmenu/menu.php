<form method="post" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
<div id="tablehomeset_center">
<select name="month" class="selmon">
<?php
$months = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
for ($x=1; $x <= count($months); $x++) {
  echo "<option class='seloption' value=\"$x\"";
  if ($x == $month) {
    echo " SELECTED";
  }
    echo ">".$months[$x-1]."";
} ?>
</select>
<select name="year" class="selyear">
<?php
for ($x=1980; $x<=2020; $x++){
  echo " <option";
  if ($x == $year) {
    echo " SELECTED";
  }
  echo ">$x";
}
?>
</select>
<input type="submit" class="selgo" value="Go!">

</form>
    <!---  testing previous button -->

<form method="post" class="deactiveform" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
<?php
  if ($month >= 1){ ?>
      <input type="hidden" name="month" value="
<?php echo $month - 1; ?>"/>
<input type="hidden" name="year" value="<?php echo $year; ?>"/>
<?php	}
  if ($month == 1){ ?>
      <input type="hidden" name="month" value="
<?php echo '12' ?>"/>

<input type="hidden" name="year" value="<?php echo $year - 1; ?>"/>
<?php	}
?>
<button type="submit"  class="selback" value="Next">Prev</button>
</form>
<!---  testing next button -->
<form method="post" class="deactiveform" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
<?php
  if ($month <= 12){ ?>
      <input type="hidden" name="month" value="
<?php echo $month + 1; ?>"/>
<input type="hidden" name="year" value="<?php echo $year; ?>"/>
<?php	}
  if ($month == 12){ ?>
      <input type="hidden" name="month" value="
<?php echo '1' ?>"/>
<input type="hidden" name="year" value="<?php echo $year + 1; ?>"/>
<?php	}
?>
<button type="submit" class="selnext" value="Next">Next</button>
</form>

</div>
<div class="pagination">
  <?php  if ($month <= 12){ ?> <input type="hidden" name="month" id="n_month" value="<?php echo $month + 1; ?>"/>
  <input type="hidden" name="year" id="n_year" value="<?php echo $year; ?>"/>
  <?php	} if ($month == 12){ ?> <input type="hidden" name="month" id="a_month" value="<?php echo '1' ?>"/>
  <input type="hidden" name="year" id="a_year" value="<?php echo $year + 1; ?>"/> <?php	} ?>
  <button type="submit" onclick="lo_auth()" name="submit">❮</button>
  <button type="submit" onclick="log_auth()" name="submit">❯</button>
</div>
