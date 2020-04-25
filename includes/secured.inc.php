<?php if (isset($secured) && $secured === true && $_SESSION['loggedIn'] === false)
{
    exit();
}
?>