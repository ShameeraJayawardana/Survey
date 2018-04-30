<?php include 'src/components/db.php'; ?>
<?php
$confirmErr = "";
$permission = "";
$error = "";
$_query = "SELECT * FROM district";
$_row_set = mysqli_query($conn, $_query);

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $en_pwd = md5($password);
    $role = "member";
    $confirm = $_POST['confirm'];

    $select = "SELECT * FROM addmembers WHERE email='$_POST[email]'";
    $row_set = mysqli_query($conn, $select);
    $row = mysqli_num_rows($row_set);

    if ($row < 1) {
        $permission = "You don't have permission to register";
    } elseif ($password != $confirm) {
        $confirmErr = "Password doesn't match";
    } else {
        $sql = "INSERT INTO member(name, emplNo, des, district, email, password, role) VALUES('$_POST[name]','$_POST[emplNo]','$_POST[des]','$_POST[district]','$_POST[email]','$en_pwd','$role')";
        $query = mysqli_query($conn, $sql);
        $error = mysqli_error($conn);
        if ($query) {
            echo '<script>alert("You have successfully signed up");</script>';
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
        <title>Register</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <div class="card-header">Register an Account</div>
                <div class="card-body">
                    <form method="post" action="register.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">Name with Initials</label>
                                    <input class="form-control" required name="name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter Your Name with Initials">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Employee Number</label>
                                    <input class="form-control" required name="emplNo" id="emplNo" type="text" aria-describedby="emplHelp" placeholder="Enter your Employee Number">
                                </div>
                                <div class="col-md-6">
                                    <label>Designation</label>
                                    <select class="form-control" name="des">
                                        <option>Select...</option>
                                        <option value="Surveyor">Surveyor</option>
                                        <option value="Supdt. of Surveyor">Supdt. of Surveyor</option>
                                        <option value="SNR. Supdt. of Surveyor">SNR. Supdt. of Surveyor</option>
                                        <option value="M.T.O">M.T.O</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <select class="form-control" name="district">
                                <option value="">Select...</option>
                                <?php while ($_row = mysqli_fetch_assoc($_row_set)) { ?>
                                    <option value="<?php echo $_row['dist_code']; ?>"><?php echo $_row['dist_nm']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input class="form-control" required name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <span style="color: red"><?php echo $permission; ?></span>
                            <span style="color: red"><?php echo $error; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input class="form-control" required name="password" id="exampleInputPassword1" type="password" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleConfirmPassword">Confirm password</label>
                                    <input class="form-control" required name="confirm" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                                    <span style="color: red"><?php echo $confirmErr; ?></span>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="REGISTER" name="submit"/>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="login.php">Login Page</a>
                        <a class="d-block small" href="home.php">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

</html>
