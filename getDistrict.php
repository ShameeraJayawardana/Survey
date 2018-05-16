<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>

<?php

$q = $_REQUEST["q"];
$p = "";

$sql = "SELECT * FROM division WHERE district_id = '$q'";
$row_set = mysqli_query($conn, $sql);
$districtArr = array();
while ($row = mysqli_fetch_assoc($row_set)){
    array_push($districtArr, $row['div_name']);
}

array_unshift($districtArr, $p);

echo json_encode($districtArr);

?>