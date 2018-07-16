<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$issue_no = "";
//$result2 = array();
$sql = "SELECT * FROM member";
$result = mysqli_query($conn, $sql);
?>
<?php
$doc_type_query = "SELECT * FROM docTypes";
$doc_type_set = mysqli_query($conn, $doc_type_query);
?>
<?php
$email = htmlentities($_SESSION['email']);
$sql2 = "SELECT * FROM member WHERE email='$email'";
$row_set = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($row_set);
$issuer = $row['name'];
$status = 1;
$receiver = "";
$date = date("Y-m-d h:i:sa");

$sql4 = "SELECT * FROM member WHERE name = '$receiver'";
$result_set13 = mysqli_query($conn, $sql4);
$result2 = mysqli_fetch_assoc($result_set13);
?>
<?php
$msg = "";
if (isset($_POST['cart'])) {

    $receiver = $_POST['receiver'];
    $p = "SELECT * FROM member WHERE name = '$receiver'";
    $p_set = mysqli_query($conn, $p);
    $r = mysqli_fetch_assoc($p_set);

    if (isset($_SESSION['cart'])) {
        $issue_number = array_column($_SESSION['cart'], "issue_number");
        $myNo = date("Y");
        $int = 1;
        $sql3 = "SELECT * FROM issue ORDER BY ID DESC LIMIT 1";
        $result_set1 = mysqli_query($conn, $sql3);
        $result1 = mysqli_fetch_assoc($result_set1);
        $year = substr($result1['issue_no'], 0, 4);
        if ($year == $myNo) {
            $int = substr($result1['issue_no'], 5, 1);
            $int = $int + 1;
        }
        $issue_no = $myNo . "/" . $int;

        $item_array_id = array_column($_SESSION['cart'], "item_number");
        if (!in_array($_POST['number'], $item_array_id)) {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'name' => $r['email'],
                'issue_number' => $issue_no,
                'item_number' => $_POST['number'],
                'time' => $date
            );
            $_SESSION['cart'][$count] = $item_array;
        } else {
            echo '<script>alert("Document already added!");</script>';
            echo '<script>window.location="issue.php"</script>';
        }
    } else {
        $item_array = array(
            'name' => $r['email'],
            'issue_number' => $issue_no,
            'item_number' => $_POST['number'],
            'time' => $date
        );
        $_SESSION['cart'][0] = $item_array;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['cart'] as $keys => $values) {
            if ($values['item_number'] == $_GET['id']) {
                unset($_SESSION['cart'][$keys]);
                echo '<script>window.lacation="issue.php.php"</script>';
            }
        }
    }
}

