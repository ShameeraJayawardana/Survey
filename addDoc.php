<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
$type = "";
<?php
$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'Approved' GROUP BY name";
$result_set = mysqli_query($conn, $q);

$q1 = "SELECT name,COUNT(name) AS count FROM req WHERE availability = 'returned' GROUP BY name";
$result_set1 = mysqli_query($conn, $q1);

$qu = "SELECT * FROM sub_category";
$re_set = mysqli_query($conn, $qu);
//$re = mysqli_fetch_assoc($re_set);
?>
<?php
$sql = "SELECT * FROM ppcodedist";
$_result_set = mysqli_query($conn, $sql);
//$row = mysqli_fetch_assoc($row_set);
?>
<?php

$msg = "";
if (isset($_POST['cart'])) {
    $sql = "SELECT * FROM doctypes WHERE type='$_POST[type]'";
    $row_set = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($row_set);
    $id = $row['id'];
    
    $email = $_SESSION['email'];
    
    $disQuery = "SELECT * FROM addmembers WHERE email = '$email'";
    $dis_result_set = mysqli_query($conn, $disQuery);
    $dis_result = mysqli_fetch_assoc($dis_result_set);

    $district = $dis_result['district'];
    $status = "available";

    $oc = "";
    $fc = "";
    if (isset($_POST['radio'])) {
        if ($_POST['radio'] == 'oc') {
            $oc = "oc";
            $fc = "";
        } elseif ($_POST['radio'] == 'fc') {
            $oc = "";
            $fc = "fc";
        }
    }

    $pp = "";
    $fb = "";

    if ($_POST['type'] == 'PP') {
        $pp = $_POST['dist'];
        $fb = "";
    } elseif ($_POST['type'] == 'Field book') {
        $fb = $_POST['dist'];
        $pp = "";
    }
    $doc_id = $district . $_POST['dist'] . $_POST['type'] . $id . $_POST['sheet'] . $_POST['sup'] . $_POST['insert'] . $_POST['block'] . $oc . $fc . $_POST['vol'] . $fb . $_POST['court'] . $_POST['field_b'] . $_POST['subCat'];
    //$doc_id = "abcdef";
    $sd = $_POST['dist'] . $_POST['type'] . $_POST['number'] . $pp . $_POST['block'] . $_POST['sup'] . $_POST['insert'] . $_POST['sheet'];
    $doc_id = $district . $_POST['dist'] . $_POST['type'] . $id . $_POST['sheet'] . $_POST['sup'] . $_POST['insert'] . $_POST['block'] . $oc . $fc . $_POST['vol'] . $fb . $_POST['court'] . $_POST['field_b'] . $_POST['subCat'];
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        $item_array = array(
            'district' => $district,
            'fb_decode' => $pp,
            'item_id' => $doc_id,
            'sd_code' => $sd,
            'item_type' => $_POST['type'],
            'item_number' => $_POST['number'],
            'item_sup' => $_POST['sup'],
            'item_insert' => $_POST['insert'],
            'item_sheet' => $_POST['sheet'],
            'item_block' => $_POST['block'],
            'oc' => $oc,
            'fc' => $fc,
            'vol' => $_POST['vol'],
            'pp_code' => $fb,
            'court_no' => $_POST['court'],
            'field_book' => $_POST['field_b'],
            'sub_cat' => $_POST['subCat'],
            'remarks' => $_POST['remark']
        );
        $_SESSION['cart'][$count] = $item_array;
    } else {
        $item_array = array(
            'district' => $district,
            'fb_decode' => $pp,
            'item_id' => $doc_id,
            'sd_code' => $sd,
            'item_type' => $_POST['type'],
            'item_number' => $_POST['number'],
            'item_sup' => $_POST['sup'],
            'item_insert' => $_POST['insert'],
            'item_sheet' => $_POST['sheet'],
            'item_block' => $_POST['block'],
            'oc' => $oc,
            'fc' => $fc,
            'vol' => $_POST['vol'],
            'pp_code' => $fb,
            'court_no' => $_POST['court'],
            'field_book' => $_POST['field_b'],
            'sub_cat' => $_POST['subCat'],
            'remarks' => $_POST['remark']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['cart'] as $keys => $values) {
            if ($values['item_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$keys]);
                //echo '<script>alert("Item Removed")</script>';
                //header("Location: addDoc.php");
                echo '<script>window.lacation="addDoc.php"</script>';
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $status = "available";
    foreach ($_SESSION['cart'] as $keys => $values) {
        $sql = "SELECT * FROM doctypes WHERE type='$values[item_type]'";
        $row_set = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($row_set);
        $id = $row['id'];
        $query = "INSERT INTO doc_rtn(district,fb_decode,doc_id,sd_code,doc_typ_id,doc_name,sht_no,sup_no,"
                . "inset_no,bl_no,oc,fc,vol,pp_code,court_no,field_book,sub_category,remarks,status) "
                . "VALUES('$values[district]','$values[fb_decode]','$values[item_id]','$values[sd_code]','$id','$values[item_number]','$values[item_sup]',"
                . "'$values[item_insert]','$values[item_sheet]','$values[item_block]','$values[oc]','$values[fc]','$values[vol]',"
                . "'$values[pp_code]','$values[court_no]','$values[field_book]','$values[sub_cat]','$values[remarks]','$status')";
        $submit = mysqli_query($conn, $query);
        if($submit){
            unset($_SESSION['cart'][$keys]);
        }
        $error = mysqli_error($conn);
        //echo $error;
        if($error){
            $msg = "Two documents with same document ID can't exist";
        }
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
        <link href="css/addDoc.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.php">Online Document Management System</a>
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
                                <?php while ($result = mysqli_fetch_array($result_set)) { ?>
                                    <?php if ($result['name'] != $_SESSION['email']) { ?>
                                        <a class="dropdown-item" href="done.php?name=<?php echo urlencode($result['name']); ?>">
                                            <div class="dropdown-item">
                                                <strong><?php echo $result['name']; ?></strong>
                                                <div class="dropdown-message small">Requests for <?php echo $result['count']; ?>documents</div>
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
                    //$result = mysqli_fetch_assoc($result_set);
                    ?>
                    <form action="addDoc.php" method="post" id="form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Document Type</label>
                                    <select class="form-control" name="type" id="category" onchange="selectValue()">
                                        <option value="">Select...</option>
                                        <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                                            <option value="<?php echo $result['type']; ?>"><?php echo $result['type']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label id="sub_cat_label" style="visibility:hidden;">Sub Category</label>
                                    <select class="form-control" name="subCat" id="sub_cat" style="visibility:hidden;" onchange="selectValue()" >
                                        <option value="">Select...</option>
                                        <option value="Flat Copy" id="flatcopy">Flat Copy</option>
                                        <option value="TL" id="tl">TL</option>
                                        <option value="Full Copy" id="fullcopy">Full Copy</option>
                                        <option value="Sup Sheet" id="sup_sheet">Sup Sheet</option>
                                        <option value="Sheet" id="sheet_dropdown">Sheet</option>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6" style="visibility:hidden;" id="field_book">
                                    <label>Field books</label>
                                    <select class="form-control" onchange="selectValue()" id="field_b" name="field_b">
                                        <option value="">Select...</option>
                                        <option value="Level Book" id="level">Level Book</option>
                                        <option value="Old field Book" id="old">Old field Book</option>
                                        <option value="Metric book" id="metric">Metric field book</option>
                                        <option value="EDM book" id="edm">EDM book</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group" id="check">
                            <div class="row">
                                <div class="col-md-4" id="oc" style="visibility: hidden;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>OC</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="radio" style="zoom: 2" name="radio" value='oc'/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="fc" style="visibility: hidden;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>FC</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="radio" style="zoom: 2" name="radio" value='fc' />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="vol" style="visibility: hidden;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Volume</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="vol" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" id="dist" style="visibility:hidden;">
                                    <label>District</label>
                                    <select name="dist" class="form-control">
                                        <option value="">Select...</option>
                                        <?php while ($_result = mysqli_fetch_assoc($_result_set)) { ?>
                                            <option value="<?php echo $_result['dist']; ?>"><?php echo $_result['dist']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <div class="form-group" id="border">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Number</label>
                                    <input type="text" class="form-control" placeholder="Document Number" name="number" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4" id="sup" style="visibility:hidden;">
                                    <label>Sup Number</label>
                                    <input type="text" class="form-control" placeholder="Sup No" name="sup"/>
                                </div>
                                <div class="col-md-4" id="insert" style="visibility:hidden;">
                                    <label>Insert Number</label>
                                    <input type="text" class="form-control" placeholder="Insert Number" name="insert" />
                                </div>
                                <div class="col-md-4" id="sheet" style="visibility:hidden;">
                                    <label>Sheet Number</label>
                                    <input type="text" class="form-control" placeholder="Sheet Number" name="sheet" />
                                </div>
                                <div class="col-md-4" id="block" style="visibility:hidden;">
                                    <label>Block Number</label>
                                    <input type="text" class="form-control" placeholder="Block Number" name="block" />
                                </div>
                                <div class="col-md-4" id="court" style="visibility:hidden;">
                                    <label>Court Number</label>
                                    <input type="text" class="form-control" placeholder="Court Number" name="court" />
                                </div>
                                <div class="col-md-4" id="court" style="visibility:hidden;">

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" placeholder="Optional" name="remark" />
                                </div>
                            </div><br><br><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="cart" id="cart">
                                        <i class="fa fa-cart-plus" id="cartIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div style="clear: both"></div>
                            <h3>Document Details</h3>
                            <div class="table-responsive">
                                <h6 id="msg"><?php echo $msg; ?></h6>
                                <table class=" table table-bordered">
                                    <tr>
                                        <th>District</th>
                                        <th>FB Decode</th>
                                        <th>Doc Id</th>
                                        <th>SD Code</th>
                                        <th>Doc Type</th>
                                        <th>Doc Name</th>
                                        <th>Sup</th>
                                        <th>Insert</th>
                                        <th>Sheet</th>
                                        <th>Block</th>
                                        <th>OC</th>
                                        <th>FC</th>
                                        <th>Vol</th>
                                        <th>PP Code</th>
                                        <th>Court No</th>
                                        <th>FB</th>
                                        <th>Sub Cat</th>
                                        <th>Remarks</th>
                                    </tr>
                                    <?php
                                    if (!empty($_SESSION['cart'])) {
                                        $total = 0;
                                        foreach ($_SESSION['cart'] as $keys => $values) {
                                            ?>
                                            <tr>
                                                <td><?php echo $values['district']; ?></td>
                                                <td><?php echo $values['fb_decode']; ?></td>
                                                <td><?php echo $values['item_id']; ?></td>
                                                <td><?php echo $values['sd_code']; ?></td>
                                                <td><?php echo $values['item_type']; ?></td>
                                                <td><?php echo $values['item_number']; ?></td>
                                                <td><?php echo $values['item_sup']; ?></td>
                                                <td><?php echo $values['item_insert']; ?></td>
                                                <td><?php echo $values['item_sheet']; ?></td>
                                                <td><?php echo $values['item_block']; ?></td>
                                                <td><?php echo $values['oc']; ?></td>
                                                <td><?php echo $values['fc']; ?></td>
                                                <td><?php echo $values['vol']; ?></td>
                                                <td><?php echo $values['pp_code']; ?></td>
                                                <td><?php echo $values['court_no']; ?></td>
                                                <td><?php echo $values['field_book']; ?></td>
                                                <td><?php echo $values['sub_cat']; ?></td>
                                                <td><?php echo $values['remarks']; ?></td>
                                                <td><a href="addDoc.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
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
