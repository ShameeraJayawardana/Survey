<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'Approved' GROUP BY name";
$_row_set = mysqli_query($conn, $q);

$q1 = "SELECT name,COUNT(name) AS count FROM req WHERE availability = 'returned' GROUP BY name";
$result_set1 = mysqli_query($conn, $q1);

$sql = "SELECT * FROM doc_rtn WHERE doc_index = 0";
$search = "";
$row = array();
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM doc_rtn WHERE doc_id LIKE '%$search%'";
}
$select_set = mysqli_query($conn, $sql);
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
        function focusField() {
            document.getElementById("search").style.width = '50%';
        }

        function blurField(str) {
            if (str.length == 0) {
                document.getElementById("search").style.width = '130px';
            } else {
                document.getElementById("search").style.width = '50%';
            }
        }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper" id="background">
    <br>
    <div class="row" id="content">
        <div class="col-md-12" style="height: 50%; display: flex; justify-content: center; align-items: flex-end;">
            <h1 id="title">SEARCH FOR DOCUMENTS</h1>
        </div>
        <div class="col-md-12"
             style="width: 100%; height: 50%;">
            <form method="post" action="search.php" style="width: 100%; display: flex; justify-content: center;">
                <input type="text" name="search" placeholder="Search..." id="search"
                       onfocus="focusField()" onblur="blurField(this.value)" required>
                <br>
                <input type="submit" class="btn btn-outline-dark" name="submit" value="SEARCH">
            </form>
        </div>
    </div>
    <div class="row" id="results">
        <?php while ($select = mysqli_fetch_assoc($select_set)) { ?>
            <?php
            $q = "SELECT * FROM req WHERE number = '$select[doc_id]'";
            $_rSet = mysqli_query($conn, $q);
            $r = mysqli_fetch_assoc($_rSet);
            ?>
            <div class="col-md-5" id="result">
                <div class="row">
                    <div class="col-md-4">
                        <p><?php echo $select['doc_id'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <?php if ($select['status'] == 'available') { ?>
                            <p>Available</p>
                        <?php } else { ?>
                            <p>Not Available</p>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <?php if ($select['status'] == 'locked') { ?>
                            <p>Requested by <?php echo $r['name']; ?></p>
                        <?php } else { ?>
                            <?php if (isset($_SESSION["id"])) { ?>
                                <?php if ($row["role"] == "ss" || $row["role"] == "member") { ?>
                                    <a href="requestDoc.php?id=<?php echo $select['doc_id']; ?>"
                                       class="btn btn-success">REQUEST</a>
                                <?php } else { ?>
                                    <p></p>
                                <?php } ?>
                            <?php } else { ?>
                                <p></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
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
