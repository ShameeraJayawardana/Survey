<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php

$date = date("Y-m-d h-i-sa");
$q2 = "";
$_file = "";
$email = $_SESSION["email"];
$q1 = "SELECT * FROM member WHERE email = '$email'";
$r_set1 = mysqli_query($conn, $q1);
$r1 = mysqli_fetch_assoc($r_set1);

$q2 = "SELECT * FROM req WHERE name != '$email' AND status = 'Done' AND availability = 'locked'";
$r_set2 = mysqli_query($conn, $q2);
$_file = 'Charge_List_Of_All_Members_' . $date . '.csv';

header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachment; filename="' . $_file . '";');
$fp = fopen("php://output", 'w');

$header = 'Index,Email,District,Division,Document Name,Time,Remarks,Status,Availability';
fwrite($fp, "{$header}\n");

$n = 0;

while ($result = mysqli_fetch_assoc($r_set2)) {
    $n++;
    fputcsv($fp, $result);
}

fclose($fp);
if (file_exists($_file)) {

    fpassthru($fp);
}

?>
