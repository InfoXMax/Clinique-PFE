<?php
    session_start();
    include('assets/inc/config.php');

    if (isset($_POST['update_doc'])) {
        $doc_fname = $_POST['doc_fname'];
        $doc_lname = $_POST['doc_lname'];
        $doc_number = $_GET['doc_number'];
        $doc_email = $_POST['doc_email'];
        $doc_pwd = sha1(md5($_POST['doc_pwd']));
        $doc_dpic = $_FILES["doc_dpic"]["name"];
        move_uploaded_file($_FILES["doc_dpic"]["tmp_name"], "../doc/assets/images/users/" . $_FILES["doc_dpic"]["name"]);

        // Get the uploaded file details
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];

        // Check if the file was uploaded successfully
        if ($image_error == 0) {
            // Move the uploaded file to a designated directory
            $upload_dir = 'assets/images/';
            $image_path = $image_name;
            move_uploaded_file($image_tmp, $upload_dir . $image_path);

            //sql to update captured values
            $query = "UPDATE his_docs SET doc_fname=?, doc_lname=?,  doc_email=?, doc_pwd=?, doc_dpic=?, doc_image=? WHERE doc_number = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sssssss', $doc_fname, $doc_lname, $doc_email, $doc_pwd, $doc_dpic, $image_path, $doc_number);
            $stmt->execute();

            //declare a variable which will be passed to alert function
            if ($stmt) {
                $success = "Détails des employés mis à jour";
            } else {
                $err = "Veuillez réessayer ou essayer plus tard";
            }
        } else {
            //sql to update captured values without image
            $query = "UPDATE his_docs SET doc_fname=?, doc_lname=?,  doc_email=?, doc_pwd=?, doc_dpic=? WHERE doc_number = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('ssssss', $doc_fname, $doc_lname, $doc_email, $doc_pwd, $doc_dpic, $doc_number);
            $stmt->execute();

            //declare a variable which will be passed to alert function
            if ($stmt) {
                $success = "Détails des employés mis à jour";
            } else {
                $err = "Veuillez réessayer ou essayer plus tard";
            }
        }
    }
?>

<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
    
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
                                            <li class="breadcrumb-item active">Gérer</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Mettre à jour les détails</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $doc_number=$_GET['doc_number'];
                            $ret="SELECT  * FROM his_docs WHERE doc_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$doc_number);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Remplir tous les champs</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Prénom</label>
                                                    <input type="text" required="required" value="<?php echo $row->doc_fname;?>" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Nom de famille</label>
                                                    <input required="required" type="text" value="<?php echo $row->doc_lname;?>" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" value="<?php echo $row->doc_email;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Mot de passe</label>
                                                    <input required="required"  type="password" name="doc_pwd" class="form-control" id="inputCity">
                                                </div> 
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Image de Profil</label>
                                                    <input   type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                            </div>                                            
                                            <div class="form-row">
            <label for="form-group col-md-6" class="col-form-label">Télécharger l'image</label>
            <input type="file" class="form-control" id="inputImage" name="image">
        </div>
        <br>
                                            <button type="submit" name="update_doc" class="ladda-button btn btn-success" data-style="expand-right">Mise à jour</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

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