    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Services/</span> Services Fee Setup
                  </h4>
                  <div class="row">
                      <div class="col-12 col-lg-6">
                          <div class="card mb-4">
                            <div class="card-header">
                              <h5 class="card-tile mb-0"><b>Services Setup</b></h5>
                            </div>
                            <div class="card-body">
                              <form id="patient_info" enctype="multipart/form-data" method="post">
                              @csrf
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_name">Sevice Name <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Service Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="status">Item Status <a style="color: red;">*</a></label>
                                  <select name="status" id="status" class="form-control">
                                    <option disabled>-Select-</option>
                                    <option selected value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_typ">Service Type <a style="color: red;">*</a></label>
                                  <select name="service_typ" id="service_typ" class="form-control">
                                    <option value="" disabled selected>-Select-</option>
                                    @foreach($service_type as $services)                                        
                                        <option value="{{ $services->service_id}}">{{ $services->service_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">Allow NHIS <a style="color: red;">*</a></label>
                                  <select  class="form-control" id="report_type" name="report_type">
                                    <option selected disabled>-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                  </select>
                                </div>
                                
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_typ">Allow Top Up <a style="color: red;">*</a></label>
                                  <select name="service_typ" id="service_typ" class="form-control">
                                    <option value="" disabled selected>-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="Yes">No</option>
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_name">Editable <a style="color: red;">*</a></label>
                                  <select name="service_typ" id="service_typ" class="form-control">
                                    <option value="" disabled selected>-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="Yes">No</option>
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">Delivery Mode <a style="color: red;">*</a></label>
                                  <select  class="form-control" id="report_type" name="report_type">
                                    <option selected disabled>-Select-</option>
                                    <option value="Inward">Inward</option>
                                    <option value="Outward">Outward</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_typ">Age Group <a style="color: red;">*</a></label>
                                  <select name="service_typ" id="service_typ" class="form-control">
                                    <option value="" disabled selected>-Select-</option>
                                    @foreach($age as $ages)                                        
                                        <option value="{{ $ages->age_id}}">{{ $ages->age_description }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_name">Patient Type <a style="color: red;">*</a></label>
                                  <select name="service_typ" id="service_typ" class="form-control">
                                    <option value="" disabled selected>-Select-</option>
                                    @foreach($patient_status as $pat_statuses)                                        
                                        <option value="{{ $pat_statuses->patient_status}}">{{ $pat_statuses->status_patient }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">Gender Group <a style="color: red;">*</a></label>
                                  <select  class="form-control" id="report_type" name="report_type">
                                    <option selected disabled>-Select-</option>
                                    @foreach($gender as $genders)                                        
                                        <option value="{{ $genders->gender_id}}">{{ $genders->gender }}</option>
                                    @endforeach
                                  </select>
                                </div>  
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_typ">Cash Amount  <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" name="cash_amount" id="cash_amount" placeholder="0.00">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_name">Private Insurance Amount <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" placeholder="0.00">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">Co-operate Amount <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" placeholder="0.00">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_typ">Foreigners Amount  <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" name="cash_amount" id="cash_amount" placeholder="0.00">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_name">NHIS Adult Tariff</label>
                                  <input type="text" class="form-control" placeholder="0.00">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">NHIS Child Tariff </label>
                                  <input type="text" class="form-control" placeholder="0.00">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="service_typ"> Adult GDRG </label>
                                  <input type="text" class="form-control" name="cash_amount" id="cash_amount" placeholder="eg. OPDC06A">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="service_name">Child GDRG </label>
                                  <input type="text" class="form-control" placeholder="eg. OPDC06A">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="report_type">NHIS Topup Amount </label>
                                  <input type="text" class="form-control" placeholder="0.00" value="0.00">
                                </div>
                              </div>
                                  <div class="d-flex align-content-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">clear</button>
                                </div>
                            </div>
                              
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="card-tile mb-0"><b>Services and their tarrifs</b></h5>
                            </div>
                            <div class="card-body">
                                <table class="datatables-category-list table border-top" id="product_list">
                                    <thead>
                                      <tr>
                                        <th>Sn</th>
                                        <th>Service</th>
                                        <!-- <th>Service Type</th> -->
                                        <th>Status</th>
                                        <th class="text-lg-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $counter = 1;
                                        @endphp
                                        @foreach($services_fees as $services)
                                        <tr>
                                          <td>{{ $counter++ }}</td>
                                          <td>{{ $services->service }}</td>
                                          <!-- <td>{{ $services->service_name }}</td> -->
                                          <td class="text-nowrap text-sm-end" align="left">
                                            @if($services->status === 'Active')
                                            <span class="badge bg-label-info me-1">Active</span>
                                            @elseif ($services->status === 'Inactive')
                                            <span class="badge bg-label-danger me-1">Inactive</span>
                                            @endif
                                          </td>
                                          <td class="text-lg-center">
                                                <div class="dropdown" align="center">
                                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                          <i class="bx bx-dots-vertical-rounded"></i>
                                                      </button>
                                                        <div class="dropdown-menu">
                                                              <a class="dropdown-item" href="">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                              </a>
                                                              <a class="dropdown-item product_delete_btn" data-id="{{ $services->product_id}}" href="#">
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
                                        <th>Sn</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th class="text-lg-center">Actions</th>
                                      </tr>
                                    </tfoot>
                                  </table>

                            </div>
                          </div>
                        </div>
                      </div>

                  <div class="app-ecommerce-category">
             
             </div>
          </div>
    </x-app-layout>