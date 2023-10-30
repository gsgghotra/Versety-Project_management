<!-- <?php
require_once '../aps/init.php';
protect_page();
$projectid = $_POST['projectid'];
 $getprojects = mysqli_query($connection, "SELECT * FROM projects WHERE project_id='$projectid'") or die(mysqli_error($connection));
        while ($row = mysqli_fetch_assoc($getprojects)) {
            $project_id = $row['project_id'];
            $project_title = $row['project_name'];
            $project_info = $row['project_info'];
            $project_deadline = $row['project_deadline'];
  } 
  if ($getprojects == 1) {
  	echo "success";
  } else {
  	echo "The project has been deleted.";
  }

  ?> -->
