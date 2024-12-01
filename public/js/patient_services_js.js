 $(document).ready(function () {
    var patient_id = $('#p_id').val();
   
    // Handle form submission
    $('#save_service_fee').submit(function (e) {
      e.preventDefault();  

      $('.is-invalid').removeClass('is-invalid');
      $('.invalid-feedback').remove();

      var form_data = $(this).serialize();

      let isValid = true;
      
      if ($('#clinics').val() === '-Select-') {
         $('#clinics').addClass('is-invalid');
         $('#clinics').after('<div class="invalid-feedback">Please select a clinic.</div>');
        isValid = false;
      }

      if ($('#service_type').val() === '-Select-') {
         $('#service_type').addClass('is-invalid');
         $('#service_type').after('<div class="invalid-feedback">Please select a service type.</div>');
        isValid = false;
      }

      if ( $('#credit_amount').empty()) {
        // $('#credit_amount').addClass('is-invalid');
        // $('#credit_amount').after('<div class="invalid-feedback">Please enter a valid Amount.</div>');
        // isValid = false;
      }

      if ($('#cash_amount').val() ) {
        // $('#cash_amount').addClass('is-invalid');
        // $('#cash_amount').after('<div class="invalid-feedback">Please enter a valid Amount</div>');
        // isValid = false;
      }

      if ($('#pat_type').val() === '-Select-') {
         $('#pat_type').addClass('is-invalid');
         $('#pat_type').after('<div class="invalid-feedback">Please select a Attendance Type.</div>');
        isValid = false;
      }

      if (isValid) {
        $.ajax({
          url: '/services/patient_service',
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (response) {
            if (response.success) {
              
              var successAlert = $('<div class="alert alert-info alert-dismissible fade show" role="alert">')
                                .text('Service submitted!')
                            $('#success_diplay').prepend(successAlert);
                            // Automatically remove the alert after 5 seconds
                            setTimeout(function () {
                                successAlert.alert('close');
                            }, 7000);
              $('#save_service_fee')[0].reset();// Reset form           
            } else {
              alert('There was an issue with the submission.');
            }
          },
          error: function (xhr, status, error) {
            alert('An error occurred: ' + error);
          }
        });
      }
    });
  });

  $(document).on('change', '#clinics', function() {
    var clinic_id = $(this).val();

    $('#service_type').empty().append('<option disabled selected>-Select-</option>');

    $.ajax({
        url: '/services/' + clinic_id + '/get_specialty',
        type: 'GET',
        success: function(response) {
          if (response.success) {
                $.each(response.result, function(index, service_point) {
                    $('#service_type').append(
                        $('<option></option>').val(service_point.attendance_type_id).text(service_point.attendance_type)
                    );
                });
            } else {
                // If no specialties found, show a message or leave empty
                $('#service_type').append('<option selected disabled>No specialties available</option>');
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Error fetching data! Try again.'); // Display error message if AJAX request fails
        }
    });
});
// -------------------------------------------------------------------------
$(document).on('change', '#service_type', function() {
    var service = $(this).val();

    var pat_id = $('#p_id').val();
    var pat_age = $('#p_age').val();

    $('#credit_amount').val('');
    $('#cash_amount').val('');
    $('#gdrg_code').val('');

    $.ajax({
      
        url: '/services/' + service + '/service_tarif',
        type: 'GET',
        data: {pat_age:pat_age, service:service, pat_id:pat_id},
        success: function(response) {
          if (response && response.success && response.result.length > 0) {
            var serviceData = response.result[0]; // Get the first element of the array
            
            $('#credit_amount').val(serviceData.nhis_amount);
            $('#cash_amount').val(serviceData.cash_amount);
            $('#gdrg_code').val(serviceData.gdrg);

          } else if (response && !response.success && response.message) {
             toastr.error(response.message);
            } else {
              toastr.error('Unexpected response format');
          }
        },
        error: function(xhr, status, error) {
            toastr.error('Error fetching data! Try again.');
        }
    });
});
// --------------------------------------------GET DATE FOR attendane_date------------------------------------------------------
document.addEventListener("DOMContentLoaded", function() {
  const dateInput = document.getElementById("attendance_date");
  const today = new Date();
  // Format date as YYYY-MM-DD for the input value
  const formattedDate = today.toISOString().split("T")[0];
  dateInput.value = formattedDate;
});
// -------------------------------------------------------------------------------------------------------------------------------