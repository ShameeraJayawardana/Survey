<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
$name = '';
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$_row_set = mysqli_query($conn, $query);
$_row = mysqli_fetch_assoc($_row_set);

$sql = "SELECT * FROM req WHERE district = '$_row[district]' AND name = '$name' AND status = 'Approved'";
$row_set = mysqli_query($conn, $sql);

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Request Documents</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/addDoc.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark">
        <div class="container">
            <?php while ($row = mysqli_fetch_assoc($row_set)) { ?>
                <div class="jumbotron">
                    <h5><?php echo $row['name']; ?></h5>
                    <span class="float-left">
                        Requests for <?php echo $row['number']; ?><br>
                        <span class="small float-right text-muted"><?php echo $row['time']; ?></span>
                    </span><br><br><br>
                    <span class="float-right">
                        <a class="btn btn-success" href="adminApprove.php?id=<?php echo urlencode($row['id']); ?>&name=<?php echo urlencode($row['name']); ?>">APPROVE</a>
                        <a class="btn btn-danger" href="adminReject.php?id=<?php echo urlencode($row['id']); ?>&name=<?php echo urlencode($row['name']); ?>">REJECT</a>
                    </span>               
                </div>
            <?php } ?>
            <a href="adminPanel.php" class="text-center text-primary">Go back to previous page</a>
        </div>
    </body>
</html>