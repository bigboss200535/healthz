<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Users/</span> List
                  </h4>
                  <div class="row">
                      <div class="col-12 col-lg-5">
                          <div class="card mb-4">
                            <div class="card-header">
                              <h5 class="card-tile mb-0"><b>Users Setup</b></h5>
                            </div>
                            <div class="card-body">
                              <form id="user_form" method="post" onsubmit="return false">
                              @csrf
                              <div class="row mb-3">
                                <div class="col">
                                  <input type="text"  id="user_id" name="user_id" hidden>
                                  <label class="form-label" for="u_user_name">Username <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="u_user_name" name="u_user_name" maxlength="50" placeholder="Username" autocomplete="off">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="first_name">Firstname <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="150" autocomplete="off">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="other_name">Othername <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="other_name" name="other_name" placeholder="Othername" maxlength="150" autocomplete="off">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_pass_word">Password <a style="color: red;">*</a></label>
                                  <input type="password" class="form-control" id="u_pass_word" name="u_pass_word" maxlength="50" placeholder="*****">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="confirm_pass">Confirm Password <a style="color: red;">*</a></label>
                                  <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" maxlength="50" placeholder="*****">
                                </div>
                              </div>   
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="gender">Gender <a style="color: red;">*</a></label>
                                  <select name="gender" id="gender" class="form-control">
                                    <option disabled selected></option>
                                      @foreach($gender as $genders)                                        
                                          <option value="{{ $genders->gender_id}}">{{ $genders->gender }}</option>
                                      @endforeach
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="u_email">Email </label>
                                  <input type="text" class="form-control" id="u_email" name="u_email" maxlength="50" placeholder="example@demo.com">
                                </div>
                              </div>   
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_telephone">Telephone <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" id="u_telephone" name="u_telephone" maxlength="50" placeholder="eg. 023xxxxxxx">
                                </div>
                                <div class="col">
                                  <label class="form-label" for="user_role">Role <a style="color: red;">*</a></label>
                                  <select name="user_role" id="user_role" class="form-control">
                                    <option disabled selected></option>
                                    @foreach($role as $roles)                                        
                                          <option value="{{ $roles->user_roles_id}}">{{ strtoupper($roles->role_type) }}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>  
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="u_block">Block Status <a style="color: red;">*</a></label>
                                  <select name="u_block" id="u_block" class="form-control">
                                    <!-- <option disabled selected></option> -->
                                    <option value="Block">BLOCK</option>
                                    <option value="Unblock" selected>UNBLOCK</option>
                                  </select>
                                </div>
                                <div class="col">
                                  <label class="form-label" for="user_status">Status <a style="color: red;">*</a></label>
                                  <select name="user_status" id="user_status" class="form-control">
                                    <!-- <option disabled selected></option> -->
                                    <option value="Active" selected>ACTIVE</option>
                                    <option value="Inactive">INACTIVE</option>
                                  </select>
                                </div>
                              </div>    
                                  <div class="d-flex align-content-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary" id="save_user">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" id="clear_user_form">clear</button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="card-tile mb-0"><b>User List</b></h5>
                            </div>
                            <div class="card-body">
                                <table class="datatables-category-list table border-top" id="users_list">
                                    <thead>
                                      <tr>
                                        <th>Sn</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <!-- <th>Block</th> -->
                                        <!-- <th>Expiry</th> -->
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-lg-center"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $counter = 1;
                                        @endphp
                                         @foreach($user as $users)
                                        <tr>
                                          <td>{{ $counter++ }}</td>
                                          <td>{{ strtoupper($users->user_fullname) }}</td>
                                          <td>{{ $users->username }}</td>
                                          <!-- <td>
                                              @if($users->locked === 'No')
                                                 <span class="badge bg-label-primary me-1">Unlocked</span>
                                                @elseif ($users->locked === 'Yes')
                                                 <span class="badge bg-label-danger me-1">Locked</span>
                                                @endif
                                          </td> -->
                                          
                                          <td><span class="badge bg-label-primary me-1">{{ $users->role_type }}</span></td>
                                          <td class="text-nowrap text-sm-end" align="left">
                                                @if($users->status === 'Active')
                                                 <span class="badge bg-label-success me-1">Active</span>
                                                @elseif ($users->status === 'Inactive')
                                                 <span class="badge bg-label-danger me-1">Inactive</span>
                                                @endif
                                          </td>
                                          <td class="text-lg-center">
                                                <div class="dropdown" align="center">
                                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                          <i class="bx bx-dots-vertical-rounded"></i>
                                                      </button>
                                                        <div class="dropdown-menu">
                                                              <a class="dropdown-item" href="/users/{{ $users->user_id }}">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                              </a>
                                                              <a class="dropdown-item" href="/users/manage-permissions/{{ $users->user_id }}">
                                                                <i class="bx bx-lock-alt me-1"></i> Permissions
                                                              </a>
                                                              <a class="dropdown-item product_delete_btn" data-id="#" href="#">
                                                                  <i class="bx bx-pause me-1"></i> Block
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
                                        <th>Sn</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <!-- <th>Block</th> -->
                                        <!-- <th>Expiry</th> -->
                                        <th>Role</th>
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
          <!-- <script>
              // $(document).ready(function() {
                  $('#user_form').submit(function(e) {
                      e.preventDefault();

                      const $submitBtn = $('#save_user');
                      const $clearBtn = $('#clear_user_form');
                      const $form = $('#user_form'); // Added missing form reference

                      const original_text = $submitBtn.html();
                      const formData = new FormData($form[0]);
                      const user_save = Object.fromEntries(formData.entries());

                      $clearBtn.prop('disabled', true);

                      // Clear previous validation errors
                      $('.is-invalid').removeClass('is-invalid');

                      if (!user_save.u_user_name || user_save.u_user_name === ""){
                          $('#u_user_name').addClass('is-invalid').focus();
                          return false;
                      }

                      if (!user_save.first_name || user_save.first_name === ""){
                          $('#first_name').addClass('is-invalid').focus();
                          return false;
                      }

                      if (!user_save.other_name || user_save.other_name === ""){
                          $('#other_name').addClass('is-invalid').focus();
                          return false;
                      }
                      
                      if (!user_save.u_pass_word || user_save.u_pass_word === ""){
                          $('#u_pass_word').addClass('is-invalid').focus();
                          return false;
                      }

                      if (!user_save.confirm_pass || user_save.confirm_pass === ""){
                          $('#confirm_pass').addClass('is-invalid').focus();
                          return false;
                      }

                      if (!user_save.gender || user_save.gender === ""){
                          $('#gender').addClass('is-invalid').focus();
                          return false;
                      }

                      if (!user_save.user_role || user_save.user_role === ""){
                          $('#user_role').addClass('is-invalid').focus();
                          return false;
                      }

                      // Validate password match
                      if (user_save.u_pass_word !== user_save.confirm_pass) {
                          toastr.warning('Password and Confirm Password do not match');
                          $('#u_pass_word').addClass('is-invalid').focus();
                          $('#confirm_pass').addClass('is-invalid');
                          return false;
                      }

                      const url = user_save.user_id ? `/users/${user_save.user_id}` : '/users';
                      const method = user_save.user_id ? 'PUT' : 'POST'; // Fixed variable name from patient_save to user_save

                      $.ajax({
                          url: url,
                          type: method,
                          data: formData,
                          processData: false,
                          contentType: false,
                          headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          beforeSend: function() {
                              $clearBtn.prop('disabled', true);
                              $submitBtn.prop('disabled', true)
                              .html('<span class="spinner-border spinner-border-sm" role="status"></span> Submitting...');
                          },
                          success: function(response) {
                              if(response.code === 201) {
                                  toastr.success('User created successfully');
                                  $submitBtn.prop('disabled', false);
                                  $clearBtn.prop('disabled', false);
                                  $form[0].reset(); // Reset form after successful submission
                              } else if (response.code === 200) {
                                  toastr.error('Ops! User Already exists.');
                                  $submitBtn.prop('disabled', false);
                                  $clearBtn.prop('disabled', false);
                              } else {
                                  toastr.error(response.message || 'Error saving User');
                                  $submitBtn.prop('disabled', false);
                                  $clearBtn.prop('disabled', false);
                              }
                          },
                          error: function(xhr) {
                              let errors = xhr.responseJSON?.errors || {};
                              let errorMessage = '';
                              
                              $.each(errors, function(key, value) {
                                  errorMessage += value + '\n';
                                  $(`#${key}`).addClass('is-invalid');
                              });
                              toastr.error('Ops! ' + errorMessage);
                              $submitBtn.prop('disabled', false);
                              $clearBtn.prop('disabled', false);
                          },
                          complete: function () {
                            $submitBtn.prop('disabled', false).html('Submit');
                            $clearBtn.prop('disabled', false);
                          }
                      });
                  });
              // }); -->
          <!-- </script> -->
    </x-app-layout>