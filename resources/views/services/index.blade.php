    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Services and Fees/</span> List
                  </h4>

                  <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <a class="btn btn-primary me-sm-3 me-1" href="#">Add New Service</a>
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr>
                            <th>Sn</th>
                            <th>Service</th>
                            <th>Service Type</th>
                            <th>Allow Nhis</th>
                            <th class="text-nowrap text-sm-end">Editable &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable</th>
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
                              <td>{{ $services->service_name }}</td>
                              <td>{{ $services->allow_nhis }}</td>
                              <td>{{$services->editable}}                   </td>
                              <td class="text-nowrap text-sm-end" style="padding-right: 10px;">
                                @if($services->editable === 'Yes')
                                <span class="badge bg-label-info me-1">Yes</span>
                                @elseif ($services->editable === 'No')
                                <span class="badge bg-label-danger me-1">No</span>
                                @endif
                              </td>
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
                                                    <i class="bx bx-edit-alt me-1"></i> More
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
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable </th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>   
             </div>
          </div>

          <!-- product modal form -->

          <!-- end of product modal form -->
    </x-app-layout>