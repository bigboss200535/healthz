<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Patients /</span> Sponsors
                  </h4>
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="mb-0">Patient Sponsors</h4>
                        </div>
                        <div class="col-md-6 text-end">
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sponsorModal">
                            <i class="bx bx-plus me-1"></i> Add Sponsor
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="card" id="patient_search_result" >
                    <div class="card-datatable table-responsive">
                      <table class="datatables-customers table border-top table-hover" id="sponsor_table">
                          <thead>
                              <tr>
                                  <th>S/N</th>
                                  <th>Patient Name</th>
                                  <th>Sponsor Type</th>
                                  <th>Sponsor Name</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Sponsor Status</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @php
                              $counter = 1;
                            @endphp

                            @forelse($sponsor_list as $sponsors)

                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ strtoupper($sponsors->fullname) }}</td>
                              <td>{{ $sponsors->sponsor_type }}</td>
                              <td>
                                    @if($sponsors->sponsor_type_id === 'PI03')
                                      <span class="badge bg-label-info me-1">{{ $sponsors->sponsor_name}}</span>
                                    @elseif ($sponsors->sponsor_type_id === 'N002')
                                    <span class="badge bg-label-success me-1">{{ $sponsors->sponsor_name}}</span>
                                    @elseif ($sponsors->sponsor_type_id === 'P001')
                                    <span class="badge bg-label-warning me-1">{{ $sponsors->sponsor_name}}</span>
                                    @elseif ($sponsors->sponsor_type_id === 'PC04')
                                      <span class="badge bg-label-primary me-1">{{ $sponsors->sponsor_name}}</span>
                                    @endif
                              </td>
                              <td>{{ \Carbon\Carbon::parse($sponsors->start_date)->format('d-m-Y') }}</td>
                              <td>{{ \Carbon\Carbon::parse($sponsors->end_date)->format('d-m-Y') }}</td>
                              <td>
                                  @if($sponsors->card_status === 'Active')
                                      <span class="badge bg-label-success me-1">ACTIVE</span>
                                  @elseif ($sponsors->card_status === 'Inactive')
                                      <span class="badge bg-label-danger me-1">EXPIRED</span>
                                  @endif 
                              </td>
                              <td> 
                                <div class="dropdown" align="center">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                            <div class="dropdown-menu">
                                                  <a class="dropdown-item edit-sponsor-btn" href="#" 
                                                     data-patient-sponsor-id="{{ $sponsors->patient_sponsor_id  }}"
                                                     data-patient-id="{{ $sponsors->patient_id}}"
                                                     data-sponsor-type-id="{{ $sponsors->sponsor_type_id }}"
                                                     data-sponsor-name="{{ $sponsors->sponsor_name }}"
                                                     data-member-no="{{ $sponsors->member_no }}"
                                                     data-start-date="{{ \Carbon\Carbon::parse($sponsors->start_date)->format('Y-m-d') }}"
                                                     data-end-date="{{ \Carbon\Carbon::parse($sponsors->end_date)->format('Y-m-d') }}"
                                                     data-card-status="{{ $sponsors->card_status }}"
                                                     data-priority="{{ $sponsors->priority ?? '1' }}"
                                                     data-bs-toggle="modal" data-bs-target="#sponsorModal">
                                                      <i class="bx bx-edit-alt me-1"></i> Edit 
                                                  </a>
                                                  <a class="dropdown-item sponsor_delete_btn" href="#" 
                                                     data-patient-sponsor-id="{{ $sponsors->patient_sponsor_id }}"
                                                     data-patient-id="{{ $sponsors->patient_id ?? '' }}"
                                                     data-sponsor-name="{{ $sponsors->sponsor_name }}">
                                                      <i class="bx bx-trash me-1"></i> Delete 
                                                  </a>
                                             </div>
                                  </div> 
                                   
                                </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="8" align="center">No Data Available to Display</td>
                            </tr>
                            @endforelse
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>S/N</th>
                                  <th>Patient Name</th>
                                  <th>Sponsor Type</th>
                                  <th>Sponsor Name</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Sponsor Status</th>
                                  <th></th>
                              </tr>
                          </tfoot>
                      </table>
                    </div>
            </div>
          </div>
