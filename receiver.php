<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$issue_no = "";
//$result2 = array();

$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'Approved' GROUP BY name";
$_row_set = mysqli_query($conn, $q);

$q1 = "SELECT name,COUNT(name) AS count FROM req WHERE availability = 'returned' GROUP BY name";
$result_set1 = mysqli_query($conn, $q1);


$sql = "SELECT * FROM member";
$result = mysqli_query($conn, $sql);
?>
<?php
$query = "SELECT * FROM docTypes";
$result_set = mysqli_query($conn, $query);
?>
<?php
$email = htmlentities($_SESSION['email']);
$sql2 = "SELECT * FROM member WHERE email='$email'";
$row_set = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($row_set);
$receiver = $row['name'];
$status = 0;
$sender = "";

if (isset($_POST['submit'])) {
    $date = date("Y-m-d h:i:sa");

    $myNo = date("Y");
    $int = 1;
    $sql3 = "SELECT * FROM receiv ORDER BY ID DESC LIMIT 1";
    $result_set1 = mysqli_query($conn, $sql3);
    $result1 = mysqli_fetch_assoc($result_set1);
    $year = substr($result1['receiv_no'], 0, 4);
    if ($year == $myNo) {
        $int = substr($result1['receiv_no'], 7, 1);
        $int = $int + 1;
    }
    $receive_no = $myNo . "/" . "r" . "/" . $int;

    $sender = $_POST['sender'];

    $insert = "INSERT INTO receiv(receiv_no,sender,receiver,doc_id,datetime) VALUES('$receive_no', '$_POST[sender]', '$receiver', '$_POST[doc_id]','$date')";
    mysqli_query($conn, $insert);
    //echo "fddufdfjfkdfdfkjdfhfdkjdfdkfjdfldfldfld     ".mysqli_error($conn);

    $update = "UPDATE issue SET status = '$status' WHERE receiver = '$sender'";
    mysqli_query($conn, $update);
}

$sql4 = "SELECT * FROM member WHERE name = '$sender'";
$result_set13 = mysqli_query($conn, $sql4);
$result2 = mysqli_fetch_assoc($result_set13);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Receive Documents</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/issue.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.php">Survey Department</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li class = "nav-item active" data-toggle = "tooltip" data-placement = "right" title = "Dashboard">
                                <a class = "nav-link" href = "sadmin.php">
                                    <i class = "fa fa-user-circle"></i>
                                    <span class = "nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
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
                                <a class="nav-link" href="transferss.php">
                                    <i class="fa fa-space-shuttle"></i>
                                    <span class="nav-link-text">Transfer</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
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
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
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
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
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
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
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
                    <?php if ($row["role"] == "admin") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-message small">Requests for <?php echo $_row['count']; ?>documents</div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                                <?php while ($result1 = mysqli_fetch_array($result_set1)) { ?>
                                    <?php if ($result1['name'] != $_SESSION['email']) { ?>
                                        <a class="dropdown-item" href="done.php?name=<?php echo urlencode($result1['name']); ?>">
                                            <div class="dropdown-item">
                                                <strong><?php echo $result1['name']; ?></strong>
                                                <div class="dropdown-message small">Returned <?php echo $result1['count']; ?>documents</div>
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
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-danger">
                                    <strong>
                                        <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
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
        <div class="content-wrapper" id="background">
            <br>
            <div class="row" id="border">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Receiving of Documents</h3>
                        </div>
                    </div><br><br>
                    <form action="receiver.php" method="post">
                        <div class="form-group">
                            <label>My No</label>
                            <input type="text" name="myNo" class="form-control" placeholder="My Number" value="" /><br>
                            <label>Received from(name)</label>&nbsp;&nbsp;
                            <select class="alert" name="sender">
                                <option value="">Select...</option>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select><br/>
                            <label>Designation</label>
                            <input type="text" name="des" value="<?php echo $result2['des']; ?>" class="form-control" placeholder="Enter Your Designation"/><br/>
                            <label>Document Category</label>
                            <select class="form-control" name="type">
                                <option value="">Select...</option>
                                <?php while ($select = mysqli_fetch_assoc($result_set)) { ?>
                                    <option value="<?php echo $select['type']; ?>"><?php echo $select['type']; ?></option>
                                <?php } ?>
                            </select><br>
                            <label>Document Id</label>
                            <input type="text" placeholder="Document" name="doc_id" class="form-control" />
                            <br>
                            <label>Remarks</label>
                            <input type="text" placeholder="Remarks" name="remarks" class="form-control"/>
                        </div>
                        <!--                        <button type="submit" name="cart" id="cart">
                                                    <i class="fa fa-cart-plus" id="cartIcon"></i>
                                                </button><br/><br/><br/><br/><br/><br/>-->
                        <input type="submit" class="btn btn-info" name="submit" value="RECEIVE"/>
                    </form>
                </div>
                <div class="col-md-2">

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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
