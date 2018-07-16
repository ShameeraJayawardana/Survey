<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$q = "SELECT name,COUNT(name) AS count FROM req WHERE status = 'Approved' GROUP BY name";
$_row_set = mysqli_query($conn, $q);

$q1 = "SELECT name,COUNT(name) AS count FROM req WHERE availability = 'returned' GROUP BY name";
$result_set1 = mysqli_query($conn, $q1);

if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM doctypes WHERE type='$_POST[type]'";
    $row_set = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($row_set);
    $id = $row['id'];

    $district = 62;

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

    $pp = "fdgdfg";
    $fb = "dfgdfg";

    if ($_POST['type'] == 'PP') {
        $pp = $_POST['dist'];
        $fb = "";
    } elseif ($_POST['type'] == 'Field book') {
        $fb = $_POST['dist'];
        $pp = "";
    }
    $doc_id = $district . $_POST['dist'] . $id . $_POST['type'] . $_POST['sheet'] . $_POST['sup'] . $_POST['insert'] . $_POST['block'] . $oc . $fc . $_POST['vol'] . $fb . $_POST[court] . $_POST[field_b] . $_POST[subCat];
    //$doc_id = "abcdef";
    $sd = $_POST['dist'] . $_POST['type'] . $_POST[number] . $pp . $_POST[block] . $_POST[sup] . $_POST[insert] . $_POST[sheet];

    $query = "UPDATE doc_rtn SET ";
    $query .= "district = {$_POST['dist']}, ";
    $query .= "fb_decode = '{$pp}', ";
    $query .= "doc_id = '{$doc_id}', ";
    $query .= "sd_code = '{$sd}', ";
    $query .= "doc_typ_id = '{$id}', ";
    $query .= "doc_name = {$_POST['number']}, ";
    $query .= "sht_no = {$_POST['sheet']}, ";
    $query .= "sup_no = {$_POST['sup']}, ";
    $query .= "inset_no = {$_POST['insert']}, ";
    $query .= "bl_no = {$_POST['block']}, ";
    $query .= "oc = '{$oc}', ";
    $query .= "fc = '{$fc}', ";
    $query .= "vol = {$_POST['vol']}, ";
    $query .= "pp_code = '{$fb}', ";
    $query .= "court_no = {$_POST['court']}, ";
    $query .= "field_book = {$_POST['field_b']}, ";
    $query .= "sub_category = {$_POST['subCat']}, ";
    $query .= "remarks = {$_POST['remark']} ";
    $query .= "WHERE doc_name = {$_POST['number']} ";
    $query .= "LIMIT 1";
    mysqli_query($conn, $query);
    //mysqli_query($conn, $query);
    $error = mysqli_error($conn);
    echo $error;
}

//$sql = "SELECT * FROM docTypes";
//$result_set = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update Documents</title>
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
<div class="content-wrapper" id="background">
    <br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>Update Document</h3>
                </div>
            </div>
            <br><br>
            <?php
            $sql = "SELECT * FROM docTypes";
            $result_set = mysqli_query($conn, $sql);
            //$result = mysqli_fetch_assoc($result_set);
            ?>
            <form action="updateDoc.php" method="post" id="form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Document Type</label>
                            <select class="form-control" name="type" id="category" onchange="selectValue()">
                                <option value="">Select...</option>
                                <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                                    <option
                                        value="<?php echo $result['type']; ?>"><?php echo $result['type']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label id="sub_cat_label" style="visibility:hidden;">Sub Category</label>
                            <select class="form-control" name="subCat" id="sub_cat" style="visibility:hidden;"
                                    onchange="selectValue()">
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
                                    <input type="radio" style="zoom: 2" name="radio" value='fc'/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="vol" style="visibility: hidden;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Volume</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="vol" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="dist" style="visibility:hidden;">
                            <label>District</label>
                            <select name="dist" class="form-control">
                                <option value="">Select...</option>
                                <?php while ($_result = mysqli_fetch_assoc($_result_set)) { ?>
                                    <option
                                        value="<?php echo $_result['dist']; ?>"><?php echo $_result['dist']; ?></option>
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
                            <input type="text" class="form-control" placeholder="Document Number" name="number"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4" id="sup" style="visibility:hidden;">
                            <label>Sup Number</label>
                            <input type="text" class="form-control" placeholder="Sup No" name="sup"/>
                        </div>
                        <div class="col-md-4" id="insert" style="visibility:hidden;">
                            <label>Insert Number</label>
                            <input type="text" class="form-control" placeholder="Insert Number" name="insert"/>
                        </div>
                        <div class="col-md-4" id="sheet" style="visibility:hidden;">
                            <label>Sheet Number</label>
                            <input type="text" class="form-control" placeholder="Sheet Number" name="sheet"/>
                        </div>
                        <div class="col-md-4" id="block" style="visibility:hidden;">
                            <label>Block Number</label>
                            <input type="text" class="form-control" placeholder="Block Number" name="block"/>
                        </div>
                        <div class="col-md-4" id="court" style="visibility:hidden;">
                            <label>Court Number</label>
                            <input type="text" class="form-control" placeholder="Court Number" name="court"/>
                        </div>
                        <div class="col-md-4" id="court" style="visibility:hidden;">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Optional" name="remark"/>
                        </div>
                    </div>
                    <br><br><br><br>
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
                                                                            <td><?php //echo $values['item_type'];                 ?></td>
                                                                            <td><?php //echo $values['item_number'];                 ?></td>
                                                                            <td><?php //echo $values['item_sup'];                 ?></td>
                                                                            <td><?php //echo $values['item_insert'];                 ?></td>
                                                                            <td><?php //echo $values['item_sheet'];                 ?></td>
                                                                            <td><?php //echo $values['item_block'];                 ?></td>
                                                                            <td><?php //echo $values['item_doc'];                 ?></td>
                                                                            <td><?php //echo $values['item_remark'];                 ?></td>
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

