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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Documents</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper" id="background">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <form action="reportsDownload.php" method="post">
                        <label>Category</label>
                        <select class="form-control" name="type">
                            <option>Select...</option>
                            <?php while ($r1 = mysqli_fetch_assoc($r_set1)) { ?>
                                <option value="<?php echo $r1['id']; ?>"><?php echo $r1['type']; ?></option>
                            <?php } ?>
                        </select><br/>
                        <h4><?php echo $msg; ?></h4>
                        <label>Sub Category</label>
                        <select class="form-control" name="sub_cat">
                            <option>Select...</option>
                            <?php while ($r2 = mysqli_fetch_assoc($r_set2)) { ?>
                                <option value="<?php echo $r2['sub']; ?>"><?php echo $r2['sub']; ?></option>
                            <?php } ?>
                        </select><br/>
                        <button class="btn btn-outline-dark" name="download"><img src="pics/csv_file.png"/> DOWNLOAD
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <div class="row">
        <?php include './src/components/footer.php'; ?>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="js/addDoc.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</div>
</body>

</html>
