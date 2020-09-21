<?php
require_once('./include/mysqli_connect.php');

$actionName = $_POST["action"];
if($actionName == "selectPost"){

$query = "SELECT * FROM li_ajax_post_load ORDER BY post_id DESC LIMIT ".$showPostFrom.",".$showPostCount;
$result = mysqli_query($con, $query);

$rowCount = mysqli_num_rows($result);

if($rowCount > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tutorial_id = $row["post_id"]; ?>
        <div class="li-post-group">
			<h2 class="li-post-title"><?php echo ucfirst($row["post_title"]); ?></h2>
			<p class="li-post-desc"><?php echo ucfirst($row["post_desc"]); ?></p>
		</div>
<?php } ?>
<?php 
    }
}
?>