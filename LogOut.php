<!--################ -SvendeProve- ######################-->
<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Refresh" content="8;url=index.php">
</head>

<body>

<p>Du er nu logget ud af systemet <a href="index.php">DJ Grunk</a></p>
<p>You will be redirected to the address in five seconds.</p>
<p>If you see this message for more than 8 seconds, please click on the link above!</p>

</body>

</html>
