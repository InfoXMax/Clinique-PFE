<!--Server side code to handle  Patient Registration-->
<?php
    session_start();
    include('assets/inc/config.php');
    if(isset($_POST['add_doc']))
    {
        $doctor = $_POST['doc_id'];
        $time_from = $_POST['time_from'];
        $time_to = $_POST['time_to'];
        $day = $_POST['day'];
        
        $stmt = $mysqli->prepare("INSERT INTO doctors_schedule (doc_id, day, time_from, time_to) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $doctor, $day, $time_from, $time_to);
        $stmt->execute();
        $stmt->close();
    }
?>

<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                            <li class="breadcrumb-item active">Calendrier</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Calendrier</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Remplir tous les champs</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
    <select id="doctor" name="doc_id">
        <?php
        // Include the database connection code
        include('backend/admin/assets/inc/config.php');

        // Query the database for the doctors' names
        $result = $mysqli->query("SELECT doc_id, doc_fname, doc_lname FROM his_docs");

        // Build an array of options
        $options = "<option selected>Sélectionnez un médecin</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $options .= "<option value='" . $row['doc_id'] . "'>" . $row['doc_fname'] . " " . $row['doc_lname'] . "</option>";
        }
        echo $options;
        ?>
    </select>
    <div class="form-group">
        <label for="inputState" class="col-form-label">Les Jours</label>
        <select id="inputState" name="day" class="form-control">
            <option>Choisir</option>
            <option>Lundi</option>
            <option>Mardi</option>
            <option>Mercredi</option>
            <option>Jeudi</option>
            <option>Vendredi</option>
            <option>Samedi</option>
            <option>Dimanche</option>
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">temps de</label>
            <input type="time" name="time_from" class="form-control" >
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Jusqu'à</label>
            <input  type="time" name="time_to" class="form-control" >
        </div>
    </div>
    <button type="submit" name="add_doc" class="ladda-button btn btn-success" data-style="expand-right">Ajouter un Horaire</button>
</form>

<?php
if (isset($_POST['add_doc'])) {
    // validate data
    if (empty($_POST['doc_id']) || empty($_POST['time_from']) || empty($_POST['time_to']) || empty($_POST['day'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Error
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
    } else {
        // upload is successful
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Horaire ajouté
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
    }
}
?>

                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>