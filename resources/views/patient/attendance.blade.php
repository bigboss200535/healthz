<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Patients /</span> Attendance
                  </h4>
                   
                  <div class="card mb-6">
                    <div class="card-widget-separator-wrapper">
                      <div class="card-body card-widget-separator">
                        <div class="row gy-4 gy-sm-1">
                          <div class="col-sm-6 col-lg-12">
                              <h4 align="center" class="text-primary">-Kingly select an attendance to continue-</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                <div class="card" id="patient_search_result" >
                    <div class="card-datatable table-responsive">
                      <div class="col" style="padding-left:20px;"> 
                      <h4 class="mb-1 mt-3 text-mute">PATIENT ATTENDANCE</h4>
                      </div>
                      <table class="datatables-customers table border-top" id="app_list">
                          <thead>
                              <tr>
                                  <th>S/N</th>
                                  <th>Attendance Date</th>
                                  <th>Name</th>
                                  <th>OPD #</th>
                                  <th>Gender</th>
                                  <th>Age</th>
                                  <th>Sponsor</th>
                                  <th>Clinic</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                          @php
                              $counter = 1;
                            @endphp
                            @foreach($all as $patients)
                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ \Carbon\Carbon::parse($patients->attendance_date)->format('d-m-Y') }}</td>
                              <td>{{ $patients->fullname }}</td>
                              <td>{{ $patients->opd_number }}</td>
                              <td>{{ $patients->gender }}</td>
                              <td>{{ $patients->full_age }}</td>
                              <td><span class="badge bg-label-primary me-1">{{$patients->sponsor_name}}</span></td>
                              <td><span class="badge bg-label-success me-1">{{ $patients->pat_clinic }}</span></td>
                             <td> 
                                <div class="dropdown" align="center">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                            <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="/consultation/opd-consultation/{{ $patients->attendance_id }}" >
                                                      <i class="bx bx-edit-alt me-1"></i> Consult
                                                  </a>
                                                   <a class="dropdown-item product_delete_btn" data-id="#" href="#">
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
                                  <th>Attendance Date</th>
                                  <th>Name</th>
                                  <th>OPD #</th>
                                  <th>Gender</th>
                                  <th>Age</th>
                                  <th>Sponsor</th>
                                  <th>Clinic</th>
                                  <th></th>
                              </tr>
                          </tfoot>
                      </table>
                    </div>
            </div>
          </div>
</x-app-layout>
