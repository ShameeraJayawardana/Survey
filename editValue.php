<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$query = "UPDATE member SET ".$_POST["name"] . " = '".$_POST["value"]."' WHERE id = '".$_POST["pk"]."'";
mysqli_query($conn, $query);

$query2 = "UPDATE addmembers SET ".$_POST["name"] . " = '".$_POST["value"]."' WHERE id = '".$_POST["pk"]."'";
mysqli_query($conn, $query2);
?>