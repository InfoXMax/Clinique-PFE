let available = [];
let selectedDoctorSchedule = [];
const days = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
const handleSelectChange = (id)=>{
    selectedDoctorSchedule =  available.filter(i => i.doc_id == id )
}

const handleDateChange = (e) =>{
  $("#availableError").empty()
    var d = new Date(e.target.value);
    var dayName = days[d.getDay()];
   let exist = selectedDoctorSchedule.some(item =>item.day.toLowerCase() == dayName);
   if(!exist){
    $("#availableError").append("error")
   }

}

$(document).ready(function(){
  // Fetch the list of doctors from the database
  $.ajax({
    type: 'GET',
    url: 'assets/php/get-doctors.php',
    dataType: 'json',
    success: function(data){
        const doctors = data.doctors;
        available = [...data.availaible];
      // Populate the select element with the list of doctors
      $.each(doctors, function(index, {id, name}){
        
        $('#doctor').append(`<option value=${id}>${name}</option>`);
      });
    }
  });

  $('#appointment-form').submit(function(event){
    // Stop the form from submitting normally
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();
    var doctorName = $('#doctor option:selected').text();
    formData += '&doctor_name=' + doctorName;

    // Submit the form using AJAX
    $.ajax({
      type: 'POST',
      url: 'assets/php/process-appointment.php',
      data: formData,
      success: function(response){
        // Show the success message
        $('#submit-button').after('<p>Rendez-vous créé avec succès</p>');
      }
    });
  });
});