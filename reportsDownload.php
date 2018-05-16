<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$q1 = "SELECT * FROM docTypes";
$r_set1 = mysqli_query($conn, $q1);

$q2 = "SELECT * FROM sub_category";
$r_set2 = mysqli_query($conn, $q2);

$email = $_SESSION["email"];
$q3 = "SELECT * FROM member WHERE email = '$email'";
$r_set3 = mysqli_query($conn, $q3);
$r3 = mysqli_fetch_assoc($r_set3);
$msg = "";
?>
<?php

if (isset($_POST['download'])){
    $date = date("Y-m-d h-i-sa");
    $sql = "SELECT * FROM doc_rtn WHERE district = '$r3[district]' AND doc_typ_id = '$_POST[type]' AND sub_category = '$_POST[sub_cat]'";
    $re_set = mysqli_query($conn, $sql);

    $_file = $date . '.csv';
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$_file.'";');
    $fp = fopen("php://output", 'w');


    $header = 'Index,District,FB Decode,Document ID,SD Code,Document Type,Document Name,Sheet,Sup,Insert,Block,OC,FC,VOL,PP Code,Court Number,Field Book,Sub Category,Remarks,Status';
    fwrite($fp, "{$header}\n");

    $n = 0;

    while ($result = mysqli_fetch_assoc($re_set)){
        $n++;
        fputcsv($fp, $result);
    }

    fclose($fp);
    if(file_exists($_file)) {

        fpassthru($fp);
    }
}
?>