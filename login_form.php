<?php
$secured = false;
$page = "login";
include('includes/header.inc.php');
?>
<?php
if (isset($_POST['inputEmail']) && isset($_POST['inputPassword']))
{
  $email = $_POST['inputEmail'];
  $passwd = $_POST['inputPassword']; # Someone scanitize this please
  $result = $Database->check_credentials($email, $passwd);
  if ($result === null)
  {
    echo "<br><br><br>
    <div class=\"alert alert-danger\" role=\"alert\">Invalid Credentials!</div>";
  } else if ($result['success'] === true)
  {
    echo "<br><br><br><br><br>";
    $_SESSION['isLoggedIn'] = true;
    header("location: index.php");
  }
  else
  {
    echo "<br><br><br>
    <div class=\"alert alert-danger\" role=\"alert\">A Database Error Happened!</div>";
  }
}
else echo "<br><br><br><br><br>";
?>
<form class="form-signin" class="text-center" action="login_form.php" method="POST"> <!-- https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <br><label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Password" required="">
      <br><button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

<?php
include("includes/footer.inc.php");
?>