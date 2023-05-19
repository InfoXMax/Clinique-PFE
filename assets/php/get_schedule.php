<?php

include('../../backend/admin/assets/inc/config.php');

if(isset($_POST['doctor_id'])) {
    $doctor_id = $_POST['doctor_id'];
    
    // Get the distinct days from the table for the selected doctor
    $days_query = "SELECT DISTINCT day FROM doctors_schedule WHERE doc_id = ".$doctor_id;
    $days_result = $mysqli->query($days_query);
    $days = array();
    while($day_row = $days_result->fetch_assoc()) {
        $days[] = $day_row['day'];
    }
    
    // Get the doctor's schedule from the table
    $schedule_query = "SELECT * FROM doctors_schedule WHERE doc_id = ".$doctor_id;
    $schedule_result = $mysqli->query($schedule_query);
    $schedule = array();
    while($schedule_row = $schedule_result->fetch_assoc()) {
        $schedule[] = $schedule_row;
    }
    
    // Create an array to hold the response data
    $response = array(
        'days' => $days,
        'schedule' => $schedule
    );
    
    // Return the response data as JSON
    echo json_encode($response);
}
?>