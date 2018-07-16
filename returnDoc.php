<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'pending' GROUP BY name";
$_row_set = mysqli_query($conn, $q);

$id = 0;

$sql = "SELECT * FROM docTypes";
$result_set = mysqli_query($conn, $sql);

$user = $_SESSION['email'];

$_q = "SELECT * FROM req WHERE name = '$user' AND status = 'Done' AND availability = 'locked'";
$q_set = mysqli_query($conn, $_q);

$arr = array();
$return = array();

if (isset($_POST['submit'])) {
    foreach ($_POST['return'] as $value) {
        $update_query = "UPDATE req SET availability = 'returned' WHERE number='$value'";
        $qu = mysqli_query($conn, $update_query);

        $update = "UPDATE doc_rtn SET status = 'available' WHERE doc_id='$value'";
        $qu = mysqli_query($conn, $update);
    }
    header("Refresh:0");
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Return Documents</title>
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper">
    <br>
    <form action="returnDoc.php" method="post">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Return Document</h3>
                    </div>
                </div>
                <br><br>
                <table class="table table-responsive-lg table-hover">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Issued Date
                        </th>
                        <th>
                            Document ID
                        </th>
                        <th>
                            Put the tick for returns
                        </th>
                    </tr>
                    <?php while ($_r = mysqli_fetch_assoc($q_set)) { ?>
                        <?php $id = $id + 1; ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $_r['time']; ?>
                            </td>
                            <td>
                                <?php echo $_r['number']; ?>
                            </td>
                            <td>
                                <input type="checkbox" name="return[]"
                                       value="<?php echo htmlentities($_r['number']); ?>"/>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <input type="submit" value="SEND TO DSO" name="submit" class="btn btn-light"/>
            </div>
        </div>
    </form>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <div>
        <?php include 'src/components/footer.php'; ?>
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


