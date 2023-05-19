<?php
include('../../backend/admin/assets/inc/config.php');

// Get the form data
$doctor = $_POST['doctor'];
$doctorName = $_POST['doctor_name'];
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert the data into the database
$sql = "INSERT INTO appointment_list (doc_id, doctor_name, name, email, schedule) VALUES ('$doctor', '$doctorName', '$name', '$email', '$date $time')";

if ($mysqli->query($sql) === TRUE) {
  echo "Appointment created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
