<!--Server side code to handle  Patient Registration-->
<?php
    session_start();
    include('assets/inc/config.php');
        if(isset($_POST['add_patient']))
        {
            $pat_fname=$_POST['pat_fname'];
            $pat_lname=$_POST['pat_lname'];
            $pat_number=$_POST['pat_number'];
            $pat_phone=$_POST['pat_phone'];
            $pat_type=$_POST['pat_type'];
            $pat_addr=$_POST['pat_addr'];
            $pat_age = $_POST['pat_age'];
            $pat_dob = $_POST['pat_dob'];
            $pat_ailment = $_POST['pat_ailment'];
            //sql to insert captured values
            $query="insert into his_patients (pat_fname, pat_ailment, pat_lname, pat_age, pat_dob, pat_number, pat_phone, pat_type, pat_addr) values(?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssss', $pat_fname, $pat_ailment, $pat_lname, $pat_age, $pat_dob, $pat_number, $pat_phone, $pat_type, $pat_addr);
            $stmt->execute();
            /*
            *Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
            *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
            */ 
            //declare a varible which will be passed to alert function
            if($stmt)
            {
                $success = "Détails du patient ajoutés";
            }
            else {
                $err = "Veuillez réessayer ou essayer plus tard";
            }
            
            
        }
?>
<!--End Server Side-->
<!--End Patient Registration-->
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Les Patients</a></li>
                                            <li class="breadcrumb-item active">Ajouter un patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ajouter les détails du patient</h4>
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
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Prénom</label>
                                                    <input type="text" required="required" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Prénom">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Nom de famille</label>
                                                    <input required="required" type="text" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Nom de famille">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date de naissance</label>
                                                    <input type="text" required="required" name="pat_dob" class="form-control" id="inputEmail4" placeholder="JJ/MM/AAAA">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Age">
                                                </div>
                                            </div>
                                            <script>
  // Get a reference to the age input field
  const ageInput = document.querySelector('input[name="pat_age"]');

  // Add an event listener to the date of birth input field
  document.querySelector('input[name="pat_dob"]').addEventListener('input', (event) => {
    // Parse the entered date of birth using the DD/MM/YYYY format
    const [day, month, year] = event.target.value.split('/');
    const dob = new Date(`${year}-${month}-${day}`);

    // Calculate the age in years based on the entered date of birth
    const age = new Date(Date.now() - dob.getTime()).getFullYear() - 1970;

    // Update the age input field with the calculated age
    ageInput.value = age;
  });
</script>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Adresse</label>
                                                <input required="required" type="text" class="form-control" name="pat_addr" id="inputAddress" placeholder="Adresse">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Téle</label>
                                                    <input required="required" type="text" name="pat_phone" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Maladie du Patient</label>
                                                    <input required="required" type="text" name="pat_ailment" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de patient</label>
                                                    <select id="inputState" required="required" name="pat_type" class="form-control">
                                                        <option>Choisi</option>
                                                        <option>Hospitalisé</option>
                                                        <option>Ambulatoire</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Ajouter le Patient</button>

                                        </form>
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
