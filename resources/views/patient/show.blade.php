<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        </div>
  <div class="row">
   <div class="col-12 col-lg-8">
    <div class="nav-align-top nav-tabs-shadow mb-6">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav_home" aria-controls="navs-justified-home" aria-selected="true">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-user bx-sm me-1_5 align-text-bottom"></i> 
              Bio Info 
            </span>
            <i class="bx bx-home bx-sm d-sm-none"></i>
          </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_sponsor" aria-controls="navs-justified-profile" aria-selected="false">
              <span class="d-none d-sm-block">
                <i class="tf-icons bx bx-money-withdraw bx-sm me-1_5 align-text-bottom"></i> 
                Sponsor
              </span>
              <i class="bx bx-user bx-sm d-sm-none"></i>
            </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_attendance" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-timer bx-sm me-1_5 align-text-bottom"></i> Attendance
            </span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_medications" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-time bx-sm me-1_5 align-text-bottom"></i> Appointments
            </span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_claims_code" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-layer bx-sm me-1_5 align-text-bottom"></i> Vitals History
            </span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="nav_home" role="tabpanel">
          <p>
              <!-- <div class="card-header">
                  <h5 class="card-tile mb-0 text-primary"><b>BIO-INFORMATION</b></h5>
              </div> -->
                <table class="table">
                    <tr>
                       <td colspan="2">
                          <h5 class="text-primary"><b>BIO-INFORMATION</b></h5>
                       </td>
                    </tr>
                    <tr>
                      <td><b>Fullname</b></td>
                      <td>{{ $patients->fullname }}</td>
                    </tr>
                    <tr>
                      <td><b>Gender</b></td>
                      <td>{{ strtoupper($patients->gender) }}</td>
                    </tr>
                    <tr>
                      <td><b>Age</b></td>
                      <td>{{ $age_full }}</td>
                    </tr>
                     <tr>
                       <td colspan="2">
                          <h5 class="text-primary"><b>CONTACT</b></h5>
                       </td>
                     </tr>
                     <tr>
                        <td><b>Email</b></td>
                        <td>{{ $patients->email }}</td>
                      </tr>
                      <tr>
                        <td><b>Address</b></td>
                        <td>{{ $patients->address }}</td>
                      </tr>
                      <tr>
                        <td><b>Telephone</b></td>
                        <td>{{ $patients->telephone }}</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <h5 class="text-primary"><b>EMERGENCY CONTACT PERSON</b></h5>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Fullname</b></td>
                        <td>{{ $patients->contact_person }}</td>
                      </tr>
                      <tr>
                        <td><b>Telephone</b></td>
                        <td>{{ $patients->contact_telephone }}</td>
                      </tr>
                      <tr>
                        <td><b>Relationship</b></td>
                        <td>{{ $patients->contact_relationship}}</td>
                      </tr>
                    </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_sponsor" role="tabpanel">
          <p>
            <div>
              <h5>Sponsors</h5>
                <div class="pull-right">
                    <!-- <a href="#" class="btn btn-info pull-right" id="clear_search">Add Sponsor</a> -->
                </div>
            </div>
            <table class="table table-hover" id="patient_sponsor">
              <thead>
                <tr>
                  <th>Sponsor Type</th>
                  <th>Member #</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Sponsorhip Status</th>
                  <th>Prority Sponsor</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                     
              </tbody>
              <tfoot>
                <tr>
                <th>Sponsor Type</th>
                  <th>Member #</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Sponsorhip Status</th>
                  <th>Prority Sponsor</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_attendance" role="tabpanel">
        <p>
            <div>
              <h5>Attendance History</h5>
            </div>
            <table class="table table-hover" id="attendance_details">
              <thead>
                <tr>
                  <th>Sn #</th>
                  <th>Attendance Date</th>
                  <th>Patient Age</th>
                  <th>Clinic</th>
                  <th>Sponsor</th>
                  <th>Status</th>
                  <!-- <th>is NHIS</th> -->
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                            
             </tbody>
              <tfoot>
                <tr>
                  <th>Sn #</th>
                  <th>Attendance Date</th>
                  <th>Patient Age</th>
                  <th>Clinic</th>
                  <th>Sponsor</th>
                  <th>Status</th>
                  <!-- <th>is NHIS</th> -->
                  <th>Status</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_medications" role="tabpanel">
        <p>
            <div>
              <h5>Appointments History</h5>
            </div>
            <table class="table table-hover" id="appointments">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
       
        <div class="tab-pane fade" id="nav_claims_code" role="tabpanel">
        <p>
            <div>
              <h5>Vitals History</h5>
            </div>
            <table class="table table-hover" id="claims_code_list">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </thead>
             
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
       
      </div>
    </div>
  </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row mb 3">
                <!-- <h5 class="card-tile mb-0"><b>Sponsorship Details</b></h5> -->
          </div>
           <div class="mb-3 col ecommerce-select2-dropdown" align="center">
            <img src="{{ $patients->gender==='FEMALE' ? asset('img/avatars/female.jpg') : asset('img/avatars/male.jpg') }}" alt="Patient Image" class="rounded-pill" style="border:1px;border-color:black; box-shadow:10px ">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown" align="center">
            <h5 class="card-tile mb-0"><b>{{ $patients->title}}. {{ $patients->fullname }}</b></h5>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
           <table class="table">
            <tr>
              <td><b>OPD #</b>:</td>
              <td>{{ $patients->opd_number }}</td>
            </tr>
            <tr>
              <td><b>Date Registered</b>:</td>
              <td>{{ \Carbon\Carbon::parse($patients->added_date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td><b>Blood Group</b>:</td>
              <td><span class="badge bg-label-info me-1">AB-</span></td>
            </tr>
            <tr>
              <td><b>Sickling</b>:</td>
              <td>Negative</td>
            </tr>
            <tr>
              <td><b>Current Sponsor</b>:</td>
              <td><span class="badge bg-label-danger me-1">NO AVAILABLE</span></td>
            </tr>
            <tr>
              <td><b>Member #</b>:</td>
              <td><span class="badge bg-label-danger me-1"> UNAVAILABLE</span></td>
            </tr>
            <tr>
              <td><b>Registered By</b>:</td>
              <td>{{ $patients->user_fullname}}</td>
            </tr>
            <tr>
              <td><b>Deceased</b>:</td>
              <td><span class="badge bg-label-danger me-1">{{ $patients->death_status}}</span></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <div class="btn-group">
                        <button type="button" data-bs-toggle='modal' data-bs-target="#claims_check_code" class="btn btn-sm btn-info">GET CCC </button>
                        <button type="button" class="btn btn-sm btn-warning edit-btn">EDIT PATIENT</button>
                        <button type="button" data-bs-toggle='modal' data-bs-target="#addattendance" class="btn btn-sm btn-primary">NEW ATTENDANCE</button>
                </div>
              </td>
                 <!-- <td colspan="2">
                    <a href="#" class="btn btn-secondary" data-bs-toggle='modal' data-bs-target="#claims_check_code"><i class="bx bx-plus"></i> C.C</a>
                    <a href="#" class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</a>
                    <a href="#" class="btn btn-primary" data-bs-toggle='modal' data-bs-target="#addattendance"><i class="bx bx-plus"></i> Visit</a>
                </td> -->
            </tr>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
      <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <h5>Patient Attendance</h5>
                      </div>
                      <table class="datatables-category-list table border-top" id="current_attendance">
                        <thead>
                          <tr class="" align="center">
                            <th>Attendance ID</th>
                            <th>Attendate Date</th>
                            <th>Patient Age</th>
                            <th>Clinic</th>
                            <th>Sponsor</th>
                            <!-- <th>Sponsor &nbsp;</th> -->
                            <th>Attendance Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                        <tfoot>
                          <tr class="" align="center">
                            <th>Attendance ID</th>
                            <th>Attendate Date</th>
                            <th>Patient Age</th>
                            <th>Clinic</th>
                            <th>Sponsor</th>
                            <!-- <th>Sponsor &nbsp;</th> -->
                            <th>Attendance Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>   
             </div>
</div>   
<!-----------****************************----------------------------------------->
<!-- service_request Modal -->
<div class="modal fade" id="addattendance" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
    <div class="modal-content">
      <div class="modal-body">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        <div class="text-center mb-6">
          <h4 class="address-title mb-2">Patient Attendance Registration</h4>
          <p class="address-subtitle">ADD NEW PATIENT ATTENDANCE</p>
        </div>
          <div class="alert-container"></div>
        <form id="service_request_form" class="row g-6" onsubmit="return false">
          @csrf
          <div id="success_diplay" class="container mt-6"></div>
            <input type="text" name="patient_id" id="patient_id" value="{{ $patients->patient_id }}" hidden>
            <input type="text" name="service_id" id="service_id" hidden>
            <input type="text" name="service_fee_id" id="service_fee_id" hidden>
            <input type="text" name="top_up" id="top_up" value="0.00" hidden>
            <input type="text" name="opd_number" id="opd_number" value="{{ $patients->opd_number}}" hidden>
          <div class="col-12 col-md-6">
            <label class="form-label" for="clinic_code">Service Clinic</label>
             <select name="clinic_code" id="clinic_code" class="form-control">
                <option>-Select-</option>
                @foreach($clinic_attendance as $clinics)                                        
                  <option value="{{ $clinics->service_point_id }}">{{ $clinics->service_points }}</option>
                 @endforeach
             </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="service_type">Service Type</label>
            <select name="service_type" id="service_type" class="form-control">
                <option disabled selected></option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="credit_amount">Credit Fee</label>
            <input type="text" id="credit_amount" name="credit_amount" class="form-control" placeholder="0.00"/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="cash_amount">Cash Fee</label>
            <input type="text" id="cash_amount" name="cash_amount" class="form-control" placeholder="0.00"/>
          </div>
          <div class="col-12 col-md-6" hidden>
            <label class="form-label" for="gdrg_code">Service G-DRG</label>
            <input type="text" id="gdrg_code" name="gdrg_code" class="form-control"/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="attendance_date">Attendance Date</label>
            <input type="date" id="attendance_date" name="attendance_date" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="attendance_type">Attendance Type</label>
                <select name="attendance_type" id="attendance_type" class="form-control" required>
                  <option selected disabled>-Select-</option>
                  <option value="NEW">NEW</option>
                  <option value="OLD">OLD</option>
                </select>
          </div>
          <div class="col-12">
            <div class="form-check form-switch my-2 ms-2">
            </div>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-3">Submit</button>
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bx bx-trash"></i>Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ service_request Modal -->
 <!------------------------------------------****************************----------------------------------------------------->

 <!-- check claims code Modal -->
<div class="modal fade" id="claims_check_code" tabindex="-1" aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center mb-6">
          <h4 class="address-title mb-2">Patient NHIS Verification</h4>
          <!-- <p class="address-subtitle">Click on the generate to get CCC or enter it in the CCC input box</p> -->
          <p class="address-subtitle" id="error" style="color:red"></p>
        </div>
        <form id="generate_ccc" class="row g-6" onsubmit="return false">
           @csrf
          <div class="col-12 col-md-6">
            <label class="form-label" for="credit_amount">Member #</label>
            <input type="text" name="card_type" id="card_type" hidden value="NHISCARD">
            <input type="text" id="member_no" name="member_no" class="form-control" placeholder="12345678"/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="cash_amount">Claims Check Code (CCC) <a href="#" style="color: red;">*</a></label>
            <input type="text" id="claim_code" name="claim_code" class="form-control" placeholder="xxxxx" maxlength="5" required readonly/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="gdrg_code"> Start Date <a href="#" style="color: red;">*</a></label>
            <input type="date" id="start_date" name="start_date" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalAddressZipCode">End Date <a href="#" style="color: red;">*</a></label>
            <input type="date" id="end_date" name="end_date" class="form-control"/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="gdrg_code"> HIN # <a href="#" style="color: red;">*</a></label>
            <input type="text" id="hin_no" name="hin_no" class="form-control" readonly/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="status">Status </label>
            <input type="text" id="card_status" name="card_status" class="form-control" readonly/>
          </div>
         <div class="col-12">
            <!-- <label class="form-label">NHIS Registration Name</label> -->
              <!-- <input type="text" name="fullname" id="fullname" class="form-control" disabled> -->
          </div> 
          <br>
          <div class="col-12 col-md-12" align="center">
            <button type="button" class="btn btn-info" onclick="generateCC()">Generate CC</button>
            <button type="submit" class="btn btn-primary me-3">Submit</button>
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bx bx-trash"></i>Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ service_request Modal -->
 <!-- ----------------------------------------****************************---------------------------------------------------------- -->
<!-- ----------------------------------------****************************---------------------------------------------------------- -->
<script>
// Add this at the beginning of your script to prevent multiple initializations
// if (window.hasInitializedTables) {
    // console.log('Tables already initialized, skipping initialization');
// } else {
    // window.hasInitializedTables = true;
    
//     $(document).ready(function () {

//       $('#current_attendance').DataTable(); 

//         const patient_Id = $('#patient_id').val();

//         if (!patient_Id) {
//             console.error('Patient id is missing.');
//             return;
//         }

//         // Reusable function to initialize DataTables with additional safety check
//         function initializeDataTable(table_id, columns) {
//             // Extra check - only initialize if the table exists
//             if (!$(table_id).length) {
//                 console.warn(`Table ${table_id} not found`);
//                 return null;
//             }
            
//             // Destroy existing instance if it exists
//             if ($.fn.DataTable.isDataTable(table_id)) {
//                 $(table_id).DataTable().destroy();
//                 console.log(`Destroyed existing DataTable instance for ${table_id}`);
//             }
            
//             return $(table_id).DataTable({
//                 paging: true,
//                 pageLength: 5,
//                 searching: true,
//                 ordering: true,
//                 responsive: true,
//                 autoWidth: false,
//                 columns: columns
//             });
//         }
        
//         // Helper function to format dates
//         function formatDate(dateString) {
//             if (!dateString) return 'N/A';
//             const date = new Date(dateString);
//             return date.toLocaleDateString();
//         }

//         // Helper function to fetch data from API
//         function fetchData(url) {
//             return fetch(url)
//                 .then(response => {
//                     if (!response.ok) {
//                         throw new Error('Network response was not ok');
//                     }
//                     return response.json();
//                 })
//                 .catch(error => {
//                     console.error('Error fetching data:', error);
//                     return [];
//                 });
//         }

//         // Initialize DataTables
//         const sponsorsTable = initializeDataTable('#patient_sponsor', [
//             { data: 'sponsor_name' },
//             { data: 'member_no' },
//             { data: 'start_date' },
//             { data: 'end_date' },
//             { data: 'status' },
//             { data: 'priority' },
//             { data: 'actions', orderable: false }
//         ]);

//         const attendanceTable = initializeDataTable('#attendance_details', [
//             { data: 'attendance_id' },
//             { data: 'attendance_date' },
//             { data: 'full_age' },
//             { data: 'pat_clinic' },
//             { data: 'sponsor' },
//             { data: 'status' },
//             { 
//                 data: 'service_issued',
//                 render: function (data, type, row) {
//                     if (data === '0') {
//                         return '<span class="badge bg-label-danger me-1">Unassigned</span>';
//                     } else if (data === '1') {
//                         return '<span class="badge bg-label-success me-1">Assigned</span>';
//                     }
//                     return data; // Fallback for unexpected status values
//                 }
//             },
//             { data: 'actions', orderable: false }
//         ]);

//         const currentattendanceTable = initializeDataTable('#current_att', [
//             { data: 'attendance_id' },
//             { data: 'attendance_date' },
//             { data: 'full_age' },
//             { data: 'pat_clinic' },
//             { data: 'sponsor' },
//             { data: 'attendance_type' },
//             { 
//                 data: 'service_issued',
//                 render: function (data, type, row) {
//                     if (data === '0') 
//                     {
//                         return '<span class="badge bg-label-danger me-1">Unassigned</span>';
//                     } else if (data === '1') 
//                         {
//                         return '<span class="badge bg-label-success me-1">Assigned</span>';
//                     }
//                     return data; // Fallback for unexpected status values
//                 }
//             },
//             { data: 'actions', orderable: false }
//         ]);

//         // Fetch and refresh data
//         function fetchAndRefreshData() {
//             Promise.all([
//                 fetchData(`/patient/patient-sponsors/${patient_Id}`),
//                 fetchData(`/patient/single-attendance/${patient_Id}`),
//                 fetchData(`/patient/current-attendance/${patient_Id}`)
//             ])
//             .then(([sponsorsResponse, attendanceResponse, currentResponse]) => {
//                 // Clear and re-populate sponsors table
//                 sponsorsTable.clear().rows.add(sponsorsResponse.map(patient => ({
//                     sponsor_name: `<a href="/patients/${patient_Id}">${patient.sponsor_name}</a>`,
//                     member_no: patient.member_no,
//                     start_date: formatDate(patient.start_date),
//                     end_date: formatDate(patient.end_date),
//                     status: patient.status ? 'Active' : 'Inactive',
//                     priority: patient.priority,
//                     actions: `
//                         <div class="dropdown" align="center">
//                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
//                                 <i class="bx bx-dots-vertical-rounded"></i>
//                             </button>
//                             <div class="dropdown-menu">
//                                 <a class="dropdown-item" href="/patients/${patient_Id}">
//                                     <i class="bx bx-detail me-1"></i> Edit
//                                 </a>
//                                 <a class="dropdown-item" href="/patients/${patient_Id}">
//                                     <i class="bx bx-trash me-1"></i> Delete
//                                 </a>
//                             </div>
//                         </div>
//                     `
//                 }))).draw();

//                 // Clear and re-populate attendance table
//                 attendanceTable.clear().rows.add(attendanceResponse.map(attendance => ({
//                     attendance_id: `<a href="${attendance.attendance_id}">${attendance.attendance_id}</a>`,
//                     attendance_date: formatDate(attendance.attendance_date),
//                     full_age: attendance.full_age || 'N/A',
//                     pat_clinic: attendance.pat_clinic,
//                     sponsor: attendance.sponsor,
//                     status: attendance.status ? 'Active' : 'Inactive',
//                     service_issued: attendance.service_issued || 'N/A',
//                     actions: `
//                         <div class="dropdown" align="center">
//                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
//                                 <i class="bx bx-dots-vertical-rounded"></i>
//                             </button>
//                             <div class="dropdown-menu">
//                                <a class="dropdown-item" href="/consultation/opd-consultation/${attendance.attendance_id}">
// //                                 <i class="bx bx-detail me-1"></i> Consult
// //                             </a>
//                                 <a class="dropdown-item" href="/patients/${patient_Id}">
//                                     <i class="bx bx-detail me-1"></i> Continue
//                                 </a>
//                                 <a class="dropdown-item" href="/patients/${patient_Id}">
//                                     <i class="bx bx-trash me-1"></i> E-Folder
//                                 </a>
//                             </div>
//                         </div>
//                     `
//                 }))).draw();

//                 // Clear and re-populate current attendance table
//                 currentattendanceTable.clear().rows.add(currentResponse.map(c_attendance => ({
//                     attendance_id: `<a href="${c_attendance.attendance_id}">${c_attendance.attendance_id}</a>`,
//                     attendance_date: formatDate(c_attendance.attendance_date),
//                     full_age: c_attendance.full_age || 'N/A',
//                     pat_clinic: c_attendance.pat_clinic,
//                     sponsor: c_attendance.sponsor,
//                     attendance_type: c_attendance.attendance_type,
//                     service_issued: c_attendance.service_issued || '0',
//                     actions: `
//                         <div class="dropdown" align="center">
//                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
//                                 <i class="bx bx-dots-vertical-rounded"></i>
//                             </button>
//                             <div class="dropdown-menu">
//                                 <a class="dropdown-item" href="/consultation/opd-consultation/${c_attendance.attendance_id}">
//                                   <i class="bx bx-detail me-1"></i> Consult
//                                  </a>
//                                 // <a class="dropdown-item" href="/patients/${patient_Id}/attendance/${c_attendance.attendance_id}/view">
//                                 //     <i class="bx bx-detail me-1"></i> View
//                                 // </a>
//                                 <a class="dropdown-item" href="/patients/${patient_Id}/attendance/${c_attendance.attendance_id}/folder">
//                                     <i class="bx bx-folder me-1"></i> E-Folder
//                                 </a>
//                             </div>
//                         </div>
//                     `
//                 }))).draw();
//             });
//         }

//         // Initial data load
//         fetchAndRefreshData();

//         // Add event listener for the "Add Sponsor" button
//         $('#add_sponsor_btn').on('click', function() {
//             // Implement sponsor addition functionality
//             // This could open a modal or redirect to a sponsor creation page
//         });

//         // Handle service request form submission
//         $('#service_request_form').on('submit', function(e) {
//             e.preventDefault();
            
//             const formData = new FormData(this);
            
//             $.ajax({
//                 url: '/patient/add-attendance',
//                 type: 'POST',
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 success: function(response) {
//                     if (response.success) {
//                         toastr.success('Attendance added successfully');
//                         $('#addattendance').modal('hide');
//                         fetchAndRefreshData(); // Refresh data after successful submission
//                     } else {
//                         toastr.error(response.message || 'Failed to add attendance');
//                     }
//                 },
//                 error: function(xhr) {
//                     toastr.error('An error occurred while adding attendance');
//                     console.error(xhr.responseText);
//                 }
//             });
//         });

//         // Handle claims code generation
//         $('#generate_ccc').on('submit', function(e) {
//             e.preventDefault();
            
//             const formData = new FormData(this);
            
//             $.ajax({
//                 url: '/patient/add-claims-code',
//                 type: 'POST',
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 success: function(response) {
//                     if (response.success) {
//                         toastr.success('Claims code added successfully');
//                         $('#claims_check_code').modal('hide');
//                         fetchAndRefreshData(); // Refresh data after successful submission
//                     } else {
//                         toastr.error(response.message || 'Failed to add claims code');
//                     }
//                 },
//                 error: function(xhr) {
//                     toastr.error('An error occurred while adding claims code');
//                     console.error(xhr.responseText);
//                 }
//             });
//         });

//         // Function to generate claims check code
//         window.generateCC = function() {
//             const memberNo = $('#member_no').val();
            
//             if (!memberNo) {
//                 $('#error').text('Please enter a member number');
//                 return;
//             }
            
//             $.ajax({
//                 url: `/patient/generate-claims-code/${memberNo}`,
//                 type: 'GET',
//                 success: function(response) {
//                     if (response.success) {
//                         $('#claim_code').val(response.code);
//                         $('#hin_no').val(response.hin_no || '');
//                         $('#card_status').val(response.status || 'Active');
//                         $('#error').text('');
//                     } else {
//                         $('#error').text(response.message || 'Failed to generate claims code');
//                     }
//                 },
//                 error: function(xhr) {
//                     $('#error').text('An error occurred while generating claims code');
//                     console.error(xhr.responseText);
//                 }
//             });
//         };

//         // Populate service types when clinic is selected
//         $('#clinic_code').on('change', function() {
//             const clinicId = $(this).val();
            
//             if (!clinicId) return;
            
//             $.ajax({
//                 url: `/services/by-clinic/${clinicId}`,
//                 type: 'GET',
//                 success: function(response) {
//                     const serviceTypeSelect = $('#service_type');
//                     serviceTypeSelect.empty();
//                     serviceTypeSelect.append('<option disabled selected>-Select-</option>');
                    
//                     response.forEach(service => {
//                         serviceTypeSelect.append(`<option value="${service.service_id}">${service.service_name}</option>`);
//                     });
//                 },
//                 error: function(xhr) {
//                     console.error('Error fetching service types:', xhr.responseText);
//                 }
//             });
//         });

//         // Edit patient button
//         $('.edit-btn').on('click', function() {
//             window.location.href = `/patients/${patient_Id}/edit`;
//         });
//     });
// // }
</script>
</x-app-layout>