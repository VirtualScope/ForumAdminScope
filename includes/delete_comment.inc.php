<?php
$page = intval($_GET['page']);
$delete_id = intval($_GET['delete_id']);
include('database.inc.php');
$returned = $Database->delete_comment_by_id($delete_id);
header("Location: ../comments.php?page=$page");
exit();
?>