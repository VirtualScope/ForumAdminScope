<?php
$page = intval($_GET['page']);
$delete_id = intval($_GET['delete_id']);
include('database.inc.php');
$returned = $Database->delete_user_by_id($delete_id);
header("Location: ../view.php?page=$page");
exit();
?>