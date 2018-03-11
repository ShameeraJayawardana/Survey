<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    //echo $name;
    $status = 'Dismissed';
    $query = "UPDATE req SET status='$status' WHERE id = '$id'";
    mysqli_query($conn, $query);
    redirect_to("send.php?name=".$_GET['name']);
?>