</x-app-layout>

<!-- PATIENT SPONSOR MODAL FORM -->
<div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sponsorModalLabel">
          <span id="modalTitle">Add Patient Sponsor</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="sponsor_form" method="POST">
        @csrf
        <div class="modal-body">
          <input type="text" id="sponsor_id" name="sponsor_id">
          <input type="text" id="patient_id" name="patient_id" value="{{ $patient->patient_id }}" hidden> <!-- Patient ID -->
          {{-- <input type="text" id="patient_opdnumber" name="patient_opdnumber" value="{{ $patient->patient_id }}" hidden> <!-- Patient ID --> --}}
          <input type="hidden" id="form_mode" name="form_mode" value="add">
          
          <div class="row g-3">
            <!-- Sponsor Type -->
            <div class="col-md-6">
              <label for="sponsor_type_id" class="form-label">Sponsor Type <span class="text-danger">*</span></label>
              <select class="form-select" id="sponsor_type_id" name="sponsor_type_id" required>
                <option disabled selected>-Select Sponsor Type-</option>
                @php
                  $sponsor_types = DB::table('sponsor_type')->where('archived', 'No')->orderBy('sponsor_type', 'DESC')->get();
                @endphp
                @foreach($sponsor_types as $type)
                  <option value="{{ $type->sponsor_type_id }}">{{ strtoupper($type->sponsor_type) }}</option>
                @endforeach
              </select>
            </div>
            
            <!-- Sponsor Name -->
            <div class="col-md-6">
              <label for="sponsor_name" class="form-label">Sponsor Name <span class="text-danger">*</span></label>
              <select class="form-select" id="sponsor_name" name="sponsor_id" required>
                <option disabled selected>-Select Sponsor Type First-</option>
              </select>
            </div>
            
            <!-- Member Number -->
            <div class="col-md-6">
              <label for="member_no" class="form-label">Member Number</label>
              <input type="text" class="form-control" id="member_no" name="member_no" 
                     placeholder="Enter member number">
              <div class="form-text" id="member_no_help"></div>
            </div>
             <!-- Dependant -->
            <div class="col-md-6">
              <label for="dependant" class="form-label">Dependant</label>
              <select class="form-select" id="dependant" name="dependant">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>
            <!-- Start Date -->
            <div class="col-md-6">
              <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
              <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            
            <!-- End Date -->
            <div class="col-md-6">
              <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
              <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            
            <!-- Card Status -->
            <div class="col-md-6">
              <label for="card_status" class="form-label">Card Status <span class="text-danger">*</span></label>
              <select class="form-select" id="card_status" name="card_status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            
            <!-- Priority -->
            <div class="col-md-6">
              <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
              <select class="form-select" id="priority" name="priority" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="saveSponsorBtn">
            <i class="bx bx-save me-1"></i> Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
    let sponsorForm = $('#sponsor_form');
    let sponsorModal = new bootstrap.Modal(document.getElementById('sponsorModal'));
    
    // Handle edit sponsor button clicks
    $('.edit-sponsor-btn').on('click', function(e) {
        e.preventDefault();
        
        let btn = $(this);
          $('#modalTitle').text('Edit Patient Sponsorship');
          $('#form_mode').val('edit');
          $('#sponsor_id').val(btn.data('patient-sponsor-id'));
          $('#patient_id').val(btn.data('patient-id'));
          // $('#selected_patient_id').val(btn.data('patient-id'));
          $('#sponsor_type_id').val(btn.data('sponsor-type-id'));
          $('#member_no').val(btn.data('member-no'));
          $('#start_date').val(btn.data('start-date'));
          $('#end_date').val(btn.data('end-date'));
          $('#card_status').val(btn.data('card-status'));
          $('#priority').val(btn.data('priority'));
        
          // Load sponsors for the selected type
        loadSponsorsByType(btn.data('sponsor-type-id'), btn.data('sponsor-name'));
    });
    
    // Handle Sponsor Type change
    $('#sponsor_type_id').on('change', function() {
        let sponsorTypeId = $(this).val();
        if (sponsorTypeId) {
            loadSponsorsByType(sponsorTypeId);
            updateMemberNumberValidation(sponsorTypeId);
        } else {
            $('#sponsor_name').empty().append('<option disabled selected>-Select Sponsor Type First-</option>');
        }
    });
    
    // Load Sponsors by Type
    function loadSponsorsByType(sponsorTypeId, selectedSponsor = null) {
        $.ajax({
            url: '/api/getsponsortype',
            type: 'GET',
            data: { sponsor_type_id: sponsorTypeId },
            success: function(data) {
                $('#sponsor_name').empty().append('<option value="" disabled selected>-Select Sponsor-</option>');
                
                $.each(data, function(key, value) {
                    let selected = selectedSponsor && value.sponsor_name === selectedSponsor ? 'selected' : '';
                    $('#sponsor_name').append('<option value="' + value.sponsor_id + '" ' + selected + '>' + 
                                            value.sponsor_name.toUpperCase() + '</option>');
                });
            },
            error: function() {
                $('#sponsor_name').empty().append('<option value="" disabled selected>-Error Loading Sponsors-</option>');
            }
        });
    }
    
    // Update Member Number validation based on sponsor type
    function updateMemberNumberValidation(sponsorTypeId) {
        let member_no_field = $('#member_no');
        let help_text = $('#member_no_help');
        
        if (sponsorTypeId === 'N002') {
            member_no_field.attr('minlength', '8');
            member_no_field.attr('maxlength', '10');
            member_no_field.attr('pattern', '[0-9]{8,10}');
            member_no_field.attr('title', 'Member number must be 8-10 digits');
            help_text.text('Member number must be 8-10 digits');
        } else {
            member_no_field.removeAttr('minlength');
            member_no_field.removeAttr('maxlength');
            member_no_field.removeAttr('pattern');
            member_no_field.removeAttr('title');
            help_text.text('');
        }
    }
    
    // Handle form submission
    sponsorForm.on('submit', function(e) {
        e.preventDefault();
        
        let form_data = new FormData(this);
        let mode = $('#form_mode').val();
        
        $.ajax({
            url: '/patient/sponsor-update',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
                // sponsorModal.hide();
                location.reload(); 
                // Reload to show updated data
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorHtml = '';
                for (let field in errors) {
                    errorHtml += errors[field][0] + '<br>';
                }
                 toastr.error('Error: '+ errorHtml);
            }
        });
    });
    
    // Reset form when modal is hidden
    $('#sponsorModal').on('hidden.bs.modal', function() {
          sponsorForm[0].reset();
        $('#modalTitle').text('Add Patient Sponsor');
        $('#form_mode').val('add');
        $('#sponsor_id').val('');
        $('#member_no_help').text('');
    });
    
    // Handle sponsor delete button clicks
    $('.sponsor_delete_btn').on('click', function(e) {
        e.preventDefault();
        
        let btn = $(this);
        const patient_sponsor_id = $(this).data('patient-sponsor-id');
        let sponsor_name = btn.data('sponsor-name');
        
        Swal.fire({
            title: 'Delete Sponsor',
            text: 'Are you sure you want to delete ' + sponsor_name + ' as Sponsor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const original_html = btn.html();
                btn.html('<i class="bx bx-loader bx-spin"></i>').prop('disabled', true);
                $.ajax({
                    url: '/patient/sponsor-delete/'+ patient_sponsor_id,
                    method: 'post',
                    data: {
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        showAlert('success', response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON?.message || 'Error deleting sponsor';
                        showAlert('danger', errorMsg);
                    },
                    complete: function() {
                        btn.html(original_html).prop('disabled', false);
                    }
                });
            }
        });
    });
});
</script>

