<?php
$secured = true;
$page = "insert";
include('includes/header.inc.php');
?>
<h1 class="mt-5">Use This Page to Manually Insert Data</h1>
<?php if (isset($_SESSION["error"]))
{
    $err = $_SESSION["error"];
    echo "<div class=\"alert alert-danger\" role=\"alert\">$err</div>";
    unset($_SESSION["error"]);
} ?>

<?php
include("includes/footer.inc.php");
?>