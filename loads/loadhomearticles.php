<?php require_once '../database/init.php';
$getposts = mysqli_query($connection, "SELECT * FROM articles ORDER BY article_time ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
            $article_id = $row['article_id'];
            $title = $row['article_title'];
            $article_text = $row['article_text'];
            $article_by = $row['article_by'];
            $article_time = $row['article_time'];
            $time_passed = time_passed($article_time);


  $getuserd = mysqli_query($connection, "SELECT * FROM users ORDER BY user_id='$article_by' ASC") or die(mysqli_error($connection));
            while ($row = mysqli_fetch_assoc($getuserd)) {
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                      }

 ?>

<div class="each_article">
    <div class="article_pic">
      <img class="article_pic_inside" id="postimg<?php echo $article_id ?>" src="http://www.telegraph.co.uk/content/dam/football/2017/09/06/TELEMMGLPICT000139427014_trans_NvBQzQNjv4BqYGGZxE-BlFTHPG6FlsHtqzoe3yVowsApoK4-KBfJXPY.jpeg?imwidth=1400" alt="<?php echo $article_title; ?>">

    </div>
    <table>
      <tr>
        <td width="20%"><img class="article_profile" src="http://gsghotra.weebly.com/uploads/5/0/9/6/50968517/7428290_orig.jpg"></td>
        <td class="article_title"><?php echo $first_name.' '.$last_name;?></td>
      </tr>
    </table>
    <table>
      <tr>
        <td class="article_timing"><?php echo $time_passed ?></td>
      </tr>
      <tr>
        <td class="article_main"><?php echo $title; ?></td>
      </tr>
    </table>


</div>
<div class="article_menu">

  <button class="blike">Like</button>
  <button>Reply</button>
  <button>Repost</button>
</div>
<?php } ?>
