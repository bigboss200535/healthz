<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | Anywhere, Everywhere</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/dropzone/dropzone.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/tagify/tagify.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{ asset('preloader.css') }}"> -->
    </head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
            <!-- Menu -->
            @include('layouts.aside')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.topmenu')
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
            
                            <!-- Content -->
                                {{ $slot }}
                             <!-- / Content -->

                              <!-- Footer -->
                             @include('layouts.footer')
                             @include('layouts.modal.forms')
                       <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
            </div>
           <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- <script src="{{ asset('vendor/libs/quill/katex.js') }}"></script> -->
    <!-- <script src="{{ asset('vendor/libs/quill/quill.js') }}"></script> -->
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/app-academy-dashboard.js') }}"></script>
    <script src="{{ asset('js/app-ecommerce-category-list.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    <!-- <script src="{{ asset('js/tables-datatables-basic.js') }}"></script> -->
    <script src="{{ asset('vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
    <script src="{{ asset('js/custom_js.js') }}"></script>
    </body>
</html>

 <!-- Livewire Scripts -->
 @livewireScripts 
 
<script type="text/javascript">
     $(document).ready( function () {
        $('#app_list').DataTable();
        $('#employee_details').DataTable();
        $('#data_table').DataTable();
        $('#product_list').DataTable();
        $('#patient_list').DataTable();
        
        $('.sponsor_name').select2();
        $('.sponsorship_type').select2();
});

$(document).ready( function () {
        // $('#product_list').DataTable();
});
</script>
<script>
  $(document).ready(function() {
    // Show the modal
    
  });
</script>

<script>
    $(document).on('click', '.product_delete_btn', function() {
      var product_id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/product/' + product_id,
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}',
              product_id: product_id
            },
            success: function(response) {
              var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                toastr.success('Data deleted successfully!');
              } else if (result == 200) {
                toastr.warning('Data is attached to stock or prices');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error deleting item! Try again');
            }
          });
        }
      });
    });


    $(document).on('click', '.patient_edit_btn', function() {
      var patient_id = $(this).data('id');

      $.ajax({
        url: '/patients/' + patient_id + '/edit',
        type: 'GET',
        success: function(response) {
          $('#patient_id').val(response.patient.patient_id)[0];
          // $('#product_name').val(response.product.product_name)[0];
          // $('#category').val(response.product.category_id).trigger('change');
          // $('#product_description').val(response.product.description);
          // $('#manufacturer').val(response.product.manufacturer);
          // $('#expirable').val(response.product.expirable);
          // $('#stockable').val(response.product.stocked);
          // $('#sales_type').val(response.product.sales_type);
          // $('#status').val(response.product.status);
          
        },
        error: function(xhr, status, error) {
          toastr.error('Error fetching data! Try again.');
        }
      });
    });


    $('#patient_info').on('submit', function(e) {
      e.preventDefault();

      // Collect form data
      var pat_id = $('#pat_id').val();
      var title = $('#title').val();
      var firstname = $('#firstname').val();
      var middlename = $('#middlename').val();
      var lastname = $('#lastname').val();
      var birth_date = $('#birth_date').val();
      var gender = $('#gender').val();
      var occupation = $('#occupation').val();
      var education = $('#education').val();
      var religion = $('#religion').val();
      var nationality = $('#nationality').val();
      var old_folder = $('#old_folder').val();
      var telephone = $('#telephone').val();
      var work_telephone = $('#work_telephone').val();
      var email = $('#email').val();
      var address = $('#address').val();
      var town = $('#town').val();
      var region = $('#region').val();
      var contact_persion = $('#contact_persion').val();
      var contact_telephone = $('#contact_telephone').val();
      var contact_relationship = $('#contact_relationship').val();
      var sponsor_type = $('#sponsor_type').val();
      var sponsor_name = $('#sponsor_name').val();
      var member_no = $('#member_no').val();
      var dependant = $('#dependant').val();
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();


      var url = pat_id ? '/patients/' + pat_id : '/patients';
      var method = pat_id ? 'PUT' : 'POST';

      // Client-side validation
      if(firstname.length < 3) {
          toastr.warning('First name must be at least 3 characters long');
        return;
      }

      if (lastname.length < 3) {
        toastr.warning('Lastname is must be at least 3 characters long');
        return;
      }

      // Check if pat_id has a value before update
      if (pat_id && method === 'PUT') {
        $.ajax({
          url: pat_id ? '/patients/' + pat_id : '/patients',
          type: method,
          data: $(this).serialize(),
          success: function(response) {
            toastr.success('Patients saved successfully!');
            // $("#product_list").load(location.href + " #product_list");
            $('#patient_info')[0].reset();
            $('#pat_id').val('');
          },
          error: function(xhr, status, error) {
            toastr.error('Error updating Patient Information! Try again.');
          }
        });
      } else {
        $.ajax({
          url: '/patients',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            var result = JSON.parse(response);
              if (result.code === 201) {
                // $("#product_list").load(location.href + " #product_list");
                $('#patient_info')[0].reset();
                Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: result.message + ' OPD Number: ' + result.opd_number
                    });
              } else if (result.code === 200) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Same data is available in the system'
                  });
              }    
          },
          error: function(xhr, status, error) {
            toastr.error('Error saving data! Try again.');
          }
        });
      }
    });
 </script>

<script>
    $(document).on('change', '#clinics', function() {
        var clinic_id = $(this).val();

        $('#service_type').empty().append('<option>-Select-</option>');

        $.ajax({
            url: '/services/' + clinic_id + '/specialties',
            type: 'GET',
            success: function(response) {
               
              if (response.success) {
                   
                    $.each(response.result, function(index, specialty) {
                        $('#service_type').append(
                            $('<option></option>').val(specialty.attendance_type_id).text(specialty.attendance_type)
                        );
                    });
                } else {
                    // If no specialties found, show a message or leave empty
                    $('#service_type').append('<option disabled>No specialties available</option>');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Error fetching data! Try again.'); // Display error message if AJAX request fails
            }
        });
    });
</script>

<script>
function generateCC() {
    // Get the member number and card type from the input fields
    var member_no = $('#member_no').val();
    var card_type = $('#card_type').val();

    // Perform AJAX request
    $.ajax({
        url: '/code_generate',
        type: 'POST', 
        data: { member_no: member_no, card_type: card_type }, 
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is fetched correctly
        },
        success: function(response) {
            if (response.success) {
              var result = JSON.parse(response.result);
                $('#claim_code').val(result.MobCCC || ''); // Set to empty if null
                $('#start_date').val(result.EligibilityStartDate.split('T')[0])
                $('#end_date').val(result.EligibilityEndDate.split('T')[0]);
                $('#hin_no').val(result.HIN); 
                $('#card_status').val(result.Status);
                $('#fullname').val(result.MemberName);
               
            } else {
                // alert('Error: ' + response.message); 
                $('#error').val(result.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.error('AJAX Error: ', error);
            alert('An error occurred while generating CC. Please try again.');
        }
    });
}

function clearForm() {
    $('#generate_ccc')[0].reset(); // Reset the form
    $('#claim_code').val(''); // Clear specific fields if necessary
    $('#status').val('');
    // Add any other fields you want to reset explicitly
}

$('#claims_check_code').on('hidden.bs.modal', function () {
        clearForm();
    });
</script>

