<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$_SESSION["id"] = NULL;
$_SESSION["email"] = NULL;
redirect_to("login.php");
?>