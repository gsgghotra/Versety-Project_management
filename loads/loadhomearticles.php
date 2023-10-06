<?php
// Include the initialization file (assuming it sets up database connections and other necessary configurations)
require_once '../database/init.php';

// Query the database to get articles from the 'articles' table, ordered by 'article_time' in ascending order
$getposts = mysqli_query($connection, "SELECT * FROM articles ORDER BY article_time ASC") or die(mysqli_error($connection));

// Loop through the query results and display each article
while ($row = mysqli_fetch_assoc($getposts)) {
    $article_id = $row['article_id'];
    $title = $row['article_title'];
    $article_text = $row['article_text'];
    $article_by = $row['article_by'];
    $article_time = $row['article_time'];

    // Calculate and format the time passed since the article was posted using the 'time_passed' function
    $time_passed = time_passed($article_time);

    // Query the database to get user data for the article author
    $getuserd = mysqli_query($connection, "SELECT * FROM users WHERE user_id='$article_by'") or die(mysqli_error($connection));

    // Loop through the user query results (assuming there's only one result)
    while ($row = mysqli_fetch_assoc($getuserd)) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    }
?>

<div class="each_article">
    <div class="article_pic">
        <!-- Display article image (you may want to replace this URL with the actual image URL) -->
        <img class="article_pic_inside" id="postimg<?php echo $article_id ?>" src="http://www.telegraph.co.uk/content/dam/football/2017/09/06/TELEMMGLPICT000139427014_trans_NvBQzQNjv4BqYGGZxE-BlFTHPG6FlsHtqzoe3yVowsApoK4-KBfJXPY.jpeg?imwidth=1400" alt="<?php echo $article_title; ?>">
    </div>
    <table>
        <tr>
            <td width="20%">
                <!-- Display the author's profile picture (you may want to replace this URL with the actual image URL) -->
                <img class="article_profile" src="http://gsghotra.weebly.com/uploads/5/0/9/6/50968517/7428290_orig.jpg">
            </td>
            <td class="article_title">
                <!-- Display the author's full name -->
                <?php echo $first_name.' '.$last_name; ?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="article_timing">
                <!-- Display the time passed since the article was posted -->
                <?php echo $time_passed; ?>
            </td>
        </tr>
        <tr>
            <td class="article_main">
                <!-- Display the article title -->
                <?php echo $title; ?>
            </td>
        </tr>
    </table>
</div>
<div class="article_menu">
    <!-- Buttons for actions like 'Like,' 'Reply,' and 'Repost' -->
    <button class="blike">Like</button>
    <button>Reply</button>
    <button>Repost</button>
</div>

<?php
// Close the while loop
}
?>
