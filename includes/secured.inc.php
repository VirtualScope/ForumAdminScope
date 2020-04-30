<?php 

$isLoggedIn = false;

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) $isLoggedIn = true;

if (isset($secured) && $secured === true && !$isLoggedIn)
{
    header("location:login_form.php");
    exit();
}
else if ($secured === false && $isLoggedIn === true)
{
    header("location:index.php");
    exit();
}
?>