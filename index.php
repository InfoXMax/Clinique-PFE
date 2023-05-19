<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Clinique UPM</title>
<!-- add this to the head section of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <!-- <link rel="stylesheet" href="assets/css/owl-carousel.min.css"> -->
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/files/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/files/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/files/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/files/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <h2 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Clinique UPM</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#accueil" class="nav-item nav-link active">Accueil</a>
                        <a href="#about" class="nav-item nav-link">À propos</a>
                        <a href="#service" class="nav-item nav-link">Service</a>
                        <a href="backend/doc/index.php" class="nav-item nav-link">Doctor's Login</a>
                        <a href="backend/admin/index.php" class="nav-item nav-link">Administrator Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header" id="accueil">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Bienvenue</h5>
                    <h1 class="display-1 text-white mb-md-4">La meilleure Clinique dans votre ville</h1>
                    <div class="pt-2">
                        <a href="#doctors" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Trouver un Médecin</a>
                        <a href="#rendezvous" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Rendez-vous</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="assets/files/img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">À propos de nous</h5>
                        <h1 class="display-4">Les meilleurs soins médicaux pour vous et votre famille</h1>
                    </div>
                    <p>Bienvenue à notre clinique! Nous sommes un établissement de santé dévoué à fournir des soins de qualité supérieure à nos patients. Nous offrons une gamme complète de services médicaux pour répondre à tous les besoins de santé de nos patients. Notre équipe de professionnels de la santé compétents et dévoués est là pour vous aider à maintenir votre santé et votre bien-être.</p>
                    <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Médecins<small class="d-block text-primary">Qualifiés</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                                <h6 class="mb-0">Services<small class="d-block text-primary">D'urgence</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Test<small class="d-block text-primary">Précis</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                                <h6 class="mb-0">Service D'ambulance<small class="d-block text-primary">Gratuit</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5" id="service">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Nos Services</h5>
                <h1 class="display-4">Excellents services médicaux</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-user-md text-white"></i>
                        </div>
                        <h4 class="mb-3">Soin d'urgence</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-procedures text-white"></i>
                        </div>
                        <h4 class="mb-3">Opération & Chirurgie</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-stethoscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Consultation à l'extérieur</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-ambulance text-white"></i>
                        </div>
                        <h4 class="mb-3">Service d'ambulance</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-pills text-white"></i>
                        </div>
                        <h4 class="mb-3">Médecine & Pharmacie</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-microscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Analyse de sang</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

<!-- Team Start -->
<div class="container-fluid py-5" id="doctors">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">NOS MEDECINS</h5>
            <h1 class="display-4">Contacter un Médecin</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative">
            <?php
            include('backend/admin/assets/inc/config.php');
            // Fetch data from the database
            $result = $mysqli->query("SELECT * FROM his_docs");
            if (mysqli_num_rows($result) > 0) {
                // Loop through the rows and output the data
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100"
                                     src="backend/admin/assets/images/<?php echo $row['doc_image']; ?>"
                                     style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3><?php echo $row['doc_fname'] . ' ' . $row['doc_lname']; ?></h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4"><?php echo $row['doc_dept']; ?></h6>
                                    <p class="m-0"><?php echo $row['doc_email']; ?></p>
                                    <h5 class="mt-3">Horaires :</h5>
                                    <?php
                                    $schedule = $mysqli->query("SELECT * FROM doctors_schedule WHERE doc_id = ".$row['doc_id']);
                                    if (mysqli_num_rows($schedule) > 0) {
                                        while ($sched = mysqli_fetch_assoc($schedule)) {
                                            echo '<p>'.$sched['day'].' : '.$sched['time_from'].' - '.$sched['time_to'].'</p>';
                                        }
                                    } else {
                                        echo '<p>Aucun horaire disponible pour ce médecin.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
    <!-- Team End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary my-5 py-5" id="rendezvous">
 
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Rendez-vous</h5>
                        <h1 class="display-4">Prendre rendez-vous pour un membre de votre famille.</h1>
                    </div>
                    <p class="text-white mb-5">Vous pouvez prendre rendez-vous avec un professionnel de la santé (médecin de famille, infirmière praticienne spécialisée ou médecin président)</p>
                    <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="#doctors">Trouver un Médecin</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Rendez-Vous</h1>
                        <span id="availableError"></span>
                        <form id="appointment-form" method="post">
                            <div class="row g-3">
                            <div class="col-12 col-sm-6">
                        <select class="form-select bg-light border-0" onchange="handleSelectChange(event.target.value)" style="height: 55px;" id="doctor" name="doctor">
                    <option value="" selected>Choisir</option>
                    </select>
</div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre nom" style="height: 55px;" name="name" Required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Votre Email" style="height: 55px;" name="email" Required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="date"  name="date" class="form-control"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            onchange="handleDateChange(event)"
                                            placeholder="Date" style="height: 55px;" min="<?php echo date('Y-m-d'); ?>" max="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Temp" data-target="#time" data-toggle="datetimepicker" style="height: 55px;" name="time">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="submit-button">Prendre rendez-vous</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">ENTRER EN CONTACT</h4>
                    <p class="mb-4">Nous sommes là pour vous aider n'hésitez pas à nous contacter afin que nous puissions répondre à votre question ou préoccupation le plus rapidement possible.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Marrakech Guiliz</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+212524141400</p>
                </div>
                <br>
                <div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:1000px;height:300px;"><div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=upm&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googl-ehtml" href="https://www.bootstrapskins.com/themes" id="auth-map-data">premium bootstrap themes</a><style>#google-maps-display img{max-height:none;max-width:none!important;background:none!important;}</style></div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Clinique UPM</a>. All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

   


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <!-- <script src="assets/js/vendor/owl-carousel.min.js"></script> -->
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/files/lib/easing/easing.min.js"></script>
    <script src="assets/files/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/files/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/files/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/files/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/files/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="assets/files/js/main.js"></script>
    <script src="assets/js/submit.js"></script>




</body>
</html>
