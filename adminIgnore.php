<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$id = $_GET['id'];
$name = $_GET['name'];
//echo $name;
$availability = 'locked';
$query = "UPDATE req SET availability='$availability' WHERE id = '$id'";
mysqli_query($conn, $query);
redirect_to("done.php?name=".$_GET['name']);
?>
