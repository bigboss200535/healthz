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

                            @foreach($sponsor_list as $patients)
                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ strtoupper($patients->fullname) }}</td>
                              <td>{{ $patients->sponsor_type }}</td>
                              <td>
                                    @if($patients->sponsor_type_id === 'PI03')
                                      <span class="badge bg-label-info me-1">{{ $patients->sponsor_name}}</span>
                                    @elseif ($patients->sponsor_type_id === 'N002')
                                    <span class="badge bg-label-success me-1">{{ $patients->sponsor_name}}</span>
                                    @elseif ($patients->sponsor_type_id === 'P001')
                                    <span class="badge bg-label-warning me-1">{{ $patients->sponsor_name}}</span>
                                    @elseif ($patients->sponsor_type_id === 'PC04')
                                      <span class="badge bg-label-primary me-1">{{ $patients->sponsor_name}}</span>
                                    @endif
                              </td>
                              <td>{{ \Carbon\Carbon::parse($patients->start_date)->format('d-m-Y') }}</td>
                              <td>{{ \Carbon\Carbon::parse($patients->end_date)->format('d-m-Y') }}</td>
                              <td>
                                  @if($patients->card_status === 'Active')
                                      <span class="badge bg-label-success me-1">ACTIVE</span>
                                  @elseif ($patients->card_status === 'Inactive')
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
                                                     data-id="{{ $patients->sponsor_id }}"
                                                     data-patient-id="{{ $patients->patient_id}}"
                                                     data-sponsor-type-id="{{ $patients->sponsor_type_id }}"
                                                     data-sponsor-name="{{ $patients->sponsor_name }}"
                                                     data-member-no="{{ $patients->member_no }}"
                                                     data-start-date="{{ \Carbon\Carbon::parse($patients->start_date)->format('Y-m-d') }}"
                                                     data-end-date="{{ \Carbon\Carbon::parse($patients->end_date)->format('Y-m-d') }}"
                                                     data-card-status="{{ $patients->card_status }}"
                                                     data-priority="{{ $patients->priority ?? '1' }}"
                                                     data-bs-toggle="modal" data-bs-target="#sponsorModal">
                                                      <i class="bx bx-edit-alt me-1"></i> Edit 
                                                  </a>
                                                  <a class="dropdown-item sponsor_delete_btn" href="#" 
                                                     data-id="{{ $patients->patient_sponsor_id }}"
                                                     data-patient-id="{{ $patients->patient_id ?? '' }}"
                                                     data-sponsor-name="{{ $patients->sponsor_name }}">
                                                      <i class="bx bx-trash me-1"></i> Delete 
                                                  </a>
                                             </div>
                                  </div>
                                </td>
                            </tr>
                            @endforeach
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

<!-- Sponsor Modal -->
<div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sponsorModalLabel">
          <span id="modalTitle">Add Patient Sponsor</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="sponsorForm" method="POST" action="#">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="sponsor_id" name="sponsor_id">
          <input type="hidden" id="patient_id" name="patient_id" value="{{ $patients->patient_id }}"> <!-- Patient ID -->
          <input type="hidden" id="form_mode" name="form_mode" value="add">
          
          <div class="row g-3">
            <!-- Sponsor Type -->
            <div class="col-md-6">
              <label for="sponsor_type_id" class="form-label">Sponsor Type <span class="text-danger">*</span></label>
              <select class="form-select" id="sponsor_type_id" name="sponsor_type_id" required>
                <option value="" disabled selected>-Select Sponsor Type-</option>
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
              <select class="form-select" id="sponsor_name" name="sponsor_name" required>
                <option value="" disabled selected>-Select Sponsor Type First-</option>
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
                <option value="NO">No</option>
                <option value="YES">Yes</option>
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
                <option value="1">Primary</option>
                <option value="2">Secondary</option>
                <option value="3">Tertiary</option>
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
    let sponsorForm = $('#sponsorForm');
    let sponsorModal = new bootstrap.Modal(document.getElementById('sponsorModal'));
    
    // Handle edit sponsor button clicks
    $('.edit-sponsor-btn').on('click', function(e) {
        e.preventDefault();
        
        let btn = $(this);
        $('#modalTitle').text('Edit Patient Sponsor');
        $('#form_mode').val('edit');
        $('#sponsor_id').val(btn.data('id'));
        $('#patient_id').val(btn.data('patient-id'));
        $('#selected_patient_id').val(btn.data('patient-id'));
        $('#sponsor_type_id').val(btn.data('sponsor-type-id'));
        $('#member_no').val(btn.data('member-no'));
        $('#start_date').val(btn.data('start-date'));
        $('#end_date').val(btn.data('end-date'));
        $('#card_status').val(btn.data('card-status'));
        $('#priority').val(btn.data('priority'));
        
        // Load sponsors for the selected type
        loadSponsorsByType(btn.data('sponsor-type-id'), btn.data('sponsor-name'));
    });
    
    // Handle sponsor type change
    $('#sponsor_type_id').on('change', function() {
        let sponsorTypeId = $(this).val();
        if (sponsorTypeId) {
            loadSponsorsByType(sponsorTypeId);
            updateMemberNumberValidation(sponsorTypeId);
        } else {
            $('#sponsor_name').empty().append('<option value="" disabled selected>-Select Sponsor Type First-</option>');
        }
    });
    
    // Load sponsors by type
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
    
    // Update member number validation based on sponsor type
    function updateMemberNumberValidation(sponsorTypeId) {
        let memberNoField = $('#member_no');
        let helpText = $('#member_no_help');
        
        if (sponsorTypeId === 'N002') {
            memberNoField.attr('minlength', '8');
            memberNoField.attr('maxlength', '10');
            memberNoField.attr('pattern', '[0-9]{8,10}');
            memberNoField.attr('title', 'Member number must be 8-10 digits');
            helpText.text('Member number must be 8-10 digits');
        } else {
            memberNoField.removeAttr('minlength');
            memberNoField.removeAttr('maxlength');
            memberNoField.removeAttr('pattern');
            memberNoField.removeAttr('title');
            helpText.text('');
        }
    }
    
    // Handle form submission
    sponsorForm.on('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        let mode = $('#form_mode').val();
        let url = '/patients/sponsor-update';
        let method = 'POST';
        
        // Validate patient ID
        if (!$('#patient_id').val()) {
            alert('Please enter a patient ID');
            return;
        }
        
        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                sponsorModal.hide();
                location.reload(); // Reload to show updated data
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorHtml = '';
                for (let field in errors) {
                    errorHtml += errors[field][0] + '<br>';
                }
                alert('Error: ' + errorHtml);
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
        let sponsorId = btn.data('id');
        let patientId = btn.data('patient-id');
        let sponsorName = btn.data('sponsor-name');
        
        if (confirm(`Are you sure you want to delete the sponsor "${sponsorName}"? This action can be undone.`)) {
            $.ajax({
                url: '/patients/sponsor-delete/' + sponsorId,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Sponsor deleted successfully');
                    location.reload(); // Reload to show updated data
                },
                error: function(xhr) {
                    let errorMessage = 'Error deleting sponsor';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    }
                    alert('Error: ' + errorMessage);
                }
            });
        }
    });
});
</script>

