<?php
header('Content-Type: application/json');

include('../../backend/admin/assets/inc/config.php');

// Fetch the list of doctors from the database
$doctors = $mysqli
        ->query("SELECT doc_id as id, CONCAT(doc_fname, ' ', doc_lname) AS name FROM his_docs")
            ->fetch_all(MYSQLI_ASSOC);
// Build an array of data
$data = array();
$data["doctors"] =  $doctors;
$availaible = $mysqli
        ->query("SELECT doc_id, day, time_from, time_to FROM doctors_schedule")
            ->fetch_all(MYSQLI_ASSOC);
$data["availaible"] = $availaible;
echo json_encode($data);
$mysqli->close();
?>


