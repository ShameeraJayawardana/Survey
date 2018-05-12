<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$row_set = mysqli_query($conn, $query);
$output = array();
while($row = mysqli_fetch_assoc($row_set)){
    $output[] = $row;
}

echo json_encode($output);
?>