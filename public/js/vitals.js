$(document).ready(function() {

    // When the modal is shown, fetch patient details
    $('#add_vitals_signs').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var patientId = button.data('patient-id');
        var opdNumber = button.data('opdnumber-id');
        var attendanceId = button.data('attendance-id');
        
        // Set the patient ID, OPD number, and attendance ID in the form
        $('#patient_id').val(patientId);
        $('#opd_number').val(opdNumber);
        $('#attendance_id').val(attendanceId);
        
        // Clear previous form data
        $('#vital_signs_forms')[0].reset();
        $('#success_diplay').html('');
    });

    // Calculate BMI when weight or height changes
    $('#weight, #height').on('change', function() {
        calculateBMI();
    });

    // Function to calculate BMI
    function calculateBMI() {
        var weight = parseFloat($('#weight').val());
        var height = parseFloat($('#height').val());
        
        if (weight > 0 && height > 0) {
            // BMI formula: weight (kg) / (height (m) * height (m))
            var bmi = weight / (height * height);
            $('#bmi').val(bmi.toFixed(2));
        }
    }

    // Convert Celsius to Fahrenheit when degree changes
    $('#temperature').on('change', function() {
        var celsius = parseFloat($(this).val());
        if (!isNaN(celsius)) {
            var fahrenheit = (celsius * 9/5) + 32;
            $('#fahrenheit').val(fahrenheit.toFixed(2));
        }
    });

    // Convert Fahrenheit to Celsius when fahrenheit changes
    $('#fahrenheit').on('change', function() {
        var fahrenheit = parseFloat($(this).val());
        if (!isNaN(fahrenheit)) {
            var celsius = (fahrenheit - 32) * 5/9;
            $('#temperature').val(celsius.toFixed(2));
        }
    });

    // Handle form submission
    $('#vital_signs_forms').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading indicator
        $('#vital_signs_save').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
        $('#vital_signs_save').prop('disabled', true);
        
        // Get form data
        var formData = $(this).serialize();
        
        // Send AJAX request
        $.ajax({
            url: '/nurses/store-vitals',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Show success message
                $('#success_diplay').html('<div class="alert alert-success">' + response.message + '</div>');
                
                // Reset form
                $('#vital_signs_forms')[0].reset();
                
                // Reset button
                $('#vital_signs_save').html('Submit');
                $('#vital_signs_save').prop('disabled', false);
                
                // Close modal after 2 seconds
                setTimeout(function() {
                    $('#add_vitals_signs').modal('hide');
                    // Reload the page to refresh the data
                    location.reload();
                }, 2000);
            },
            error: function(xhr) {
                // Show error message
                var errorMessage = 'An error occurred while saving vital signs.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                $('#success_diplay').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                
                // Reset button
                $('#vital_signs_save').html('Submit');
                $('#vital_signs_save').prop('disabled', false);
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('add_vitals_signs');

    // Make sure modal exists before attaching event
    if (modal) {
        modal.addEventListener('show.bs.modal', function (event) {
            // The button that triggered the modal
            const button = event.relatedTarget;

            // Extract values from data-* attributes
            const patientId = button.getAttribute('data-patient-id');
            const attendanceId = button.getAttribute('data-attendance-id');
            const opdNumber = button.getAttribute('data-opdnumber-id');

            // Get input fields inside modal
            const patientInput = modal.querySelector('#patient_id');
            const attendanceInput = modal.querySelector('#attendance_id'); 
            const opdInput = modal.querySelector('#opd_number');

            // Set values safely
            if (patientInput) patientInput.value = patientId ?? '';
            if (attendanceInput) attendanceInput.value = attendanceId ?? '';
            if (opdInput) opdInput.value = opdNumber ?? '';
        });
    }
});