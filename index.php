<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$user = $_SESSION["email"];
$query = "SELECT * FROM member WHERE email = '$user'";
$row_set = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($row_set);
$msg = "";

$all_query = "SELECT * FROM member";
$all_set = mysqli_query($conn, $all_query);

if (isset($_POST['submit'])) {
    $upload_errors = array(
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "Partial upload.",
        UPLOAD_ERR_NO_FILE => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
    );


    $tmp_file = $_FILES['file_upload']['tmp_name'];
    $target_file = basename($_FILES['file_upload']['name']);
    $upload_dir = "uploads";


    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
        $message = "File uploaded successfully.";
    } else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }
    $file = "uploads/" . $_FILES["file_upload"]["name"];

    $update_query = "UPDATE member SET picture = '$file' WHERE email = '$user'";
    $update = mysqli_query($conn, $update_query);
    if ($update) {
        header("Refresh:0");
    }
}

if (isset($_POST['change'])) {
    $prePwd = $_POST['prePwd'];
    $en_pre = md5($prePwd);

    $newPwd = $_POST['newPwd'];
    $en_new = md5($newPwd);
    if ($en_pre == $row['password']){
        $change_query = "UPDATE member SET password = '$en_new' WHERE email = '$user'";
        mysqli_query($conn, $change_query);
    }else{
        $msg = "Password doesn't match!";
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
    <title>Admin Panel</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/snrss.css" rel="stylesheet">
    <!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <!--    <script src="vendor/jquery/jquery.min.js"></script>-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
    <script
        src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script type="text/javascript" language="JavaScript">
        var dist = {62: 'Ratnapura', 52: 'Colombo', 51: 'Gampaha', 61: 'Kegalle', 53: 'Kaluthara', 81: 'Galle'};
        $(document).ready(function () {
            function fetchUserData() {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    dataType: "json",
                    success: function (data) {
                        var name = '<p class="name" data-name="name" data-type="text" data-pk="' + data[0].id + '">' + data[0].name + '</p>';
                        var emplNo = '<p class="emplNo" data-name="emplNo" data-type="text" data-pk="' + data[0].id + '">' + data[0].emplNo + '</p>';
                        var des = '<p class="des" data-name="des" data-type="text" data-pk="' + data[0].id + '">' + data[0].des + '</p>';
                        var email = '<p class="email" data-name="email" data-type="text" data-pk="' + data[0].id + '">' + data[0].email + '</p>';
                        var district = '<p class="district" data-name="district" data-type="text" data-pk="' + data[0].id + '">' + dist[data[0].district] + '</p>';
                        var pwd = '<button type="button" class="btn btn-link" data-toggle="modal" data-target="#changePwd" style="padding-left: 0;">CHANGE PASSWORD</button>';
                        $('#user-data').append(name);
                        $('#user-data').append(emplNo);
                        $('#user-data').append(des);
                        $('#user-data').append(email);
                        $('#user-data').append(district);
                        $('#user-data').append(pwd);
                        console.log(data[0]);
                    }
                });
            }

            fetchUserData();

            $('#user-data').editable({
                container: 'body',
                selector: 'p.name',
                mode: 'inline',
                url: 'editValue.php',
                //title: 'Employee Name',
                type: 'POST',
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#user-data').editable({
                container: 'body',
                selector: 'p.emplNo',
                mode: 'inline',
                url: 'editValue.php',
                //title: 'Employee Number',
                type: 'POST',
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#user-data').editable({
                container: 'body',
                selector: 'p.des',
                mode: 'inline',
                url: 'editValue.php',
                //title: 'Designation',
                type: 'POST',
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#user-data').editable({
                container: 'body',
                selector: 'p.email',
                mode: 'inline',
                url: 'editValue.php',
                //title: 'Email',
                type: 'POST',
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });
        });
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?php echo htmlentities($row["name"]); ?></li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-md-4">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                            <label class="btn btn-outline-light btn-file">
                                <img src="<?php echo $row["picture"]; ?>" id="profilepic"
                                     onerror="if (this.src != 'pics/avatar.jpg') this.src = 'pics/avatar.jpg';"
                                     class="img-responsive img-circle"
                                     style="width: 200px; height: 200px; border-radius: 100px;"
                                     title="Change profile picture">
                                <input type="file" name="file_upload" id="fileToUpload" style="display: none;">
                            </label><br/>
                            <input type="submit" name="submit" value="UPLOAD" class="btn btn-outline-dark"
                                   style="width: 65%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8" id="user-data">

            </div>
        </div>
        <div class="row">
            <div class="modal fade" id="changePwd">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">CHANGE PASSWORD</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <form class="form-control" action="index.php" method="post">
                                    <label>Previous Password</label>
                                    <input type="password" name="prePwd" class="form-control" placeholder="Previous Password" required>
                                    <span style="color: red;"><?php echo $msg; ?></span><br/>
                                    <label>New Password</label>
                                    <input type="password" name="newPwd" class="form-control" placeholder="New Password" required><br/>
                                    <button type="submit" class="btn btn-outline-dark" name="change">CHANGE</button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i> Area Chart Example
            </div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Example Bar Chart Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i> Bar Chart Example
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 my-auto">
                                <canvas id="myBarChart" width="100" height="50"></canvas>
                            </div>
                            <div class="col-sm-4 text-center my-auto">
                                <div class="h4 mb-0 text-primary">$34,693</div>
                                <div class="small text-muted">YTD Revenue</div>
                                <hr>
                                <div class="h4 mb-0 text-warning">$18,474</div>
                                <div class="small text-muted">YTD Expenses</div>
                                <hr>
                                <div class="h4 mb-0 text-success">$16,219</div>
                                <div class="small text-muted">YTD Margin</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
                <!-- Card Columns Example Social Feed-->
                <div class="mb-0 mt-4">
                    <i class="fa fa-newspaper-o"></i> News Feed
                </div>
                <hr class="mt-2">
                <div class="card-columns">
                    <!-- Example Social Card-->
                    <div class="card mb-3">
                        <a href="#">
                            <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610"
                                 alt="">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                            <p class="card-text small">These waves are looking pretty good today!
                                <a href="#">#surfsup</a>
                            </p>
                        </div>
                        <hr class="my-0">
                        <div class="card-body py-2 small">
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-comment"></i>Comment</a>
                            <a class="d-inline-block" href="#">
                                <i class="fa fa-fw fa-share"></i>Share</a>
                        </div>
                        <hr class="my-0">
                        <div class="card-body small bg-faded">
                            <div class="media">
                                <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>Very nice! I wish I was there!
                                    That looks amazing!
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#">Like</a>
                                        </li>
                                        <li class="list-inline-item">·</li>
                                        <li class="list-inline-item">
                                            <a href="#">Reply</a>
                                        </li>
                                    </ul>
                                    <div class="media mt-3">
                                        <a class="d-flex pr-3" href="#">
                                            <img src="http://placehold.it/45x45" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>Next time for sure!
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">Like</a>
                                                </li>
                                                <li class="list-inline-item">·</li>
                                                <li class="list-inline-item">
                                                    <a href="#">Reply</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Posted 32 mins ago</div>
                    </div>
                    <!-- Example Social Card-->
                    <div class="card mb-3">
                        <a href="#">
                            <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180"
                                 alt="">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1"><a href="#">John Smith</a></h6>
                            <p class="card-text small">Another day at the office...
                                <a href="#">#workinghardorhardlyworking</a>
                            </p>
                        </div>
                        <hr class="my-0">
                        <div class="card-body py-2 small">
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-comment"></i>Comment</a>
                            <a class="d-inline-block" href="#">
                                <i class="fa fa-fw fa-share"></i>Share</a>
                        </div>
                        <hr class="my-0">
                        <div class="card-body small bg-faded">
                            <div class="media">
                                <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6>Where did you get that
                                    camera?! I want one!
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#">Like</a>
                                        </li>
                                        <li class="list-inline-item">·</li>
                                        <li class="list-inline-item">
                                            <a href="#">Reply</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Posted 46 mins ago</div>
                    </div>
                    <!-- Example Social Card-->
                    <div class="card mb-3">
                        <a href="#">
                            <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281"
                                 alt="">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1"><a href="#">Jeffery Wellings</a></h6>
                            <p class="card-text small">Nice shot from the skate park!
                                <a href="#">#kickflip</a>
                                <a href="#">#holdmybeer</a>
                                <a href="#">#igotthis</a>
                            </p>
                        </div>
                        <hr class="my-0">
                        <div class="card-body py-2 small">
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-comment"></i>Comment</a>
                            <a class="d-inline-block" href="#">
                                <i class="fa fa-fw fa-share"></i>Share</a>
                        </div>
                        <div class="card-footer small text-muted">Posted 1 hr ago</div>
                    </div>
                    <!-- Example Social Card-->
                    <div class="card mb-3">
                        <a href="#">
                            <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185"
                                 alt="">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                            <p class="card-text small">It's hot, and I might be lost...
                                <a href="#">#desert</a>
                                <a href="#">#water</a>
                                <a href="#">#anyonehavesomewater</a>
                                <a href="#">#noreally</a>
                                <a href="#">#thirsty</a>
                                <a href="#">#dehydration</a>
                            </p>
                        </div>
                        <hr class="my-0">
                        <div class="card-body py-2 small">
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                            <a class="mr-3 d-inline-block" href="#">
                                <i class="fa fa-fw fa-comment"></i>Comment</a>
                            <a class="d-inline-block" href="#">
                                <i class="fa fa-fw fa-share"></i>Share</a>
                        </div>
                        <hr class="my-0">
                        <div class="card-body small bg-faded">
                            <div class="media">
                                <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>The oasis is a mile that way,
                                    or is that just a mirage?
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#">Like</a>
                                        </li>
                                        <li class="list-inline-item">·</li>
                                        <li class="list-inline-item">
                                            <a href="#">Reply</a>
                                        </li>
                                    </ul>
                                    <div class="media mt-3">
                                        <a class="d-flex pr-3" href="#">
                                            <img src="http://placehold.it/45x45" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                                            <img class="img-fluid w-100 mb-1"
                                                 src="https://unsplash.it/700/450?image=789" alt="">I'm saved, I found a
                                            cactus. How do I open this thing?
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#">Like</a>
                                                </li>
                                                <li class="list-inline-item">·</li>
                                                <li class="list-inline-item">
                                                    <a href="#">Reply</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Posted yesterday</div>
                    </div>
                </div>
                <!-- /Card Columns-->
            </div>
            <div class="col-lg-4">
                <!-- Example Pie Chart Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-pie-chart"></i> Pie Chart Example
                    </div>
                    <div class="card-body">
                        <canvas id="myPieChart" width="100%" height="100"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
                <!-- Example Notifications Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-bell-o"></i> Feed Example
                    </div>
                    <div class="list-group list-group-flush small">
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="media">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <strong>David Miller</strong>posted a new article to
                                    <strong>David Miller Website</strong>.
                                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="media">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <strong>Samantha King</strong>sent you a new message!
                                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="media">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <strong>Jeffery Wellings</strong>added a new photo to the album
                                    <strong>Beach</strong>.
                                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="media">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                                <div class="media-body">
                                    <i class="fa fa-code-fork"></i>
                                    <strong>Monica Dennis</strong>forked the
                                    <strong>startbootstrap-sb-admin</strong>repository on
                                    <strong>GitHub</strong>.
                                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Employee Number</th>
                            <th>Email</th>
                            <th>District</th>
                            <th>Division</th>
                            <th>Designation</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Employee Number</th>
                            <th>Email</th>
                            <th>District</th>
                            <th>Division</th>
                            <th>Designation</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php while ($all = mysqli_fetch_assoc($all_set)) { ?>
                            <tr>
                                <td><?php echo $all['name']; ?></td>
                                <td><?php echo $all['emplNo']; ?></td>
                                <td><?php echo $all['email']; ?></td>
                                <td><?php echo $all['district']; ?></td>
                                <td><?php echo $all['division']; ?></td>
                                <td><?php echo $all['des']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2017</small>
            </div>
        </div>
    </footer>
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