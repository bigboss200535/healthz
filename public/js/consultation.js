// $(document).ready(function() {
    // When systemic area is selected
    $('#systemic_review').change(function() {
        var systemicId = $(this).val();
        if (systemicId) {
            // Clear existing table data
            $('#symptoms-table tbody').empty();
            
            // Fetch symptoms for selected systemic area
            $.ajax({
                url: '/consultation/get-systemic-symptoms/' + systemicId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        // Populate table with symptoms
                        $.each(data, function(index, symptom) {
                            
                            var row = '<tr>' +
                                            '<td align="center"><input type="checkbox" class="form-check-input" name="symptom_check[]" value="' + symptom.systemic_symtom_id + '"></td>' +
                                            '<td>' + symptom.systemic_symtom + '</td>' +
                                            '<td><textarea class="form-control" style="resize: none; min-width:400px; max-width:100%; min-height:50px; height:100%; width:100%;" rows="3" cols="150" name="symptom_notes[' + symptom.systemic_symtom_id + ']"></textarea></td>' +
                                            '<td><div class="btn-group">' +
                                                '<button type="button" class="btn btn-sm btn-primary">Add</button>' +
                                                 '</div>' +
                                            '</td>' +
                                        '</tr>';
                            $('#symptoms-table tbody').append(row);
                        });
                    } else {
                        $('#symptoms-table tbody').append('<tr><td colspan="4" class="text-center">No symptoms found for this system</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching symptoms:', error);
                    $('#symptoms-table tbody').append('<tr><td colspan="4" class="text-center">Error loading symptoms</td></tr>');
                }
            });
        }
    });


    //SAVING CONSULTATION AJAX 
    // Hide the main consultation content initially
     $('#consultation_display').hide(); //hide the main consultation form
     $('#discharge_patient').prop('disabled', true); //disable discharge button initially
    
    // Handle the Continue button click
    $('#consultation_continue').click(function() {
        // Get form values
        const consultingRoom = $('#consulting_room').val();
        const consultingDoctors = $('#consulting_doctors').val();
        const consultingDate = $('#consulting_date').val();

        // Validate required fields
        if (!consultingRoom || !consultingDoctors || !consultingDate) {
            toastr.error('Please fill in all required fields');
            return;
        }
        
        // Prepare data for AJAX request
        const formData = {
            consultation_id: $('#consultation_id').val(), // This will be overridden by server
            patient_id: $('#con_patient_id').val(),
            opd_number: $('#con_opd_number').val(),
            gender_id: $('#gender_id').val(),
            age_id: $('#age_id').val(),
            patient_age: $('#con_full_age').val(),
            clinic: $('#con_clinic').val(),
            // patient_status_id: '2',
            sponsor_type: $('#con_sponsor_type').val(),
            sponsor: $('#con_sponsor').val(),
            episode_id: $('#episode_id').val(),
            episode_type: $('#consulting_episode').val(),
            consulting_room: consultingRoom,
            prescriber: consultingDoctors,
            attendance_date: consultingDate,
            consultation_date: consultingDate,
            consultation_type: $('#consulting_type').val(),
            consultation_time: $('#consulting_time').val(),
            attendance_id: $('#attendance_id').val(),
            _token: $('input[name="_token"]').val()
        };
        
        // Send AJAX request
        $.ajax({
            url: '/consultation/save',
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                // Show loading indicator
                $('#consultation_continue').html('<i class="bx bx-loader bx-spin"></i> Processing...');
                $('#consultation_continue').prop('disabled', true);
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Show success message
                    toastr.success(response.message);
                    
                    // Hide the message and show the consultation tabs
                    $('#required_fields_message').hide();
                    $('#consultation_display').show();
                     
                    // Disable the form fields
                    $('#consulting_type, #consulting_episode, #consulting_room, #consulting_time, #consulting_doctors, #consulting_date').prop('disabled', true);
                    // $('#consultation_continue').hide();
                    $('#discharge_patient').prop('disabled', true);
                    // $('#discharge_patient').prop('disabled', false);
                } else {
                    // Show error message
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Parse the error response
                let errorMessage = 'An error occurred while saving the consultation';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                // Show error message
                toastr.error(errorMessage);
                
                console.error('Error:', error);
            },
            complete: function() {
                // Reset button state
                $('#consultation_continue').html('Continue to Consult');
                $('#consultation_continue').prop('disabled', false);
            }
        });
    });


