<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$sql = "SELECT * FROM doc_rtn";
$row_set = mysqli_query($conn, $sql);

$q = $_REQUEST["q"];

$hintArr = array();
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $len = strlen($q);
    while ($row = mysqli_fetch_array($row_set)) {
        if (stristr($q, substr($row['doc_id'], 0, $len))) {
            array_push($hintArr, $row['doc_id']);
        }
    }
}

echo json_encode($hintArr);

//foreach ($hintArr as $var) {
//    echo $var;
//}
?>