<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php

if (isset($_POST['download'])) {
    $date = date("Y-m-d h-i-sa");
    $sql = "SELECT * FROM receiv WHERE receiv_no = '$_POST[receiveNo]'";
    $re_set = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($re_set);


    $_file = 'Returned_documents_'.$result['datetime'] . '.csv';

    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $_file . '";');
    $fp = fopen("php://output", 'w');


    $title = 'Return of Documents';
    fwrite($fp, "{$title}\n");
    fwrite($fp, "My No   {$_POST['receiveNo']}\n");
    fwrite($fp, "Date returned   {$result['datetime']}\n\n\n");

    $n = 0;

    $header = "Documents";
    fwrite($fp, "{$header}\n");

    $query = "SELECT * FROM receiv WHERE receiv_no = '$_POST[receiveNo]'";
    $re_set1 = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_assoc($re_set1)) {
        $n++;
        fwrite($fp, "{$r['doc_id']}\n");
    }

    fwrite($fp, "\n\n");

    $footer = "Above Documents were returned by me,,,,,, Above Documents were received by me";
    fwrite($fp, "{$footer}\n\n");

    fwrite($fp, "{$result['sender']},,,,,,{$result['receiver']}\n");

    fclose($fp);
    if (file_exists($_file)) {
        fpassthru($fp);
    }
}
?>