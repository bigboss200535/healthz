<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Diagnosis/</span> List
                  </h4>
                  <div class="row">
                      <div class="col-12 col-lg-5">
                          <div class="card mb-4">
                            <div class="card-header">
                              <h5 class="card-tile mb-0"><b>Diagnosis Setup</b></h5>
                            </div>
                            <div class="card-body">
                              <form id="clinic_form" enctype="multipart/form-data" method="post">
                              @csrf
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_user_name">Diagnosis <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="u_user_name" name="u_user_name" placeholder="eg. ANAEMIA" autocomplete="off">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_pass_word">ICD-10 Group <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>-Select-</option>
                                      
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="other_name">ICD-10 <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="other_name" name="other_name" placeholder="eg. B54.0" autocomplete="off">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_pass_word">Gender Group <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>-Select-</option>
                                    @foreach($gender as $genders)                                        
                                        <option value="{{ $genders->gender_id}}">{{ $genders->gender }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="confirm_pass">Age Group <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>-Select-</option>
                                    @foreach($age as $ages)                                        
                                        <option value="{{ $ages->age_id}}">{{ $ages->age_description }}</option>
                                    @endforeach 
                                  </select>
                                </div>
                              </div>   
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="gender">Chronic <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>-Select-</option>
                                      
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="u_email">NHIS <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>-Select-</option>
                                      
                                  </select>
                                </div>
                              </div>   
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_telephone">Adult GDRG</label>
                                  <input type="text" class="form-control" id="u_telephone" name="u_telephone" placeholder="eg. OPDC06A">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="user_role">Child GDRG</label>
                                  <input type="text" class="form-control" id="u_telephone" name="u_telephone" placeholder="eg. OPDC06C">
                                </div>
                              </div>  
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_block">NHIS Adult Tariff </label>
                                  <input type="text" name="adult_amount" id="adult_amount" class="form-control">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="status">NHIS Child Tariff</label>
                                  <input type="text" name="adult_amount" id="adult_amount" class="form-control">
                                </div>
                              </div>    
                                  <div class="d-flex align-content-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">clear</button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="card-tile mb-0"><b>List of Diagnosis</b></h5>
                            </div>
                            <div class="card-body">
                                <table class="datatables-category-list table border-top" id="product_list">
                                    <thead>
                                      <tr>
                                        <th>Sn</th>
                                        <th>Diagnosis</th>
                                        <th>ICD-10</th>
                                        <th>NHIS?</th>
                                        <th>Status</th>
                                        <th class="text-lg-center"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $counter = 1;
                                        @endphp
                                        @foreach($diagnosis as $diagnoses)
                                        <tr>
                                          <td>{{ $counter++ }}</td>
                                          <td>{{ $diagnoses->diagnosis }}</td>
                                          <td><span class="badge bg-label-secondary me-1">{{ $diagnoses->icd_10 }}</span></td>
                                          <td>
                                                @if($diagnoses->is_nhis  === 'Yes')
                                                <span class="badge bg-label-primary me-1">{{ $diagnoses->is_nhis }} </span>
                                                @elseif ($diagnoses->is_nhis  === 'No')
                                                 <span class="badge bg-label-info me-1">{{ $diagnoses->is_nhis }} </span>
                                                @endif
                                          </td>
                                          <td>
                                                @if($diagnoses->status  === 'Active')
                                                 <span class="badge bg-label-success me-1">{{ $diagnoses->status }}</span>
                                                @elseif ($diagnoses->status  === 'Inactive')
                                                 <span class="badge bg-label-danger me-1">{{ $diagnoses->status }} </span>
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
                                                              <!-- <a class="dropdown-item" href="">
                                                                <i class="bx bx-lock-alt me-1"></i> Roles
                                                              </a> -->
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
                                        <th>Sn</th>
                                        <th>Diagnosis</th>
                                        <th>ICD-10</th>
                                        <th>NHIS?</th>
                                        <th>Status</th>
                                        <th class="text-lg-center"></th>
                                      </tr>
                                    </tfoot>
                                  </table>
                            </div>
                          </div>
                        </div>
                    </div>
             
             </div>
                  
          </div>
    </x-app-layout>