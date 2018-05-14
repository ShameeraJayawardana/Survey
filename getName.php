<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>

<?php

$q = $_REQUEST["q"];
$p = "";

$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$result_set = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result_set);

$sql = "SELECT * FROM member WHERE district = '$result[district]' AND des = '$q'";
$row_set = mysqli_query($conn, $sql);

$nameArr = array();
while ($row = mysqli_fetch_assoc($row_set)){
    array_push($nameArr, $row['name']);
}

array_unshift($nameArr, $p);

echo json_encode($nameArr);

?>
