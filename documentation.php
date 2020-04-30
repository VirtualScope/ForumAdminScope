<?php
$secured = true;
$page = "documentation";
include("includes/header.inc.php");
?>


<main role="main" class="text-left">

  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Documentation</h1>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Adding a Student</h2>
        <p>To add a student, go to "Insert Users", type out their information, make sure the dropdown is set on "Normal" and hit the "Add Data" button. This will add the Student.</p>
      </div>
      <div class="col-md-6">
        <h2>Adding a Admin</h2>
        <p>To add a student, go to "Insert Users", type out their information, set the dropdown to "**Admin** (Danger)" and hit the "Add Data" button. This will add the Admin.</p>
      </div>
      <div class="col-md-6">
        <h2>Deleting a User</h2>
        <p>Go to "View Users", hit the Next/Back page until you find the user, and hit Delete.</p>
      </div>
      <div class="col-md-6">
        <h2>Deleting a Comment</h2>
        <p>Go to "View Comments", hit the Next/Back page until you find the comment, and hit Delete.</p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>
<?php
include("includes/footer.inc.php");
?>