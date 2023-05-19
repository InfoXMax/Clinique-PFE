<!DOCTYPE html>
<html>
<head>
  <title>Appointment Form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <h1>Appointment Form</h1>
  <form id="appointment-form" method="post">
  <select id="doctor" name="doctor">
    <option selected>Select Doctor</option>
    <?php
      include('backend/admin/assets/inc/config.php');
      $result = $mysqli->query("SELECT doc_id, doc_fname, doc_lname FROM his_docs");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['doc_id'] . "'>" . $row['doc_fname'] . " " . $row['doc_lname'] . "</option>";
      }
    ?>
  </select>
  <br><br>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="">

  <br>
  <?php
// Assuming you have already established a database connection
$doctor_id = 123; // Replace with the ID of the doctor you want to show available dates for
$today = date('Y-m-d');
$one_week_later = date('Y-m-d', strtotime('+7 days'));

// Query the database for the available dates for the doctor
$sql = "SELECT DISTINCT day FROM doctors_schedule WHERE doc_id = $doctor_id AND day BETWEEN '$today' AND '$one_week_later'";
$result = mysqli_query($mysqli, $sql);

// Generate the input field with the available dates
echo '<select id="date" name="date">';
while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['day'];
    echo '<option value="' . $date . '">' . $date . '</option>';
}
echo '</select>';
?>

  <br><br>
  <label for="time">Time:</label>
  <select id="time" name="time">
    <option>Select Time</option>
    <?php
      if(isset($_POST['doctor']) && isset($_POST['date'])) {
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $result = $mysqli->query("SELECT time_from, time_to FROM doctors_schedule WHERE doc_id = '$doctor' AND day = '$date'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['time_from'] . "'>" . date('h:i A', strtotime($row['time_from'])) . " - " . date('h:i A', strtotime($row['time_to'])) . "</option>";
        }
      }
    ?>
  </select>
  <br><br>
  <button type="submit" id="submit-button">Submit</button>
</form>


<br>











  <!-- <script>
    $(document).ready(function(){

      $.ajax({
        type: 'GET',
        url: 'get-doctors.php',
        dataType: 'json',
        success: function(data){

          $.each(data, function(index, doctor){
            $('#doctor').append('<option value="' + doctor.id + '">' + doctor.doc_fname + ' ' + doctor.doc_lname + '</option>');
          });
        }
      });

      $('#appointment-form').submit(function(event){

        event.preventDefault();


        var formData = $(this).serialize();
        var doctorName = $('#doctor option:selected').text();
        formData += '&doctor_name=' + doctorName;


        $.ajax({
          type: 'POST',
          url: 'process-appointment.php',
          data: formData,
          success: function(response){

            $('#submit-button').after('<p>Appointment created successfully</p>');
          }
        });
      });
    });
  </script> -->

  <!-- Team Start -->
<div class="container-fluid py-5" id="doctors">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">NOS MEDECINS</h5>
            <h1 class="display-4">Contacter un Médecin</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative">
            <!-- Form to add a new doctor -->
            <form method="post" action="process.php" enctype="multipart/form-data">
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <input type="text" name="fname" class="form-control" placeholder="First Name">
                                <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                <input type="text" name="dept" class="form-control" placeholder="Department">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
