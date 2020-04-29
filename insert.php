<?php
$secured = true;
$page = "insert";
include('includes/header.inc.php');
$postReturn = getPostInputs($Database);
$err;
$happyMessage;

if (isset($_SESSION["error"]))
    {
        $err = $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    else if (isset($postReturn) && $postReturn !== "")
        $err = $postReturn;
    else if (isset($postReturn) && $postReturn === "")
        $happyMessage = "Data Submitted!";



?>
<div class="row d-flex justify-content-center"> <!-- https://mdbootstrap.com/docs/jquery/utilities/horizontal-align/-->
    <div class="text-center col-18">
        <h1 class="mt-5">Use This Page to Insert Data</h1>
            <?php if (isset($err))
                echo "<div class=\"alert alert-danger\" role=\"alert\">$err</div>";
            else if (isset($happyMessage))
                echo "<div class=\"alert alert-success\" role=\"alert\">$happyMessage</div>"; 
            ?>
<?php # ***START*** SOURCED FROM INTERNET APPLICATION CLASS https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48 ?>
        <form class="form-signin" method="post" action="insert.php">
            <br>
            <div class="row">
                <div class="col">
                <input type="text" name="inputFirstName" class="form-control" placeholder="First name" required pattern="<?php echo substr($GLOBALS['FIRST_NAME_VALID'],1,-1);?>" title="<?php echo $GLOBALS['FIRST_NAME_INVALID_ERROR'];?>"
                    <?php
                        if (isset($_SESSION) && isset($_SESSION['firstNameRemember']))
                        {
                            echo "value=" . $_SESSION['firstNameRemember'];
                        }
                    ?>
                >
                </div>
                <div class="col">
                <input type="text" name="inputLastName" class="form-control" placeholder="Last name" required pattern="<?php echo substr($GLOBALS['LAST_NAME_VALID'],1,-1);?>" title="<?php echo $GLOBALS['LAST_NAME_INVALID_ERROR'];?>"
                    <?php
                        if (isset($_SESSION) && isset($_SESSION['lastNameRemember']))
                        {
                            echo "value=" . $_SESSION['lastNameRemember'];
                        }
                    ?>
                >
                </div>
            </div>
            <br>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <br>
            <input type="password" id="inputPassword" name="inputPassword" required pattern="<?php echo substr($GLOBALS['PASSWORD_VALID'],1,-1);?>" title="<?php echo $GLOBALS['PASSWORD_INVALID_ERROR'];?>" class="form-control" placeholder="Password" required="">
            <br>
            <select id="isAdmin" name="isAdmin" class="form-control" tab-index="-1">
                <option value="0" selected>Normal User</option>
                <option value="1">**Admin** (Danger! This grants the user priviledge to delete ANY class!)</option> <!--Intentionally dropdown to help prevent mistakes!-->
            </select>
            <br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-success">
                <input type="radio" name="isActive" id="activeAccount" autocomplete="off" checked value="yes"> Active Account
            </label>
            <label class="btn btn-outline-danger">
                <input type="radio" name="isActive" id="disabledAccount" autocomplete="off" value="no"> Disabled Account
            </label>
            </div>
            <br>
            <br>
            <textarea class="form-control" placeholder="About Me" id="notes" name="notes" rows="3" required pattern="<?php echo substr($GLOBALS['NOTES_VALID'],1,-1);?>" title="<?php echo $GLOBALS['NOTES_INVALID_ERROR'];?>"></textarea>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add Data</button>
        </form>
<?php # ***END***   SOURCED FROM INTERNET APPLICATION CLASS https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48 ?>


<?php
function getPOSTInputs($Database)
{
  # ***START*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  $inputFirstName = $inputLastName = $inputEmail = $inputPassword = $notes = "";
  $isAdmin = 0;
  $isActive = 'yes';
  $results = [];
  # ***END*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48

    if (!isset($_POST['isActive']) || !isset($_POST['isAdmin']) || !isset($_POST['inputFirstName']) || !isset($_POST['inputLastName']) || !isset($_POST['inputEmail']) || !isset($_POST['inputPassword']) || !isset($_POST['notes']))
        return; # Null return means it didn't get a request.
  # ***START*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  if (isset($_POST['inputFirstName'])) $inputFirstName = trim($_POST['inputFirstName']);
  if (isset($_POST['inputLastName'])) $inputLastName = trim($_POST['inputLastName']);
  if (isset($_POST['inputEmail'])) $inputEmail = trim($_POST['inputEmail']);
  if (isset($_POST['inputPassword'])) $inputPassword = trim($_POST['inputPassword']);
  if (isset($_POST['notes'])) $notes = trim($_POST['notes']);
    # ***END*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  if (isset($_POST['isAdmin'])) $isAdmin = intval($_POST['isAdmin']);
  if (isset($_POST['isActive'])) $isActive = trim($_POST['isActive']);
  # ***START*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  array_push($results, boolval(preg_match($GLOBALS["FIRST_NAME_VALID"], $inputFirstName)));
  array_push($results, boolval(preg_match($GLOBALS["LAST_NAME_VALID"], $inputLastName)));
  array_push($results, boolval(filter_var($inputEmail, FILTER_VALIDATE_EMAIL)));
  array_push($results, boolval(preg_match($GLOBALS['PASSWORD_VALID'], $inputPassword)));
  array_push($results, boolval(preg_match($GLOBALS['NOTES_VALID'], $notes)));
  # ***END*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  array_push($results, boolval(preg_match("/^(0)|(1)|(2)$/", $isAdmin)));
  array_push($results, boolval(preg_match("/^(yes)|(no)$/", $isActive)));
  # ***START*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  if (in_array(false, $results) === true) return "Invalid input in one or more fields!"; # Client side gives instant feedback, this is to stop bad clients.
  # ***END*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  $worked = $Database->add_user($inputFirstName, $inputLastName, $inputEmail, $inputPassword, $isAdmin, $isActive, $notes);
  if ($worked) return ""; # Just return if it works.
  else return "Database Error"; # Error.

}
include("includes/footer.inc.php");
?>