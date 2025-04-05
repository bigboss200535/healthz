$(document).ready(function() {

    // $('#sms_message').on('input', function() {
    //     const remaining = 160 - $(this).val().length;
    //     $('#char_counter').text(remaining + ' characters remaining');
    // }); 

    $('#sms_form').on('submit', function(e) {
        e.preventDefault(); // This is the critical line that stops form reload
        
        const $form = $(this);
        const $submitBtn = $('#sms_submit');
        const originalText = $submitBtn.html();
        
        // Disable button and show loading
        $submitBtn.prop('disabled', true)
                 .html('<span class="spinner-border spinner-border-sm" role="status"></span> Sending...');

        if (!$('#sms_telephone').val().match(/^0\d{9}$/)) {
                toastr.error('Please enter a valid phone number');
                return false;
            }
          
        $.ajax({
            url: '/notifications/send-sms',
            type: 'POST',
            data: $form.serialize(),
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $form[0].reset();  // Clear form on success
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON?.message || 'Error sending SMS');
            },
            complete: function() {
                $submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });
});