// Handle input event on the investigations field
$('#investigation_add').on('input', function () {
  const investigation = $(this).val().trim(); // Get the input value
//   var opd_number = $('#investigation_opdnumber').val();
//    var patient_id = $('#investigation_patient_id').val();
  var attendance_id = $('#investigation_attendance_id').val();
  var service_id = $('#service_id').val(); //service to sort from their sub service
   
  if (!investigation) {
    $('#investigation_results').html('');
    return;
  }

  // Send an AJAX request to fetch matching investigations
  $.ajax({
    url: '/api/investigations/search', 
    method: 'POST',
    data: {
      _token: $('input[name="_token"]').val(), // CSRF token
      investigation_query: investigation, // investigation search term
      attendance_id: attendance_id,
      service_id: service_id
    },
    success: function (response) {
      if (response.length > 0) {
        // Sort the investigations alphabetically by the service name
        const sorted_investigations = response.sort((a, b) => a.service.localeCompare(b.service));

        $('#investigation_results').html('');
       
        sorted_investigations.forEach((investigation) => {
          $('#investigation_results').append(
            `<div class="investigation-item p-2 border-bottom cursor-pointer" 
                  data-service_fee_id="${investigation.service_fee_id}" 
                  data-service_name="${investigation.service}"
                  data-cash_amount="${investigation.cash_amount}">
               ${investigation.service} (${investigation.cash_amount}) | 
               <span class="badge bg-label-primary me-1">${investigation.service}</span>
             </div>`
          );
        });

        // Handle selection of an investigation
        $('.investigation-item').on('click', function () {
          const service_fee_id = $(this).data('service_fee_id');
          const service_name = $(this).data('service_name');
          const cash_amount = $(this).data('cash_amount');

          // Populate the form fields
          $('#service_name').val(service_name);
          $('#service_amount').val(cash_amount);
          // Add hidden field for service_fee_id
          if ($('#service_fee_id').length === 0) {
            $('#add_investigation_form').append('<input type="hidden" id="service_fee_id" name="service_fee_id" value="' + service_fee_id + '">');
          } else {
            $('#service_fee_id').val(service_fee_id);
          }
          // Clear the results container
          $('#investigation_results').html('');
        });
      } else {
        // Display a message if no matching investigations are found
        $('#investigation_results').html('<div class="text-muted">No matching investigations found.</div>');
      }
    },
    error: function (xhr, status, error) {
      console.error('Error fetching investigation details:', error);
      $('#investigation_results').html('<div class="text-danger">An error occurred while fetching investigations.</div>');
    },
  });
});

// Handle service type change to load services dynamically
$('#service_id').on('change', function () {
  const service_type = $(this).val();
  const opd_number = $('#opdnumber').val();
  
  if (!service_type) {
    $('#service_name').val('');
    $('#service_amount').val('');
    return;
  }

  // Send AJAX request to get services by type
  $.ajax({
    url: '/investigations/get-services-by-type',
    method: 'POST',
    data: {
      _token: $('input[name="_token"]').val(),
      service_type: service_type,
      opd_number: opd_number
    },
    success: function (response) {
      if (response.length > 0) {
        // Clear previous results
        $('#drug_results').html('');
        
        // Show available services
        response.forEach((service) => {
          $('#drug_results').append(
            `<div class="investigation-item p-2 border-bottom cursor-pointer" 
                  data-service_fee_id="${service.service_fee_id}" 
                  data-service_name="${service.service}"
                  data-cash_amount="${service.cash_amount}">
               ${service.service} (${service.cash_amount}) | 
               <span class="badge bg-label-primary me-1">${service.service}</span>
             </div>`
          );
        });
        
        // Handle selection
        $('.investigation-item').on('click', function () {
          const service_fee_id = $(this).data('service_fee_id');
          const service_name = $(this).data('service_name');
          const cash_amount = $(this).data('cash_amount');

          $('#service_name').val(service_name);
          $('#service_amount').val(cash_amount);
          
          if ($('#service_fee_id').length === 0) {
            $('#add_investigation_form').append('<input type="hidden" id="service_fee_id" name="service_fee_id" value="' + service_fee_id + '">');
          } else {
            $('#service_fee_id').val(service_fee_id);
          }
          
          $('#drug_results').html('');
        });
      } else {
        $('#drug_results').html('<div class="text-muted">No services found for this type.</div>');
      }
    },
    error: function (xhr, status, error) {
      console.error('Error fetching services:', error);
      $('#drug_results').html('<div class="text-danger">Error loading services.</div>');
    }
  });
});

// Handle investigation form submission
$('#add_investigation_form').on('submit', function (e) {
  e.preventDefault();
  
  // Validate required fields
  const service_type = $('#service_type').val();
  const service_name = $('#service_name').val();
  const service_amount = $('#service_amount').val();
  
  if (!service_type || !service_name || !service_amount) {
    $('.alert-container-drug').html('<div class="alert alert-danger">Please fill in all required fields.</div>');
    return;
  }
  
  // Show loading
  $('.alert-container-drug').html('<div class="alert alert-info">Saving investigation...</div>');
  
  // Submit form via AJAX
  $.ajax({
    url: '/investigations/store',
    method: 'POST',
    data: $(this).serialize(),
    success: function (response) {
      if (response.success) {
        $('.alert-container-drug').html('<div class="alert alert-success">' + response.message + '</div>');
        // Reset form
        $('#add_investigation_form')[0].reset();
        // Close modal after delay
        setTimeout(() => {
          $('#add_investigations').modal('hide');
          $('.alert-container-drug').html('');
        }, 2000);
      } else {
        $('.alert-container-drug').html('<div class="alert alert-danger">' + response.message + '</div>');
      }
    },
    error: function (xhr, status, error) {
      console.error('Error saving investigation:', error);
      $('.alert-container-drug').html('<div class="alert alert-danger">Error saving investigation. Please try again.</div>');
    }
  });
});





// });
