<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$data = [];
$sql = "SELECT doc_id FROM doc_rtn";
$row_set = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($row_set);
//$data = array_push($data, $row['doc_id']);

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    //$q = strtolower($q);
    //var_dump(print_r($row['doc_id']));
    $len = strlen($q);
    //foreach ($row as $name) {
    while ($row = mysqli_fetch_assoc($row_set)) {
        if (stristr($q, substr($row['doc_id'], 0, $len))) {
            if ($hint === "") {
                $hint = $row['doc_id'];
            } 
            else {
                $hint .= ", $row[doc_id]";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>