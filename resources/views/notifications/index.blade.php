<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">SMS/</span> List
                  </h4>
                  <div class="row">
                      <div class="col-12 col-lg-5">
                          <div class="card mb-4">
                            <div class="card-header">
                              <h5 class="card-tile mb-0"><b>Send SMS</b></h5>
                            </div>
                            <div class="card-body">
                              <form id="sms_form" method="post" onsubmit="return false;">
                              @csrf
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="sms_telephone">Telephone <a style="color: red;">*</a></label>
                                  <input type="text" class="form-control" maxlength="10" id="sms_telephone"  name="sms_telephone" placeholder="Telephone" >
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label class="form-label" for="sms_message">Message <a style="color: red;">*</a></label>
                                   <textarea name="sms_message" id="sms_message"  class="form-control" cols="30"
                                   rows="5" maxlength="160" autocomplete="off"></textarea>
                                </div>
                                <label for="message_count">Message Count: <a id="char_counter"> 0</a></label>
                                <!-- <label for="message_count">Page Count: <a id="char_counter"> 0</a></label> -->
                              </div>       
                              <div class="d-flex align-content-center flex-wrap gap-3">
                                    <button type="submit" id="sms_submit" class="btn btn-primary"><i class="bx bx-save"></i> Send SMS</button>
                                    <button type="reset" class="btn btn-label-warning">Clear Form</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="card-tile mb-0"><b>SMS List</b></h5>
                            </div>
                            <div class="card-body">
                                <table class="datatables-category-list table border-top" id="app_list">
                                    <thead>
                                      <tr>
                                        <th>Sn</th>
                                        <th>Receiver</th>
                                        <th>Message</th>
                                        <!-- <th>Block</th> -->
                                        <!-- <th>Role</th> -->
                                        <th>Status</th>
                                        <th class="text-lg-center"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach($sms as $message)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $message->intended_for }}</td>
                                        <td>{{ $message->added_date }}</td> 
                                        <td>
                                            @if($message->status == 'Delivered')
                                            <span class="badge bg-label-success me-1">Delivered</span>
                                            @elseif($message->status == 'Not Delivered')
                                            <span class="badge bg-label-danger me-1">Pending</span>
                                            @endif
                                        </td>
                                        <td class="text-lg-center">
                                                <div class="dropdown" align="center">
                                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                          <i class="bx bx-dots-vertical-rounded"></i>
                                                      </button>
                                                        <div class="dropdown-menu">
                                                              <a class="dropdown-item" href="">
                                                                <i class="bx bx-edit-alt me-1"></i> Resend
                                                              </a>
                                                              <a class="dropdown-item" href="">
                                                                <i class="bx bx-lock-alt me-1"></i> Read
                                                              </a>
                                                              <a class="dropdown-item product_delete_btn" data-id="#" href="#">
                                                                  <i class="bx bx-trash me-1"></i> Delete
                                                              </a>
                                                        </div>
                                                  </div>  
                                          </td>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>Sn</th>
                                        <th>Receiver</th>
                                        <th>Message</th>
                                        <!-- <th>Block</th> -->
                                        <!-- <th>Role</th> -->
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