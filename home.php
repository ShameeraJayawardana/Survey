<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Survey Department, Sri Lanka</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="home.php">Online Document Management System</a>
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
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                                <a class="nav-link" href="addDivision.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="nav-link-text">Add Division</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Promote">
                                <a class="nav-link" href="promoteMembers.php">
                                    <i class="fa fa-space-shuttle"></i>
                                    <span class="nav-link-text">Promote Members</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Delete">
                                <a class="nav-link" href="deleteUser.php">
                                    <i class="fa fa-space-shuttle"></i>
                                    <span class="nav-link-text">Delete Members</span>
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
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Delete">
                                <a class="nav-link" href="deleteUser.php">
                                    <i class="fa fa-space-shuttle"></i>
                                    <span class="nav-link-text">Delete Members</span>
                                </a>
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
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Search">
                            <a class="nav-link" href="search.php">
                                <i class="fa fa-search"></i>
                                <span class="nav-link-text"><b>SEARCH DOCUMENTS</b></span>
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
                    <li class="nav-item">
                        <a class="nav-link" data-target="#exampleModal" href="login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-target="#exampleModal" href="register.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper" style="padding-top: 0;">
            <div class="container-fluid" style="padding: 0;">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="pics/1.jpg" alt="Survey Department" style="width: 100%">
                        </div>
                        <div class="carousel-item">
                            <img src="pics/2.jpg" alt="Survey Department" style="width: 100%">
                        </div>
                        <div class="carousel-item">
                            <img src="pics/3.jpg" alt="Survey Department" style="width: 100%">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
            <div class="row container-fluid" style="padding-top: 15px;">
                <div class="col-md-6 text-center">
                    <h4>Our Vision</h4>
                    <p>
                        Our Vision is to be The leader of land information right through.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <h4>Our Mission</h4>
                    <p>
                        To provide high quality land information products and services through professionally qualified and dedicated personel
                    </p>
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
                            <a class="btn btn-primary" href="login.html">Logout</a>
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
