<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$_query = "SELECT * FROM district";
$_row_set = mysqli_query($conn, $_query);

$q1 = "SELECT * FROM division";
$r_set = mysqli_query($conn, $q1);
$role = "";

if (isset($_POST['submit'])){
    if($_POST['newDes'] == "SNR. Supdt. of Surveyor"){
        $role = "snrss";
    }elseif($_POST['newDes'] == "Supdt. of Surveyor"){
        $role = "ss";
    }elseif($_POST['newDes'] == "M.T.O"){
        $role = "admin";
    }elseif($_POST['newDes'] == "Surveyor"){
        $role = "member";
    }
    $update = "UPDATE member SET des = '$_POST[newDes]', role = '$role' WHERE emplNo = '$_POST[empl]'";
    mysqli_query($conn, $update);

    $update2 = "UPDATE addmembers SET des = '$_POST[newDes]' WHERE emplNo = '$_POST[empl]'";
    mysqli_query($conn, $update2);
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Members</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/chargeList.css" rel="stylesheet">
    <script>
        var res = [];
        var arrayValue = [];
        function showHint(str) {
            arrayValue.push(str);
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

                        var sel = document.getElementById('nameList');
                        sel.innerHTML = null;
                        for (var i = 0; i < res.length; i++) {
                            var opt = document.createElement('option');
                            opt.innerHTML = res[i];
                            opt.value = res[i];
                            sel.appendChild(opt);
                        }
                    }
                };
                if (arrayValue.length == 1) {
                    xmlhttp.open("GET", "getVal.php?q=" + arrayValue[0], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 2) {
                    xmlhttp.open("GET", "getVal.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1], true);
                    xmlhttp.send();
                }
            }
        }
    </script>
    <script>
        var res2 = null;
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
                        res2 = eval("(" + this.responseText + ")");
                        console.log(res2);

                        var empl = document.getElementById('empl');
                        empl.value = res2;
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
<div class="content-wrapper">
    <br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>Promote Employees</h3>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="promoteMembers.php" method="post">
                        <div class="form-group">
                            <label>Current Designation</label>
                            <select class="form-control" name="curDes" onchange="showHint(this.value);">
                                <option value="">Select...</option>
                                <option value="SNR. Supdt. of Surveyor">SNR. Supdt. of Surveyor</option>
                                <option value="Supdt. of Surveyor">Supdt. of Surveyor</option>
                                <option value="M.T.O">M.T.O</option>
                                <option value="Surveyor">Surveyor</option>
                            </select><br/>
                            <label>District</label>
                            <select class="form-control" name="district" onchange="showHint(this.value);">
                                <option value="">Select...</option>
                                <?php while ($_row = mysqli_fetch_assoc($_row_set)) { ?>
                                    <option value="<?php echo $_row['dist_code']; ?>"><?php echo $_row['dist_nm']; ?></option>
                                <?php } ?>
                            </select><br/>
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Name</label>
                                    <select class="form-control" name="name" required id="nameList" onchange="selectName(this.value);">
                                        <option value="">Select...</option>
                                    </select><br/>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Number</label>
                                    <input type="text" readonly class="form-control"
                                           placeholder="XXXX" name="empl" id="empl">
                                </div>
                            </div>
                            <label>New Designation</label>
                            <select class="form-control" name="newDes">
                                <option value="">Select...</option>
                                <option value="SNR. Supdt. of Surveyor">SNR. Supdt. of Surveyor</option>
                                <option value="Supdt. of Surveyor">Supdt. of Surveyor</option>
                                <option value="M.T.O">M.T.O</option>
                                <option value="Surveyor">Surveyor</option>
                            </select><br/>
                            <input type="submit" class="btn btn-outline-dark" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
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



