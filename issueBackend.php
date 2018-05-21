<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php

if (isset($_POST['download'])) {
    $date = date("Y-m-d h-i-sa");
    $sql = "SELECT * FROM issue WHERE issue_no = '$_POST[issueNo]'";
    $re_set = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($re_set);

    $issuer = $result['issuer'];
    $q3 = "SELECT * FROM member WHERE email = '$issuer'";
    $r_set3 = mysqli_query($conn, $q3);
    $r3 = mysqli_fetch_assoc($r_set3);

    $receiver = $result['receiver'];
    $q = "SELECT * FROM member WHERE email = '$receiver'";
    $r_set = mysqli_query($conn, $q);
    $r = mysqli_fetch_assoc($r_set);


    $_file = 'Issued_documents_'.$result['datetime'] . '.csv';
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $_file . '";');
    $fp = fopen("php://output", 'w');


    $title = 'Issue of Documents';
    fwrite($fp, "{$title}\n");
    fwrite($fp, "My No   .{$_POST['issueNo']}\n");
    fwrite($fp, "Date Issued   .{$result['datetime']}\n\n\n");

    $n = 0;

    $header = "Documents";
    fwrite($fp, "{$header}\n");

    while ($result = mysqli_fetch_assoc($re_set)) {
        $n++;
        fwrite($fp, "{$result['doc_id']}\n");
    }

    fwrite($fp, "\n\n");

    $footer = "Above Documents were issued by me,,,,,, Above Documents were received by me";
    fwrite($fp, "{$footer}\n\n");

    fwrite($fp, "{$r3['name']},,,,,,{$r['name']}\n");

    fclose($fp);
    if (file_exists($_file)) {

        fpassthru($fp);
    }
}
?>