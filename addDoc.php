<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM doctypes WHERE type='$_POST[type]'";
    $row_set = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($row_set);
    $type = $row['id'];
    
    $query = "INSERT INTO doc_rtn(doc_id,doc_typ_id,doc_name,sht_no,sup_no,inset_no,bl_no,remarks) VALUES('$_POST[doc_id]','$type','$_POST[number]','$_POST[sheet]','$_POST[sup]','$_POST[insert]','$_POST[block]','$_POST[remark]')";
    $result_set = mysqli_query($conn, $query);
    $error = mysqli_error($conn);
    echo $error;
}
?>
<?php
//if (isset($_POST['cart'])) {
//    if (isset($_SESSION['cart'])) {
//        $item_array_id = array_column($_SESSION['cart'], 'item_id');
//        if (!in_array($_GET['id'], $item_array_id)) {
//            $count = count($_SESSION['cart']);
//            $item_array = array(
//                'item_id' => $_GET['id'],
//                'item_type' => $_POST['type'],
//                'item_number' => $_POST['number'],
//                'item_sup' => $_POST['sup'],
//                'item_insert' => $_POST['insert'],
//                'item_sheet' => $_POST['sheet'],
//                'item_block' => $_POST['block'],
//                'item_doc' => $_POST['doc_id'],
//                'item_remark' => $_POST['remark'],
//            );
//            $_SESSION['cart'][$count] = $item_array;
//        } else {
//            echo '<script>alert("Item already added!")</script>';
//            //header("Location: addDoc.php");
//            echo '<script>window.lacation="addDoc.php"</script>';
//        }
//    } else {
//        $item_array = array(
//            'item_id' => $_GET['id'],
//            'item_type' => $_POST['type'],
//            'item_number' => $_POST['number'],
//            'item_sup' => $_POST['sup'],
//            'item_insert' => $_POST['insert'],
//            'item_sheet' => $_POST['sheet'],
//            'item_block' => $_POST['block'],
//            'item_doc' => $_POST['doc_id'],
//            'item_remark' => $_POST['remark'],
//        );
//        $_SESSION['cart'][0] = $item_array;
//    }
//}
//
//if (isset($_GET['action'])) {
//    if ($_GET['action'] == 'delete') {
//        foreach ($_SESSION['cart'] as $keys => $values) {
//            if ($values['item_id'] == $_GET['id']) {
//                unset($_SESSION['cart'][$keys]);
//                echo '<script>alert("Item Removed")</script>';
//                //header("Location: addDoc.php");
//                echo '<script>window.lacation="addDoc.php"</script>';
//            }
//        }
//    }
//}
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
        <link href="css/addDoc.css" rel="stylesheet">
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
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
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
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Manage documents</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li class="active">
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
                                <a class="nav-link" href="#">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <span class="nav-link-text">Receipt</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="#">
                            <i class="fa fa-file"></i>
                            <span class="nav-link-text">Reports</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
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
                            <a class="dropdown-item" href="#">
                                <strong>David Miller</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <strong>Jane Smith</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <strong>John Doe</strong>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                    </li>
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
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Add Document</h3>
                        </div>
                    </div><br><br>
                    <?php
                    $sql = "SELECT * FROM docTypes";
                    $result_set = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_assoc($result_set);
                    ?>
                    <form action="addDoc.php" method="post" id="form">
                        <div class="form-group">
                            <label>Document Type</label>
                            <select class="form-control" name="type" onchange="if (this.value == 'EDM') {
                                        //this.form['sup'].style.visibility = 'visible';
                                        document.getElementById('sup').style.visibility = 'visible';
                                        document.getElementById('insert').style.visibility = 'visible';
                                        document.getElementById('sheet').style.visibility = 'hidden';
                                    } else if (this.value == 'Topo. PP') {
                                        document.getElementById('sup').style.visibility = 'visible';
                                        document.getElementById('insert').style.visibility = 'visible';
                                        document.getElementById('sheet').style.visibility = 'visible';
                                    } else if (this.value == 'FTP') {
                                        document.getElementById('sup').style.visibility = 'visible';
                                        document.getElementById('insert').style.visibility = 'visible';
                                        document.getElementById('sheet').style.visibility = 'visible';
                                    } else if (this.value == 'FVP') {
                                        document.getElementById('sup').style.visibility = 'visible';
                                        document.getElementById('insert').style.visibility = 'hidden';
                                        document.getElementById('sheet').style.visibility = 'visible';
                                    }
                                    ;">
                                <option value="">Select...</option>
                                <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                                    <option value="<?php echo $result['type']; ?>"><?php echo $result['type']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="border">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Number</label>
                                    <input type="text" class="form-control" placeholder="Document Number" name="number" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3" id="sup" style="visibility:hidden;">
                                    <label>Sup Number</label>
                                    <input type="text" class="form-control" placeholder="Sup No" name="sup"/>
                                </div>
                                <div class="col-md-3" id="insert" style="visibility:hidden;">
                                    <label>Insert Number</label>
                                    <input type="text" class="form-control" placeholder="Insert Number" name="insert" />
                                </div>
                                <div class="col-md-3" id="sheet" style="visibility:hidden;">
                                    <label>Sheet Number</label>
                                    <input type="text" class="form-control" placeholder="Sheet Number" name="sheet" />
                                </div>
                                <div class="col-md-3" id="sheet" style="visibility:hidden;">
                                    <label>Block Number</label>
                                    <input type="text" class="form-control" placeholder="Block Number" name="block" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>ID</label>
                                    <input type="text" class="form-control" placeholder="Document ID" name="doc_id" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" placeholder="Optional" name="remark" />
                                </div>
                            </div><br><br><br><br>
                            <!--                            <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="submit" name="cart" id="cart">
                                                                    <i class="fa fa-cart-plus" id="cartIcon"></i>
                                                                </button>
                                                            </div>
                                                        </div>-->
                            <br><br><br><br>
                            <!--                            <div style="clear: both"></div>
                                                        <h3>Document Details</h3>-->
                            <!--                            <div class="table-responsive">
                                                            <table class=" table table-bordered">
                                                                <tr>
                                                                    <th>Doc Type</th>
                                                                    <th>Number</th>
                                                                    <th>Sup Number</th>
                                                                    <th>Insert Number</th>
                                                                    <th>Sheet Number</th>
                                                                    <th>Block Number</th>
                                                                    <th>Doc Id</th>
                                                                    <th>Remarks</th>
                                                                    <th>Action</th>
                                                                </tr>
                            <?php
//                                    if (!empty($_SESSION['cart'])) {
//                                        $total = 0;
//                                        foreach ($_SESSION['cart'] as $keys => $values) {
                            ?>
                                                                        <tr>
                                                                            <td><?php //echo $values['item_type'];  ?></td>
                                                                            <td><?php //echo $values['item_number'];  ?></td>
                                                                            <td><?php //echo $values['item_sup'];  ?></td>
                                                                            <td><?php //echo $values['item_insert'];  ?></td>
                                                                            <td><?php //echo $values['item_sheet'];  ?></td>
                                                                            <td><?php //echo $values['item_block'];  ?></td>
                                                                            <td><?php //echo $values['item_doc'];  ?></td>
                                                                            <td><?php //echo $values['item_remark'];  ?></td>
                                                                            <td><a href="addDoc.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                                                        </tr>
                            <?php
//                                        }
//                                    }
                            ?>
                                                            </table>
                                                        </div>-->
                        </div>
                        <input type="submit" name="submit" value="SUBMIT" class="btn btn-light" id="submit"/>
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
