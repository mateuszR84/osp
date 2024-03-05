$(document).ready(function() {
    console.log('start');
  // Function to update expiry field based on selected date
  function updateExpiry() {
    var selectedDate = $('#DatePicker-formMedicalExam-date-medical_exam').val(); // Get selected date from datepicker
    var dateParts = selectedDate.split('.');
    selectedDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

    if (selectedDate) {
      // Calculate difference in days (assuming expiry means days from selected date)
      var today = new Date();
      var differenceInDays = Math.floor((today - selectedDate) / (1000 * 60 * 60 * 24));

      // Update the expiry field with the calculated difference
      if (today > selectedDate) {
          $('#Form-field-Firefighter-_medical_exam_expiry')
          .val('- ' +differenceInDays+ ' dni')
          .css('background-color', getColorBasedOnDifference(differenceInDays));
      } else {
          $('#Form-field-Firefighter-_medical_exam_expiry')
          .val(Math.abs(differenceInDays) + ' dni')
          .css('background-color', getColorBasedOnDifference(differenceInDays));
      }

    } else {
      // Clear the expiry field if no date is selected
      $('#Form-field-Firefighter-_medical_exam_expiry').val('').css('background-color', '');
    }

    // Function to set background color based on difference in days
    function getColorBasedOnDifference(differenceInDays) {
      console.log(differenceInDays);
        if ((differenceInDays) > 0) {
        return '#e66e79'; //red
        } else if ((differenceInDays) > -30 && (differenceInDays) < 0) {
        return '#f0b071'; //orange
        } else if (differenceInDays < -31) {
        return '#9eed9a'; //green
        }
    }
  }

  // Call the update function initially to handle pre-populated dates
  updateExpiry();

  // Bind the update function to the datepicker's 'changeDate' event
  $('#DatePicker-formMedicalExam-date-medical_exam').on('change', updateExpiry);
});
