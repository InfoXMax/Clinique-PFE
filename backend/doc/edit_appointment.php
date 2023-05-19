<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['doc_id'];
?>
<head>
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<?php
include('assets/inc/config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $schedule = $_POST["schedule"];

  // Update the appointment in the database
  $sql = "UPDATE appointment_list SET name='$name', email='$email', schedule='$schedule' WHERE id=$id";
  if ($mysqli->query($sql) === TRUE) {
      // Echo JavaScript to close the popup and refresh the page
      echo '<script type="text/javascript">';
      echo 'alert("Appointment updated successfully!");';
      echo 'window.opener.location.reload();';
      echo 'window.close();';
      echo '</script>';
  } else {
      echo "Error updating record: " . $mysqli->error;
  }
} else {
  // Get the appointment ID from the URL parameter
  $id = $_GET["id"];

  // Fetch the appointment data from the database
  $result = $mysqli->query("SELECT * FROM appointment_list WHERE id=$id");

  if (mysqli_num_rows($result) > 0) {
      // Output the form
      $row = mysqli_fetch_assoc($result);
      ?>
      
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
          <label for="name">Name:</label>
          <input  class="form-control" type="text" name="name" value="<?php echo $row["name"]; ?>"><br></div>
          <div class="form-group">
          <label for="email">Email:</label>
          <input  class="form-control" type="text" name="email" value="<?php echo $row["email"]; ?>"><br></div>
          <div class="form-group">
          <label for="schedule">Schedule:</label>
        
          <input  class="form-control"  type="datetime-local" name="schedule" value="<?php echo $row["schedule"]; ?>"><br>
         </div>

         
          <input  class="btn btn-primary"type="submit" value="Save">
      </form>
  
      <?php
  } else {
      // No appointment found with the given ID
      echo "Appointment not found.";
  }
}


$mysqli->close();
?>