<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>

<?php

$q = $_REQUEST["q"];
$p = "";

//$user = $_SESSION["email"];
//$query = "SELECT * FROM member WHERE email = '$user'";
//$result_set = mysqli_query($conn, $query);
//$result = mysqli_fetch_assoc($result_set);

$sql = "SELECT * FROM member WHERE name = '$q'";
$row_set = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($row_set);

$sql2 = "SELECT * FROM issue WHERE receiver = '$row[email]' AND status = 1";
$row_set2 = mysqli_query($conn, $sql2);
$nameArr = array();
while ($row2 = mysqli_fetch_assoc($row_set2)){
    array_push($nameArr, $row2['doc_id']);
}

$sql3 = "SELECT * FROM req WHERE name = '$row[email]' AND status = 'Done' AND availability = 'locked'";
$row_set3 = mysqli_query($conn, $sql3);
$nameArr2 = array();
while ($row3 = mysqli_fetch_assoc($row_set3)){
    array_push($nameArr2, $row3['number']);
}

$merged_array = array();
$merged_array = array_merge($nameArr, $nameArr2);

echo json_encode($merged_array);

?>