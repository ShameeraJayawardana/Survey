<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$sql = "SELECT * FROM doc_rtn WHERE status = 'available'";
$row_set = mysqli_query($conn, $sql);

$q = $_REQUEST["q"];

$hintArr = array();
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $len = strlen($q);
    if(!empty($hintArr)){
        unset($hintArr);
    }
    while ($row = mysqli_fetch_array($row_set)) {
        if (stristr($row['doc_id'], $q)) {
            array_push($hintArr, $row['doc_id']);
        }
    }
}

echo json_encode($hintArr);

//foreach ($hintArr as $var) {
//    echo $var;
//}
?>