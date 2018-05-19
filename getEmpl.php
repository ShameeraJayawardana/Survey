<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$q = $_REQUEST["q"];

$sql = "SELECT * FROM member WHERE name = '$q'";
$row_set = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($row_set);

echo json_encode($row['emplNo']);

?>