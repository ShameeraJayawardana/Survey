<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$q = $_REQUEST["q"];

$sql = "SELECT * FROM doc_rtn WHERE doc_id LIKE '%$q%'";
$row_set = mysqli_query($conn, $sql);

$hintArr = array();
if ($q !== "") {
    while ($row = mysqli_fetch_array($row_set)) {
        array_push($hintArr, $row);
    }
}

echo json_encode($hintArr);
?>