<?php
include('env.inc.php');
include('session.inc.php');
include('secured.inc.php');
include('database.inc.php');
include('valid.inc.php');

?>

<header>

<html lang="en">
<head>
    <meta charset="utf-8">
        <title>Database Project</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/sticky-footer-navbar.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>

<?php
if ($isLoggedIn):
?>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">Admin Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($page === "home") echo "active"?>">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if ($page === "documentation") echo "active"?>">
          <a class="nav-link" href="documentation.php">Help</a>
        </li>
        <li class="nav-item <?php if ($page === "view") echo "active"?>">
          <a class="nav-link" href="view.php">View Users</a>
        </li>
        <li class="nav-item <?php if ($page === "insert") echo "active"?>">
          <a class="nav-link" href="insert.php">Insert User</a>
        </li>
        <li class="nav-item <?php if ($page === "comments") echo "active"?>">
          <a class="nav-link" href="comments.php">View Comments</a>
        </li>
      </ul>
          <button type="button" class="btn btn-secondary" onclick="document.location.href='includes/logout.php';">Logout</button>

      </form>
    </div>
  </nav>
  <?php
  else:
    ?>
  <!-- Sourced from (and then edited) https://getbootstrap.com/docs/4.4/examples/sticky-footer-navbar/ -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">Admin Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
      </ul>
          <button type="button" class="btn btn-secondary" formaction="/login.php">Login</button>
      </form>
    </div>
  </nav>
    <?php
  endif;
  ?>
</header>
<div class="container">
  <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
  <div class="row d-flex justify-content-center"> <!-- https://mdbootstrap.com/docs/jquery/utilities/horizontal-align/-->
<div class="text-center col-18">