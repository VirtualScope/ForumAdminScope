<?php
$secured = true;
$page = "comments";
include('includes/header.inc.php');
$set_page;
$items_per_page = 4;

$max_number_of_pages = $Database->count_pages_comments($items_per_page);
$back_button = true;
$next_button = true;


if (isset($_GET) && isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

if ($page === 0) $page = 1;
if ($page < 0)
{
  header("Location: comments.php?page=1"); 
  exit();
}

$result = $Database->get_comments($page, $items_per_page);
if ($result->num_rows === 0 && $page === 1) 
{
  echo "<script>alert(\"No data found!\");</script>";
  $_SESSION["error"] = "No Data Found! Please use this form to insert data!";
  header("Location: insert.php");
  exit();
}

if ($page > $max_number_of_pages)
{
  $set_page = false;
  header("Location: comments.php?page=$max_number_of_pages"); 
  exit();
}

if ($page === 1) $back_button = false;
if ($page >= $max_number_of_pages) $next_button = false;

?>

<h1 class="mt-5">Use This Page to Manually View Data</h1><br><br>

<a role="button" style="margin-bottom: 10px" 
class="btn btn-<?php echo ($back_button) ? "primary" : "secondary active";?> btn-sm" <?php if(!$back_button) echo "disabled";?>
href="<?php echo "./comments.php?page=" . ($page - 1)?>">Back</a>

<a role="button" style="margin-bottom: 10px" 
class="btn btn-<?php echo ($next_button) ? "primary" : "secondary active";?> btn-sm" <?php if(!$next_button) echo "disabled";?>
href="<?php echo "./comments.php?page=" . ($page + 1)?>">Next</a>

<table class="table table-striped table-responsive text-center"> <!--https://getbootstrap.com/docs/4.0/content/tables/-->
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Comment ID</th>
      <th scope="col">Comment</th>
      <th scope="col">Post Date</th>
      <th scope="col">User ID</th>
      <th scope="col">Friendly Name</th>

      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php 
    while($row = $result->fetch_assoc()):
      ?>
       <tr>
       <th></th>
        <td> <?php echo $row['comment_id'] ?> </td>
        <td> <?php echo $row['content'] ?> </td>
        <td> <?php echo $row['created_date'] ?> </td>
          <td> <?php echo $row['user_id'] ?> </td>
          <td> <?php echo $row['fname'] . " " . $row['lname'] ?> </td>

          <td><a class="btn btn-primary btn-danger" href="includes/delete_comment.inc.php?page=<?php echo $page;?>&delete_id=<?php echo $row['comment_id'];?>" role="button">Delete</a></td>
        </tr>
    <?php endwhile;?>
  </tbody>
</table>
<?php
include("includes/footer.inc.php");
?>