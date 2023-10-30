<?php
require_once "../../database/connection.php";
$output = '';
if(isset($_POST["query"]))
{
	$project = $_POST['projectid'];
	$search = mysqli_real_escape_string($connection, $_POST["query"]);
	$query = "
	SELECT * FROM users 
	WHERE username LIKE '%".$search."%'
	";
}
else
{
	$project = $_POST['projectid'];
	$query = "
	SELECT * FROM users ORDER BY username";
}

$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
				$username = $row["username"];
				$userid = $row["id"];
				$f_name = $row["first_name"];
				$l_name = $row["last_name"];

				?>

								<div class="product_main"><!-- box for products -->
						<div class="project_c_upperbox">
						
							<div class="project_c_profile">
								<img src="https://s3.amazonaws.com/assets.mockflow.com/app/wireframepro/company/C726821c5be5d84627ed2ebc78b6b0c07/projects/D08c687b60d610d35d53b29928e429967/images/M791af51d7acf87cbcb41937da4a95e5d1532387050407"
								alt="Profile">
								
								<div class="project_c_profile_title">
								<?php echo "@".$username; ?>
								</div>

								<div class="project_c_profile_info">
								<span><?php echo $f_name." ".$l_name; ?></span>
								</div>	


				
							<?php
									$check_users = mysqli_query($connection, "SELECT * FROM project_shared WHERE project_id='$project' AND share_with='$userid'");
									if (mysqli_num_rows($check_users)==1) { ?>
												<button class="icon-bin1" onclick="update_profile('<?php echo $username ?>')"></button>
										<?php 	} else { ?>
											<select id="selectbox" class="selectbtn" data-selected="">
											  <option value="1">can edit</option>
											  <option value="2">can view</option>
											</select>

											<button onclick="update_profile('<?php echo $username ?>')">Share</button>
										<?php } ?>

								

							
																
							</div>

						</div>
						
					</div> <!-- END products box div-->



				<?php
	}
}
else
{
	echo '<p>No results.</p>';
}
?>