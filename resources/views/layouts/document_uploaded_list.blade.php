                                             @if($documents && $documents->count() > 0)
                                                          <div class="table-responsive">
                                                              <table class="table table-hover" id="documents_table">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>S/N</th>
                                                                          <th>Document Name</th>
                                                                          <th>Document Type</th>
                                                                          <th>Upload Date</th>
                                                                          <th>Size</th>
                                                                          <th>Actions</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      @php
                                                                        $counter = 1;
                                                                     @endphp
                                                                      @foreach($documents as $document)
                                                                      <tr>
                                                                          <td>{{ $counter++ }}</td>
                                                                          <td>{{ $document->file_name }}</td>
                                                                          <td><span class="badge bg-label-primary">{{ strtoupper($document->document_type) }}</span></td>
                                                                          <td>{{ \Carbon\Carbon::parse($document->added_date)->format('d-m-Y') }}</td>
                                                                          <td>{{ number_format($document->file_size / 1024, 2) }} KB</td>
                                                                          <td>
                                                                                <div class="btn-group" role="group">
                                                                                     <a href="{{ route('documents.download', $document->documents_id) }}" target="_blank" class="btn btn-sm btn-info">
                                                                                        <i class="bx bx-show"></i>
                                                                                    </a>
                                                                                     <a href="{{ route('documents.download', $document->documents_id) }}" download="{{ $document->file_name }}" class="btn btn-sm btn-success">
                                                                                        <i class="bx bx-download"></i> 
                                                                                     </a>
                                                                                    <button class="btn btn-sm btn-danger delete-document" data-id="{{ $document->documents_id }}">
                                                                                        <i class="bx bx-trash"></i> 
                                                                                    </button>
                                                                                </div>                    
                                                                          </td>
                                                                      </tr>
                                                                      @endforeach
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                      @else
                                                          <div class="col-sm-12 alert alert-info">
                                                              No Documents Uploaded yet.
                                                               {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
                                                          </div>
                                                      @endif
                                            <!--  -->
