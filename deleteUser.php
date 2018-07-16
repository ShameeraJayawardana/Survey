<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$_query = "SELECT * FROM district";
$_row_set = mysqli_query($conn, $_query);

$q1 = "SELECT * FROM division";
$r_set = mysqli_query($conn, $q1);
$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$row_set = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($row_set);
$msg = "";
$delete_query = "";
$delete_query2 = "";
if (isset($_POST['submit'])) {
    $q3 = "SELECT * FROM member WHERE emplNo = '$_POST[empl]'";
    $r_set3 = mysqli_query($conn, $q3);
    $r3 = mysqli_fetch_assoc($r_set3);
    $num = mysqli_num_rows($r_set3);
    if ($num > 0) {
        if ($row["role"] == "snrss"){
            if ($r3['des'] == 'M.T.O') {
                $delete_query = "DELETE FROM member WHERE emplNo = '$_POST[empl]'";
                $delete_query2 = "DELETE FROM addmembers WHERE emplNo = '$_POST[empl]'";
                mysqli_query($conn, $delete_query);
                mysqli_query($conn, $delete_query2);
            }else{
                $msg = "You don't have permission to delete that user";
            }
        }elseif ($row["role"] == "sadmin"){
            $delete_query = "DELETE FROM member WHERE emplNo = '$_POST[empl]'";
            $delete_query2 = "DELETE FROM addmembers WHERE emplNo = '$_POST[empl]'";
            mysqli_query($conn, $delete_query);
            mysqli_query($conn, $delete_query2);
        }


    } else {
        $msg = "Invalid Employee Number";
    }
}
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
    <script>
        function inputValue(val) {
            //console.log("Value = ", val);
            if (val.length != 0){
                document.getElementById('submit').disabled = false;
            }else{
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper" id="background">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <form action="deleteUser.php" method="post">
                        <label>Employee Number</label>
                        <input type="text" required class="form-control"
                               placeholder="Enter the employee number" name="empl" oninput="inputValue(this.value);">
                        <span style="color: red;"><?php echo $msg; ?></span><br/>
                        <button class="btn btn-outline-danger" disabled name="submit" id="submit" onclick="return confirm('Are you sure you want to delete this user?');">DELETE USER
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
