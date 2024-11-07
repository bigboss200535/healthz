 $(document).ready(function () {
    var patient_id = $('#p_id').val();
    
    function fetchPatientData(patient_id) {
        $.ajax({
          url: '/services/patient_service_data/' + patient_id, 
          type: 'GET',
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              
            // $("#patient_services").load(location.href + " #patient_services");

            } else {
              toastr.error('No data found for this patient.');
            }
          },
          error: function(xhr, status, error) {
            toastr.error('Error fetching data! Please try again.');
          }
        });
      }

      fetchPatientData(patient_id);
    // Handle form submission
    $('#save_service_fee').submit(function (e) {
      e.preventDefault();  

      $('.is-invalid').removeClass('is-invalid');
      $('.invalid-feedback').remove();

      var formData = $(this).serialize();

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

      if ($('#credit_amount').val() === '' || $('#credit_amount').empty()) {
        $('#credit_amount').addClass('is-invalid');
        $('#credit_amount').after('<div class="invalid-feedback">Please enter a valid Amount.</div>');
        isValid = false;
      }

      if ($('#cash_amount').val('') ) {
        $('#cash_amount').addClass('is-invalid');
        $('#cash_amount').after('<div class="invalid-feedback">Please enter a valid Amount</div>');
        isValid = false;
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
          data: formData,
          dataType: 'json',
          success: function (response) {
            if (response.success) {
              
              var successAlert = $('<div class="alert alert-success alert-dismissible fade show" role="alert">')
                                .text('Service submitted!')
                            $('#success_diplay').prepend(successAlert);
                            // Automatically remove the alert after 5 seconds
                            setTimeout(function () {
                                successAlert.alert('close');
                            }, 7000);

            //   $('#addattendance').modal('hide');  // Hide the modal on success
              $('#save_service_fee')[0].reset();// Reset form
              
            // dataTable.ajax.reload();
            fetchPatientData(patient_id);
            
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
        url: '/services/' + clinic_id + '/specialties',
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

$(document).on('change', '#service_type', function() {
    var service = $(this).val();

    // $('#service_type').val('');
    $('#credit_amount').val('');
    $('#cash_amount').val('');
    $('#gdrg_code').val('');

    $.ajax({
        url: '/services/' + service + '/service_tarif',
        type: 'GET',
        success: function(response) {
          if (response.success) {
                // $.each(response.result, function(index, service_point) {
                    $('#credit_amount').val(service_point.attendance_type_id);
                    $('#cash_amount').val(service_point.attendance_type_id);
                    $('#gdrg_code').val(service_point.attendance_type_id);
                // });
            } else {
                      // $('#service_type').append('<option selected disabled>No specialties available</option>');
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Error fetching data! Try again.'); // Display error message if AJAX request fails
        }
    });
});


