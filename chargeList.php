<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
//$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'pending' GROUP BY name";
//$_row_set = mysqli_query($conn, $q);

$sql = "SELECT * FROM docTypes";
$result_set = mysqli_query($conn, $sql);
?>
<?php
$q2 = "";
$email = $_SESSION["email"];
$q1 = "SELECT * FROM member WHERE email = '$email'";
$r_set1 = mysqli_query($conn, $q1);
$r1 = mysqli_fetch_assoc($r_set1);
if ($r1['role'] == 'ss' || $r1['role'] == 'admin') {
    $q2 = "SELECT * FROM req WHERE status = 'Done'";
} else if ($r1['role'] == 'member') {
    $q2 = "SELECT * FROM req WHERE name = '$email' AND status = 'Done'";
}
$r_set2 = mysqli_query($conn, $q2);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chargeable Documents</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/chargeList.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Online Document Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?php
            if (isset($_SESSION["id"])) {
                $user = $_SESSION["email"];
                $query = "SELECT * FROM member WHERE email = '$user'";
                $row_set = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($row_set);
                if ($row["role"] == "sadmin") {
                    ?>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="sadmin.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="addsnrss.php">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Add SNRSS</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="transfer.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Transfer SNRSS</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "snrss") {
                    ?>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="snrss.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="addmem.php">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Add Member</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="Transferss.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Transfer</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                           href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Manage documents</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a class="nav-link" href="addDoc.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="nav-link-text">Add document</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="updateDoc.php">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span class="nav-link-text">Update document</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                           data-parent="#exampleAccordion">
                            <i class="fa fa-exchange"></i>
                            <span class="nav-link-text">Transactions</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseMulti">
                            <li>
                                <a class="nav-link" href="issue.php">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <span class="nav-link-text">Issues</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="receiver.php">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <span class="nav-link-text">Receipt</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                } elseif ($row["role"] == "ss") {
                    ?>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="ss.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="addMembers.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text">Add Members</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="requestDoc.php">
                            <i class="fa fa-exclamation"></i>
                            <span class="nav-link-text">Request documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="returnDoc.php">
                            <i class="fa fa-undo"></i>
                            <span class="nav-link-text">Return documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Approve surveyor doc list</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "admin") {
                    ?>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="adminPanel.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                           href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Manage documents</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a class="nav-link" href="addDoc.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="nav-link-text">Add document</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="updateDoc.php">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span class="nav-link-text">Update document</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                           data-parent="#exampleAccordion">
                            <i class="fa fa-exchange"></i>
                            <span class="nav-link-text">Transactions</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseMulti">
                            <li>
                                <a class="nav-link" href="issue.php">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <span class="nav-link-text">Issues</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="receiver.php">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <span class="nav-link-text">Receipt</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="reports.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Reports</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "member") {
                    ?>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="requestDoc.php">
                            <i class="fa fa-exclamation"></i>
                            <span class="nav-link-text">Request documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="returnDoc.php">
                            <i class="fa fa-undo"></i>
                            <span class="nav-link-text">Return documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Home">
                    <a class="nav-link" href="home.php">
                        <i class="fa fa-home"></i>
                        <span class="nav-link-text"><b>HOME</b></span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="About Us">
                    <a class="nav-link" href="#">
                        <i class="fa fa-address-book-o"></i>
                        <span class="nav-link-text"><b>ABOUT US</b></span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contact Us">
                    <a class="nav-link" href="#">
                        <i class="fa fa-phone"></i>
                        <span class="nav-link-text"><b>CONTACT US</b></span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if ($row["role"] == "ss") { ?>
                <?php
                $q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'pending' GROUP BY name";
                $_row_set = mysqli_query($conn, $q);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
                                    <span class="badge badge-pill badge-primary">12 New</span>
                                </span>
                        <span class="indicator text-primary d-none d-lg-block">
                                    <i class="fa fa-fw fa-circle"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <?php while ($_row = mysqli_fetch_array($_row_set)) { ?>
                            <?php if ($_row['name'] != $_SESSION['email']) { ?>
                                <a class="dropdown-item" href="send.php?name=<?php echo urlencode($_row['name']); ?>">
                                    <div class="dropdown-item">
                                        <strong><?php echo $_row['name']; ?></strong>
                                        <div class="dropdown-message small">Requests for <?php echo $_row['count']; ?>
                                            documents
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>
            <?php } elseif ($row["role"] == "admin") { ?>
                <?php
                $q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'Approved' GROUP BY name";
                $_row_set = mysqli_query($conn, $q);

                $q1 = "SELECT name,COUNT(name) AS count FROM req WHERE availability = 'returned' GROUP BY name";
                $result_set1 = mysqli_query($conn, $q1);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
                                    <span class="badge badge-pill badge-primary">12 New</span>
                                </span>
                        <span class="indicator text-primary d-none d-lg-block">
                                    <i class="fa fa-fw fa-circle"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <?php while ($_row = mysqli_fetch_array($_row_set)) { ?>
                            <?php if ($_row['name'] != $_SESSION['email']) { ?>
                                <a class="dropdown-item" href="done.php?name=<?php echo urlencode($_row['name']); ?>">
                                    <div class="dropdown-item">
                                        <strong><?php echo $_row['name']; ?></strong>
                                        <div class="dropdown-message small">Requests for <?php echo $_row['count']; ?>
                                            documents
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <?php while ($result1 = mysqli_fetch_array($result_set1)) { ?>
                            <?php if ($result1['name'] != $_SESSION['email']) { ?>
                                <a class="dropdown-item"
                                   href="done.php?name=<?php echo urlencode($result1['name']); ?>">
                                    <div class="dropdown-item">
                                        <strong><?php echo $result1['name']; ?></strong>
                                        <div class="dropdown-message small">Returned <?php echo $result1['count']; ?>
                                            documents
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                                <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                    <span class="indicator text-warning d-none d-lg-block">
                                <i class="fa fa-fw fa-circle"></i>
                            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                                <span class="text-danger">
                                    <strong>
                                        <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                                </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>Chargeable list of documents</h3>
                </div>
            </div>
            <br><br>
            <table class="table table-responsive-lg table-hover">
                <tr>
                    <th>Username</th>
                    <th>Document ID</th>
                    <th>Remarks</th>
                </tr>
                <?php while ($r2 = mysqli_fetch_assoc($r_set2)) { ?>
                    <tr>
                        <td><?php echo $r2['name']; ?></td>
                        <td><?php echo $r2['number']; ?></td>
                        <td><?php echo $r2['remarks']; ?></td>
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
            <button class="btn btn-light" type="submit" id="print">
                <i class="fa fa-print" id="printIcon"></i>
            </button>
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



