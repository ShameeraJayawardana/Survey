<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$result_set = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result_set);
$district = $result['district'];

//$sql = "SELECT * FROM doc_rtn WHERE district = '$district' AND status = 'available' AND doc_id NOT LIKE '%oc%'";
//$row_set = mysqli_query($conn, $sql);

$q = $_REQUEST["q"];
$q2 = NULL;
$p = "";
if (isset($_REQUEST["q2"])) {
    $q2 = $_REQUEST["q2"];
}

$sql = "SELECT * FROM member";

$hintArr = array();

if (!empty($q) && empty($q2)) {
    $sql = $sql." WHERE des = '$q'";
} elseif (!empty($q2) && empty($q)){
    $sql = $sql." WHERE district = '$q2'";
} elseif(!empty($q) && !empty($q2)){
    $sql = $sql." WHERE des = '$q' AND district = '$q2'";
}
$row_set = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($row_set)){
    array_push($hintArr, $row['name']);
}

array_unshift($hintArr, $p);

echo json_encode($hintArr);

?>