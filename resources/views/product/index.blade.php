    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Product/</span> List
                  </h4>

                  <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span></span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $total_all }}</h4>
                                <!-- <small class="text-success">(+29%)</small> -->
                              </div>
                              <p class="mb-0">All <br>Products </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span></span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $total_drugs }}</h4>
                                <!-- <small class="text-success">(+18%)</small> -->
                              </div>
                              <p class="mb-0">Total <br> Drugs</p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-danger">
                                <i class="bx bx-user-check bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span></span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{$total_consumable}}</h4>
                                <!-- <small class="text-danger">(-14%)</small> -->
                              </div>
                              <p class="mb-0">Total <br>Consumables</p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-success">
                                <i class="bx bx-group bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span> </span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $total_others }}</h4>
                                <!-- <small class="text-success">(+42%)</small> -->
                              </div>
                              <p class="mb-0"><br> Others </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-warning">
                                <i class="bx bx-user-voice bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <a class="btn btn-primary me-sm-3 me-1" href="{{ url('add-product') }}">Add New Product</a>
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr>
                            <th>Sn</th>
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
                              $counter = 1;
                            @endphp
                            @foreach($item as $product)
                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ $product->product_name }}</td>
                              <td>{{ $product->product_type }}</td>
                              <td>{{ $product->is_stockable }}</td>
                              <td>{{$product->store}}                   </td>
                              <td class="text-nowrap text-sm-end" style="padding-right: 10px;">
                                @if($product->expirable === 'Yes')
                                <span class="badge bg-label-info me-1">Yes</span>
                                @elseif ($product->expirable === 'No')
                                <span class="badge bg-label-danger me-1">No</span>
                                @endif
                              </td>
                              <td class="text-nowrap text-sm-end" align="left">
                                @if($product->status === 'Active')
                                <span class="badge bg-label-info me-1">Active</span>
                                @elseif ($product->status === 'Inactive')
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
                                                  <a class="dropdown-item product_delete_btn" data-id="{{ $product->product_id}}" href="#">
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