if (isset($_POST['submit'])) {
    foreach ($_SESSION['cart'] as $keys => $values) {
        $sql = "SELECT * FROM doc_rtn WHERE doc_id='$values[item_number]'";
        $row_set = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($row_set);
        $condition = $row['status'];
        if ($condition == 'available') {
            $insert = "INSERT INTO issue(issue_no,issuer,receiver,doc_id,datetime,status) VALUES('$values[issue_number]', '$email', '$values[name]', '$values[item_number]','$values[time]', '$status')";
            $submit = mysqli_query($conn, $insert);
            if ($submit) {
                unset($_SESSION['cart'][$keys]);
                $update = "UPDATE doc_rtn SET status = 'locked' WHERE doc_id = '$values[item_number]'";
                mysqli_query($conn, $update);
            }
        } else {
            $msg = "Following documents are not available";
        }
        $error = mysqli_error($conn);
        //echo $error;
        if ($error) {
            $msg = "Some documents can't be issued. Please contact the department.";
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
    <title>Issue Documents</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/issue.css" rel="stylesheet">
    <script>
        var res = [];
        function selectDes(str) {
            //arrayValue.push(str);
            console.log('aswssf', str);
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
                xmlhttp.open("GET", "getName.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
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

                        var sel = document.getElementById('browsers');
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
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 2) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 3) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 4) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 5) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 6) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 7) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5] + "&q7=" + arrayValue[6], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 8) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5] + "&q7=" + arrayValue[6] + "&q8=" + arrayValue[7], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 9) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5] + "&q7=" + arrayValue[6] + "&q8=" + arrayValue[7] + "&q9=" + arrayValue[8], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 10) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5] + "&q7=" + arrayValue[6] + "&q8=" + arrayValue[7] + "&q9=" + arrayValue[8] + "&q10=" + arrayValue[9], true);
                    xmlhttp.send();
                } else if (arrayValue.length == 11) {
                    xmlhttp.open("GET", "gethint.php?q=" + arrayValue[0] + "&q2=" + arrayValue[1] + "&q3=" + arrayValue[2] + "&q4=" + arrayValue[3] + "&q5=" + arrayValue[4] + "&q6=" + arrayValue[5] + "&q7=" + arrayValue[6] + "&q8=" + arrayValue[7] + "&q9=" + arrayValue[8] + "&q10=" + arrayValue[9] + "&q11=" + arrayValue[10], true);
                    xmlhttp.send();
                }
            }
        }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper" id="background">
    <br>
    <div class="row" id="border">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>Issuing of Documents</h3>
                </div>
            </div>
            <br><br>
            <form action="issue.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="myNo" class="form-control" placeholder="My Number"
                           value="<?php echo $issue_no; ?>"/><br>
                    <label>Designation</label>
                    <select class="form-control" onchange="selectDes(this.value);">
                        <option value="">Select...</option>
                        <option value="Surveyor">Surveyor</option>
                        <option value="Supdt. of Surveyor">Supdt. of Surveyor</option>
                    </select><br/>
                    <label>Issued to(name)</label>&nbsp;&nbsp;
                    <select class="alert" name="receiver" id="nameList">
                        <option value="">Select...</option>
                    </select><br/>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Document Type</label>
                            <select class="form-control" name="type" id="category" onchange="selectValue();
                                            showHint(this.value);">
                                <option value="">Select...</option>
                                <?php while ($result = mysqli_fetch_assoc($doc_type_set)) { ?>
                                    <option
                                        value="<?php echo $result['type']; ?>"><?php echo $result['type']; ?></option>
                                <?php } ?>
                            </select>
                            <!--                                    <p>Suggestions: <span id="txtHint"></span></p>-->
                        </div>
                        <div class="col-md-6">
                            <label id="sub_cat_label" style="visibility:hidden;">Sub Category</label>
                            <select class="form-control" name="subCat" id="sub_cat" style="visibility:hidden;"
                                    onchange="selectValue();showHint(this.value);">
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
                            <select class="form-control" onchange="selectValue();showHint(this.value);" id="field_b"
                                    name="field_b">
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
                        <div class="col-md-4" id="fc" style="visibility: hidden;">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>FC</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="checkbox" style="zoom: 2" name="radio" value='fc'
                                           onchange="showHint(this.value);"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="vol" style="visibility: hidden;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Volume</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="vol" class="form-control"
                                           onchange="showHint(this.value);"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="dist" style="visibility:hidden;">
                            <label>District</label>
                            <select name="dist" class="form-control" onchange="showHint(this.value);">
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
                        <div class="col-md-4" id="sup" style="visibility:hidden;">
                            <label>Sup Number</label>
                            <input type="text" class="form-control" placeholder="Sup No" name="sup"
                                   onchange="showHint(this.value);"/>
                        </div>
                        <div class="col-md-4" id="insert" style="visibility:hidden;">
                            <label>Insert Number</label>
                            <input type="text" class="form-control" placeholder="Insert Number" name="insert"
                                   onchange="showHint(this.value);"/>
                        </div>
                        <div class="col-md-4" id="sheet" style="visibility:hidden;">
                            <label>Sheet Number</label>
                            <input type="text" class="form-control" placeholder="Sheet Number" name="sheet"
                                   onchange="showHint(this.value);"/>
                        </div>
                        <div class="col-md-4" id="block" style="visibility:hidden;">
                            <label>Block Number</label>
                            <input type="text" class="form-control" placeholder="Block Number" name="block"
                                   onchange="showHint(this.value);"/>
                        </div>
                        <div class="col-md-4" id="court" style="visibility:hidden;">
                            <label>Court Number</label>
                            <input type="text" class="form-control" placeholder="Court Number" name="court"
                                   onchange="showHint(this.value);"/>
                        </div>
                        <div class="col-md-4" id="court" style="visibility:hidden;">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Number</label>
                            <input list="browsers" class="form-control" placeholder="Document Number" name="number">
                            <datalist id="browsers">
                            </datalist>
                        </div>
                    </div>
                    <br>
                    <!--                    <div class="row">-->
                    <!--                        <div class="col-md-12">-->
                    <!--                            <label>Remarks</label>-->
                    <!--                            <input type="text" class="form-control" placeholder="Optional" name="remark"/>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <br><br><br><br>
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
                                <th>Issue to</th>
                                <th>Issue Number</th>
                                <th>Document ID</th>
                                <th>Date and Time</th>
                            </tr>
                            <?php
                            if (!empty($_SESSION['cart'])) {
                                $total = 0;
                                foreach ($_SESSION['cart'] as $keys => $values) {
                                    ?>
                                    <tr>
                                        <td><?php echo $values['name']; ?></td>
                                        <td><?php echo $values['issue_number']; ?></td>
                                        <td><?php echo $values['item_number']; ?></td>
                                        <td><?php echo $values['time']; ?></td>
                                        <td>
                                            <a href="issue.php?action=delete&id=<?php echo $values["item_number"]; ?>"><span
                                                    class="text-danger">Remove</span></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <input type="submit" class="btn btn-info" name="submit" value="ISSUE"/>
            </form>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-12">
            <h3>Download Report</h3>
            <form action="issueBackend.php" method="post">
                <label>Issue Number</label>
                <input type="text" class="form-control" name="issueNo" placeholder="Issue Number"><br/>
                <button class="btn btn-outline-dark" name="download"><img src="pics/csv_file.png"/> DOWNLOAD
                </button>
            </form>
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
    <script src="js/reqDoc.js"></script>
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
