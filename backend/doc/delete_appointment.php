<?php
include('assets/inc/config.php');

/// Prepare and execute SQL statement to delete the appointment with the given ID
$id = $mysqli->real_escape_string($_GET['id']);
$sql = "DELETE FROM appointment_list WHERE id = '$id'";

if ($mysqli->query($sql) === TRUE) {
    // Appointment deleted successfully, redirect to appointment list page
    header("Location: his_appointment.php");
    exit;
} else {
    // Error deleting appointment, display error message
    echo "Error deleting appointment: " . $mysqli->error;
}

$mysqli->close();
?>