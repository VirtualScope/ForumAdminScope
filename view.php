<?php
$secured = true;
$page = "view";
include('includes/header.inc.php');
$set_page;
$items_per_page = 4;

$max_number_of_pages = $Database->count_pages($items_per_page);
$back_button = true;
$next_button = true;


if (isset($_GET) && isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

if ($page === 0) $page = 1;
if ($page < 0)
{
  header("Location: view.php?page=1"); 
  exit();
}

$result = $Database->get_users($page, $items_per_page);
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
  header("Location: view.php?page=$max_number_of_pages"); 
  exit();
}

if ($page === 1) $back_button = false;
if ($page >= $max_number_of_pages) $next_button = false;

?>

<h1 class="mt-5">Use This Page to Manually View Data</h1><br><br>

<a role="button" style="margin-bottom: 10px" 
class="btn btn-<?php echo ($back_button) ? "primary" : "secondary active";?> btn-sm" <?php if(!$back_button) echo "disabled";?>
href="<?php echo "./view.php?page=" . ($page - 1)?>">Back</a>

<a role="button" style="margin-bottom: 10px" 
class="btn btn-<?php echo ($next_button) ? "primary" : "secondary active";?> btn-sm" <?php if(!$next_button) echo "disabled";?>
href="<?php echo "./view.php?page=" . ($page + 1)?>">Next</a>

<table class="table table-striped table-responsive text-center"> <!--https://getbootstrap.com/docs/4.0/content/tables/-->
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Admin</th>
      <th scope="col">Active</th>
      <th scope="col">Notes</th>

      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php 
    while($row = $result->fetch_assoc()):
      $id = $row['user_id'];?>
       <tr>
       <th><a class="btn btn-primary" href="update.php?id=<?php echo $id?>" role="button">Update</a></th>
          <td> <?php echo $id ?> </td>
          <td> <?php echo $row['email'] ?> </td>
          <td> <?php echo $row['fname'] ?> </td>
          <td> <?php echo $row['lname'] ?> </td>
          <td> <?php echo $row['admin'] ?> </td>
          <td> <?php echo $row['active'] ?> </td>
          <td> <?php echo $row['notes'] ?> </td>

          <td><a class="btn btn-primary btn-danger" href="includes/delete.inc.php?page=<?php echo $page;?>&delete_id=<?php echo $id;?>" role="button">Delete</a></td>
        </tr>
    <?php endwhile;?>
  </tbody>
</table>
<?php
include("includes/footer.inc.php");
?>