<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $en_pwd = md5($password);
    $email = $_POST['email'];
    
    $query = "SELECT * FROM member WHERE email='$email'";
    $result_set = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result_set);

    if ($en_pwd == $result['password']) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['email'] = $result['email'];
        redirect_to("index.php");
    } else {
        $_SESSION['message'] = "Login Failed!";
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
        <title>Log In</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" action="login.php">
                        <span style="color: red; font-weight: bold; font-size: 20pt;" class="text-center"> <?php echo message(); ?> </span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"> Remember Password</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Login" name="submit"/>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="register.php">Register an Account</a>
                        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
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
