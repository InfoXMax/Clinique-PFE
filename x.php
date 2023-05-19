<?php
  // Retrieve the selected doctor's ID from the form data
  $doc_id = $_POST['doc_id'];

  // Connect to the database
  $conn = new mysqli('localhost', 'root', '', 'hmisphp');

  // Check for errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve the doctor's schedule from the database
  $sql = "SELECT * FROM doctors_schedule WHERE doc_id = $doc_id";
  $result = $conn->query($sql);

  // Create an HTML table to display the doctor's schedule
  $schedule_table = "<table>";
  $schedule_table .= "<tr><th>Day</th><th>Time From</th><th>Time To</th></tr>";
  while ($row = $result->fetch_assoc()) {
    $schedule_table .= "<tr>";
    $schedule_table .= "<td>" . $row['day'] . "</td>";
    $schedule_table .= "<td>" . $row['time_from'] . "</td>";
    $schedule_table .= "<td>" . $row['time_to'] . "</td>";
    $schedule_table .= "</tr>";
  }
  $schedule_table .= "</table>";

  // Close the database connection
  $conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Doctor Schedule</title>

  </head>
  <body>
    <h1>Doctor Schedule</h1>
    <p>Here is the schedule for Dr. <?php echo $doc_id; ?>:</p>
    <?php echo $schedule_table; ?>
    <button onclick="showPopup()">Select a Time Slot</button>
    <div id="popup" class="popup">
      <div class="popup-content">
        <span class="close" onclick="hidePopup()">&times;</span>
        <h2>Select a Time Slot</h2>
        <form>
          <label for="day">Day:</label>
          <input type="text" id="day" name="day" readonly>
          <label for="time">Time:</label>
          <input type="text" id="time" name="time" readonly>
          <button type="submit">Select</button>
        </form>
      </div>
    </div>
<script>
    // Get the popup window
var popup = document.getElementById("popup");

// Get the button that opens the popup
var btn = document.getElementById("schedule-button");

// Get the <span> element that closes the popup
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the popup
btn.onclick = function() {
  popup.style.display = "block";
}

// When the user clicks on <span> (x), close the popup
span.onclick = function() {
  popup.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}

// Function to display the doctor's schedule in the popup
function showSchedule(doctorId, day, timeFrom, timeTo) {
  var scheduleText = "Doctor " + doctorId + " is available on " + day + " from " + timeFrom + " to " + timeTo;
  var schedule = document.getElementById("schedule");
  schedule.innerHTML = scheduleText;
}

</script>
  </body>
</html>
