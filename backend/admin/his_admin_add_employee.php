<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
	if(isset($_POST['add_doc']))
	{
		$doc_fname = $_POST['doc_fname'];
		$doc_lname = $_POST['doc_lname'];
		$doc_number = $_POST['doc_number'];
        $doc_email = $_POST['doc_email'];
        $doc_pwd = sha1(md5($_POST['doc_pwd']));
        
        // Get the uploaded file details
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];

        // Check if the file was uploaded successfully
        if($image_error == 0) {
            // Move the uploaded file to a designated directory
            $upload_dir = 'assets/images/';
            $image_path = $image_name;
            move_uploaded_file($image_tmp, $upload_dir . $image_path);
            
            // sql to insert captured values
			$stmt = $mysqli->prepare("INSERT INTO his_docs (doc_fname, doc_lname, doc_number, doc_email, doc_pwd, doc_image) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('ssssss', $doc_fname, $doc_lname, $doc_number, $doc_email, $doc_pwd, $image_path);
			$stmt->execute();
            $stmt->close();
    


		}

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
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Tableau de bord</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Médecin</a></li>
                                            <li class="breadcrumb-item active">Ajouter un Médcin</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ajouter des détails sur le médecin</h4>
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
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">Prénom :</label>
            <input type="text" required="required" name="doc_fname" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Nom de famille :</label>
            <input required="required" type="text" name="doc_lname" class="form-control" id="inputPassword4">
        </div>
    </div>

    <div class="form-group col-md-2" style="display:none">
        <?php 
            $length = 5;    
            $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        ?>
        <label for="inputZip" class="col-form-label">Numéro de médecin</label>
        <input type="text" name="doc_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
    </div>

    <div class="form-group">
        <label for="inputAddress" class="col-form-label">E-mail</label>
        <input required="required" type="email" class="form-control" name="doc_email" id="inputAddress">
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity" class="col-form-label">Mot de Passe</label>
            <input required="required" type="password" name="doc_pwd" class="form-control" id="inputCity">
        </div>
        <div class="form-row">
            <label for="form-group col-md-6" class="col-form-label">Télécharger l'image</label>
            <input type="file" class="form-control" id="inputImage" name="image">
        </div>
    </div>

    <button type="submit" name="add_doc" class="ladda-button btn btn-success" data-style="expand-right">Ajouter le Médcin</button>
</form>

<?php
if (isset($_POST['add_doc'])) {
    // validate data
    if (empty($_POST['doc_fname']) || empty($_POST['doc_lname']) || empty($_POST['doc_email']) || empty($_POST['doc_pwd']) || empty($_FILES['image']['name'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Invalid data. Please check the form and try again.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
    } else {
        // upload is successful
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Upload successful.
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