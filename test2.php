<!DOCTYPE html>
<html>
<head>
	<title>Doctor Schedule</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<label>Select a doctor:</label>
	<select id="doctor">
		<option selected disabled>Select Doctor</option>
		<?php
			include('backend/admin/assets/inc/config.php');
			$result = $mysqli->query("SELECT doc_id, doc_fname, doc_lname FROM his_docs");
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='".$row['doc_id']."'>".$row['doc_fname']." ".$row['doc_lname']."</option>";
			}
		?>
	</select>
	<br><br>
	<label>Select a date:</label>
	<input type="date" id="date">
	<br><br>
	<div id="calendar"></div>

	<script>
		$('#doctor').on('change', function() {
			var doctor_id = $(this).val();
			$.ajax({
				url: 'assets/php/get_schedule.php',
				type: 'POST',
				data: {
					doctor_id: doctor_id
				},
				dataType: 'json',
				success: function(response) {
					var schedule = response.schedule;
					$('#calendar').empty();
					$('#calendar').append('<table>');
					$('#calendar table').append('<thead><tr><th>Time</th><th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></tr></thead><tbody>');
					for (var i = 0; i < 24; i++) {
						var time = ('0' + i).slice(-2) + ':00';
						$('#calendar table tbody').append('<tr><td>'+time+'</td></tr>');
						for (var j = 0; j < 7; j++) {
							var day = response.days[j];
							var timeAvailable = false;
							for (var k = 0; k < schedule.length; k++) {
								if (schedule[k].day == day && schedule[k].time_from <= time && schedule[k].time_to > time) {
									timeAvailable = true;
									break;
								}
							}
							$('#calendar table tbody tr:last-child').append('<td style="background-color: '+(timeAvailable ? 'green' : 'red')+'"></td>');
						}
					}
					$('#calendar').append('</tbody></table>');
				},
				error: function() {
					alert('Error fetching schedule.');
				}
			});
		});

		$('#date').on('change', function() {
    var date = new Date($(this).val());
    var dayName = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'][date.getDay()];
    $('#calendar table tbody tr').each(function(index) {
        if (index > 0) {
            var time = ('0' + index).slice(-2) + ':00';
            var timeAvailable = false;
            var cells = $(this).find('td');
            for (var k = 0; k < cells.length; k++) {
                if (k > 0 && response.days[k-1] == dayName && $(cells[k]).css('background-color') == 'rgb(0, 128, 0)') {
                    timeAvailable = false;
                    break;
                }
            }
            var cell = $(cells[k]);
            var day = days[k];
            var cellAvailable = selectedDoctorSchedule.some(item => item.day == day && item.time_from <= time && item.time_to > time);
            if (cellAvailable) {
                timeAvailable = true;
            }
            cell.css('background-color', cellAvailable ? 'green' : 'red');
        }
        // if none of the time slots are available, hide the row
        if (!timeAvailable) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
});

if (index > 0) {
    var time = ('0' + index).slice(-2) + ':00';
    var timeAvailable = false;
    var cells = $(this).find('td');
    for (var k = 0; k < cells.length; k++) {
        var dayName = days[k];
        var cell = $(cells[k]);
        var appointments = cell.data('appointments');
        if (appointments && appointments.length) {
            for (var m = 0; m < appointments.length; m++) {
                var appointment = appointments[m];
                if (appointment.doctorId === doctorId && appointment.time === time) {
                    timeAvailable = false;
                    break;
                } else {
                    timeAvailable = true;
                }
            }
        } else {
            timeAvailable = true;
        }
        if (timeAvailable) {
            cell.css('background-color', 'green');
        } else {
            cell.css('background-color', 'red');
        }
    }
}
</script>
</body>
</html>