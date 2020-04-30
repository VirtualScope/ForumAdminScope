<?php
$secured = true;
$page = "update";
include('includes/header.inc.php');
$err;
$happyMessage;
if (isset($_REQUEST['id']) && preg_match("/^\d+$/", $_REQUEST["id"]))
{
    $_SESSION['id'] = $_REQUEST['id'];
}

if (isset($_SESSION["id"]) && preg_match("/^\d+$/", $_SESSION["id"])):

    $id = $_SESSION["id"];
    $postReturn = getPostInputs($id, $Database);
    if (isset($postReturn) && $postReturn !== "")
        $err = $postReturn;
    else if (isset($postReturn) && $postReturn === "")
    {
        $happyMessage = "Data Submitted!";
    }

?>

<div class="row d-flex justify-content-center"> <!-- https://mdbootstrap.com/docs/jquery/utilities/horizontal-align/-->
    <div class="text-center col-18">
        <h1 class="mt-5">Update Data</h1>
        <p1>Just fill in what you want changed, leave the rest blank!</p1>
            <?php if (isset($err))
                echo "<div class=\"alert alert-danger\" role=\"alert\">$err</div>";
            else if (isset($happyMessage))
                echo "<div class=\"alert alert-success\" role=\"alert\">$happyMessage</div>"; 
            ?>
<?php # ***START*** SOURCED FROM INTERNET APPLICATION CLASS https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48 ?>
        <form class="form-signin" method="post" action="update.php">
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" name="id" hidden="hidden" disabled="disabled" value="<?php echo $id; ?>">
                <input type="text" name="inputFirstName" class="form-control" placeholder="First name"  pattern="<?php echo substr($GLOBALS['FIRST_NAME_VALID'],1,-1);?>" title="<?php echo $GLOBALS['FIRST_NAME_INVALID_ERROR'];?>"
                    <?php
                        if (isset($_SESSION) && isset($_SESSION['firstNameRemember']))
                        {
                            echo "value=" . $_SESSION['firstNameRemember'];
                        }
                    ?>
                >
                </div>
                <div class="col">
                <input type="text" name="inputLastName" class="form-control" placeholder="Last name"  pattern="<?php echo substr($GLOBALS['LAST_NAME_VALID'],1,-1);?>" title="<?php echo $GLOBALS['LAST_NAME_INVALID_ERROR'];?>"
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
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address"  autofocus="">
            <br>
            <input type="password" id="inputPassword" name="inputPassword"  pattern="<?php echo substr($GLOBALS['PASSWORD_VALID'],1,-1);?>" title="<?php echo $GLOBALS['PASSWORD_INVALID_ERROR'];?>" class="form-control" placeholder="Password" >
            <br>
            <select id="isAdmin" name="isAdmin" class="form-control" tab-index="-1">
                <option value="0" selected>Normal User</option>
                <option value="1">**Admin** (Danger!)</option> <!--Intentionally dropdown to help prevent mistakes!-->
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
            <textarea class="form-control" placeholder="About Me" id="notes" name="notes" rows="3"  pattern="<?php echo substr($GLOBALS['NOTES_VALID'],1,-1);?>" title="<?php echo $GLOBALS['NOTES_INVALID_ERROR'];?>"></textarea>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update</button>
        </form>
<?php # ***END***   SOURCED FROM INTERNET APPLICATION CLASS https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48 ?>

    </div>
</div>


<?php
else:
    header("location: index.php?error=failed"); # Error!
endif;
include("includes/footer.inc.php");
function getPOSTInputs($id, $Database)
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
  if (isset($_POST['isAdmin'])) $isAdmin = intval($_POST['isAdmin']);
  if (isset($_POST['isActive'])) $isActive = trim($_POST['isActive']);
  if (in_array(false, $results) === true) return "Invalid input in one or more fields!"; # Client side gives instant feedback, this is to stop bad clients.
  # ***END*** CODE SOURCED FROM: https://github.com/VirtualScope/AngryNerds-Master/commit/d963dda463514c5a4c16fcd211ca68b07a3f4f48
  $worked = $Database->update_user_by_id($id, $inputFirstName, $inputLastName, $inputEmail, $inputPassword, $isAdmin, $isActive, $notes);
  if ($worked) return ""; # Just return if it works.
  else return "Database Error"; # Error.
}

?>