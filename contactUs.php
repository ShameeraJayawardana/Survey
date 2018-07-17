<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

if (isset($_POST['submit'])) {
//    $from = $_POST['from'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $txt = $_POST['message'];
    $headers = "From: " . $_POST['from'];

    $mail = mail($to, $subject, $txt, $headers);

    if ($mail){
        echo '<script>'.'console.log("Success")'.'</script>';
    }else{
        echo '<script>'.'console.log("failed")'.'</script>';
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
<?php include 'src/components/nav.php'; ?>
<div class="content-wrapper" style="padding-top: 0;">
    <div class="row">
        <div class="col-md-12 text-center" style="font-family: 'Open Sans', sans-serif; font-weight: 600; font-size: 25pt; padding-top: 20px;">
            CONTACT US
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="300">Designation</th>
                        <th width="300">Name</th>
                        <th width="300">Telephone</th>
                        <th width="300">Fax</th>
                        <th width="300">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Surveyor General</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. P.M.P. UDAYAKANTHA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368569 / 077-2642365</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2369343</td>
                        <td data-title="Email" class="color_dark fs_small">sg@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Add. Surveyor General (Central)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. S.M.P.P. SANGAKKARA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2508038</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2508038</td>
                        <td data-title="Email" class="color_dark fs_small">addsgc@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Add. Surveyor General (Field)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. S.D.P.J. DAMPEGAMA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368571</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2369945</td>
                        <td data-title="Email" class="color_dark fs_small">addsgfield@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">
                            Add. Surveyor General (Title Registration/LIS)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. P.A.N. DE SILVA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369027</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2369027</td>
                        <td data-title="Email" class="color_dark fs_small">addsgtr@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Add. Surveyor General (Human Resources
                            &amp; Administration)
                        </td>
                        <td data-title="Name" class="color_dark fs_small"></td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368440</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2368440</td>
                        <td data-title="Email" class="color_dark fs_small">addsghr@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Deputy Surveyor General
                            (Resource
                            Management)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. S.P. DHARMADASA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2588992</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2588992</td>
                        <td data-title="Email" class="color_dark fs_small">snrdsgrm@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Deputy Surveyor General
                            (Research
                            &amp; Development)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. A.L.S.C. PERERA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368601</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrdsgrd@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Deputy Surveyor General
                            (Mapping/Geo
                            Names)
                        </td>
                        <td data-title="Name" class="color_dark fs_small"></td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369586</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2369586</td>
                        <td data-title="Email" class="color_dark fs_small">snrdsgmap@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Deputy Surveyor General (DM
                            &amp;
                            PS)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. M.A.K. MALLAWARACHCHI</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2502872</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2502872</td>
                        <td data-title="Email" class="color_dark fs_small">snrdsgdm@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Deputy Surveyor General (Human
                            Resources &amp; Administration )
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. H.M.T.P. Herath</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2587925</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrdsgadmin@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General (LIS)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. W.T.M.S.B. TENNAKOON</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369865</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">dsglis@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General (Information
                            Technology)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K.D. PARAKUM SHANTHA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368101</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2368101</td>
                        <td data-title="Email" class="color_dark fs_small">dsgit@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General (Geodetic
                            Surveys)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. A. DISSANAYAKE</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2055971</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">dsggeodetic@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General (Academic)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. U.J. WITHARANAGE</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368569</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">dsgacadamic@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General (Geo
                            Informatics
                            &amp; NSID)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K.W.A. WIJEWARDANA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368102</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2368102</td>
                        <td data-title="Email" class="color_dark fs_small">dsggeoinfo@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Deputy Surveyor General / Survey
                            Coordinator (TR)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. B.H.B. CYRIL SHANTHA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369026</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">dsgtr@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Director (Finance)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. P.D.S. Cooray</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2588045</td>
                        <td data-title="Fax" class="color_dark fs_small">011-2588045</td>
                        <td data-title="Email" class="color_dark fs_small">dirfin@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Provinces)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K.T.C. GRERO</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368959</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssprov@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (LIS)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. G.D.P. ARIYATHILAKA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368603</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrsslis@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Procurement
                            &amp;
                            Supplies)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. P.K.L.S. PANDUWAWALA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368106</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrsspns@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys ( Research
                            &amp;
                            Development)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. C.D.P.R. BASNAYAKA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368602</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssrnd@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Mapping)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. S. SIVANANTHARAJAH</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2581960</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssmap@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys
                            (IT/Productivity)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. R. RUBASINGHE</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2587933</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrsscomp@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Air Surveys)
                        </td>
                        <td data-title="Name" class="color_dark fs_small"></td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2588871</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssair@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (GIS)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. G.G. DHARMAPRIYA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2587957</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssgis@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (DM&amp;PS)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. MAHINDA HEMASIRI</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368946</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssdocmgts@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Geodetic
                            Surveys)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. W.S.L.C. PERERA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2055997</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssgeodetic@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Examination)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. P.D. ANURASIRI</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368791</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssexam@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (NSDI)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K. WEERATHUNGE</td>
                        <td data-title="Telephone" class="color_dark fs_small">001-2368425</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssnsd@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (CRS)</td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. K.K.B.N. FERNANDO</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2587988</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrsscrs@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (TR)</td>
                        <td data-title="Name" class="color_dark fs_small">Mr. G.N.P. SENEVIRATNE</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369028</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrsstr@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt. of Surveys(Parcel Fabric)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K.S.K. WIJAYAWARDANA</td>
                        <td data-title="Telephone" class="color_dark fs_small"></td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssparfab@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt. of Surveys(Parcel Fabric
                            -
                            2)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mrs. K.G. SRIYA PADMINI</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369542</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssparfab2@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys
                            (Management,Development &amp; Training)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. A.D.N.K. DE SILVA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2369462</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssmdtu@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Geo Names)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. K.A.B.S. RUPASINGHE</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368599</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssgeonames@survey.gov.lk
                        </td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Special Survey
                            &amp; QC Unit)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. D.T.N. JAYASUMANA</td>
                        <td data-title="Telephone" class="color_dark fs_small"></td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssqc@survey.gov.lk</td>
                    </tr>
                    <tr>
                        <td data-title="Designation" class="color_dark fs_small">Senior Supdt of Surveys (Instrument
                            &amp;
                            Building)
                        </td>
                        <td data-title="Name" class="color_dark fs_small">Mr. P.H.N.N. NIMALAWEERA</td>
                        <td data-title="Telephone" class="color_dark fs_small">011-2368553</td>
                        <td data-title="Fax" class="color_dark fs_small"></td>
                        <td data-title="Email" class="color_dark fs_small">snrssinb@survey.gov.lk</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col-md-6">
            <div class="form-group">
                <form action="contactUs.php" method="post">
                    <input type="email" class="form-control inputField" placeholder="FROM" name="from"><br/>
                    <input type="email'" class="form-control inputField" placeholder="TO" name="to"><br/>
                    <input type="text" class="form-control inputField" placeholder="SUBJECT" name="subject"><br/>
                    <textarea placeholder="MESSAGE" class="form-control inputField" rows="5"
                              name="message"></textarea><br/>
                    <input type="submit" class="btn btn-success" value="Send Message" id="sendButton" name="submit">
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <img src="pics/map.PNG">
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