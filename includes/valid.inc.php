<?php # THIS WHOLE FILE IS BY ME, SOURCED FROM https://github.com/VirtualScope/AngryNerds-Master/blob/master/includes/validate.php , Github issues made it so my name didn't show up as comitting it, but 100% of it is made by me!
# Note: this does not support the global flag. The underlying code would need modification.

$GLOBALS['FIRST_NAME_VALID'] = "/^[A-Z][A-z]+$/";
$GLOBALS['LAST_NAME_VALID'] = "/^[A-Z][A-z]+$/";
$GLOBALS['FIRST_NAME_INVALID_ERROR'] = # Same as below.
$GLOBALS['LAST_NAME_INVALID_ERROR'] = "Acceptable Characters: Capital or lowercase with the first letter capitalized.";

$GLOBALS['PASSWORD_VALID'] = "/^(\w|\d|[#%^&?.!,()]){8,99}$/";  
# Please don't change this on a live site without validating the current SQL passwords still match the new format.

$GLOBALS['PASSWORD_INVALID_ERROR'] = "Acceptable Characters: Letters, Numbers, and common symbols.";

$GLOBALS['NOTES_VALID'] = "/^(\s|\w|\d|[#%^&?.!,()]){0,999}$/";
$GLOBALS['NOTES_INVALID_ERROR'] = "Can only contain letters, numbers, spaces, and a few common symbols.";
?>