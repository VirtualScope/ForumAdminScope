<?php
$secured = false;
$page = "login";
include('includes/header.inc.php');
?>
<br><br><br><br><br>
<form class="form-signin" class="text-center"> <!-- https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <br><label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <br><button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

<?php
include("includes/footer.inc.php");
?>