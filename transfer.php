<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$_query = "SELECT * FROM district";
$_row_set = mysqli_query($conn, $_query);

$q1 = "SELECT * FROM division";
$r_set = mysqli_query($conn, $q1);

$email = $_SESSION["email"];
$msg = "";

$select = "SELECT * FROM member WHERE role = 'snrss'";
$select_snrss = mysqli_query($conn, $select);

if (isset($_POST['submit'])) {
    $q3 = "SELECT * FROM member WHERE emplNo = '$_POST[empl]'";
    $r_set3 = mysqli_query($conn, $q3);
    $r3 = mysqli_fetch_assoc($r_set3);
    $num = mysqli_num_rows($r_set3);
    if ($num > 0) {
        if ($r3['des'] == 'SNR. Supdt. of Surveyor') {
            $update1 = "UPDATE member SET district = '$_POST[district]' WHERE emplNo = '$_POST[empl]'";
            mysqli_query($conn, $update1);

            $update2 = "UPDATE addmembers SET district = '$_POST[district]' WHERE emplNo = '$_POST[empl]'";
            mysqli_query($conn, $update2);
        } else {
            $msg = "You can only transfer SNR. Supdt. of Surveyors";
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
        var res = null;
        function selectName(str) {
            //console.log('aswssf', arrayValue);
            if (str.length == 0) {
                console.log("Value doesn't come");
                //document.getElementById("txtHint").value = "";
                return;
            } else {
                //console.log("Value comes");
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        res = eval("(" + this.responseText + ")");
                        console.log(res);

                        var empl = document.getElementById('empl');
                        empl.value = res;
                    }
                };
                xmlhttp.open("GET", "getEmpl.php?q=" + str, true);
                xmlhttp.send();

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
            <div class="col-md-6">
                <div class="form-group">
                    <form action="transfer.php" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Name</label>
                                <select required class="form-control" onchange="selectName(this.value);">
                                    <option value="">Select...</option>
                                    <?php while ($snrss = mysqli_fetch_assoc($select_snrss)) { ?>
                                        <option
                                            value="<?php echo $snrss['name'] ?>"><?php echo $snrss['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Employee Number</label>
                                <input type="text" readonly class="form-control"
                                       placeholder="XXXX" name="empl" id="empl">
                            </div>
                        </div>
                        <div class="row">
                            <span style="color: red;"><?php echo $msg; ?></span><br/>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>District</label>
                                <select class="form-control" name="district" required>
                                    <option value="">Select...</option>
                                    <?php while ($_row = mysqli_fetch_assoc($_row_set)) { ?>
                                        <option
                                            value="<?php echo $_row['dist_code']; ?>"><?php echo $_row['dist_nm']; ?></option>
                                    <?php } ?>
                                </select><br/>
                            </div>
                        </div>
                        <button class="btn btn-outline-dark" name="submit">
                            TRANSFER
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-6"></div>
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
