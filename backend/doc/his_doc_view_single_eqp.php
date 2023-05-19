<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id = $_SESSION['doc_id'];
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include ('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $eqp_code=$_GET['eqp_code'];
                $ret="SELECT  * FROM his_equipments WHERE eqp_code = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$eqp_code);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>

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
                                                <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Tableau de bord</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventaire</a></li>
                                                <li class="breadcrumb-item active">Équipements |Actifs</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Équipement #<?php echo $row->eqp_code;?> Détails</h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-5">

                                                <div class="tab-content pt-0">

                                                    <div class="tab-pane active show" id="product-1-item">
                                                        <img src="assets/images/hosp_asset.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                            
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Nom de l'équipement : <?php echo $row->eqp_name;?></h2>
                                                    <hr>
                                                    <h4 class="text-danger">Vendeur d'équipement: <?php echo $row->eqp_vendor;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Code à barres de l'équipement: <?php echo $row->eqp_code;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Équipement (s) disponible: <?php echo $row->eqp_qty;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">État de l'équipement: <?php echo $row->eqp_status;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Description de l'équipement</h4>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->eqp_desc;?>
                                                    </p>
                                                   
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                       

                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                        <?php include('assets/inc/footer.php');?>
                    <!-- end Footer -->

                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>